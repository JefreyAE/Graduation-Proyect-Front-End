<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class StatisticsService{


    public $url;

    public function __construct(){
        $api = new \App\Helpers\Constants();
        $this->url = $api->url();
    }

    public function getStatisticsGlobals($token){

        $response = Http::withHeaders([
            'Authorization' => $token
        ])->get($this->url . '/api/statistics/index');

        return $response->json();
    }

    public function getStatisticsRecentAuctions(){

    }

    public function getStatisticsActions($token){

        $response = Http::withHeaders([
            'Authorization' => $token
        ])->get($this->url . '/api/statistics/auctions');

        return $response->json();
    }


}