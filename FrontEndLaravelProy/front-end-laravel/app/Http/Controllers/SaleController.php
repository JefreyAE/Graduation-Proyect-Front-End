<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sales;
use App\Animals;

class SaleController extends Controller {

    public function index(Request $request) {
        //retorna el listado de animales
        $token = session('token');
        $sale = new Sales();
        $response = $sale->getListSales($token);

        return view('sales.salesIndex', ['listSales' => $response['listSales']]);
    }

    public function search(Request $request) {
        //$token = session('token');

        return view('sales.salesSearch');
    }

    public function find(Request $request) {
        //retorna el listado de animales
        $token = session('token');

        /* sale_type               varchar(100),
          weight                  int(255),
          price_total             int(255),
          price_kg                int(255),
          auction_commission      int(255),
          auction_name            varchar(100),
          description             text,
          sale_date               datetime DEFAULT NULL, */

        $date1 = $request->input('date1');
        $date2 = $request->input('date2');

        $sale = new Sales();
        $response = $sale->findByDates($token, $date1, $date2);

        $errorx = null;
        if ($response == null) {
            $errorx = "Ocurrio un error al registrar los datos";
            return view('sales.salesSearch', ['errorx' => $errorx]);
        }
        if ($response['status'] == "error") {
            return view('sales.salesSearch', ['errorx' => $response['message']]);
        }

        if (count($response['listSales']) == 0) {
            return view('sales.salesSearch', ['noData' => "x"]);
        }

        return view('sales.salesSearch', ['listSales' => $response['listSales'],
            'errorx' => $errorx]);
    }

    public function register(Request $request) {
        //$token = $request->route('token');
        if (session()->has('token')) {
            $token = session('token');
            $animal = new Animals();
            $response = $animal->getListActiveAnimals($token);
            $listAnimals = $response['listActive'];

            return view('sales.salesRegister', ['listAnimals' => $listAnimals]);
        } else {
            return view('users.login');
        }
    }

    public function create(Request $request) {
        //retorna el listado de animales
        $token = session('token');

        $animal_id = $request->input('animal_id');
        $sale_type = $request->input('sale_type');
        $weight = $request->input('weight');
        $price_total = $request->input('price_total');
        $price_kg = $request->input('price_kg');
        $auction_commission = $request->input('auction_commission');
        $auction_name = $request->input('auction_name');
        $sale_date = $request->input('sale_date');
        $description = $request->input('description');

        $sale = new Sales();
        $response1 = $sale->saveSale($token, $animal_id, $sale_type, $weight, $price_total, $price_kg, $auction_commission, $auction_name, $sale_date, $description);

        $animal = new Animals();
        $response2 = $animal->getListActiveAnimals($token);
        $listAnimals = $response2['listActive'];

        if ($response2 == null || $response2['status'] == 'error') {
            $error1 = "Ocurrio un error al registrar los datos.";
            return view('sales.salesRegister', ['response' => $response2,
                'errorMsg' => $error1
            ]);
        }

        $error1 = null;
        if ($response1 == null || $response1['status'] == 'error') {
            $error1 = "Ocurrio un error al registrar los datos.";
        }

        return view('sales.salesRegister', ['response' => $response1,
            'listAnimals' => $listAnimals,
            'errorMsg' => $error1
        ]);
    }

    public function deleteOne(Request $request){
        //retorna el listado de animales
        $token = session('token');
        $sale_id = $request->route('sale_id');
        $animal_id = $request->route('animal_id');

        $sale = new Sales();
        $response = $sale->deleteOne($token, $sale_id, $animal_id);

        if ($response == null) {
            return redirect('/sales/index/')->with(['error' => 'Ocurrio un error al borrar el registro.']);
        }
        if ($response['status'] == 'error') {
            return redirect('/sales/index/')->with(['error' => $response['message']]);
        }
        
        return redirect('/sales/index/')->with(['message' => $response['message']]);
    }

    public function detail(Request $request){

        $animal_id = $request->route('animal_id');
        $name      = $request->route('name');
        $sale_type = $request->route('sale_type');
        $sale_date = $request->route('sale_date');
        $weight    = $request->route('weight');
        $price_total = $request->route('price_total');
        $price_kg  = $request->route('price_kg');
        $auction_commision = $request->route('auction_commision');
        $sex       = $request->route('sex');
        
        return view('sales.salesDetail', [
            'animal_id'  => $animal_id,
            'name'       => $name,
            'sale_type'  => $sale_type,
            'sale_date'  => $sale_date,
            'weight'     => $weight,
            'price_total'=> $price_total,
            'price_kg'   => $price_kg,
            'auction_commision' => $auction_commision,
            'sex'        => $sex
        ]);
    }

}
