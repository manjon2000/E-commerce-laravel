<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = ['name', 'address', 'phone_number', 'email', 'city_id'];
    public function inventories(){
        return $this->belongsTo('App\Models\Inventory', 'store_id', 'id');
    }
}
