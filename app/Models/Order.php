<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'userId',
        'pricePaid',
        'isDelivered',
    ];

    public function products()
    {
        return $this->belongsToMany('App\Models\Products', 'ordered_products', 'order_id', "product_id");
    }



}
