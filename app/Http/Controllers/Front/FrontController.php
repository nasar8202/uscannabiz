<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\NewsLetter;
use App\Models\Collection;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function Register()
    {
        dd($request->all());
        return view('front.loginRegisterVendor');
    }
    public function loginRegisterVendor()
    {
        return view('front.loginRegisterVendor');
    }
    public function index(Request $request)
    {
        $products = Product::with('whishlist')->where('status',1)
            ->orderBy('id', 'desc')->take(4)
            ->get();
        $featuredProducts = Product::with('whishlist')->where('status',1)
            ->where('product_type', 'Feature')
            ->orderBy('id', 'desc')->take(10)
            ->get();
        $blogs = Blog::where('status','active')->get();
        $collections = Collection::with(['collectionProducts', 'collectionProducts.products'])->orderBy('id','asc')->get();
        return view('front.index',compact('products', 'featuredProducts','blogs','collections'));
    }
    /*
     * Newsletter Subscription */
    public function subscribeNewsletter(Request $request){
        try{
            if($request->method() == 'POST'){
                $email = $request->email;
                $json = array('status' => false);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $json['error'] = "Error: Invalid email format";
                }

                if(empty($email) || $email == null || $email == ''){
                    $json['error'] = "Error: Please type correct email address";
                }

                $alreadyExists = NewsLetter::where('email', $email)->first();
                if(!empty($alreadyExists) > 0){
                    $json['error'] = "Error: You have already subscribed";
                }
                if(!isset($json['error'])){
                    NewsLetter::create([
                        'email' => $email,
                        'status' => 1
                    ]);
                    $json['status'] = true;
                    $json["success"] =  "Success: You Have Successfully Subscribed";
                }
                return $json;
            }
        }catch (\Exception $ex){
            $json = array();
            $json['status'] = false;
            $json['error'] = "Whoops!! Something went wrong ";
            return $json;
        }
    }
}
