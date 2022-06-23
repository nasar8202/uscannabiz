<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Customers;
use App\Models\OptionProduct;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Settings;
use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Validator;
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;

class PaymentController extends Controller
{
    public function stripeCharge(Request $request)
    {
        $settingskeys=Settings::find(1);


        $inputs = $request->all();
        // dd($inputs);
        $ship_address_check = 0;
        if ($request->ship_address_check == 1) {
            $ship_address_check = $request->ship_address_check;
        }

        $validator = Validator::make($inputs, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'country' => 'required',
            'city' => 'required',
            'zip_code' => 'required',
            'state' => 'required',
            's_address' => 'required_if:$ship_address_check,==,0',
            's_country' => 'required_if:$ship_address_check,==,0',
            's_city' => 'required_if:$ship_address_check,==,0',
            's_zip_code' => 'required_if:$ship_address_check,==,0',
            's_state' => 'required_if:$ship_address_check,==,0',
        ]);

        if ($validator->fails()) {
            return [
                "status" => false,
                "data" => [],
                "errors" => $validator->messages(),
                "message" => "Unexpected Error occured."
            ];
        }

        $stripe = [
            // "secret_key" => env("SECRET_KEY"),
            // "publishable_key" => env("PUBLISHABLE_KEY"),
            "secret_key" => $settingskeys->stripe_secret_key,
            "publishable_key" => $settingskeys->stripe_publishable_key,

        ];

