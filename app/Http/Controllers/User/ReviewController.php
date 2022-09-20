<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductReview;

use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function sendReview_customer(Request $request)
    {

        // dd($request->product_id);
        $validator = Validator::make($request->all(), [
            'review' => 'required',
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
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
