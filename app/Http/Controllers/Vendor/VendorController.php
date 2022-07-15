<?php

namespace App\Http\Controllers\Vendor;

use DB;
use Auth;
use App\User;
use App\Models\Order;
use App\Models\Customers;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class VendorController extends Controller
{
    public function dashboard()
    {

        $vendor_id = Auth::user()->id;
        // $orderCount =   DB::table('order_items')
        //                 ->select('order_items.product_id','products.id','products.vender_id')
        //                 ->join('products','order_items.product_id','=','products.id')
        //                 ->count();
        $orderCount = Order::where('vendor_id',$vendor_id)->count();
        $orderCompletedCount = Order::where('vendor_id',$vendor_id)->where('order_status','completed')->count();

        $orderPendingCount = Order::where('vendor_id',$vendor_id)->where('order_status','pending')->count();
        $orderCancelledCount = Order::where('vendor_id',$vendor_id)->where('order_status','cancelled')->count();

        $productCount = DB::table('products')
                        ->where('vender_id',$vendor_id)
                        ->count();
        // dd($productCount);
        $productViewed = \DB::table('products')->where('vender_id',$vendor_id)->first();

        return view('vendor.dashboard',compact('orderCount','productCount','productViewed','orderPendingCount','orderCompletedCount','orderCancelledCount'));
    }
    public function order(Type $var = null)
    {
        $check = Auth::user();
        if($check->role_id == 3){
            // $order_item = OrderItem::where('')
            $orders = Order::
            with('orderItems')->
            join('order_items','orders.id','=','order_items.order_id')->
            join('products','order_items.product_id','=','products.id')->
            where('vendor_id',$check->id)->
            get();
        }
        return view('vendor.order.index',compact('orders'));
    }
    public function vendorEdit()
    {
        $user_vendor = Auth::user()->id;
        $user = User::find($user_vendor);

        $customer = Customers::where('user_id',$user->id)->first();

        return view('vendor.product.editVendor',compact(['user',$user,'customer',$customer]));
    }


    public function vendorUpdate(Request $request,$id)
    {

        $user = User::find($id);
        $user->name = $request->input('first_name')." " . $request->input('last_name');;


        $user->email = $request->input('account_email');

        if($request->input('password_current')){
            $validator = Validator::make($request->all(), [
                'password_current' => 'required',
                'password_1' => 'required|min:8',
                'password_2' => 'required|min:8|same:password_1',
            ]);
            
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }
            if (!Hash::check($request->password_current, $user->password)) {
                return back()->with(['error'=>'Current password does not match!']);
            }
            $user->password = Hash::make($request->password_1);
        }
        $user->save();

        $customer = Customers::where('user_id',$id)->first();

        $customer->first_name = $request->input('first_name');

        $customer->last_name = $request->input('last_name');
        $customer->email = $request->input('account_email');

        $customer->save();

        return back()->with(['success' => 'Updated Successfully']);
    }
}
