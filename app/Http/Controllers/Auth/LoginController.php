<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = RouteServiceProvider::HOME;
    public function redirectTo() {
        $role = Auth::user()->role_id;
        switch ($role) {
            case '1':
                return 'admin/dashboard';
                break;
            case '2':
                return 'user/my-orders';
                break;
            case '3':
                return 'vendor/dashboard';
                break;
            case '4':
                return 'admin/dashboard';
                break;
            default:
                return '/home';
                break;
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout()
    {
        Auth::logout();
        //session()->flash('msg_logout', 'Panel System Successfully Logout');
        //alert()->success('You have been logout successfully','GoodBye');
        //session()->flush();
        return redirect('/my-account');
    }
}
