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

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function address()
    {
        return $this->belongsTo('App\Models\Address', 'address_id', 'id');
    }


}
