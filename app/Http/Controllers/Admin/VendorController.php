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

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Customers::join('Users','Users.id' ,'=' ,'Customers.user_id')
        
        ->get();
        foreach($data as $item){
             echo($item->role_id); 
        }
        die();
        
        try {
            
            if (request()->ajax()) {
                return datatables()->of(User::where('role_id','=',3)->get())
                    ->addIndexColumn()
                    ->addColumn('status', function ($data) {
                        if($data->status == 0){
                            return '<label class="switch"><input type="checkbox"  data-id="'.$data->id.'" data-val=0  id="status-switch"><span class="slider round"></span></label>';
                        }else{
                            return '<label class="switch"><input type="checkbox" checked data-id="'.$data->id.'" data-val=1  id="status-switch"><span class="slider round"></span></label>';
                        }
                    })
                    ->addColumn('action', function ($data) {
                        return '<a title="View" href="customers/' . $data->id . '" 
                        class="btn btn-dark btn-sm"><i class="fas fa-eye"></i></a>&nbsp;
                        <a title="edit" href="customers/' . $data->id . '/edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>&nbsp;
                        <button title="Delete" type="button" name="delete" id="' . $data->id . '" 
                        class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
                    })->rawColumns(['status','action'])->make(true);
                    
            }
        } catch (\Exception $ex) {
            return redirect('/')->with('error', $ex->getMessage());
        }
        return view('admin.vendor.index');
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
    public function changeVendorStatus(Request $request)
    {
        $find = $request->id;
        $status = Customers::find($find);
        $status->status = $request->val;
        $status->save();
        return response()->json(['success'=>'Status Updated Successfully']);
 
        // $product = Customers::where('id',$request->id);
        // $product->status = $request->val;
        // $product->save();
        // if($product->count() > 0){
            // return responce(['status' => $request->val]);
            // return 1;
        // }
    }
}
