<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Notifications;

class UserController extends Controller {

    public function register() {
        
    }

    public function create(Request $request) {
        
    }

    public function login(Request $request) {
        session_start();
        $email = $request->input('email');
        $password = $request->input('password');

        $user = new User();
        $token = $user->login($email, $password);

        if (is_array($token)) {

            if (!empty($token['status'])) {
                if ($token['status'] == "error") {
                    if (!empty($token['errors'])) {
                        return view('users.userLogin', ['listErrors' => $token['errors'],
                            'message' => $token['message']]);
                    } else {
                        return view('users.userLogin', array('message' => $token['message']));
                    }
                }
            } else {
                $error = "Ocurrio un al enviar la solicitud de ingreso";
                return view('users.userLogin', array('error' => $error));
            }

            return view('users.userLogin', array('error' => $token['menssage']));
        } else {
            if (isset($token) && is_string($token)) {
                $jwtAuth = new \App\Helpers\JwtAuth();
                //$token = $_SESSION['token'] = $response;
                session(['token' => $token]);
                $user = $jwtAuth->checkToken($token, true);
                session(['user' => $user]);
                //var_dump($token);
                //die;
                return redirect('/notifications/generate/');
            }
        }
    }

    public function profile() {
        return view('users.userProfile');
    }

    public function update(Request $request) {

        $email = $request->input('email');
        $passwordNew = $request->input('password1');
        $passwordCurrent = $request->input('passwordCurrent');
        $passwordRepeat = $request->input('password2');

        $token = session('token');
        $user = new User();
        $response = $user->updateEmailPassword($token, $passwordNew, $passwordRepeat, $passwordCurrent);

        if ($response == null) {
            $error = "Ocurrio un error al actualizar los datos.";
            return view('users.profile', array('error' => $error));
        }

        if (!empty($response['status'])) {
            if ($response['status'] == "success") {
                $tokenNew = $response['token'];
                if (isset($response) && is_string($tokenNew)) {
                    $jwtAuth = new \App\Helpers\JwtAuth();
                    session(['token' => $tokenNew]);
                    $user = $jwtAuth->checkToken($tokenNew, true);
                    session(['user' => $user]);

                    return view('users.userProfile', ['message' => $response['message']]);
                }
            }
            if ($response['status'] == "error") {
                if (!empty($response['errors'])) {
                    return view('users.userProfile', ['listErrors' => $response['errors'],
                        'error' => $response['message']]);
                } else {
                    return view('users.userProfile', array('error' => $response['message']));
                }
            }
        } else {
            $error = "Ocurrio un error al registrar los datos.";
            return view('users.userProfile', array('error' => $error));
        }
    }

    public function logout() {
        session()->forget('user');
        session()->forget('token');
        return redirect('/');
    }

    public function redirection($direction) {
        return redirect()->action($direction);
    }

}
