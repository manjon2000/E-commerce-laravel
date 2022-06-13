<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['category_id', 'user_id', 'product_id', 'size_id'];
}
