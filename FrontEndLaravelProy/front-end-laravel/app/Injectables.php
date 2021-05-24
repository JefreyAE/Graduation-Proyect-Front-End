<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Injectables extends Model
{
    public $url;

    public function __construct() {
        $api = new \App\Helpers\Constants();
        $this->url = $api->url();
    }
    
    public function getListInjectables($token){
        $response = Http::withHeaders([
            'Authorization' => $token
            ])->get($this->url.'/api/injectables/index'); 

        return $response->json();
    }
    
    public function saveInjectable($token,$animal_id,$injectable_type,$application_date,$injectable_name,$injectable_brand,$withdrawal_time,$effective_time,$description){
        $response = Http::withHeaders(
            ['Authorization'=> $token]
            )->asForm()->post($this->url.'/api/injectables/create',[
            'json'=>[
                'animal_id'           =>  $animal_id,            
                'injectable_type'     =>  $injectable_type,
                'application_date'    =>  $application_date,
                'injectable_name'     =>  $injectable_name,
                'injectable_brand'    =>  $injectable_brand,
                'withdrawal_time'     =>  $withdrawal_time,
                'effective_time'      =>  $effective_time,
                'description'         =>  $description
            ]
        ]);  
        
        return $response->json();
    }
    
    public function getListInjectablesDetail($token,$creation_time){
        $response = Http::withHeaders([
            'Authorization' => $token
            ])->get($this->url.'/api/injectables/injectable/detail/'.$creation_time); 

        return $response->json();
    }
}
