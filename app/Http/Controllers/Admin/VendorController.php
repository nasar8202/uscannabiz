<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customers;
use App\Models\Order;
use App\User;
use Validator;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Notifications\VendorApprovedNotificaton;
use App\Notifications\BrokerApprovedNotificaton;
class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = Customers::join('Users','Users.id' ,'=' ,'Customers.user_id')->where('role_id','=',3)

        // ->get();
        // dd($data);
        // // foreach($data as $item){

        // //     $role_id = $item->role_id;
        // // }
        // // echo $role_id;
        // die();
        // dd(Customers::join('Users','Users.email','=','Customers.email')
        // // ->join('Users','Users.email','=','Customers.email')
        // ->where('role_id','=',3)->get());
        try {

            if (request()->ajax()) {
                // return datatables()->of(Customers::join('Users','Users.id' ,'=' ,'Customers.user_id')->where('role_id','=',3)->get())
                return datatables()->of(User::where('role_id','=',3)->where('approvel_status',0)->get())
                    ->addIndexColumn()
                    ->addColumn('status', function ($data) {
                        if ($data->status == 0) {
                            return '<label>Pending</label>';
                        } else {
                            return '<label>Accept</label>';
                        }
                    })
                    ->addColumn('action', function ($data) {
                        return '<a title="Approve" href="vendorStatusAccept/' . $data->id . '"
                        class="btn btn-success btn-sm">Approve &nbsp;<i class="fa fa-check"></i></a>&nbsp;';

                    })->rawColumns(['status','action'])->make(true);

            }
        } catch (\Exception $ex) {
            return redirect('/')->with('error', $ex->getMessage());
        }
        return view('admin.vendor.index');
    }
    public function customerStatusAccept($id)
    {

        // $customer =Customers::join('Users','Users.email','=','Customers.email')->where('role_id','=',2)->where('Customers.user_id',$id)->first();

        $customer =User::where('role_id',$id)->first();
        $customer->approvel_status = 1;
        $customer->save();
        if($customer->approvel_status = 1)
        {
            $customer->notify(new VendorApprovedNotificaton());

        }


            return back()->with('success','Customer Approved Successfully');
    }

    public function brokerStatusAccept($id)
    {

        // $customer =Customers::join('Users','Users.email','=','Customers.email')->where('role_id','=',2)->where('Customers.user_id',$id)->first();

        $customer =User::where('role_id',$id)->first();
        $customer->approvel_status = 1;
        $customer->save();
        if($customer->approvel_status = 1)
        {
            $customer->notify(new BrokerApprovedNotificaton());

        }


            return back()->with('success','Customer Approved Successfully');
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
        //
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

           $content=Customers::where('user_id',$id)->first();

            return view('admin.vendor.show',compact(['content']));
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
    public function changeVendorStatus(Request $request)
    {
        //return $request->id;
           $data = array(
            'approvel_status'=>$request->val
           );
        $status = User::where('id',$request->id)->update($data);

        return response()->json(['success'=>'Status Updated Successfully']);

        // $product = Customers::where('id',$request->id);
        // $product->status = $request->val;
        // $product->save();
        // if($product->count() > 0){
            // return responce(['status' => $request->val]);
            // return 1;
        // }
    }
    public function vendorRequest()
    {

        try {
            $check =Customers::join('users','users.email','=','customers.email')->where('role_id','=',3)->where('broker_request','!=',null)->get();
            // dd($check);
            if (request()->ajax()) {
                // return datatables()->of(Customers::join('Users','Users.id' ,'=' ,'Customers.user_id')->where('role_id','=',3)->get())
                return datatables()->of(Customers::join('users','users.email','=','customers.email')->where('role_id','=',3)->where('broker_request','!=',null)->get())
                    ->addIndexColumn()
                    ->addColumn('status', function ($data) {
                        return '<a title="Approve" href="customerStatusAccept/' . $data->id . '"
                        class="btn btn-success btn-sm">Approve &nbsp;<i class="fa fa-check"></i></a>&nbsp;';
                    })
                    ->addColumn('action', function ($data) {
                        // return $data->user_id;
                        return '<a title="View" href="show_vendor_request/' . $data->id . '"
                        class="btn btn-dark btn-sm"><i class="fas fa-eye"></i></a>';
                        // return '<a title="View" href="show_vendor_request/' . $data->id . '"
                        // class="btn btn-dark btn-sm"><i class="fas fa-eye"></i></a>&nbsp;<a title="View" href="customers/' . $data->id . '"
                        // class="btn btn-danger btn-sm"><i class="fa fa-times" aria-hidden="true"></i></a>&nbsp;<a title="View" href="customers/' . $data->id . '"
                        // class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>&nbsp;';
                    })->rawColumns(['status','action'])->make(true);

            }
        } catch (\Exception $ex) {
            return redirect('/')->with('error', $ex->getMessage());
        }
        return view('admin.vendorRequest.vendorRequest');
    }

    public function show_vendor_request($id)
    {
        $vendor_id = $id;

        $customer_search = Customers::where('user_id',$id)->first();
        foreach($customer_search as $customers){
            $data_item = explode('|', $customer_search->broker_request);
            foreach($data_item as $data_items){
                $user_check[] = User::where('customers_id',$data_items)->get();
            }
        }
        $users = array_unique($user_check);


        return view('admin.vendorRequest.index',compact('users','vendor_id','customer_search'));
    }

    public function brokerAssignToVendor($id,$vendor_id)
    {
        $assigned_broker = Customers::find($id);
        $check_user_id = Customers::where('user_id',$vendor_id)->first();
        if($check_user_id->broker_request_id != null){
            return back()->with('error','You Have Already Assigned Broker');
        }
        else{
            // dd($check_user_id->broker_request_id,$id);
            $check_user_id->broker_request_id = $id;
            $check_user_id->save();
            return back()->with('success','Broker Assigned Successfully');
        }
        // $customer = Customers::where('user_id',$vendor_id)->first();
        // // dd($customer);
        // $customer->broker_request_id = $id;
        // $customer->save();

        // return back()->with('success','Broker Assigned Successfully');
    }
    public function brokerCancleToVendor($id,$vendor_id)
    {
        $customer = Customers::where('user_id',$vendor_id)->first();
        $customer->broker_request_id = null;
        $customer->save();

        return back()->with('success','Broker Cancle Successfully');
    }

}


