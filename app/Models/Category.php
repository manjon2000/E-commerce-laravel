<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Category extends Model implements TranslatableContract
{
    use Translatable;
    protected $fillable = ['name', 'image_category'];
    protected $translatedAttributes=["description"];
    
    public function products(){
        return $this->hasMany('App\Models\Product', 'category_id','id');
    }
}
