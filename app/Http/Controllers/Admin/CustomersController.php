<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\Order;
use App\User;
use Illuminate\Http\Request;
use Validator;

use Illuminate\Support\Facades\Hash;
use Auth;
class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    final public function index()
    {
    //    dd(User::all());
    
    
        try {
            
            if (request()->ajax()) {
                return datatables()->of(Customers::all())
                    ->addIndexColumn()
                    ->addColumn('action', function ($data) {
                        return '<a title="View" href="customers/' . $data->id . '" 
                        class="btn btn-dark btn-sm"><i class="fas fa-eye"></i></a>&nbsp;
                        <a title="edit" href="customers/' . $data->id . '/edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>&nbsp;
                        <button title="Delete" type="button" name="delete" id="' . $data->id . '" 
                        class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
                    })->rawColumns(['action'])->make(true);
                    
            }
        } catch (\Exception $ex) {
            return redirect('/')->with('error', $ex->getMessage());
        }
        return view('admin.customers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'address' => 'required',
        ));
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else{
            $user =  User::create([
                'name' => $request->input('first_name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('first_name')),
                'role_id' => 4,
            ]);

        $customer = new Customers;
        $customer->first_name = $request->input('first_name');
        $customer->last_name = $request->input('last_name'); 
        $customer->email = $request->input('email'); 
        $customer->phone_no = $request->input('phone'); 
        $customer->city = $request->input('city'); 
        $customer->state = $request->input('state'); 
        $customer->country = $request->input('country');
        $customer->address = $request->input('address');  
        $customer->user_id = $request->input('user_id');
        $customer->save();
        return redirect()->back()->with('success',"customer Inserted");
        
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
       try{
           $content=Customers::find($id);
           $customerOrders = Order::where('customer_id', $id)->with('orderItems', 'customer', 'orderItems.product')->get();
        //    dd($customerOrders);
            return view('admin.customers.show',compact(['content','customerOrders']));
       }
       catch(\Exception $ex){
           return redirect ('admin/customers')->with('error',$ex->getMessage());
       }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = customers::findOrFail($id);
        return view('admin.customers.update')->with('customer',$customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), array(
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'address' => 'required',
        ));
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else{
        $id = $request->id;
        $customer = Customers::find($id);
        $customer->first_name = $request->input('first_name');
        $customer->last_name = $request->input('last_name'); 
        $customer->email = $request->input('email'); 
        $customer->phone_no = $request->input('phone'); 
        $customer->city = $request->input('city'); 
        $customer->state = $request->input('state'); 
        $customer->country = $request->input('country');
        $customer->address = $request->input('address');  
        $customer->user_id = Auth::user()->id;
        $customer->save();
        return back()->with('success','Customer Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $content=Customers::find($id);
        if(!empty($content) ){
            $content->delete();
            echo 1;
        }else{echo 2;}
    }
}
