<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactUsController extends Controller
{

    public function index(Request $request)
    {
        if($request->method() == 'POST'){
            try{
                $setting = Settings::find(1);
                $mailData = array(
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'userMessage' => $request->input('message'),
                    'to' => 'shawntait@mailinator.com',
                );
                Mail::send('front.emails.contact-us', $mailData, function($message) use($mailData){
                    $message->to($mailData['to'])->subject('LaravelEcommerve - Contact Us');
                });

                return redirect()->back()->with(['msg' => 'Your Query Submitted.']);

            }catch (\Exception $ex){
                echo $ex->getMessage();exit;
            }
        }
        return view('front.contact-us');
    }

    public function faq(){
        $faq = Faq::get();
        return view('front.faq',compact('faq'));
    }

    public function aboutUs(){

        return view('front.about-us');
    }
}
