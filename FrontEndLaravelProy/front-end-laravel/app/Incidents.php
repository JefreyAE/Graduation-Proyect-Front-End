<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Incidents extends Model {

    public $url;

    public function __construct() {
        $api = new \App\Helpers\Constants();
        $this->url = $api->url();
    }

    public function getListIncidents($token) {
        $response = Http::withHeaders([
                    'Authorization' => $token
                ])->get($this->url . '/api/incidents/index');

        return $response->json();
    }

    public function saveIncident($token, $animal_id, $incident_date, $incident_type, $description) {
        $response = Http::withHeaders(
                        ['Authorization' => $token]
                )->asForm()->post($this->url . '/api/incidents/create', [
            'json' => [
                'animal_id' => $animal_id,
                'incident_date' => $incident_date,
                'incident_type' => $incident_type,
                'description' => $description
            ]
        ]);

        return $response->json();
    }

    public function deleteOne($token, $incident_id, $animal_id){

        $response = Http::withHeaders(
            ['Authorization' => $token]
                )->asForm()->delete($this->url . '/api/incidents/incident/delete-one', [
            'json' => [
                'incident_id' => $incident_id,
                'animal_id'   => $animal_id
                ]
            ]
        );

        return $response->json();
    }

}
