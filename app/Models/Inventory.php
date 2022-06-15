<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = ['product_id', 'quantity', 'store_id' ];
    public function products(){
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }
    public function stores(){
        return $this->hasOne('App\Models\Store', 'id', 'store_id');
    }
}
