<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'name', 'parent_id', 'category_slug', 'description', 'meta_tag_title', 'meta_tag_description',
        'meta_tag_keywords', 'category_image', 'status'
    ];
    // public function products()
    // {
    //     return $this->belongsTo(Product::class);
    // }
    public function products(){
        return $this->hasMany(Product::class, 'category_id', 'id');
   }
    public function sub_category()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id');
    }

    public function parent_category()
    {
        return $this->hasMany(self::class, 'id', 'parent_id');
    }
}
