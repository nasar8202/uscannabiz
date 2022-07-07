<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\CustomerAddress;
use App\Models\Customers;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Settings;
use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    public function index()
    {
        $settings = Settings::first();
        if (empty(Cart::content())) {
            return redirect()->route('shop.index');
        }

        if (auth()->user() && request()->is('guestCheckout')) {
            return redirect()->route('checkout.index');
        }

        if(Auth::user() && Auth::user()->role_id == 2){
            $shippingAddress = CustomerAddress::where('customer_id',Auth::user()->customers->id)->where('shipping_billing','shipping')->first();
            $billingAddress = CustomerAddress::where('customer_id',Auth::user()->customers->id)->where('shipping_billing','billing')->first();
        }else{
            $shippingAddress = [];
            $billingAddress = [];
        }

        $items = Cart::content();
        //echo "<pre>", print_r($items);
        $products = array();
        $totalAmount = 0;
        $options = [];
        if (!empty($items) && count($items) > 0){
            foreach ($items as $item){
                $amount = (float)$item->price * (int)$item->qty;
                $totalAmount += $amount;
                $product = array(
                    'productId' => $item->id,
                    'name' => $item->name,
                    'price' => $item->price,
                    'subtotal' => $amount,
                    'quantity' => $item->qty,
                    'options' => $item->options
                );
                $products[] = $product;
            }
        }else{
            return redirect('/shop');
        }
//        dd($products);
        $setting = Settings::with('shipping_cost')->first();

        if($setting->shipping_rate !== null){
            $shipping_cost = $setting->shipping_cost->rate;
        }else{
            $shipping_cost = 0;
        }

        return view('front.checkout.index', compact('products', 'totalAmount','shipping_cost','settings','shippingAddress','billingAddress'));
    }

    public function checkout(Request $request){
        if ($request->method() == 'POST'){
            try{
                $validator = Validator::make($request->all(), array(
                   'first_name' => 'required',
                   'last_name' => 'required',
                   'email' => 'required|unique:users',
                   'phone' => 'required',
                   'password' => 'required|min:8|confirmed',
                   'address' => 'required',
                   'country' => 'required',
                   'city' => 'required',
                   'zip_code' => 'required',
                   'state' => 'required',
                ));

                if ($validator->fails()){
                    return redirect()->back()->withErrors($validator->errors())->withInput();
                }

                /*  USER DETAIL */
                if(!Auth::check()){
                    $user = User::where('email', $request->input('email'))->first();
                    if(empty($user) && $user == null){
                        $user = User::create([
                            'name' => $request->input('first_name'). ' '.$request->input('last_name'),
                            'email' => $request->input('email'),
                            'password' => Hash::make($request->input('password')),
                            'role_id' => 2,
                        ]);
                    }
                    if(!empty($user->id)){
                        $customer = Customers::where('user_id', $user->id)->where('email', $request->input('email'))->first();
                        if (!empty($customer) && $customer == null){
                            $customer = Customers::create([
                                'user_id' => $user->id,
                                'first_name' => $request->input('first_name'),
                                'last_name' => $request->input('last_name'),
                                'email' => $request->input('email'),
                                'phone_no' => $request->input('phone'),
                                'city' => $request->input('city'),
                                'state' => $request->input('state'),
                                'country' => $request->input('country'),
                                'address' => $request->input('address'),
                            ]);
                        }
                    }
                }else{
                    $user = Auth::user();
                }


                $items = Cart::content();
                $totalAmount = 0;
                $tax = 0;
                if (!empty($items) && count($items) > 0){
                    $subtotal = 0;
                    $discount = 0;
                    $totalAmount = ($subtotal-$discount)+$tax;
                    foreach ($items as $item){
                        $subtotal += (float)$item->price * (int)$item->qty;
                    }
                    $order = Order::create([
                        'order_no' => md5(time()),
                        'customer_id' => $user->id,
                        'customer_name' => $user->name ?? $request->input('first_name') . ' ' . $request->input('last_name'),
                        'customer_email' => $user->email ?? $request->input('email'),
                        'sub_total' => $subtotal,
                        'discount' => $discount,
                        'shipping_address' => $request->input('address'),
                        'tax' => $tax,
                        'total_amount' => $totalAmount,
                        'order_status' => 'pending'
                    ]);
                    foreach ($items as $item){
                        $orderItems = OrderItem::create([
                            'order_id' => $order->id,
                            'product_id' => $item->id,
                            'product_per_price' => $item->price,
                            'product_qty' => $item->qty,
                            'tax' => $tax,
                            'product_subtotal_price' => $subtotal,
                        ]);
                    }

                    return redirect('/checkout/success')->with(['success' => 'Your Order Placed Successfully']);
                }else{
                    return redirect('/shop')->with(['error' => 'Your Card Item is Empty']);
                }
            }catch (\Exception $ex){
                return redirect('/shop')->with(['error' => $ex->getMessage()]);
                //echo  $ex->getMessage();
            }
        }else{
            return redirect('/shop')->with(['error' => 'Something Went Wrong']);
        }

    }

    public function success(){
        return view('front.checkout.success');
    }


    protected function decreaseQuantities()
    {
        foreach (Cart::content() as $item) {
            $product = Product::find($item->model->id);

            $product->update(['quantity' => $product->quantity - $item->qty]);
        }
    }

    protected function productsAreNoLongerAvailable()
    {
        foreach (Cart::content() as $item) {
            $product = Product::find($item->model->id);
            if ($product->quantity < $item->qty) {
                return true;
            }
        }

        return false;
    }

}
