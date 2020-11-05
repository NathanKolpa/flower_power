<?php


namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderedProducts;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function getOrdersByUser()
    {
        $userId = Auth::user()->id;

        $orders = Order::with(["products", "user"])->where("user_id", "=", $userId)->get();
        return view("pages.orders", ["orders" => $orders]);
    }

    public function deleteOrder($id)
    {
        $order = Order::find($id);
        $this->authorize('delete', $order);
        $order->delete();

        return redirect()->route("account.orders");
    }

    public function getAllOrders()
    {
        $orders = Order::with(["products", "user", "address"])->get();
        return view("pages.admin.orders.orders", ["orders"=>$orders]);
    }

    public function approveOrder($id)
    {
        $order = Order::find($id);
        $order->is_delivered = true;

        $order->save();
        return redirect()->route('admin.orders');
    }
}
