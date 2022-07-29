<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Vendor
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
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        if(Auth::check()==true && Auth::user()->role_id==3 && Auth::user()->approvel_status != 1){
            Auth::logout();
            return back()->with('error','Admin Deactive this Vendor');
        }else if(Auth::user()->role_id==2 && Auth::user()->approvel_status == 1){

            return back()->with('error','Admin Deactive this Vendor');
        }

        return $next($request);

    }
}
