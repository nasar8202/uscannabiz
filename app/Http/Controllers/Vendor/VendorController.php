<?php

namespace App\Http\Controllers\Vendor;

use DB;
use Auth;
use App\User;
use Stripe\Customer;
use App\Models\Order;
use App\Models\Customers;
use App\Models\Product;
use App\Models\Category;
use App\Models\VendorRequest;
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
        $orderPaidCount = Order::where('vendor_id',$vendor_id)->where('order_status','paid')->count();

        // $orderPendingCount = Order::where('vendor_id',$vendor_id)->where('order_status','pending')->count();
        // $orderPendingCount = VendorRequest::where('vendor_id',$vendor_id)->count();
        // $orderCancelledCount = Order::where('vendor_id',$vendor_id)->where('order_status','cancelled')->count();

        $productCount = DB::table('products')
                        ->where('vender_id',$vendor_id)
                        ->count();

        // dd($productCount);
        $productViewed = \DB::table('products')->where('vender_id',$vendor_id)->first();

        return view('vendor.dashboard',compact('orderCount','productCount','productViewed','orderPaidCount','orderCompletedCount'));
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
            $vendor_id = Auth::user()->id;
            
            $orderCount = Order::where('vendor_id',$vendor_id)->count();
            
            $orderCompletedCount = Order::where('vendor_id',$vendor_id)->where('order_status','completed')->count();

            $orderPendingCount = Order::where('vendor_id',$vendor_id)->where('order_status','pending')->count();
            $orderCancelledCount = Order::where('vendor_id',$vendor_id)->where('order_status','cancelled')->count();

            try {

                if (request()->ajax()) {
                    // return "ss";
                    // return Order::
                    // // with('orderItems')->
                    // join('order_items','orders.id','=','order_items.order_id')->
                    // join('products','order_items.product_id','=','products.id')->
                    // where('vendor_id',$check->id)->
                    // select('order_items.product_qty as order_product_qty','products.*','orders.order_status as order_status')->
                    // get();
                     //return datatables()->of(Customers::join('Users','Users.id' ,'=' ,'Customers.user_id')->where('role_id','=',3)->get());
                    return datatables()->of(Order::
                    // with('orderItems')->
                    join('order_items','orders.id','=','order_items.order_id')->
                    join('products','order_items.product_id','=','products.id')->
                    where('vendor_id',$check->id)->
                    select('order_items.product_qty as order_product_qty','products.*','orders.order_status as order_status')->
                    get())
                        ->addIndexColumn()
                        ->addColumn('product_image', function ($data) {
                                $url= asset('uploads/products/'.$data->product_image);
                                return '<img src="'.$url.'" border="0" width="40" class="img-rounded" align="center" />';
                        })
                        ->addIndexColumn()
                        ->addColumn('total', function ($data) {
                                $check_qty = $data->order_product_qty;
                                $total_price = $check_qty*$data->product_current_price;
                                return $total_price;


                        })
                        ->addIndexColumn()
                        ->addColumn('order_status', function ($data) {

                                if($data->order_status == 'pending')
                                {
                                    return '<label class="dokan-label dokan-label-secondary">'.$data->order_status.'</label>';
                                }

                                elseif ($data->order_status == 'cancelled')
                                {
                                    return '<label class="dokan-label dokan-label-danger">'.$data->order_status.'</label>';
                                }
                                elseif ($data->order_status == 'completed')
                                {
                                    return '<label class="dokan-label dokan-label-success">'.$data->order_status.'</label>';
                                }
                                elseif ($data->order_status == 'paid')
                                {
                                   return  '<label class="dokan-label dokan-label-info">'.$data->order_status.'</label>';
                                }


                        })
                        ->addColumn('date', function ($data) {
                            $date = date_format($data->created_at,"d-M-Y");
                            return $date;
                        })
                        ->addColumn('action', function ($data) {
                            return '';
                        })->rawColumns(['product_image','order_status','date','action'])->make(true);

                }
            } catch (\Exception $ex) {
                return redirect('/')->with('error', $ex->getMessage());
            }

        }
        return view('vendor.order.index',compact('orderCount','orderCompletedCount','orderPendingCount','orderCancelledCount'));
    }

    public function show_inventory()
    {
        $category = Category::all();
        $vendor_id = Auth::user()->id;

        $product = DB::table('products')->where('vender_id',$vendor_id)->get();
        $product_stock = DB::table('products')->where('vender_id',$vendor_id)->first();

        return view('vendor.inventory.index',compact(['category',$category ,'product',$product,'product_stock']));
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

        // if($request->input('password_current')){
        //     $validator = Validator::make($request->all(), [
        //         'password_current' => 'required',
        //         'password' => 'required|min:8',
        //         'confirm_password' => 'required|min:8|same:password',
        //     ]);

        //     if ($validator->fails()) {
        //         return redirect()->back()->withErrors($validator);
        //     }
        //     if (!Hash::check($request->password_current, $user->password)) {
        //         return back()->with(['error'=>'Current password does not match!']);
        //     }
        //     $user->password = Hash::make($request->password);
        // }
        $user->save();

        $customer = Customers::where('user_id',$id)->first();

        $customer->first_name = $request->input('first_name');

        $customer->last_name = $request->input('last_name');
        $customer->email = $request->input('account_email');

        $customer->save();

        return back()->with(['success' => 'Updated Successfully']);
    }

    public function vendorUpdatePass(Request $request,$id)
    {

        $user = User::find($id);


            $validator = Validator::make($request->all(), [
                'password_current' => 'required',
                'password' => 'required|min:8',
                'confirm_password' => 'required|min:8|same:password',
            ]);

            if (!Hash::check($request->password_current, $user->password)) {
                return back()->with(['error'=>'Current password does not match!']);
            }
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }


            $user->password = Hash::make($request->password);

        $user->save();


        return back()->with(['success' => 'Updated Successfully']);

    }
    public function show_broker()
    {
        $check = Customers::where('user_id',Auth::user()->id)->first();
        // dd($check);
        $countBroker = User::where(['role_id'=>4,'approvel_status'=>1])->count();
        if($check->broker_request != null && $check->broker_request_id == null){
            $show_data = "Your Request Send To Admin Successfully Wait For Admin Approval !";
            return view('vendor.brokers.index',compact(['countBroker','show_data']));
        }
        elseif($check->broker_request != null && $check->broker_request_id != null){
            // $brokers = User::join('customers','users.customers_id','=','customers.id')->where(["role_id"=>4])
            // ->select('customers.*','users.id as user_id_from_users')
            // ->get();
            $brokers = Customers::where('id',$check->broker_request_id)->get();
            // $customer_condition = Customers::where();
            $customer_condition = $check->broker_request_id;
            return view('vendor.brokers.index',compact('brokers','countBroker','customer_condition'));
        }
        else{
            $brokers = User::join('customers','users.customers_id','=','customers.id')->where(["role_id"=>4,'approvel_status'=>1])
            ->select('customers.*','users.id as user_id_from_users')
            ->get();
            return view('vendor.brokers.index',compact(['brokers',$brokers,'countBroker',$countBroker]));
        }
    }

    public function show_brokers_yajra()
    {

        try {

            if (request()->ajax()) {
                //return "ssss";
                 //return datatables()->of(Customers::join('Users','Users.id' ,'=' ,'Customers.user_id')->where('role_id','=',3)->get());
                return datatables()->of(User::join('customers','users.customers_id','=','customers.id')->where(["role_id"=>4])
                ->select('customers.*','users.id as user_id_from_users')
                ->get())
                    ->addIndexColumn()
                    ->addColumn('status', function ($data) {
                        if($data->status == 0){
                            return '<label class="switch"><input type="checkbox"  data-id="'.$data->user_id.'" data-val="1"  id="status-switch"><span class="slider round"></span></label>';
                        }else{
                            return '<label class="switch"><input type="checkbox" checked data-id="'.$data->user_id.'" data-val="0"  id="status-switch"><span class="slider round"></span></label>';
                        }
                    })
                    ->addColumn('action', function ($data) {
                        return '<a title="View" href="customers/' . $data->id . '"
                        class="btn btn-dark btn-sm"><i class="fas fa-eye"></i></a>&nbsp;
                        <button title="Delete" type="button" name="delete" id="' . $data->id . '"
                        class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
                    })->rawColumns(['status','action'])->make(true);

            }
        } catch (\Exception $ex) {
            return redirect('/')->with('error', $ex->getMessage());
        }

        return view('vendor.brokers.show_brokers_yajra');
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
        $messsages = array(
            'id.required'=>'Please Select Broker to Request.',
        );

        $rules = array(
            'id'=>'required',
        );

        $validator = Validator::make($request->all(), $rules,$messsages);

        // $validator = Validator::make($request->all(), [
        //     'id' => 'required',
        // ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
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
    public function vendor_remove_broker($id)
    {
        $customer = Customers::where(['user_id'=>Auth::user()->id,'broker_request_id'=>$id])->first();
        $customer->broker_request_id = Null;
        $customer->broker_request = Null;
        $customer->save();
        return back()->with(['success' => 'Broker Cancle Successfully']);
    }
}

