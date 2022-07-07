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
        // dd($users->customers_id);
        try {
            if (request()->ajax()) {
                if($users->role_id == 1){
                    return datatables()->of(Order::with('customer')->orderBy('created_at','desc')->get())
                    ->addIndexColumn()
                    ->addColumn('order_no', function ($data) {
                        return $data->order_no ?? '';
                    })->addColumn('customer', function ($data) {
                        // if ($data->customer_id == null) {
                            return $data->customer_name;
                        // } else {
                        //     return $data->customer->first_name . ' ' . $data->customer->last_name;
                        // }
                    })->addColumn('total_amount', function ($data) {
                        return '$' . ($data->total_amount + $data->shipping_cost) ?? '';
                    })->addColumn('order_date', function ($data) {
                        return date('d-M-Y', strtotime($data->created_at)) ?? '';
                    })->addColumn('status', function ($data) {
                        if ($data->order_status == 'pending') {
                            return '<span class="badge badge-secondary">Pending</span>';
                        } elseif ($data->order_status == 'cancelled') {
                            return '<span class="badge badge-danger">Cancelled</span>';
                        } elseif ($data->order_status == 'completed') {
                            return '<span class="badge badge-success">Completed</span>';
                        } elseif ($data->order_status == 'shipped') {
                            return '<span class="badge badge-info">Shipped</span>';
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
                // $users->customers_id;
                $check = Customers::where('id', $users->customers_id)->first();
                // $vendor_request = VendorRequest::where('vendor_id',$check->user_id)->get();
                // dd($vendor_request);
                // return datatables()->of(Order::where(['customer_id'=>$users->customers_id,'status'=>3])->orderBy('created_at','desc')->get())
                return datatables()->of(VendorRequest::where('vendor_id',$check->user_id)->orderBy('created_at','desc')->get())
                ->addIndexColumn()
                ->addColumn('customer', function ($data) {
                    // if ($data->customer_id == null) {
                        return $data->full_name;
                    // } else {
                    //     return $data->customer->first_name . ' ' . $data->customer->last_name;
                    // }
                })->addColumn('email', function ($data) {
                    return $data->email;
                })->addColumn('phone', function ($data) {
                    return $data->phone_num;
                })->addColumn('order_date', function ($data) {
                    return date('d-M-Y', strtotime($data->created_at)) ?? '';
                })
                ->addColumn('action', function ($data) {
                    return '<a title="View" href="order/broker/' . $data->product_id . '/' . $data->id . '" class="btn btn-dark btn-sm">
                            <i class="fas fa-eye"></i>
                            </a>&nbsp;<button title="Delete" type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i></button>';
                })->rawColumns(['order_no', 'customer', 'status', 'total_amount', 'order_date', 'action'])->make(true);
            }
            }
        } catch (\Exception $ex) {
            return redirect('/')->with('error', 'SomeThing Went Wrong baby');
        }

        if($users->role_id == 1){
            return view('admin.order.index');
        }
        else{
            return view('admin.order.broker_index');
        }
    }

    public function show($id)
    {
        $order = Order::where('id', $id)->with('orderItems', 'customer', 'orderItems.product')->firstOrFail();
        return view('admin.order.show', compact(['order']));

    }

    public function brokershow($id,$request_id)
    {
        // $order = Order::where('id', $id)->with('orderItems', 'customer', 'orderItems.product')->firstOrFail();
        $product = Product::where('id', $id)->first();
        $vender_request = VendorRequest::where('id',$request_id)->first();
        $vender_detail = User::where('id',$vender_request->vendor_id)->first();
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
        $content = Order::find($id);
        $content->delete(); //
        $orderItems = OrderItem::where('order_id', $id)->delete();
        echo 1;
    }


    public function broker_price(Request $request)
    {
        $random = \Carbon\Carbon::now()->format('Ymd');
        
        $order = new Order;
        $order->order_no = $random."18D2";
        
        $order->customer_id = $request->input('customer_id');
        $order->customer_name = $request->input('customer_name');
        $order->customer_email = $request->input('customer_email');
        $order->phone_no = $request->input('phone_no');
        
        $order->sub_total = $request->input('sub_total');
        $order->sub_total = $request->input('total_amount');
        
        $order->order_status = "completed";
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

        
        $order->broker_price = $request->input('broker_price');
        $order->broker_id = Auth::user()->id;
        $order->vendor_id = $request->input('vendor_id');
        
        
        $order->save();
        $order_id = $order->id;
       
            $items = new OrderItem;
            $items->order_id = $order_id;
            $items->product_id = $request->input('product_id');
            $items->product_per_price = $request->input('total_amount');
            
            $items->product_qty	 = 1;
            
            $items->status	 = 1;
            $items->product_subtotal_price	 = $request->input('total_amount');
            $items->save();
        
        
        return back()->with(['success' => 'Order Updated Successfully']);
    }
    
}
