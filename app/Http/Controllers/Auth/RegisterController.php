<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Notifications\AdminNewUserNotificaton;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
//    protected $redirectTo = RouteServiceProvider::HOME;
    public function redirectTo() {
        $role = Auth::user()->role_id;
        switch ($role) {
            // case '1':
            //     return 'admin/dashboard';
            //     break;
            // case '2':
            //     return 'user/dashboard';
            //     break;
            // default:
            //     return '/home';
            //     break;
            case '1':
                return 'admin/dashboard';
                break;
            case '2':
                return 'user/dashboard';
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => 2,
        ]);

        Customers::create([
            'user_id' => $user->id,
            'first_name' => $data['name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
        ]);
        $administrators = User::where('id',1)->get();
        foreach($administrators as $administrator){
            $administrator->notify(new AdminNewUserNotificaton($user));
        }
        return $user;
    }
}
