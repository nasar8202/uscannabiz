<?php

namespace App\Http\Controllers\Vendor;

use DB;
use Auth;
use App\User;
use Stripe\Customer;
use App\Models\Order;
use App\Models\Customers;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Exports\OrdersExport;
use Maatwebsite\Excel\Facades\Excel;
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
            // with('orderItems')->
            join('order_items','orders.id','=','order_items.order_id')->
            join('products','order_items.product_id','=','products.id')->
            where('vendor_id',$check->id)->
            select('order_items.product_qty as order_product_qty','products.*','orders.order_status as order_status')->
            get();
            // dd($orders);
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
                'password' => 'required|min:8',
                'confirm_password' => 'required|min:8|same:password',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }
            if (!Hash::check($request->password_current, $user->password)) {
                return back()->with(['error'=>'Current password does not match!']);
            }
            $user->password = Hash::make($request->password);
        }
        $user->save();

        $customer = Customers::where('user_id',$id)->first();

        $customer->first_name = $request->input('first_name');

        $customer->last_name = $request->input('last_name');
        $customer->email = $request->input('account_email');

        $customer->save();

        return back()->with(['success' => 'Updated Successfully']);
    }
    public function show_broker()
    {
        $brokers = User::join('customers','users.customers_id','=','customers.id')->where(["role_id"=>4])
        ->select('customers.*','users.id as user_id_from_users')
        ->get();
        // dd($brokers);
        return view('vendor.brokers.index',compact(['brokers',$brokers]));
    }
    public function assigned_broker($id)
    {
        $assigned_broker = Customers::find($id);
        $check_user_id = Customers::where('user_id',Auth::user()->id)->get();
        if(!$check_user_id->isEmpty()){
            return back()->with('error','You Have Already Assigned Broker');
        }
        else{
            $assigned_broker->user_id = Auth::user()->id;
            $assigned_broker->save();
            return back()->with('success','Broker Assigned Successfully');
        }
    }
    public function assigned_broker_cancle($id)
    {
        $assigned_broker = Customers::find($id);
        $assigned_broker->user_id = NULL;
        $assigned_broker->save();
        return back()->with('success','Broker Assigned Cancle');
    }
    public function export() 
    {
        $check = Auth::user();
        if($check->role_id == 3){
            // $order_item = OrderItem::where('')
            $order = Order::
            // with('orderItems')->
            join('order_items','orders.id','=','order_items.order_id')->
            join('products','order_items.product_id','=','products.id')->
            where('vendor_id',$check->id)->
            selectRaw('products.product_name,orders.order_status as order_status,products.sku,products.product_current_price,order_items.product_qty as order_product_qty,order_items.product_subtotal_price,DATE_FORMAT(order_items.created_at, "%d-%M-%Y") ')->
            get();
            // dd($orders);
        }

        
        return Excel::download(new OrdersExport($order), 'orders.xlsx');
    }
    public function assignbroker(Request $request) 
    {
        // $broker_request_id = $request->id;
        
        // $vendor_email = Auth::user()->email;
        // dd($vendor_email);

        // foreach($broker_request_id as $id ){
        //     customers::where("email",$vendor_email)->updateOrCreate([
        //         'broker_request'=>$id,
        //     ]);
        // }
    
     $id = $request->id;
     
     $vendor_email = Auth::user()->email;
     $groups_update = customers::where("email",$vendor_email)->first();
    //  dd($groups_update);
     $groups_update->broker_request = implode('|',$id);
     $groups_update->save();
    
     return back()->with(['success' => 'Broker Request Sent Successfully']);
    
    }


}
