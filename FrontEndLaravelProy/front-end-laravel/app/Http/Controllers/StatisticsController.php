<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animals;


class StatisticsController extends Controller
{
    public function __construct(){
        $api = new \App\Helpers\Constants();
        $this->url = $api->url();
    }

    public function index(Request $request) {
        //retorna el listado de animales
        $token = session('token');
        $_statisticsService = new \App\Services\StatisticsService();
        $response = $_statisticsService->getStatisticsGlobals($token);

        //$animal = new Animals();
        //$response = $animal->getListActiveAnimals($token);

        return view('statistics.statisticsIndex',['listStatisticsGlobal' => $response['listStatisticsGlobal']]);
    }

    public function auctions(Request $request){
        $token = session('token');
        $_statisticsService = new \App\Services\StatisticsService();
        $response = $_statisticsService->getStatisticsActions($token);
        //var_dump($token);
        //var_dump($response['listStatisticsAuctions']);
        //die();
        return view('statistics.statisticsAuctions', ['listStatisticsAuctions'=>$response['listStatisticsAuctions']]);
    }


}
