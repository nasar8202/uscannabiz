<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // if(Auth::check() && Auth::user()->status_field != 'approved'){
        //     Auth::logout();
        //     return redirect('/login')->with('erro_login', 'Your error text');
        // }
       // return $response;
       if (!Auth::check()) {
        return redirect()->route('login');
    }
        $response = $next($request);
        if((Auth::check()==true && Auth::user()->role_id==2) && Auth::user()->approvel_status != 1){
            Auth::logout();
            return redirect('my-account')->with('success', 'Please Wait for Admin Approvel');

        }
        return $response;

    }
}
