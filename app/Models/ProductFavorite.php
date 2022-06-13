<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductFavorite extends Model
{
    protected $fillable = ['user_id', 'product_id'];
}
