<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Customers;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Models\VendorRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use DB;

class OrderController extends Controller
{

    // public function index()
    // {
    //     $users = User::where(['id'=>Auth::user()->id,'email'=>Auth::user()->email])->first();
    //     // dd($users->customers_id);
    //     try {
    //         if (request()->ajax()) {
    //             if($users->role_id == 1){
    //                 return datatables()->of(Order::with('customer')->orderBy('created_at','desc')->get())
    //                 ->addIndexColumn()
    //                 ->addColumn('order_no', function ($data) {
    //                     return $data->order_no ?? '';
    //                 })->addColumn('customer', function ($data) {
    //                     // if ($data->customer_id == null) {
    //                         return $data->customer_name;
    //                     // } else {
    //                     //     return $data->customer->first_name . ' ' . $data->customer->last_name;
    //                     // }
    //                 })->addColumn('total_amount', function ($data) {
    //                     return '$' . ($data->total_amount + $data->shipping_cost) ?? '';
    //                 })->addColumn('order_date', function ($data) {
    //                     return date('d-M-Y', strtotime($data->created_at)) ?? '';
    //                 })->addColumn('status', function ($data) {
    //                     if ($data->order_status == 'pending') {
    //                         return '<span class="badge badge-secondary">Pending</span>';
    //                     } elseif ($data->order_status == 'cancelled') {
    //                         return '<span class="badge badge-danger">Cancelled</span>';
    //                     } elseif ($data->order_status == 'completed') {
    //                         return '<span class="badge badge-success">Completed</span>';
    //                     } elseif ($data->order_status == 'shipped') {
    //                         return '<span class="badge badge-info">Shipped</span>';
    //                     }
    //                 })
    //                 ->addColumn('action', function ($data) {
    //                     return '<a title="View" href="order/' . $data->id . '" class="btn btn-dark btn-sm">
    //                             <i class="fas fa-eye"></i>
    //                             </a>&nbsp;<button title="Delete" type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm">
    //                             <i class="fa fa-trash"></i></button>';
    //                 })->rawColumns(['order_no', 'customer', 'status', 'total_amount', 'order_date', 'action'])->make(true);
    //         }
    //         else{
    //             // $users->customers_id;
    //             $check = Customers::where('id', $users->customers_id)->first();
    //             // $vendor_request = VendorRequest::where('vendor_id',$check->user_id)->get();
    //             // dd($vendor_request);
    //             // return datatables()->of(Order::where(['customer_id'=>$users->customers_id,'status'=>3])->orderBy('created_at','desc')->get())
    //             return datatables()->of(VendorRequest::where('vendor_id',$check->user_id)->orderBy('created_at','desc')->get())
    //             ->addIndexColumn()
    //             ->addColumn('order_no', function ($data) {
    //                 return $data->order_no ?? '';
    //             })->addColumn('customer', function ($data) {
    //                 if ($data->customer_id == null) {
    //                     return $data->customer_name;
    //                 } else {
    //                     return $data->customer->first_name . ' ' . $data->customer->last_name;
    //                 }
    //             })->addColumn('total_amount', function ($data) {
    //                 return '$' . ($data->total_amount + $data->shipping_cost) ?? '';
    //             })->addColumn('order_date', function ($data) {
    //                 return date('d-M-Y', strtotime($data->created_at)) ?? '';
    //             })->addColumn('status', function ($data) {
    //                 if ($data->order_status == 'pending') {
    //                     return '<span class="badge badge-secondary">Pending</span>';
    //                 } elseif ($data->order_status == 'cancelled') {
    //                     return '<span class="badge badge-danger">Cancelled</span>';
    //                 } elseif ($data->order_status == 'completed') {
    //                     return '<span class="badge badge-success">Completed</span>';
    //                 } elseif ($data->order_status == 'shipped') {
    //                     return '<span class="badge badge-info">Shipped</span>';
    //                 }
    //             })
    //             ->addColumn('action', function ($data) {
    //                 return '<a title="View" href="order/' . $data->id . '" class="btn btn-dark btn-sm">
    //                         <i class="fas fa-eye"></i>
    //                         </a>&nbsp;<button title="Delete" type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm">
    //                         <i class="fa fa-trash"></i></button>';
    //             })->rawColumns(['order_no', 'customer', 'status', 'total_amount', 'order_date', 'action'])->make(true);
    //         }
    //         }
    //     } catch (\Exception $ex) {
    //         return redirect('/')->with('error', 'SomeThing Went Wrong baby');
    //     }


