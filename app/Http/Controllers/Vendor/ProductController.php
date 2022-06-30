<?php

namespace App\Http\Controllers\Vendor;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        return view('vendor.product.index');
    }
    public function addProductForm()
    {
        $categories = Category::get();
        return view('Vendor.product.addProductForm',compact('categories'));
    }
    public function addProduct(Request $request)
    {
        dd($request->all());
    }
}
