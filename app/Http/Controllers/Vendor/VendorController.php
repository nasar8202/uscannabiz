<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Customers;
use App\User;
class VendorController extends Controller
{
    public function dashboard()
    {
        return view('vendor.dashboard');
    }
    public function vendorEdit()
    {
        $user_vendor = Auth::user()->id;
        $user = User::find($user_vendor);
        
        return view('vendor.product.editVendor',compact(['user',$user]));
    }
    public function vendorUpdate(Request $request,$id)
    {
        
        $user = User::find($id);
        $user->name = $request->input('full_name');
        $user->email = $request->input('account_email');
        $user->save();
       
        $customer = Customers::where('user_id',$id)->first();
        
        $customer->first_name = $request->input('full_name');
        
        $customer->last_name = $request->input('last_name');
        $customer->email = $request->input('account_email');
        $customer->save();
       
        return back()->with(['success' => 'Updated Successfully']);
    }
}
