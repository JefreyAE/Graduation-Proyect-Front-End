<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications;

class NotificationController extends Controller {

    public function index(Request $request) {
        //retorna el listado de animales
        $token = session('token');
        $type = $request->route('type');
        $notification = new Notifications();
        $response = $notification->getListNotificationsActive($token);

        return view('notifications.notificationsIndex', ['listActive' => $response['listActive'],
            'type' => $type
        ]);
    }

    public function generate(Request $request) {

        //Manda la instrucción para generar notificaciones
        $notification = new Notifications();
        $token = session('token');
        $notification->generateNotifications($token);

        return redirect('/main/index/');
    }

    public function indexAll(Request $request) {
        $token = session('token');
        $type = $request->route('type');
        $notification = new Notifications();
        $response = $notification->getListNotificationsAll($token);

        return view('notifications.notificationsIndex', ['listAll' => $response['listAll'],
            'token' => $token,
            'type' => $type
        ]);
    }

    public function checked(Request $request) {
        $token = session('token');
        $type = $request->route('type');
        $notification = new Notifications();
        $response = $notification->getListNotificationsChecked($token);

        return view('notifications.notificationsIndex', ['listChecked' => $response['listChecked'],
            'token' => $token,
            'type' => $type
        ]);
    }

    public function state(Request $request) {
        $token = session('token');
        $id = $request->route('id');
        $notification = new Notifications();
        $check = $notification->check($token, $id);

        $response = $notification->getListNotificationsActive($token);

        return view('notifications.notificationsIndex', ['listActive' => $response['listActive']]);
    }

}
