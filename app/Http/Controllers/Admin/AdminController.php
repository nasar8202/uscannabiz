<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {

        $data['orders'] = Order::where('order_status','pending')->count();
        $data['products'] = Product::count();
        $data['customers'] = Customers::count();
        $data['latestOrders']=Order::with('customer')->orderBy('created_at', 'desc')->take(7)->get();
        $data['latestReviews']=ProductReview::with('product','customer')->orderBy('created_at', 'desc')->take(7)->get();

        return view('admin.dashboard',compact('data'));
    }

}
