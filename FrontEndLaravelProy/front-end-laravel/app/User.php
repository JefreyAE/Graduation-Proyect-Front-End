<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Http;

class User extends Authenticatable {

    use Notifiable;

    public $url;

    public function __construct() {
        $api = new \App\Helpers\Constants();
        $this->url = $api->url();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function register() {
        
    }

    public function index(Request $request) {
        
    }

    public function login($email, $password) {

        $response = Http::asForm()->post($this->url . '/api/user/login', [
            'json' => [
                'email' => $email,
                'password' => $password
            ]
        ]);
        /* $response = Http::asForm()->post('http://api-rest-proyecto.com.devel/api/login',[
          'json'=>'{"email":"'."$email".'","password":"'."$password".'"}'
          ]); */

        //$data = $response->json();
        //var_dump($data);
        //$header = $response->header('Autorization');

        return $response->json();
    }

    public function updateEmailPassword($token, $passwordNew, $passwordRepeat, $passwordCurrent) {

        $response = Http::withHeaders(
                        ['Authorization' => $token]
                )->asForm()->post($this->url . '/api/user/update', [
            'json' => [
                'passwordNew' => $passwordNew,
                'passwordRepeat' => $passwordRepeat,
                'passwordCurrent' => $passwordCurrent
            ]
        ]);

        return $response->json();
    }

}
