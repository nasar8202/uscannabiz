<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CustomerWishlist;
use App\Models\OptionProduct;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\RelatedProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Visitor;
class ShopController extends Controller
{


    public function index()
    {
        $products = Product::query();
        $pagination = 9;

            // if (request()->category) {
            //     $products = $products->with('sub_category')->whereHas('sub_category', function ($query) {
            //         $query->where('category_slug', request()->category);
            //     });

            // }

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

        return view('front.shop.index',compact('products','categories','categories_for_div'));
    }
    public function productCategory($slug,$id)
    {
        $title = $slug;
        $products = Product::where('category_id',$id)->get();
        $productCount = Product::where('category_id',$id)->count();
        $categories = Category::where('status',1)->with('products')->first();
        return view('front.shop.show',compact('products','categories','productCount','title'));
    }
    public function show($slug)
    {
         $product = Product::where('slug', $slug)->with('product_images','products_attributes','products_attributes.attribute','products_options')->firstOrFail();
        $options = [];
        foreach($product->products_options as  $option){
            if(!isset($options[$option->option_id])){
                $options[$option->option_id] = [
                    "name" => $option->option->option_name,
                    "options" => [],
                ];
            }
            array_push($options[$option->option_id]['options'], $option->option_val[0]);
        }
//        $product_options = OptionProduct::where('product_id',$product->id)->with('option_val')->groupby('option_id')->get();
//
//        dd($options);
            \DB::table('products')
            ->where('id', $product->id)
            ->increment('view', 1);

        $mightAlsoLike = RelatedProduct::with('products')->where('product_id', $product->id)->inRandomOrder()->take(4)->get();

        /*
         * If related products are not added and you want to show other than related products then uncomment below condition*/
        /*if(count($mightAlsoLike) < 1){
            $mightAlsoLike = Product::where('slug', '!=', $slug)->mightAlsoLike()->get();
        }*/

        if ($product->product_qty > 0) {
            $stockLevel = '<div class="badge badge-success">In Stock</div>';
        } else {
            $stockLevel = '<div class="badge badge-danger">Not available</div>';
        }
        $productReviews = ProductReview::with('customer')->where('status', 1)->where('product_id', $product->id)->get();
        // dd($product->id);
        $categories = Category::where(['status'=>1,'id' => $product->id])->with('products')->first();
        //return $categories;
        return view('front.shop.showProduct')->with([
            'product' => $product,
            'stockLevel' => $stockLevel,
            'mightAlsoLike' => $mightAlsoLike,
            'options' => $options,
            'categories'=>$categories,
            'productReviews' =>$productReviews
        ]);
    }

    public function checkProductPrice(Request $request)
    {

       $product = Product::find($request->product_id);
       $price = OptionProduct::where('product_id',$product->id)->where('option_val_id',$request->product_option_id)->value('price');

       return $price+$product->product_current_price;
    }

    public function addReview(Request $request){
        // dd($request->all());
        try{
            // if($request->method() == 'POST'){
                $user_id = 0;
                $json = array();
                if(Auth::check()){
                    $user_id = Auth::id();
                    // dd($user_id);
                }
                // if ((strlen($request->name) < 3) || (strlen($request->name) > 25)) {
                //     $json['error'] = "Warning: Review Name must be between 3 and 25 characters!";
                // }

                // if ((strlen($request->text) < 25) || (strlen($request->text) > 1000)) {
                //     $json['error'] = "Warning: Review Text must be between 25 and 1000 characters!";
                // }

                // if (!isset($request->rating) || $request->rating < 0 || $request->rating > 5) {
                //     $json['error'] = "Warning: Please select a review rating!";
                // }


                // if(!isset($json['error'])){
                    $product_review = new ProductReview;
                    $product_review->product_id = $request->product_id;
                    $product_review->customer_id = $user_id;
                    $product_review->author = $request->name;
                    $product_review->description = $request->text;
                    $product_review->rating = $request->rating;
                    $product_review->status = 0;
                    $product_review->save();
                    // ProductReview::insert([
                    //     'product_id' => $request->product_id,
                    //     'customer_id' => $user_id,
                    //     'author' => $request->name,
                    //     'description' => $request->text,
                    //     'rating' => $request->rating,
                    //     'status' => 0
                    // ]);
                    // $json['success'] = "Thank you for your review. It has been submitted to the webmaster for approval.";
                // }

                // return $json;
                return back()->with('success','Review Submitted Successfully');
            // }

        }catch(\Exception $ex) {
            return redirect()->back();
        }
    }

    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required|min:3',
        ]);

        $query = $request->input('query');

        $products = Product::where('product_name',$query)->paginate(12);
        $categories = Category::where('status',1)->get();
        return view('front.search-result',compact('products','categories'));

    }

    public function view_wishlist(){
        $products = CustomerWishlist::where('customer_id', Auth::id())->with('product')->get();
        // dd($products);
        return view('front.wishlist', compact('products'));
    }


    public function add_wishlist(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
            "product_id" => "required",
            "customer_id" => "required",
        ]);
        if ($validator->fails()) {
            return [
                "status" => false,
                "message" => "Unfortunately wishlist not added.",
                "errors" => $validator->messages()
            ];
        }
        if(isset($data['remove']) && $data['remove'] == 1){
            CustomerWishlist::where('id', $data['wishlist_id'])->delete();
            return [
                "status" => true,
                "message" => "Wishlist removed Successfully!",
                "errors" => []
            ];
        }

        $data = CustomerWishlist::create([
            "product_id" => $data['product_id'],
            "customer_id" => $data['customer_id'],
        ]);

        return [
            "status" => true,
            "message" => "Wishlist Added Successfully!",
            "errors" => [],
            "data" => $data
        ];

    }




}
