<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Purchases extends Model {

    public $url;

    public function __construct() {
        $api = new \App\Helpers\Constants();
        $this->url = $api->url();
    }

    public function getListPurchases($token) {
        $response = Http::withHeaders([
                    'Authorization' => $token
                ])->get($this->url . '/api/purchases/index');

        return $response->json();
    }

    public function savePurchase($token, $animal_id, $purchase_type, $weight, $price_total, $price_kg, $auction_commission, $auction_name, $purchase_date, $description) {
        $response = Http::withHeaders(
                        ['Authorization' => $token]
                )->asForm()->post($this->url . '/api/purchases/create', [
            'json' => [
                'animal_id' => $animal_id,
                'purchase_type' => $purchase_type,
                'weight' => $weight,
                'price_total' => $price_total,
                'price_kg' => $price_kg,
                'auction_commission' => $auction_commission,
                'auction_name' => $auction_name,
                'purchase_date' => $purchase_date,
                'description' => $description
            ]
        ]);

        return $response->json();
    }

    public function findByDates($token, $date1, $date2) {
        $response = Http::withHeaders(
                        ['Authorization' => $token]
                )->asForm()->post($this->url . '/api/purchases/find', [
            'json' => [
                'date1' => $date1,
                'date2' => $date2,
            ]
        ]);

        return $response->json();
    }

    public function deleteOne($token, $purchase_id, $animal_id){

        $response = Http::withHeaders(
            ['Authorization' => $token]
                )->asForm()->delete($this->url . '/api/purchases/purchase/delete-one', [
            'json' => [
                'purchase_id'   => $purchase_id,
                'animal_id' => $animal_id
                ]
            ]
        );

        return $response->json();
    }

}