        try {

            $cardStripe = \Stripe\Stripe::setApiKey($stripe['secret_key']);

            $cardStripe = \Stripe\Token::create(array(
                "card" => array(
                    "number" => $request['card_no'],
                    "exp_month" => $request['exp_mon'],
                    "exp_year" => $request['exp_year'],
                    "cvc" => $request['cvv']
                )
            ));

            if (!empty($cardStripe)) {

                $customer = new \Stripe\StripeClient(
                    $stripe['secret_key']
                );
                $abc = $customer->customers->create([
                    'description' => 'Shopping',
                    'email' => $request->email,
                    'source' => $cardStripe['id'],
                ]);
                // echo '<pre>';
                // print_r($customer); die;

                $charge = \Stripe\Stripe::setApiKey($stripe['secret_key']);

                $charge = \Stripe\Charge::create([
                    'amount' => $request['amount'] * 100,
                    'currency' => 'usd',
                    'customer' => $abc
                ]);

                if ($charge['status'] === 'succeeded') {

                    /*  USER DETAIL */
                    if (!Auth::check()) {
                        $user = User::where('email', $request->input('email'))->first();
                        if (empty($user) && $user == null) {
                            $user = User::create([
                                'name' => $request->input('first_name') . ' ' . $request->input('last_name'),
                                'email' => $request->input('email'),
                                'password' => Hash::make($request->input('password')),
                                'roll_id' => 2,
                            ]);
                        }
                        if (!empty($user->id)) {
                            $customer = Customers::where('user_id', $user->id)->where('email', $request->input('email'))->first();
                            if (!empty($customer) && $customer == null) {
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
                    } else {
                        $user = Auth::user();
                    }

                    $items = Cart::content();
                    $totalAmount = 0;
                    $tax = 0;
                    if (!empty($items) && count($items) > 0) {
                        $subtotal = 0;
                        $discount = 0;

                        foreach ($items as $item) {
                            $subtotal += (float)$item->price * (int)$item->qty;
                        }
                        if (!empty($request->input('coupon_code'))) {
                            $couponData = $this->validateCoupon($request->input('coupon_code'), $subtotal);
                            if ($couponData['isValidCoupon'] == true) {
                                $discount = $couponData['discount'];
                            }
                            $this->decreaseCouponUsage($request->input('coupon_code'));
                        }
                        $totalAmount = ($subtotal - $discount) + $tax;
                        $today = date("Ymd");
                        $rand = strtoupper(substr(uniqid(sha1(time())), 0, 4));
                        $order_no = $today . $rand;

                        $order = Order::create([
                            'order_no' => $order_no,
                            'customer_id' => auth()->user() ? auth()->user()->id : null,
                            'customer_name' => $user->name ?? $request->input('first_name') . ' ' . $request->input('last_name'),
                            'customer_email' => $user->email ?? $request->input('email'),
                            'sub_total' => $subtotal,
                            'discount' => $discount,
                            'tax' => $tax,
                            'shipping_cost' => $request->input('shipping_cost'),
                            'total_amount' => $totalAmount,
                            'order_status' => 'pending',
                            'shipping_country' => ($request->ship_address_check == 1) ? $request->input('country') : $request->input('s_country'),
                            'shipping_state' => ($request->ship_address_check == 1) ? $request->input('state') : $request->input('s_state'),
                            'shipping_city' => ($request->ship_address_check == 1) ? $request->input('city') : $request->input('s_city'),
                            'shipping_address' => ($request->ship_address_check == 1) ? $request->input('address') : $request->input('s_address'),
                            'shipping_zip' => ($request->ship_address_check == 1) ? $request->input('zip_code') : $request->input('s_zip_code'),
                            'billing_country' => $request->input('country'),
                            'billing_state' => $request->input('state'),
                            'billing_city' => $request->input('city'),
                            'billing_address' => $request->input('address'),
                            'billing_zip' => $request->input('zip_code'),
                            'phone_no' => $request->input('phone'),
                        ]);
                        foreach ($items as $item) {
                            $orderItems = OrderItem::create([
                                'order_id' => $order->id,
                                'product_id' => $item->id,
                                'product_per_price' => $item->price,
                                'product_qty' => $item->qty,
                                'tax' => $tax,
                                'product_subtotal_price' => $subtotal,
                            ]);
                        }
                        Payment::create([
                            'order_id' => $order->id,
                            'amount' => $totalAmount,
                            'pay_method_name' => 'stripe',
                        ]);
                        // decrease the quantities of all the products in the cart
                        $this->decreaseQuantities();

                        $setting = Settings::find(1);
                        $mailData = array(
                            'order' => $order,
                            'orderItems' => count(array($orderItems)),
                            'setting' => $setting,
                            'email' => $setting->email,
                            'to' => $order->customer_email,
                        );

                        Mail::send('front.emails.orderConfirmationEmail', $mailData, function($message) use($mailData){
                            $message->to($mailData['to'])->from($mailData['email'])
                                ->subject('Order Confirmation');
                        });

//                        return redirect('/checkout/success')->with(['success' => 'Your Order Placed Successfully']);
                    } else {
//                        return redirect('/shop')->with(['error' => 'Your Card Item is Empty']);
                    }

                }

                Cart::instance('default')->destroy();
                session()->forget('coupon');
                session()->flash('success', 'Your Order Placed Successfully');
                return [
                    "status" => true,
                    "data" => [],
                    "errors" => [],
                    "message" => "Successfully added"
                ];
//                return $charge;
            }
        } catch (\Stripe\Exception\CardException $e) {
            // DB::rollBack();
            // alert($e);
            //echo 'invalid card';
            throw $e;
        }
    }


    public function paypalCharge(Request $request)
    {
        //dd('assa');
        /*  USER DETAIL */
        if (!Auth::check()) {
            $user = User::where('email', $request->input('email'))->first();
            if (empty($user) && $user == null) {
                $user = User::create([
                    'name' => $request->input('first_name') . ' ' . $request->input('last_name'),
                    'email' => $request->input('email'),
                    'password' => Hash::make($request->input('password')),
                    'roll_id' => 2,
                ]);
            }
            if (!empty($user->id)) {
                $customer = Customers::where('user_id', $user->id)->where('email', $request->input('email'))->first();
                if (!empty($customer) && $customer == null) {
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
        } else {
            $user = Auth::user();
        }

        $items = Cart::content();
        $totalAmount = 0;
        $tax = 0;
        if (!empty($items) && count($items) > 0) {
            $subtotal = 0;
            $discount = 0;

            foreach ($items as $item) {
                $subtotal += (float)$item->price * (int)$item->qty;
            }
            if (!empty($request->input('coupon_code'))) {
                $couponData = $this->validateCoupon($request->input('coupon_code'), $subtotal);
                if ($couponData['isValidCoupon'] == true) {
                    $discount = $couponData['discount'];
                }
                $this->decreaseCouponUsage($request->input('coupon_code'));
            }
            $totalAmount = ($subtotal - $discount) + $tax;
            $today = date("Ymd");
            $rand = strtoupper(substr(uniqid(sha1(time())), 0, 4));
            $order_no = $today . $rand;
            $order = Order::create([
                'order_no' => $order_no,
                'customer_id' => auth()->user() ? auth()->user()->id : null,
                'customer_name' => $user->name ?? $request->input('first_name') . ' ' . $request->input('last_name'),
                'customer_email' => $user->email ?? $request->input('email'),
                'sub_total' => $subtotal,
                'discount' => $discount,
                'tax' => $tax,
                'shipping_cost' => $request->input('shipping_cost'),
                'total_amount' => $totalAmount,
                'order_status' => 'pending',
                'shipping_country' => ($request->ship_address_check == 1) ? $request->input('country') : $request->input('s_country'),
                'shipping_state' => ($request->ship_address_check == 1) ? $request->input('state') : $request->input('s_state'),
                'shipping_city' => ($request->ship_address_check == 1) ? $request->input('city') : $request->input('s_city'),
                'shipping_address' => ($request->ship_address_check == 1) ? $request->input('address') : $request->input('s_address'),
                'shipping_zip' => ($request->ship_address_check == 1) ? $request->input('zip_code') : $request->input('s_zip_code'),
                'billing_country' => $request->input('country'),
                'billing_state' => $request->input('state'),
                'billing_city' => $request->input('city'),
                'billing_address' => $request->input('address'),
                'billing_zip' => $request->input('zip_code'),
                'phone_no' => $request->input('phone'),

            ]);
            foreach ($items as $item) {
                $orderItems = OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->id,
                    'product_per_price' => $item->price,
                    'product_qty' => $item->qty,
                    'tax' => $tax,
                    'product_subtotal_price' => $subtotal,
                ]);
            }
            Payment::create([
                'order_id' => $order->id,
                'amount' => $totalAmount,
                'pay_method_name' => 'paypal',
            ]);
            // decrease the quantities of all the products in the cart
            $this->decreaseQuantities();


            $setting = Settings::find(1);
            $mailData = array(
                'order' => $order,
                'orderItems' => count(array($orderItems)),
                'setting' => $setting,
                'email' => $setting->email,
                'to' => $order->customer_email,
            );

            Mail::send('front.emails.orderConfirmationEmail', $mailData, function($message) use($mailData){
                $message->to($mailData['to'])->from($mailData['email'])
                    ->subject('Order Confirmation');
            });

//                        return redirect('/checkout/success')->with(['success' => 'Your Order Placed Successfully']);
        } else {
//                        return redirect('/shop')->with(['error' => 'Your Card Item is Empty']);
        }

        Cart::instance('default')->destroy();
        session()->forget('coupon');
        session()->flash('success', 'Your Order Placed Successfully');
        return [
            "status" => true,
            "data" => [],
            "errors" => [],
            "message" => "Successfully added"
        ];
    }

    protected function decreaseQuantities()
    {
//dd(Cart::content());
        foreach (Cart::content() as $item) {
            $product = Product::with('products_options')->find($item->model->id);

            if(count($item->options) > 0){
                $itemx = explode(',',$item->options->options_id);
                foreach ($itemx as $productOption){
//                echo $productOption;
                    $productOption = OptionProduct::where('option_val_id',$productOption)->where('product_id',$item->id)->first();
                    $productOption->update([
                        'qty' => $productOption->qty-$item->qty
                    ]);
                }
            }


            $product->update(['product_qty' => $product->product_qty - $item->qty]);
        }

    }

    public function authorizeCharge(Request $request){
        $settings=Settings::find(1);
        $inputs = $request->all();
        //dd($inputs);
        $ship_address_check = 0;
        if ($request->ship_address_check == 1) {
            $ship_address_check = $request->ship_address_check;
        }

        $validator = Validator::make($inputs, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'country' => 'required',
            'city' => 'required',
            'zip_code' => 'required',
            'state' => 'required',
            's_address' => 'required_if:$ship_address_check,==,0',
            's_country' => 'required_if:$ship_address_check,==,0',
            's_city' => 'required_if:$ship_address_check,==,0',
            's_zip_code' => 'required_if:$ship_address_check,==,0',
            's_state' => 'required_if:$ship_address_check,==,0',
        ]);

        if ($validator->fails()) {
            return [
                "status" => false,
                "data" => [],
                "errors" => $validator->messages(),
                "message" => "Unexpected Error occured."
            ];
        }

        try{

            $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
            // $merchantAuthentication->setName(env('MERCHANT_LOGIN_ID'));
            // $merchantAuthentication->setTransactionKey(env('MERCHANT_TRANSACTION_KEY'));
            $merchantAuthentication->setName($settings->authorize_merchant_login_id);
            $merchantAuthentication->setTransactionKey($settings->authorize_merchant_transaction_key);

            // Set the transaction's refId
            $refId = 'ref' . time();
            $cardNumber = preg_replace('/\s+/', '', $request['card_no']);

            // Create the payment data for a credit card
            $creditCard = new AnetAPI\CreditCardType();
            $creditCard->setCardNumber($cardNumber);
            $creditCard->setExpirationDate($request['exp_mon'] . "-" .$request['exp_year']);
            $creditCard->setCardCode($request['cvv']);

            // Add the payment data to a paymentType object
            $paymentOne = new AnetAPI\PaymentType();
            $paymentOne->setCreditCard($creditCard);

            // Create a TransactionRequestType object and add the previous objects to it
            $transactionRequestType = new AnetAPI\TransactionRequestType();
            $transactionRequestType->setTransactionType("authCaptureTransaction");
            $transactionRequestType->setAmount($request['amount']);
            $transactionRequestType->setPayment($paymentOne);

            // Assemble the complete transaction request
            $requests = new AnetAPI\CreateTransactionRequest();
            $requests->setMerchantAuthentication($merchantAuthentication);
            $requests->setRefId($refId);
            $requests->setTransactionRequest($transactionRequestType);

            // Create the controller and get the response
            $controller = new AnetController\CreateTransactionController($requests);
            $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);

            if ($response != null){
                if ($response->getMessages()->getResultCode() == 'Ok'){
                    $tresponse = $response->getTransactionResponse();

                    if ($tresponse != null && $tresponse->getMessages() != null) {

                        $message_text = $tresponse->getMessages()[0]->getDescription().", Transaction ID: " . $tresponse->getTransId();
                        $msg_type = "success_msg";


                        /*  USER DETAIL */
                        if (!Auth::check()) {
                            $user = User::where('email', $request->input('email'))->first();
                            if (empty($user) && $user == null) {
                                $user = User::create([
                                    'name' => $request->input('first_name') . ' ' . $request->input('last_name'),
                                    'email' => $request->input('email'),
                                    'password' => Hash::make($request->input('password')),
                                    'roll_id' => 2,
                                ]);
                            }
                            if (!empty($user->id)) {
                                $customer = Customers::where('user_id', $user->id)->where('email', $request->input('email'))->first();
                                if (empty($customer) && $customer == null) {
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
                        } else {
                            $user = Auth::user();
                            $customer = Customers::where('user_id', Auth::id())->first();
                            if (!empty($customer) && $customer != null) {
                                $customer->first_name = $request->input('first_name');
                                $customer->last_name = $request->input('last_name');
                                $customer->phone_no = $request->input('phone');
                                $customer->city = $request->input('city');
                                $customer->state = $request->input('state');
                                $customer->country = $request->input('country');
                                $customer->address = $request->input('address');
                                // $customer->zip_code = $request->input('zip_code');
                                $customer->save();
                            }
                        }

                        $setting = Settings::with('shipping_cost')->first();

                        if($setting->shipping_rate !== null){
                            $shipping_cost = $setting->shipping_rate;
                        }else{
                            $shipping_cost = 0;
                        }
                        $items = Cart::content();
                        $totalAmount = 0;
                        $tax = 0;
                        if (!empty($items) && count($items) > 0) {
                            $subtotal = 0;
                            $discount = 0;

                            foreach ($items as $item) {
                                $subtotal += (float)$item->price * (int)$item->qty;
                            }
                            if (!empty($request->input('coupon_code'))) {
                                $couponData = $this->validateCoupon($request->input('coupon_code'), $subtotal);
                                if ($couponData['isValidCoupon'] == true) {
                                    $discount = $couponData['discount'];
                                }
                                $this->decreaseCouponUsage($request->input('coupon_code'));
                            }
                            $totalAmount = ($subtotal - $discount) + $tax + $shipping_cost;
                            $today = date("Ymd");
                            $rand = strtoupper(substr(uniqid(sha1(time())), 0, 4));
                            $order_no = $today . $rand;


                            $order = Order::create([
                                'order_no' => $order_no,
                                'customer_id' => $user->customers->id,
                                'customer_name' => $user->name ?? $request->input('first_name') . ' ' . $request->input('last_name'),
                                'customer_email' => $user->email ?? $request->input('email'),
                                'sub_total' => $subtotal,
                                'discount' => $discount,
                                'tax' => $tax,
                                'shipping_cost' => $shipping_cost,
                                'total_amount' => $totalAmount,
                                'order_status' => 'pending',
                                'shipping_country' => ($request->ship_address_check == 1) ? $request->input('s_country') : $request->input('country'),
                                'shipping_state' => ($request->ship_address_check == 1) ? $request->input('s_state') : $request->input('state'),
                                'shipping_city' => ($request->ship_address_check == 1) ? $request->input('s_city') : $request->input('city'),
                                'shipping_address' => ($request->ship_address_check == 1) ? $request->input('s_address') : $request->input('address'),
                                'shipping_zip' => ($request->ship_address_check == 1) ? $request->input('s_zip_code') : $request->input('zip_code'),
                                'billing_country' => $request->input('country'),
                                'billing_state' => $request->input('state'),
                                'billing_city' => $request->input('city'),
                                'billing_address' => $request->input('address'),
                                'billing_zip' => $request->input('zip_code'),
                                'phone_no' => $request->input('phone'),
                            ]);
                            foreach ($items as $item) {
                                $orderItems = OrderItem::create([
                                    'order_id' => $order->id,
                                    'product_id' => $item->id,
                                    'product_per_price' => $item->price,
                                    'product_qty' => $item->qty,
                                    'tax' => $tax,
                                    'product_subtotal_price' => $subtotal,
                                ]);
                            }
                            Payment::create([
                                'order_id' => $order->id,
                                'amount' => $totalAmount,
                                'pay_method_name' => 'authorize_net',
                                'response_code' => $tresponse->getResponseCode(),
                                'transaction_id' => $tresponse->getTransId(),
                                'auth_id' => $tresponse->getAuthCode(),
                                'message_code' => $tresponse->getMessages()[0]->getCode(),
                               // 'name_on_card' => trim($input['owner']),
                            ]);
                            // decrease the quantities of all the products in the cart
                            $this->decreaseQuantities();

                            $setting = Settings::find(1);
                            $mailData = array(
                                'order' => $order,
                                'orderItems' => count(array($orderItems)),
                                'setting' => $setting,
                                'email' => $setting->email,
                                'to' => $order->customer_email,
                            );

                            // Mail::send('front.emails.orderConfirmationEmail', $mailData, function($message) use($mailData){
                            //     $message->to($mailData['to'])->from($mailData['email'])
                            //         ->subject('Order Confirmation');
                            // });

//                        return redirect('/checkout/success')->with(['success' => 'Your Order Placed Successfully']);
                        } else {
//                        return redirect('/shop')->with(['error' => 'Your Card Item is Empty']);
                        }



                        Cart::instance('default')->destroy();
                        session()->forget('coupon');
                        session()->flash('success', 'Your Order Placed Successfully');
                        return [
                            "status" => true,
                            "data" => [],
                            "errors" => [],
                            "message" => "Successfully added"
                        ];
                    } else {
                        $message_text = 'There were some issue with the payment. Please try again later.';
                        $msg_type = "error_msg";

                        if ($tresponse->getErrors() != null) {
                            $message_text = $tresponse->getErrors()[0]->getErrorText();
                            $msg_type = "error_msg";
                        }
                        return [
                            "status" => false,
                            "data" => [],
                            "errors" => [],
                            "message" => $message_text
                        ];
                    }
                }else {
                    $message_text = 'There were some issue with the payment. Please try again later.';
                    $msg_type = "error_msg";

                    $tresponse = $response->getTransactionResponse();

                    if ($tresponse != null && $tresponse->getErrors() != null) {
                        $message_text = $tresponse->getErrors()[0]->getErrorText();
                        $msg_type = "error_msg";
                    } else {
                        $message_text = $response->getMessages()->getMessage()[0]->getText();
                        $msg_type = "error_msg";
                    }
                    return [
                        "status" => false,
                        "data" => [],
                        "errors" => [],
                        "message" => $message_text
                    ];
                }
            }else {
                $message_text = "No response returned";
                $msg_type = "error_msg";
                return [
                    "status" => false,
                    "data" => [],
                    "errors" => [],
                    "message" => $message_text
                ];
            }


        }catch (\Exception $ex){
            return [
                "status" => false,
                "data" => [],
                "errors" => [],
                "message" => $ex->getMessage()
            ];
        }
    }

    

    protected function productsAreNoLongerAvailable()
    {
        foreach (Cart::content() as $item) {
            $product = Product::find($item->model->id);
            if ($product->product_qty < $item->qty) {
                return true;
            }
        }

        return false;
    }


    private function validateCoupon($couponCode, $subtotal){
        $isValidCoupon = false;
        $couponError = false;
        $discount = 0;

        if ($couponCode != null || $couponCode != ''){

            $userId = 0;

            if (Auth::check()){
                $userId = Auth::user()->customers->id;
            }
            $coupon = Coupon::where('code', $couponCode)->whereStatus(1)->first();
//            print_r($coupon);
//            echo "asd";
            if ($coupon != null){
                if($coupon->expiration_date != null && $coupon->expiration_date <= date('Y-m-d')){
                    $couponError = true;
                }

                if($coupon->customer_id != null){
                    $customers = explode(',' , $coupon->customer_id);
                    if (!in_array($userId, $customers)){
                        $couponError = true;
                    }
                }
                /*  Usage: In case of specific customers */
                if ($coupon->customer_id != null && $coupon->usage == 0){
                    $couponError = true;
                }
                if ($coupon->usage === $coupon->used){
                    $couponError = true;
                }

            }else{
                $couponError = true;
            }
        }else{
            $couponError = true;
        }

        if ($couponError == false){
            if ($coupon->type == 'value'){
                $discount = $coupon->value;
            }else{
                $discount = ($subtotal /100) * $coupon->value;
            }
            $isValidCoupon = true;
        }

        return array('isValidCoupon' => $isValidCoupon, 'discount' => $discount);

    }

    private function decreaseCouponUsage($couponCode){
        $coupon = Coupon::where('code', $couponCode)->whereStatus(1)->first();

        if ($coupon != null){
            $used = $coupon->used;
            $coupon->used = $used +1;
            $coupon->save();
        }
    }
}
