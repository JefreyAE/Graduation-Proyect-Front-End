<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animals;

class AnimalController extends Controller
{
    public function index(Request $request){
       //retorna el listado de animales
       $token = session('token');
       $type = $request->route('type');
       $animal = new Animals();
       $response = $animal->getListActiveAnimals($token);

       return view('animals.animalsIndex',['listActive'=> $response['listActive'],
                                            'type' => $type
               ]);
    }
  
    public function indexAll(Request $request){
        $token = session('token');
        $type = $request->route('type');
        $animal = new Animals();
        $response = $animal->getListAnimalsAll($token);
 
        return view('animals.animalsIndex',['listAll'=> $response['listAll'],
                                     'token'=> $token,                                        
                                     'type' => $type
                ]);
    }
    
    public function search(){
       return view('animals.animalsSearch');
    }
    
    public function find(Request $request){
        
        $token = session('token');
        $animal = new Animals();
        $search_type = $request->input('search_type');           
        $find_string = $request->input('find_string');
        $response = $animal->findAnimal($token, $search_type, $find_string);
  
        $error = null;
        if($response == null){
            $error = "Ocurrio un error al realizar la busqueda.";
            return view('animals.animalsSearch',['errorMsg'=> $error,
                                    ]);
        }
        $listFind = null;
        
        if($response['status'] == 'error'){
            $error = "Ocurrio un error al consultar los datos.";
            return view('animals.animalsSearch',[ 'response'=> $response,
                                                    'errorMsg'   => $error                         
            ]);
        }
        if(count($response['listFind']) == 0){
             return view('animals.animalsSearch', ['noData'  => "x"]);
        }
        
        if($response['status'] == "success"){
            $listFind = $response['listFind'];
            return view('animals.animalsSearch',['listFind'=> $listFind,
                                                 'errorMsg'=> $error,
                                    ]);
        }
    }
    
    public function dead(Request $request){
       $token = session('token');
       $type = $request->route('type');
       $animal = new Animals();
       $response = $animal->getListDeadAnimals($token);
       
       if($response == null){
            $error1 = "Ocurrio un error.";
            return view('animals.animalsRegister',[ 'errorMsg'  => $error1                          
            ]);
        }
       
       return view('animals.animalsIndex',['listDead'=> $response['listDead'],
                                            'type' => $type
           ]);
    }
    
    public function detail(Request $request){
        $id = $request->route('id');
        $token = session('token');
        if($id == null){
            return redirect('/animals/index');
        }else{
           $animal = new Animals();
           $response = $animal->getListAnimalsAll($token);
           $animals = $response['listAll'];
           $animalDetail = $animal->getDetail($token, $id);
           //$listInjectables = $animal->getInjectables($token, $id);
           //$listIncidents = $animal->getIncidents($token, $id);
           //$listOffSprings = $animal->getOffSprings($token, $id);
           //var_dump($animalDetail);
           //die();
           
           /* view('animals.animalsDetail', ['animal'=>$animalDetail['detail'][0],
                                                 'animals'=>$animals,
                                                 'listInjectables'=> $listInjectables['detail'],
                                                 'listIncidents'=> $listIncidents['detail'],
                                                 'listOffSprings'=> $listOffSprings['detail']]);*/
           return view('animals.animalsDetail', ['animal'         =>$animalDetail['detail'][0],
                                                 'animals'        =>$animals,
                                                 'listInjectables'=>$animalDetail['injectables'],
                                                 'listIncidents'  =>$animalDetail['incidents'],
                                                 'listOffSprings' =>$animalDetail['offsprings']]);
        }
    }

    public function create(Request $request){
         //retorna el listado de animales
        
        $token              = session('token');
        $nickname           = $request->input('nickname');           
        $certification_name = $request->input('certification_name');
        $registration_number= $request->input('registration_number');
        $birth_weight       = $request->input('birth_weight');
        $code               = $request->input('code');
        $birth_date         = $request->input('birth_date');
        $sex                = $request->input('sex');
        $father_id          = $request->input('father_id');
        $mother_id          = $request->input('mother_id');
        $race               = $request->input('race');
        
        
        $animal = new Animals();
        $response = $animal->saveAnimal($token,$nickname,$certification_name,$registration_number,$birth_weight,$code,$birth_date,$sex,$father_id,$mother_id,$race);
        $list = $animal->getListActiveAnimals($token);
        $animals = $list['listActive'];
        
        $error1 = null;
        if($response == null){
            $error1 = "Ocurrio un error al registrar los datos.";
            return view('animals.animalsRegister',[ 'animals'=> $animals,
                                                    'response'=> $response,
                                                    'errorMsg'  => $error1                          
            ]);
        }
             
        if($response['status'] == 'error'){
            $error1 = "Ocurrio un error al registrar los datos.";
            return view('animals.animalsRegister',[ 'animals'=> $animals,
                                                    'response'=> $response,
                                                    'errorMsg'   => $error1                          
            ]);
        }
        
        return view('animals.animalsRegister',['animals'=> $animals,
                                               'response'=> $response,
                                               'errorMsg'  => $error1
        ]);
    }

    public function register(){    
        //$token = $request->route('token');
        if(session()->has('token')){
            $token = session('token');
            $animal = new Animals();
            $response = $animal->getListActiveAnimals($token);
            $animals = $response['listActive'];
            
            $error = null;
            if($response == null){
                $error = "Ocurrio un error al registrar los datos.";
            }

            return view('animals.animalsRegister',['animals'=> $animals,
                                                   'token'  => $token,
                                                   'error'  => $error]);
        }else{
             return view('users.login');
        }
    }
   
}
