<?php

namespace App\Http\Controllers\Vendor;

use App\Models\VendorRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
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
        $validator = Validator::make($request->all(), array(
            'full_name' => 'required',
            'phone_num' => 'required',
            'email' => 'required',
            'address' => 'required',
            'city' => 'required',
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

        $vendor = new VendorRequest;
        $vendor->product_id = $request->input('product_id');
        $vendor->vendor_id = $request->input('vendor_id'); 
        $vendor->full_name = $request->input('full_name'); 
        $vendor->phone_num = $request->input('phone_num'); 
        $vendor->email = $request->input('email'); 
        $vendor->address = $request->input('address'); 
        $vendor->city = $request->input('city');
        $vendor->save();

        
        return redirect()->back()->with('success',"Request Has Been Submited");
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
