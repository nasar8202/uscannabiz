<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VendorStore extends Model
{
    protected $table = "vendor_stores";
    protected $fillable = ['vendor_id','store_name','store_url','status'];

}
