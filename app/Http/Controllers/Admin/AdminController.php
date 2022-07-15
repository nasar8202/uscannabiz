<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Customers;
use Illuminate\Http\Request;
use App\Models\ProductReview;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {

        $check_user = User::where('id',Auth::user()->id)->first();
        if($check_user->role_id == 1){
            $data['orders'] = Order::count();
            $data['products'] = Product::count();
            $data['customers'] = Customers::count();
            $data['brokers'] = User::where('role_id',4)->count();
            $data['latestOrders']=Order::with('customer')->orderBy('created_at', 'desc')->take(7)->get();
            $data['latestReviews']=ProductReview::with('product','customer')->orderBy('created_at', 'desc')->take(7)->get();
            $data['vendors']= User::where('role_id',3)->count();
        }elseif($check_user->role_id == 4){
            $data['orders'] = Order::where('broker_id',$check_user->id)->count();
            $data['latestOrders']= Order::with('customer')->where('broker_id',$check_user->id)->orderBy('created_at', 'desc')->take(7)->get();
        }

        return view('admin.dashboard',compact('data'));
    }

}
