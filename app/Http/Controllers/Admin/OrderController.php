<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {

        try {
            if (request()->ajax()) {
                return datatables()->of(Order::with('customer')->orderBy('created_at','desc')->get())
                    ->addIndexColumn()
                    ->addColumn('order_no', function ($data) {
                        return $data->order_no ?? '';
                    })->addColumn('customer', function ($data) {
                        if ($data->customer_id == null) {
                            return $data->customer_name;
                        } else {
                            return $data->customer->first_name . ' ' . $data->customer->last_name;
                        }
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
        } catch (\Exception $ex) {
            return redirect('/')->with('error', 'SomeThing Went Wrong baby');
        }
        return view('admin.order.index');
    }

    public function show($id)
    {
        $order = Order::where('id', $id)->with('orderItems', 'customer', 'orderItems.product')->firstOrFail();
      
        return view('admin.order.show', compact(['order']));

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
}
