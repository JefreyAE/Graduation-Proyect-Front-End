<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications;

class MainController extends Controller
{
    public function index(Request $request){
        //session_start();
     
       $token = session('token');
       $user = session('user');
       $type = $request->route('type');
       $notification = new Notifications();
       $response = $notification->getListNotificationsActive($token);
       
       return view('notifications.notificationsIndex',['listActive'=> $response['listActive'],
                                     'type' => $type,
                                     'userName' => $user->name
               ]);

        //return view('main.main');
        
    }
}
