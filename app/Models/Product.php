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
    public function inventories(){
        return $this->belongsTo('App\Models\Inventory', 'id', 'product_id');
    }
}
