<?php


namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderedProducts;
use Illuminate\Support\Facades\Auth;

class OrderController
{
    public function getAllOrders()
    {
        $userId = Auth::user()->id;

        $orders = Order::with("products")->where("user_id", "=", $userId)->get();
        return view("pages.orders", ["orders" => $orders]);
    }


}
