<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Notifications extends Model {

    public $url;

    public function __construct() {
        $api = new \App\Helpers\Constants();
        $this->url = $api->url();
    }

    public function getListNotificationsActive($token) {
        $response = Http::withHeaders([
                    'Authorization' => $token
                ])->get($this->url . '/api/notifications/index');

        return $response->json();
    }

    public function generateNotifications($token) {
        $response = Http::withHeaders([
                    'Authorization' => $token
                ])->get($this->url . '/api/notifications/generate');

        return $response->json();
    }

    public function getListNotificationsAll($token) {
        $response = Http::withHeaders([
                    'Authorization' => $token
                ])->get($this->url . '/api/notifications/indexAll');

        return $response->json();
    }

    public function getListNotificationsChecked($token) {
        $response = Http::withHeaders([
                    'Authorization' => $token
                ])->get($this->url . '/api/notifications/checked');

        return $response->json();
    }

    public function check($token, $id) {
        $response = Http::withHeaders([
                    'Authorization' => $token
                ])->get($this->url . '/api/notifications/state/' . $id);

        return $response->json();
    }

}
