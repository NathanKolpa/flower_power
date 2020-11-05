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
        'created_at',
    ];

    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'ordered_products', 'order_id', "product_id")
            ->withPivot("product_count");
    }
}
