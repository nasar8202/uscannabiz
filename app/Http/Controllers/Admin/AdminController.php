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

use App\Models\VendorRequest;

class AdminController extends Controller
{
    public function dashboard()
    {

        $check_user = User::where('id',Auth::user()->id)->first();
        if($check_user->role_id == 1){
            $data['orders'] = Order::count();
            $data['products'] = Product::where('approvel_admin_status',1)->count();
            $data['customers'] = User::where(['approvel_status'=>1])->count();
            $data['brokers'] = User::where(['approvel_status'=>1])->where('role_id',4)->count();
            $data['latestOrders']=Order::with('customer')->orderBy('created_at', 'desc')->take(7)->get();
            $data['latestReviews']=ProductReview::with('product','customer')->orderBy('created_at', 'desc')->take(7)->get();
            $data['vendors']= User::where(['approvel_status'=>1])->where('role_id',3)->count();
        }elseif($check_user->role_id == 4){
            
            $check = Customers::where('user_id', $check_user->id)->first();
            // dd($check);
            $check_broker = Customers::where('broker_request_id', $check->id)->first();
            
            //  dd($check_broker);
            if($check_broker != null){
                // dd($check_broker);
            $data['orders'] = VendorRequest::where('broker_id',$check_broker->broker_request_id)->count();
            // dd($data['orders']);
            $data['latestOrders']= VendorRequest::where('broker_id',$check_broker->broker_request_id)->take(7)->get();
            }else{
            // dd($check);
            $data['latestOrders']= VendorRequest::where('vendor_id',$check->user_id)->take(7)->get();
            $data['orders'] = VendorRequest::where('vendor_id',$check->user_id)->count();

            }
             //dd($data['orders'],$check_broker);

            }

        return view('admin.dashboard',compact('data'));
    }

}
