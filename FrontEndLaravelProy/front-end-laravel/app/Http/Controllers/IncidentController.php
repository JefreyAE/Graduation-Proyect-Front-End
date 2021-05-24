<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animals;
use App\Incidents;

class IncidentController extends Controller
{
    public function index(Request $request){
       //retorna el listado de animales
       $token = session('token');
       $incident = new Incidents();
       $response = $incident->getListIncidents($token);

       return view('incidents.incidentsIndex',['listIncidents'=> $response['listIncidents']]);
    }
    public function register(Request $request){    
        //$token = $request->route('token');
        if(session()->has('token')){
            $token = session('token');
            $animal = new Animals();
            $response = $animal->getListActiveAnimals($token);
            $listAnimals = $response['listActive'];
            session(['animals' => $listAnimals]);
            return view('incidents.incidentsRegister',['listAnimals'=> $listAnimals]);
        }else{
             return view('users.login');
        }
    }
    public function create(Request $request){
         //retorna el listado de animales
        $token = session('token');

        $animal_id     = $request->input('animal_id');  
        $incident_date = $request->input('incident_date');
        $incident_type = $request->input('incident_type');
        $description   = $request->input('description'); 
         
        $incident = new Incidents();
        $response1 = $incident->saveIncident($token, $animal_id, $incident_date, $incident_type, $description);
        
        $animal = new Animals();
        $response2 = $animal->getListActiveAnimals($token);
        $listAnimals = $response2['listActive'];
        
        if($response2 == null ||  $response2['status'] == 'error'){
            $error1 = "Ocurrio un error al registrar los datos.";
            return view('incidents.incidentsRegister',['response' => $response2,
                                                       'errorMsg' => $error1                          
            ]);
        }
        
        $error1 = null;
        if($response1 == null || $response1['status'] == 'error'){
            $error1 = "Ocurrio un error al registrar los datos.";  
        }
           
        return view('incidents.incidentsRegister',[ 'response'    => $response1,
                                                    'listAnimals' => $listAnimals,
                                                    'errorMsg'    => $error1
        ]);    
        
        
        
    }
}
