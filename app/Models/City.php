<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['country_id', 'name'];

    public function users(){
        return $this->hasMany('App\User', 'city_id', 'id');
    }
    public function countries(){
        return $this->belongsTo('App\Models\Country', 'country_id', 'id');
    }
}
