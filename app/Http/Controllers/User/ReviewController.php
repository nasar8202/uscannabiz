<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductReview;

class ReviewController extends Controller
{
    public function sendReview_customer(Request $request)
    {
        // dd($request->product_id);
        $reviews = new ProductReview;
        $reviews->product_id =$request->product_id;
        $reviews->customer_id = $request->input('user_id');
        $reviews->description = $request->input('review');
        $reviews->author = $request->input('name');
        $reviews->status = 0;
        $reviews->save();

        return back()->with('success_message','Review Submited Successfully');

    }
}