    //     return view('admin.order.index');
    // }


    public function index()
    {
        $users = User::where(['id'=>Auth::user()->id,'email'=>Auth::user()->email])->first();
        $order = Order::with('customer')->orderBy('created_at','desc')->get();
        //  dd($users->customers_id);
        try {
            if (request()->ajax()) {
                if($users->role_id == 1){

                    return datatables()->of(Order::with('customer')->where('order_status','completed')->orderBy('created_at','desc')->get())
                    ->addIndexColumn()
                    ->addColumn('order_no', function ($data) {
                        return $data->order_no ?? '';
                    })->addColumn('customer', function ($data) {
                        // if ($data->customer_id == null) {
                            return $data->customer_name??'';
                        // } else {
                        //     return $data->customer->first_name . ' ' . $data->customer->last_name;
                        // }
                    })->addColumn('total_amount', function ($data) {
                        return '$' . ($data->total_amount ?? '' + $data->shipping_cost) ?? '';
                    })->addColumn('order_date', function ($data) {
                        return date('d-M-Y', strtotime($data->created_at)) ?? '';
                    })->addColumn('status', function ($data) {
                        if ($data->order_status == 'pending') {
                            return '<span class="badge badge-secondary">Pending</span>';
                        } elseif ($data->order_status == 'cancelled') {
                            return '<span class="badge badge-danger">Cancelled</span>';
                        } elseif ($data->order_status == 'completed') {
                            return '<span class="badge badge-success">Completed</span>';
                        } elseif ($data->order_status == 'paid') {
                            return '<span class="badge badge-info">Paid</span>';
                        }
                    })
                    ->addColumn('action', function ($data) {
                        return '<a title="View" href="order/' . $data->id . '" class="btn btn-dark btn-sm">
                                <i class="fas fa-eye"></i>
                                </a>&nbsp;<button title="Delete" type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i></button>';
                    })->rawColumns(['order_no', 'customer', 'status', 'total_amount', 'order_date', 'action'])->make(true);
            }
            else{

                $check = Customers::where('broker_request_id', $users->customers_id)->first();
            //    dd($check);
                $vendor_request = VendorRequest::where('vendor_id',$check->user_id)->orderBy('created_at','desc')->get();
                //dd($vendor_request);
                foreach($vendor_request as $items){
                    $products = Product::where('id',$items->product_id)->get();
                }
                $check_vendor = Customers::where('user_id', $products->vender_id)->first();
            //     return datatables()->of(VendorRequest::where('vendor_id',$check_vendor->user_id)->orderBy('created_at','desc')->get())
            //     ->addIndexColumn()
            //     ->addColumn('customer', function ($data) {
            //         // if ($data->customer_id == null) {
            //             return $data->full_name??'';
            //         // } else {
            //         //     return $data->customer->first_name . ' ' . $data->customer->last_name;
            //         // }
            //     })->addColumn('email', function ($data) {
            //         return $data->email??'';
            //     })->addColumn('phone', function ($data) {
            //         return $data->phone_num??'';
            //     })->addColumn('order_date', function ($data) {
            //         return date('d-M-Y', strtotime($data->created_at)) ?? '';
            //     })->addColumn('status', function ($data) {
            //         $order_check = Order::where('id',$data->order_id)->first();
            //         if(isset($order_check)){
            //         if ($order_check->order_status == 'pending') {
            //             return '<span class="badge badge-secondary">Pending</span>';
            //         } elseif ($order_check->order_status == 'cancelled') {
            //             return '<span class="badge badge-danger">Cancelled</span>';
            //         } elseif ($order_check->order_status == 'completed') {
            //             return '<span class="badge badge-success">Completed</span>';
            //         } elseif ($order_check->order_status == 'shipped') {
            //             return '<span class="badge badge-info">Shipped</span>';
            //         }
            //         }
            //         else{
            //         return '<span class="badge badge-secondary">Pending</span>';
            //         }
            //     })
            //     ->addColumn('action', function ($data) {
            //         // return $data->product_id;
            //         if(!$data->order_id == ""){
            //         return '<a title="View" href="order/broker/' . $data->product_id . '/' . $data->id . '/' . $data->order_id . '" class="btn btn-dark btn-sm">
            //                 <i class="fas fa-eye"></i>
            //                 </a>&nbsp;<button title="Delete" type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm">
            //                 <i class="fa fa-trash"></i></button>';
            //         }
            //         else{
            //             return '<a title="View" href="order/broker/' . $data->product_id . '/' . $data->id . '" class="btn btn-dark btn-sm">
            //             <i class="fas fa-eye"></i>
            //             </a>&nbsp;<button title="Delete" type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm">
            //             <i class="fa fa-trash"></i></button>';
            //         }

            //     })->rawColumns(['order_no', 'customer', 'status', 'total_amount', 'order_date', 'action'])->make(true);



        }
            }
        } catch (\Exception $ex) {
            return redirect('/')->with('error', 'SomeThing Went Wrong baby');
        }

        if($users->role_id == 1){
            return view('admin.order.index');
        }
        else{
            
            $check = Customers::where('broker_request_id', $users->customers_id)->first();
            
                if($check == null){
                    $message_broker = "Not Assign Yet From Vendor!";
                    return view('admin.order.broker_index',compact('message_broker') );
                }
                $vendor_request = VendorRequest::where('vendor_id',$check->user_id)->orderBy('created_at','desc')->get();
                
                foreach($vendor_request as $items){
                    $products1 = Product::where('id',$items->product_id)->get();
                    foreach($products1 as $item1){
                        $product_id = $item1->vender_id;
                    }
                     if(!$vendor_request->isEmpty()){
                        
                    $check_vendor = Customers::where('user_id', $product_id)->first();
                    $vender_request = VendorRequest::where('vendor_id',$check_vendor->user_id)->orderBy('created_at','desc')->get();
                    return view('admin.order.broker_index',compact('vender_request') );
                }
                }
                if($vendor_request->isEmpty()){
                    return view('admin.order.broker_index');
                }
                // }
                   
        }
    }

