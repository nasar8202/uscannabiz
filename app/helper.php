<?php

use Carbon\Carbon;
use App\Models\Product;

function presentPrice($price)
{
    try {
        return '$' . number_format($price);
    } catch (Exception $ex){
        return '$' . $price;
    }

}

function presentDate($date)
{
    return Carbon::parse($date)->format('M d, Y');
}

function GetProducts()
{
    $products = Product::where(['status'=>1,'approvel_admin_status'=>1])->where('product_qty','!=',0)->get();
    return $products;
}
function setActiveCategory($category, $output = 'active')
{
    return request()->category == $category ? $output : '';
}

function productImage($path)
{
    return $path && file_exists('uploads/products/' . $path) ? asset('uploads/products/' . $path) : asset('admin/images/placeholder.png');
}

function userProfilePicture($path)
{
    return $path && file_exists('uploads/user/' . $path) ? asset('uploads/user/' . $path) : asset('images/user.jpg');
}

function manufacturerImage($path)
{
    return $path && file_exists('uploads/manufacturer/' . $path) ? asset('uploads/manufacturer/' . $path) : asset('admin/images/placeholder.png');
}

function getNumbers()
{
    $tax = config('cart.tax') / 100;
    $discount = session()->get('coupon')['discount'] ?? 0;
    $code = session()->get('coupon')['name'] ?? null;
    $newSubtotal = (Cart::subtotal() - $discount);
    if ($newSubtotal < 0) {
        $newSubtotal = 0;
    }
    $newTax = $newSubtotal * $tax;
    $newTotal = $newSubtotal * (1 + $tax);

    return collect([
        'tax' => $tax,
        'discount' => $discount,
        'code' => $code,
        'newSubtotal' => $newSubtotal,
        'newTax' => $newTax,
        'newTotal' => $newTotal,
    ]);
}

function getStockLevel($quantity)
{
    if ($quantity > setting('site.stock_threshold', 5)) {
        $stockLevel = '<div class="badge badge-success">In Stock</div>';
    } elseif ($quantity <= setting('site.stock_threshold', 5) && $quantity > 0) {
        $stockLevel = '<div class="badge badge-warning">Low Stock</div>';
    } else {
        $stockLevel = '<div class="badge badge-danger">Not available</div>';
    }

    return $stockLevel;
}

