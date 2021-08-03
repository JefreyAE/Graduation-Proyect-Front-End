<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Sales extends Model {

    public $url;

    public function __construct() {
        $api = new \App\Helpers\Constants();
        $this->url = $api->url();
    }

    public function getListSales($token) {
        $response = Http::withHeaders([
                    'Authorization' => $token
                ])->get($this->url . '/api/sales/index');

        return $response->json();
    }

    public function saveSale($token, $animal_id, $sale_type, $weight, $price_total, $price_kg, $auction_commission, $auction_name, $sale_date, $description) {
        $response = Http::withHeaders(
                        ['Authorization' => $token]
                )->asForm()->post($this->url . '/api/sales/create', [
            'json' => [
                'animal_id' => $animal_id,
                'sale_type' => $sale_type,
                'weight' => $weight,
                'price_total' => $price_total,
                'price_kg' => $price_kg,
                'auction_commission' => $auction_commission,
                'auction_name' => $auction_name,
                'sale_date' => $sale_date,
                'description' => $description
            ]
        ]);

        return $response->json();
    }

    public function findByDates($token, $date1, $date2) {
        $response = Http::withHeaders(
                        ['Authorization' => $token]
                )->asForm()->post($this->url . '/api/sales/find', [
            'json' => [
                'date1' => $date1,
                'date2' => $date2,
            ]
        ]);


        return $response->json();
    }

    public function deleteOne($token, $sale_id, $animal_id){

        $response = Http::withHeaders(
            ['Authorization' => $token]
                )->asForm()->delete($this->url . '/api/sales/sale/delete-one', [
            'json' => [
                'sale_id'   => $sale_id,
                'animal_id' => $animal_id
                ]
            ]
        );

        return $response->json();
    }

}
