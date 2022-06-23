<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;
use App\Models\ShippingRate;
use App\User;
class PaymentGatewayController extends Controller
{
    public function index(Request $request){

        try{

            if($request->method() == 'POST'){
                $content = Settings::find(1);
                
                // paypall
                $content->paypal_env = $request->paypal_env;
                $content->paypal_client_id = $request->paypal_client_id;
                $content->paypal_secret_key = $request->paypal_secret_key;
                // stripe
                $content->stripe_env = $request->stripe_env;
                $content->stripe_publishable_key = $request->stripe_publishable_key;
                $content->stripe_secret_key = $request->stripe_secret_key;
                // authorize.net
                $content->authorize_env = $request->authorize_env;
                $content->authorize_merchant_login_id = $request->authorize_merchant_login_id;
                $content->authorize_merchant_transaction_key = $request->authorize_merchant_transaction_key;

               if($content->save()){
                   return redirect('/admin/paymentgatway')->with('success','paymentGateway Update Successfully');
               }
            }else {
                $content = Settings::findOrfail(1);
                $shippingRates = ShippingRate::where('status',1)->get();
                return view('admin.paymentGateway.edit', compact('content','shippingRates'));
            }
        }
        catch(\Exception $ex){
            return redirect('admin/dashboard')->with('error',$ex->getMessage());
        }
    }
}
