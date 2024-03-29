<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $table='customers';
    protected $fillable = ['user_id','first_name','last_name','email','product_request','phone_no','city','state','country','address','status','gender','notification_check'];

    public function reviews(){
        return $this->hasMany(ProductReview::Class,'id','customer_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
