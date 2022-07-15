<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Models\Settings;
use App\Models\ShippingRate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{

    public function index(Request $request){

        try{

            if($request->method() == 'POST'){

                $content = Settings::find(1);

                //image uploading
                if ($request->file('logo')) {
                    $image = time() . '.' . $request->file('logo')->extension();
                    //$path = $request->file('logo')->storeAs('upload/settings', $image);
                    $request->file('logo')->move(public_path().'/uploads/settings/',$image);
                    $imageName = $image;
                    $content->logo = $imageName ?? '';
                }


                $content->site_title = $request->site_title;
                $content->company_name = $request->company_name;
                $content->shipping_rate = $request->shipping_rate;
                $content->email = $request->email;
         
                $content->phone_no_1 = $request->phone_no_1;
                $content->phone_no_2 = $request->phone_no_2;
                $content->address = $request->address;
                $content->facebook = $request->facebook;
                $content->tweeter = $request->tweeter;
                $content->linkedIn = $request->LinkedIn;
                $content->instagram = $request->instagram;

               if($content->save()){
                   return redirect('/admin/settings')->with('success','Settings Update Successfully');
               }
            }else {
                $content = Settings::findOrfail(1);
                $shippingRates = ShippingRate::where('status',1)->get();

                return view('admin.settings.edit', compact('content','shippingRates'));
            }
        }
        catch(\Exception $ex){
            return redirect('admin/dashboard')->with('error',$ex->getMessage());

        }
    }
    public function changePassword()
    {
        return view('admin.auth.change-password');
    }

    public function updateAdminPassword(Request $request)
    {
        // dd($request->all());
        $id = Auth::user()->id;

        if ($request->input('password')) {

            // $this->validate($request, [
            //     'current_password' => 'required',
            //     'password' => 'required|min:8',
            //     'password_confirmation' => 'required|min:8|same:password',
            // ]);

            $validator = Validator::make($request->all(), [
                'current_password' => 'required',
                'password' => 'required|min:8',
                'password_confirmation' => 'required|min:8|same:password',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }

            if (Hash::check($request->current_password, Auth::User()->password)) {
                $content = User::find($id);
                $content->password = Hash::make($request->password);
                if ($content->save()) {
                    return redirect('/admin/dashboard')->with('success', 'Password Update Successfully.');
                }
            }else{
                return back()->withErrors(['Sorry, your current Password not recognized. Please try again.']);
            }
        } else {
            $content['record'] = User::find($id);

            return view('admin.auth.change-password')->with($content);
        }

    }

}
