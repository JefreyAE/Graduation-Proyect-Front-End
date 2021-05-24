<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sales;
use App\Animals;

class SaleController extends Controller
{
    public function index(Request $request){
       //retorna el listado de animales
       $token = session('token');
       $sale = new Sales();
       $response = $sale->getListSales($token);

       return view('sales.salesIndex',['listSales'=> $response['listSales']]);
    }
    
    public function search(Request $request){
       $token = session('token');

       return view('sales.salesSearch');
    }
    
    public function find(Request $request){
         //retorna el listado de animales
        $token = session('token');

        /*sale_type               varchar(100),
        weight                  int(255),
        price_total             int(255),
        price_kg                int(255),
        auction_commission      int(255),
        auction_name            varchar(100),
        description             text,
        sale_date               datetime DEFAULT NULL,*/
                
        $date1     = $request->input('date1');  
        $date2     = $request->input('date2');
       
         
        $sale = new Sales();
        $response = $sale->findByDates($token, $date1, $date2);
        
        $errorx = null;
        if($response == null){
            $errorx = "Ocurrio un error al registrar los datos";
            return view('sales.salesSearch', ['errorx'  => $errorx]);
        }
        if($response['status'] == "error"){
             return view('sales.salesSearch', ['errorx'  => $response['message']]);
        }
        
        if(count($response['listSales']) == 0){
            return view('sales.salesSearch', ['noData'  => "x"]);
        }
       
        return view('sales.salesSearch',['listSales'=> $response['listSales'],
                                                    'errorx'  => $errorx]);
    }
    
    public function register(Request $request){    
        //$token = $request->route('token');
        if(session()->has('token')){
            $token = session('token');
            $animal = new Animals();
            $response = $animal->getListActiveAnimals($token);
            $listAnimals = $response['listActive'];
            
            return view('sales.salesRegister',['listAnimals'=> $listAnimals]);
        }else{
            return view('users.login');
        }
    }
    public function create(Request $request){
         //retorna el listado de animales
        $token = session('token');

        /*sale_type               varchar(100),
        weight                  int(255),
        price_total             int(255),
        price_kg                int(255),
        auction_commission      int(255),
        auction_name            varchar(100),
        description             text,
        sale_date               datetime DEFAULT NULL,*/
                
        $animal_id     = $request->input('animal_id');  
        $sale_type     = $request->input('sale_type');
        $weight        = $request->input('weight');
        $price_total   = $request->input('price_total');
        $price_kg      = $request->input('price_kg');
        $auction_commission = $request->input('auction_commission');
        $auction_name  = $request->input('auction_name');
        $sale_date     = $request->input('sale_date');
        $description   = $request->input('description'); 
         
        $sale = new Sales();
        $response1 = $sale->saveSale($token, $animal_id, $sale_type, $weight, $price_total, $price_kg, $auction_commission, $auction_name, $sale_date, $description);
        
        
        $animal = new Animals();
        $response2 = $animal->getListActiveAnimals($token);
        $listAnimals = $response2['listActive'];
      
        if($response2 == null ||  $response2['status'] == 'error'){
            $error1 = "Ocurrio un error al registrar los datos.";
            return view('sales.salesRegister',['response' => $response2,
                                               'errorMsg' => $error1                          
            ]);
        }
        
        $error1 = null;
        if($response1 == null || $response1['status'] == 'error'){
            $error1 = "Ocurrio un error al registrar los datos.";  
        }
           
        return view('sales.salesRegister',[ 'response'=> $response1,
                                            'listAnimals' => $listAnimals,
                                            'errorMsg'=> $error1
        ]);    
        
    }
}
