<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Purchases;
use App\Animals;

class PurchaseController extends Controller {

    public function index(Request $request) {
        //retorna el listado de animales
        $token = session('token');
        $purchases = new Purchases();
        $response = $purchases->getListPurchases($token);

        return view('purchases.purchasesIndex', ['listPurchases' => $response['listPurchases']]);
    }

    public function register() {
        //$token = $request->route('token');
        if (session()->has('token')) {
            $token = session('token');

            return view('purchases.purchasesRegister', ['token' => $token]);
        } else {
            return view('users.login');
        }
    }

    public function search(Request $request) {
        $token = session('token');

        return view('purchases.purchasesSearch');
    }

    public function find(Request $request) {
        //retorna el listado de animales
        $token = session('token');

        $date1 = $request->input('date1');
        $date2 = $request->input('date2');

        $purchase = new Purchases();
        $response = $purchase->findByDates($token, $date1, $date2);

        $errorx = null;
        if ($response == null) {
            $errorx = "Ocurrio un error al registrar los datos";
            return view('purchases.purchasesSearch', ['errorx' => $errorx]);
        }

        if ($response['status'] == "error") {
            return view('purchases.purchasesSearch', ['errorx' => $errorx]);
        }

        if (count($response['listPurchases']) == 0) {
            return view('purchases.purchasesSearch', ['noData' => "x"]);
        }

        return view('purchases.purchasesSearch', ['listPurchases' => $response['listPurchases'],
            'errorx' => $errorx]);
    }

    public function create(Request $request) {
        //retorna el listado de animales

        $token = session('token');
        $nickname = $request->input('nickname');
        $certification_name = $request->input('certification_name');
        $registration_number = $request->input('registration_number');
        $birth_weight = $request->input('birth_weight');
        $code = $request->input('code');
        $birth_date = $request->input('birth_date');
        $sex = $request->input('sex');
        $father_id = $request->input('father_id');
        $mother_id = $request->input('mother_id');
        $race = $request->input('race');


        $animal = new Animals();
        $response1 = $animal->saveAnimal($token, $nickname, $certification_name, $registration_number, $birth_weight, $code, $birth_date, $sex, $father_id, $mother_id, $race);

        $error1 = null;
        if ($response1 == null) {
            $error1 = "Ocurrio un error al registrar los datos.";
            return view('purchases.purchasesRegister', ['response' => $response1,
                'errorMsg' => $error1
            ]);
        }

        if ($response1['status'] == 'error') {
            $error1 = "Ocurrio un error al registrar los datos.";
            return view('purchases.purchasesRegister', ['response' => $response1,
                'errorMsg' => $error1
            ]);
        }

        $animal_id = $response1['id'];
        $purchase_type = $request->input('purchase_type');
        $weight = $request->input('weight');
        $price_total = $request->input('price_total');
        $price_kg = $request->input('price_kg');
        $auction_commission = $request->input('auction_commission');
        $auction_name = $request->input('auction_name');
        $purchase_date = $request->input('purchase_date');
        $description = $request->input('description');

        $purchase = new Purchases();
        $response2 = $purchase->savePurchase($token, $animal_id, $purchase_type, $weight, $price_total, $price_kg, $auction_commission, $auction_name, $purchase_date, $description);


        $error2 = null;
        if ($response2 == null) {
            $error2 = "Ocurrio un error al registrar los datos.";
        }
        if ($response2['status'] == 'error') {
            $error2 = "Ocurrio un error al registrar los datos.";
            return view('purchases.purchasesRegister', ['response' => $response2,
                'errorMsg' => $error2
            ]);
        }

        return view('purchases.purchasesRegister', ['response' => $response2,
            'errorMsg' => $error2
        ]);
    }

    public function deleteOne(Request $request){
        //retorna el listado de animales
        $token = session('token');
        $purchase_id = $request->route('purchase_id');
        $animal_id = $request->route('animal_id');

        $purchase = new Purchases();
        $response = $purchase->deleteOne($token, $purchase_id, $animal_id);

        if ($response == null) {
            return redirect('/purchases/index/')->with(['error' => 'Ocurrio un error al borrar el registro.']);
        }
        if ($response['status'] == 'error') {
            return redirect('/purchase/index/')->with(['error' => $response['message']]);
        }
        
        return redirect('/purchases/index/')->with(['message' => $response['message']]);
    }

    public function detail(Request $request){

        $animal_id = $request->route('animal_id');
        $name      = $request->route('name');
        $purchase_type = $request->route('purchase_type');
        $purchase_date = $request->route('purchase_date');
        $weight    = $request->route('weight');
        $price_total = $request->route('price_total');
        $price_kg  = $request->route('price_kg');
        $auction_commision = $request->route('auction_commision');
        $sex       = $request->route('sex');
        $description       = $request->route('description');
        
        return view('purchases.purchasesDetail', [
            'animal_id'  => $animal_id,
            'name'       => $name,
            'purchase_type'  => $purchase_type,
            'purchase_date'  => $purchase_date,
            'weight'     => $weight,
            'price_total'=> $price_total,
            'price_kg'   => $price_kg,
            'auction_commision' => $auction_commision,
            'sex'        => $sex,
            'description'=> $description
        ]);
    }


}
