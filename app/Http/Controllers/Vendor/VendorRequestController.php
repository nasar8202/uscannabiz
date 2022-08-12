<?php

namespace App\Http\Controllers\Vendor;

use Validator;
use Illuminate\Http\Request;
use App\Models\VendorRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Customers;
class VendorRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all());
        $validator = Validator::make($request->all(), array(
            'full_name' => 'required',
            'phone_num' => 'required',
            'email' => 'required',
            ));
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else{
            // $user =  User::save([
            //     'name' => $request->input('first_name'),
            //     'email' => $request->input('email'),
            //     'password' => Hash::make($request->input('first_name')),
            //     'role_id' => 4,
            // ]);

            $product = Product::where('id',$request->input('product_id'))->first();

            $pro = $product->product_qty;
            $qty = $request->input('quantity');

            if($qty < $pro){
                $vendor = new VendorRequest;
                $vendor->product_id = $request->input('product_id');
                $vendor->vendor_id = $request->input('vendor_id');
                $vendor->full_name = $request->input('full_name');
                $vendor->phone_num = $request->input('phone_num');
                $vendor->email = $request->input('email');
                $vendor->address = $request->input('add_note');
                $vendor->city ="city";
                $vendor->quantity = $request->input('quantity');
                $auth = Auth::user();
                if(isset($auth) && $auth->role_id == 2){
                    $vendor->customer_id = $auth->id;
                }
                $vendor->save();
                $product = Product::where('id',$request->input('product_id'))->first();
                //$vendor = Customer::where('id',$request->input('vendor_id'))->first();
                $details = [
                    'name'=> $request->full_name,
                    'email' => $request->input('email'),
                    'phone_num' => $request->input('phone_num'),
                    'city' => $request->input('city'),
                    'quantity' => $request->input('quantity'),
                    'address'=>  $request->input('address'),
                    'product_name'=>$product->product_name,
                    'sku'=>$product->sku
                ];
                $vendor = Customers::where('user_id',$request->input('vendor_id'))->first();
                $broker = Customers::where('user_id',$product->vender_id)->first();
                $broker_email = Customers::where('id',$broker->broker_request_id)->first();

                if($request->input('vendor_id') != 1){
                $usersArray = [$request->input('email'), $vendor->email,$broker_email->email??''];
                foreach($usersArray as $user){
                    //echo $user;
                    \Mail::to($user)->send(new \App\Mail\SendEmailAdminCustomerBroker($details));

                }
                }else{
                    $usersArray = [$request->input('email')];
                    foreach($usersArray as $user){
                    //echo $user;
                    \Mail::to($user)->send(new \App\Mail\SendEmailAdminCustomerBroker($details));

                }
                }
                //return redirect()->route('order_thanks')->with('success',"Request Has Been Submited");
                // \Mail::to($request->input('email'))->send(new \App\Mail\SendEmailAdminCustomerBroker($details));
                 return redirect()->route('order_thanks')->with('success',"Request Has Been Submited");

            } else{
                return back()->with('error',"Only: {$pro} available in Stock");
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
