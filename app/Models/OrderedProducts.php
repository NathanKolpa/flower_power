<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderedProducts extends Model
{
    use HasFactory;

    protected $fillable = [
        'productId',
        'orderId',
    ];


    public function products()
    {
        return $this->hasMany('App\Models\Products');
    }


}
