<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    // protected $with="products";
    protected $guarded=[];

    public function cate_products(){
        return $this->hasMany(Cate_Product::class, 'cate_id');
    }

    public function product()
    {
        return $this->belongsToMany(Product::class, 'categories_products', 'product_id','cate_id');
    }
}
