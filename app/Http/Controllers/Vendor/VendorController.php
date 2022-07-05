<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Customers;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;

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
        
        $customer = Customers::where('user_id',$user->id)->first();
        
        return view('vendor.product.editVendor',compact(['user',$user,'customer',$customer]));
    }


    public function vendorUpdate(Request $request,$id)
    {
        
        $user = User::find($id);
        $user->name = $request->input('first_name')." " . $request->input('last_name');;
        

        $user->email = $request->input('account_email');

        if($request->input('password_current')){
            $request->validate([
                'password_current' => 'required',
                
              ]);
      
            if (!Hash::check($request->password_current, $user->password)) {
                return ('Current password does not match!');
            }
            $user->password = Hash::make($request->password_1);
        }
        $user->save();
      
        $customer = Customers::where('user_id',$id)->first();
        
        $customer->first_name = $request->input('first_name');
        
        $customer->last_name = $request->input('last_name');
        $customer->email = $request->input('account_email');
       
        $customer->save();
       
        return back()->with(['success' => 'Updated Successfully']);
    }
}
