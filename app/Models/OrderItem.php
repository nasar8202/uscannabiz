<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';
    protected $fillable = [
        'order_id','product_id','variant_id', 'product_per_price', 'product_qty', 'length', 'width',
        'height', 'weight', 'tax','product_subtotal_price',
        'status'
    ];

    public function product(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

}
