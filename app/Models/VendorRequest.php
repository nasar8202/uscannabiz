<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VendorRequest extends Model
{
    protected $table = 'vendor_requests';
    protected $fillable = [

        'id', 'product_id','vendor_id','full_name','phone_num','email','address','city','broker_id'
    ];
}
