<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\Order;
use App\User;
use Illuminate\Http\Request;
use Validator;
use DB;
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

    $user = User::join('customers','users.customers_id','=','customers.id')->where(['role_id'=>4])->get();
        try {

            if (request()->ajax()) {
                return datatables()->of($user)
                    ->addIndexColumn()
                    ->addColumn('action', function ($data) {
                        return '<a title="View" href="customers/' . $data->id . '"
                        class="btn btn-dark btn-sm"><i class="fas fa-eye"></i></a>&nbsp;
                        <a title="edit" href="customers/' . $data->id . '/edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                        &nbsp;<button title="Delete" type="button" name="delete" id="' . $data->id . '"
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
        $customer->broker_percentage = $request->input('broker_percentage');
        // $customer->user_id = $request->input('user_id');
        // $customer->user_id = $request->input('user_id');
        $customer->save();
        $customer_id = $customer->id;

        $user = new User;
        $user->name = $request->input('first_name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('first_name'));
        $user->role_id = 4;
        $user->customers_id = $customer_id;
        $user->save();

        $customer_user = Customers::find($customer_id);
        $customer_user->user_id = $user->id;
        $customer_user->save();

        // $user =  User::create([
        //     'name' => $request->input('first_name'),
        //     'email' => $request->input('email'),
        //     'password' => Hash::make($request->input('first_name')),
        //     'role_id' => 4,
        //     'customer_id'=>$customer_id,
        // ]);
        $details = [
            'name'=> $request->first_name." ".$request->last_name,
            'email' => $request->email,
            'password'=> $request->first_name
        ];

        \Mail::to($request->input('email'))->send(new \App\Mail\SendEmailVendorRegistration($details));

        //dd("Email is Sent.");
        return redirect()->back()->with('success',"customer added We have Sent you password on email");

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
            // $user =  User::save([
            //     'name' => $request->input('first_name'),
            //     'email' => $request->input('email'),
            //     'password' => Hash::make($request->input('first_name')),
            //     'role_id' => 4,
            // ]);

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
        $customer->user_id = $request->input('user_id');
        
        $customer->broker_percentage = $request->input('broker_percentage');
        $customer->save();

        $customer_id = $customer->id;

        $user =  User::where('customers_id','=',$customer_id)->first();

        $user->name = $request->input('first_name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('first_name'));
        $user->role_id = 4;
        $user->customers_id = $customer_id;
        $user->save();
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
        $users=User::find($id);
        

        $customers = Customers::where('email','=',$users->email)->delete();

        if(!empty($users) ){

            $users->delete();

            echo 1;
        }else{echo 2;}
    }

    public function customerRequest()
    {
        try {
            if (request()->ajax()) {
                return datatables()->of(User::where('role_id','=',2)->where('status',0)->get())
                    ->addIndexColumn()
                    
                    ->addColumn('status', function ($data) {
                        if ($data->status == 0) {
                            return '<label>Pending</label>';
                        } else {
                            return '<label>Accept</label>';
                        }
                    })
                    ->addColumn('action', function ($data) {
                        return '<a title="Approve" href="customerStatusAccept/' . $data->id . '" 
                         class="btn btn-success btn-sm">Approve &nbsp;<i class="fa fa-check"></i></a>&nbsp;';
                
                    })->rawColumns(['status',  'action'])->make(true);
            }
        } catch (\Exception $ex) {
            return redirect('/')->with('error', 'SomeThing Went Wrong baby');
        }
       
        
        // try {
            
        //     // $check =Customers::join('Users','Users.email','=','Customers.email')->where('role_id','=',2)->where('status',0)->get();
        //     //  dd($check);
        //     if (request()->ajax()) {
        //         // dd(User::where('role_id','=',2)->where('status',0)->get());
        //         // return datatables()->of(Customers::join('Users','Users.id' ,'=' ,'Customers.user_id')->where('role_id','=',3)->get())
        //         return datatables()->of(User::where('role_id','=',2)->where('status',0)->get()
        //         )
                    
        //             ->addColumn('action', function ($data) {
        //                 // return $data->user_id;
        //                 return '
        //                 <a title="Approve" href="customerStatusAccept/' . $data->id . '" 
        //                 class="btn btn-success btn-sm">Approve &nbsp;<i class="fa fa-check"></i></a>&nbsp;';


        //             })->rawColumns(['status','action'])->make(true);
        //             // return '<a title="View" href="customerStatusReject/'  . $data->id . '" 
        //             //     class="btn btn-danger btn-sm"><i class="fa fa-times" aria-hidden="true"></i></a>&nbsp;
        //             //     <a title="View" href="customerStatusAccept/' . $data->id . '" 
        //             //     class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>&nbsp;';
        //     }
        // } catch (\Exception $ex) {
        //     return redirect('/')->with('error', $ex->getMessage());
        // }
        return view('admin.customerRequest.customerRequest');
    }


    public function customerStatus($id)
    {
            
        // $customer =Customers::join('Users','Users.email','=','Customers.email')->where('role_id','=',2)->where('Customers.user_id',$id)->first();
        
        $customer =Customers::where('user_id',$id)->first();
           
         $data_status = array(
            'status'=>1
         );
         
            $customer->update($data_status);
        
        
            return back()->with('success','Customer Approved Successfully');
    }
    public function customerStatusReject($id)
    {
            
        // $customer =Customers::join('Users','Users.email','=','Customers.email')->where('role_id','=',2)->where('Customers.user_id',$id)->first();
        
        $customer =Customers::where('user_id',$id)->first();
           
         $data_status = array(
            'status'=>2
         );
         
            $customer->update($data_status);
        
        
            return back()->with('success','Customer Rejected Successfully');
    }

}
