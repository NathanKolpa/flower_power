<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

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