    public function show($id)
    {
        $order = Order::where('id', $id)->with('orderItems', 'customer', 'orderItems.product')->firstOrFail();
        return view('admin.order.show', compact(['order']));

    }

    public function brokershow($id,$request_id,$order_id)
    {
        // dd($request->all());
        $order = Order::where('id', $order_id)->first();
        $product = Product::where('id', $id)->first();
        $vender_request = VendorRequest::where('id',$request_id)->first();
        $vender_detail = User::where('id',$vender_request->vendor_id)->first();
        return view('admin.order.broker_show', compact(['product','vender_request','vender_detail','order']));

    }
    public function brokershow_without_orderid($id,$request_id)
    {
        // dd($request->all());
        // $order = Order::where('id', $order_id)->first();
        $product = Product::where('id', $id)->first();
        $vender_request = VendorRequest::where('id',$request_id)->first();
        $vender_detail = User::where('id',$vender_request->vendor_id)->first();
        $login_vendor = Customers::where('user_id',Auth::user()->id)->first();
        // dd($login_vendor);
        // dd($order,$vender_detail,$vender_request);
        return view('admin.order.broker_show', compact(['product','vender_request','vender_detail']));

    }

    public function changeOrderStatus(Request $request, $id)
    {
        $order = Order::where('id', $id);

        if ($order->count() > 0) {
            $order->update(['order_status' => $request->val]);
            return 1;
        } else {
            return 0;
        }
    }


    public function destroy($id)
    {
        // dd($id);
        $vender_request = VendorRequest::find($id);
        $vender_request->delete();

        // $content = Order::find($id);
        // $content->delete(); //
        // $orderItems = OrderItem::where('order_id', $id)->delete();

        // return back()->with('success','Order Deleted Successfully');
        return 1;
    }

