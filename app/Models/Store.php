<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
<<<<<<< HEAD
    protected $fillable = ['name', 'address', 'phone_number', 'email', 'city_id', 'schedule'];
=======
    protected $fillable = ['name', 'address', 'phone_number', 'email', 'city_id',"schedule_end", "schedule_start"];
    public function inventories(){
        return $this->belongsTo('App\Models\Inventory', 'store_id', 'id');
    }
>>>>>>> main
}
