<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('vendor.product.index');
    }
    public function addProductForm()
    {
        return view('Vendor.product.addProductForm');
    }
}
