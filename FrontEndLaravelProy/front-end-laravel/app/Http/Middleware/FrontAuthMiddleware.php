<?php

namespace App\Http\Middleware;

use Closure;

class FrontAuthMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $jwtAuth = new \App\Helpers\JwtAuth();

        if (session()->has('token')) {
            $token = session('token');
        } else {
            return redirect('/');
        }

        if (is_null($token)) {
            return redirect('/');
        } else {
            $checkToken = $jwtAuth->checkToken($token);
            if ($checkToken) {
                return $next($request);
            } else {
                return redirect('/');
            }
        }
    }

}