    public function destroyBoth($id,$id2)
    {
        $vender_request = VendorRequest::find($id);
        $vender_request->delete();
        $order = Order::find($id2);
        $order->delete();
        return 1;
        // return back()->with('success','Order Deleted Successfully');
        // $content = Order::find($id);
        // $content->delete(); //
        // $orderItems = OrderItem::where('order_id', $id)->delete();

    }


    public function broker_price_update(Request $request)
    {
        $order = Order::find($request->order_id);
        $order->broker_price = $request->broker_price;
        $order->order_status = "Paid";
        $order->save();
        return redirect()->route('order.index')->with(['success' => 'Order Updated Successfully']);
    }
    public function broker_price(Request $request)
    {

        $product_id = $request->input('product_id');
        $product_record = Product::where('id', $product_id)->first();

        $qty = $product_record->product_qty;
        $update_qty = $qty - $request->input('quantity');

        $qty_update = DB::table('products')
              ->where('id', $product_id)
              ->update(['product_qty' => $update_qty]);
        //dd($update_qty);
        // dd($request->all());
        // $customer_check = Customers::where('user_id',Auth::user()->id)->first();
        $timestamp = mt_rand(1, time());
        // dd($timestamp);
        // $random = \Carbon\Carbon::now()->format('Ymd');

        $order = new Order;
        $order->order_no = $timestamp."18D2";

        $order->customer_id = $request->input('customer_id');
        $order->customer_name = $request->input('customer_name');
        $order->customer_email = $request->input('customer_email');
        $order->phone_no = $request->input('phone_no');
        $total_amount = $request->input('total_amount');
        $quantity = $request->input('quantity');
        $grand_total = $quantity * $total_amount;
        $order->sub_total = $request->input('total_amount');
        $order->total_amount = $grand_total;

        $order->order_status = "Paid";
        $order->status = 1;

        $order->shipping_address = $request->input('shipping_address');

        $order->shipping_city = $request->input('shipping_city');
        $order->shipping_country = $request->input('shipping_city');

        $order->shipping_state = $request->input('shipping_city');

        $order->shipping_zip = 7100;
        $order->billing_city = $request->input('shipping_city');
        $order->billing_address = $request->input('shipping_address');

        $order->billing_country = $request->input('shipping_city');
        $order->billing_state = $request->input('shipping_city');


        $order->broker_id = Auth::user()->id;
        $order->vendor_id = $request->input('vendor_id');


        $order->save();
        $order_id = $order->id;

            $items = new OrderItem;
            $items->order_id = $order_id;
            $items->product_id = $request->input('product_id');
            $items->product_per_price = $request->input('total_amount');
            $total_amount = $request->input('total_amount');
            $quantity = $request->input('quantity');
            $sub_total = $quantity * $total_amount;


            $items->product_qty	 = $request->input('quantity');

            $items->status	 = 1;
            $items->product_subtotal_price	 = $sub_total;
            $items->save();
            // $calculate_broker_price = $sub_total/100*$customer_check->broker_percentage;
            $order_set_broker_price = Order::find($order_id);
            $order_set_broker_price->broker_price = $request->broker_price;
            $order_set_broker_price->save();

        $vendor_save = VendorRequest::find($request->vendor_request_id);
        $vendor_save->order_id = $order_id;
        $vendor_save->save();
        $product = Product::where('id', $request->input('product_id'))->first();
        $details = [
            'customer_name'=> $request->customer_name,
            'customer_email' => $request->input('customer_email'),
            'phone_num' => $request->input('phone_num'),
            'city' => $request->input('shipping_city'),
            'quantity' => $request->input('quantity'),
            'address'=>  $request->input('shipping_address'),
            'product_name'=>$product->product_name,
            'total'=>$sub_total
        ];
        $vendor = Customers::where('user_id',$request->input('vendor_id'))->first();
// dd($vendor);
        $usersArray = [$request->input('customer_email'), $vendor->email];
        foreach($usersArray as $user){
            //echo $user;
            \Mail::to($user)->send(new \App\Mail\SendEmailCustomerBroker($details));

        }
        return redirect()->route('order.index')->with(['success' => 'Order Updated Successfully']);
    }

}
