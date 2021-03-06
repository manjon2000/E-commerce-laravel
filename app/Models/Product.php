<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Product extends Model implements TranslatableContract
{
    use Translatable;
    protected $fillable = ['name' , 'price', 'image_product', 'category_id'];
    protected $translatedAttributes=["description"];

    public function productsimages(){
        return $this->hasMany('App\Models\ProductImage', 'product_id', 'id');
    }
    public function categories(){
        return $this->belongsTo('App\Models\Category', 'category_id','id');
    }
}
