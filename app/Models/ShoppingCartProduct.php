<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCartProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
    ];


    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
