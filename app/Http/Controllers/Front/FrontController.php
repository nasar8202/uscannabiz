<?php

namespace App\Http\Controllers\Front;

use App\User;
use App\Models\Blog;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customers;
use App\Models\Collection;
use App\Models\NewsLetter;
use App\Models\VendorStore;
use App\Models\Manufacturer;
use Illuminate\Http\Request;

use App\Models\OptionProduct;
use App\Jobs\SendEmailVendorJob;
use App\Models\CustomerWishlist;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class FrontController extends Controller
{
    // public function Register()
    // {
    //     dd($request->all());
    //     return view('front.loginRegisterVendor');
    // }
    public function loginRegisterVendor()
    {
        // return "abc";
        return view('front.loginRegisterVendor');
    }

    public function resetPasswordLink()
    {
        return view('front.email');
    }
    public function registerVendorAndCustomer(Request $request)
    {
        // dd($request->all());
            // $userData = new User();
            // $userData['name'] = $request->fname." ".$request->lname;
            // $userData['email'] = $request->email;
            // $userData['password'] = Hash::make($request->password);

            // $customerData = new Customers();
            // $customerData['first_name'] = $request->fname;
            // $customerData['last_name'] = $request->lname;
            // $customerData['phone_no'] = $request->phone;
            // $customerData['email'] = $request->email;

            $validator = Validator::make($request->all(), [
                'email' => 'required|unique:users,email',
                'password' => 'required',
                'confirm_password' => 'required|same:password',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }


        if($request->role == 2)
        {
            $user =  User::create([
                'name' => $request->fname." ".$request->lname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => 2,
            ]);

            Customers::create([
                'user_id' => $user->id,
                'first_name' => $request->fname,
                'last_name' => $request->lname,
                'phone_no' => $request->phone,
                'email' => $request->email,
                'status'=>0
            ]);
            // $details = [
            //     'name'=> $request->fname." ".$request->lname,
            //     'email' => $request->email,
            //     'password'=> $request->password
            // ];

            // \Mail::to($request->input('email'))->send(new \App\Mail\SendEmailCustomerRegistration($details));
            return redirect()->back()->with(['success' => 'Register Successfully']);

        }
        if($request->role == 4)
        {
            $user =  User::create([
                'name' => $request->fname." ".$request->lname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => 4,
            ]);

            $customer = Customers::create([
                'user_id' => $user->id,
                'first_name' => $request->fname,
                'last_name' => $request->lname,
                'phone_no' => $request->phone,
                'email' => $request->email,
                'city' => $request->city,
                'state' => $request->state,
                'country' => $request->country,
                'address' => $request->address,
                'status'=>0
            ]);
            $find_user = User::find($user->id);
            $find_user->customers_id = $customer->id;
            $find_user->save();
            
            // $details = [
            //     'name'=> $request->fname." ".$request->lname,
            //     'email' => $request->email,
            //     'password'=> $request->password
            // ];

            // \Mail::to($request->input('email'))->send(new \App\Mail\SendEmailCustomerRegistration($details));
            return redirect()->back()->with(['success' => 'Register Successfully']);

        }
        else{
            $user =  User::create([
                'name' => $request->fname." ".$request->lname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => 3,
            ]);

            $customer = Customers::create([
                'user_id' => $user->id,
                'first_name' => $request->fname,
                'last_name' => $request->lname,
                'phone_no' => $request->phone,
                'email' => $request->email,
                'city' => $request->city,
                'state' => $request->state,
                'country' => $request->country,
                'address' => $request->address,

            ]);

            $customer_id = $customer->id;

            VendorStore::create([
                'vendor_id'=>$customer_id,
                'store_name'=>$request->store_name,
                'store_url'=>$request->store_url
            ]);
            // $userData['role_id'] = 3;
            // $user = User::create([$userData]);
            // $user_id = $user->id;
            // $details['email'] =$request->email;

            // dispatch(new App\Jobs\SendEmailJob($details));
            // SendEmailVendorJob::dispatch($details);
            // dd('done');


            // Customers::create([$customerData]);
            // return $user;
            // $details = [
            //     'name'=> $request->fname." ".$request->lname,
            //     'email' => $request->email,
            //     'password'=> $request->password
            // ];
            // \Mail::to($request->input('email'))->send(new \App\Mail\SendEmailCustomerRegistration($details));
            return redirect()->back()->with(['success' => 'Register Successfully']);
        }

    }
    public function index(Request $request)
    {
        // $products = Product::with('whishlist')->where('status',1)
        //     ->orderBy('id', 'desc')->take(4)
        //     ->get();
        // $featuredProducts = Product::with('whishlist')->where('status',1)
        //     ->where('product_type', 'Feature')
        //     ->orderBy('id', 'desc')->take(10)
        //     ->get();
        // $blogs = Blog::where('status','active')->get();
        // $collections = Collection::with(['collectionProducts', 'collectionProducts.products'])->orderBy('id','asc')->get();
        // return view('front.index',compact('products', 'featuredProducts','blogs','collections'));
        $products = Product::query();
        $pagination = 9;

            // if (request()->category) {
            //     $products = $products->with('sub_category')->whereHas('sub_category', function ($query) {
            //         $query->where('category_slug', request()->category);
            //     });

            // }
                $producttype = Product::where('product_type',"feature")->get();
                // dd($producttype);
          if (request()->sort == 'low_high') {
              $products = $products->orderBy('product_current_price');
          } elseif (request()->sort == 'high_low') {
              $products = $products->orderBy('product_current_price', 'desc');
          }

            $products = $products->where('status',1)->get();

        $categories_for_div = Category::where('status',1)->get();
        $categories = Category::where('status',1)->with('products')->get();
        // return $categories;
        // die;
        return view('front.shop.index',compact('products','categories','categories_for_div','producttype'));
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
