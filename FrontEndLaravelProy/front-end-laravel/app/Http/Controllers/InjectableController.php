<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animals;
use App\Injectables;

class InjectableController extends Controller
{
    public function index(Request $request){
       //retorna el listado de animales
       $token = session('token');
       $injectable = new Injectables();
       $response = $injectable->getListInjectables($token);
       $listInjectables = $response['listInjectables'];

       return view('injectables.injectablesIndex',['listInjectables'=> $listInjectables]);
    }
    
    public function detail(Request $request){
       //retorna el listado de animales
       $token = session('token');
       $code = $request->route('creation_time');
       $injectable = new Injectables();
       $response = $injectable->getListInjectablesDetail($token,$code);
       $listInjectables = $response['listInjectables'];
      
       return view('injectables.injectablesIndex',['listInjectables'=> $listInjectables]);
    }
    
    public function register(Request $request){    
        //$token = $request->route('token');
        if(session()->has('token')){
            $token = session('token');
            $animal = new Animals();
            $response = $animal->getListActiveAnimals($token);
            $listAnimals = $response['listActive'];
            
            return view('injectables.injectablesRegister',['listAnimals'=> $listAnimals]);
        }else{
             return view('users.login');
        }
    }
    
    public function create(Request $request){
         //retorna el listado de animales
        $token = session('token');
        $animal = new Animals();
        $response1 = $animal->getListActiveAnimals($token);
        $listAnimals = $response1['listActive'];
        
        $animal_id = $request->input('animal_id');           
        $injectable_type = $request->input('injectable_type');
        $application_date = $request->input('application_date');   
        $injectable_name = $request->input('injectable_name');
        $injectable_brand = $request->input('injectable_brand');
        $withdrawal_time = $request->input('withdrawal_time');
        $effective_time = $request->input('effective_time');
        $description = $request->input('description'); 
         
        $injectable = new Injectables();
        $response = $injectable->saveInjectable($token,$animal_id,$injectable_type, $application_date,$injectable_name,$injectable_brand,$withdrawal_time,$effective_time,$description);
       
        
        $error1 = null;
        if($response == null || $response['status'] == 'error'){
            $error1 = "Ocurrio un error al registrar los datos.";  
        }
           
        return view('injectables.injectablesRegister',[ 'response'=> $response,
                                                        'listAnimals' => $listAnimals,
                                                        'errorMsg'=> $error1
        ]);
        
        
        
    }
}
