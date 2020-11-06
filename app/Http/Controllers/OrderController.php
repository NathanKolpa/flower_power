<?php


namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Order;
use App\Models\OrderedProducts;
use App\Models\ShoppingCartProduct;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\UnauthorizedException;

class OrderController extends Controller
{
    public function getOrdersByUser()
    {
        $userId = Auth::user()->id;

        $orders = Order::with(["products", "user"])->where("user_id", "=", $userId)->get();
        return view("pages.orders", ["orders" => $orders]);
    }

    public function createOrder(Request $request)
    {
        $user = User::with('shoppingCartProducts')->find(Auth::user()->id);

        $order = new Order();
        $order->user_id = $user->id;

        if ($request->post('type') == 'address') {
            $address = Address::find($request->post('address'));

            if ($address->user_id != $user->id)
                throw new UnauthorizedException();

            $order->price_paid = $user->shoppingCartTotal;
            $order->address_id = $address->id;
            $order->is_delivered = false;
        }

        $order->save();
        $orderProducts = array();

        foreach ($user->shoppingCartProducts as $shoppingCartProduct) {
            array_push($orderProducts, [
                'order_id' => $order->id,
                'product_id' => $shoppingCartProduct->id,
                'product_count' => $shoppingCartProduct->pivot->product_count
            ]);
        }

        OrderedProducts::insert($orderProducts);

        foreach ($user->shoppingCartProducts as $shoppingCartProduct) {
            $shoppingCartProduct->quantity -= $shoppingCartProduct->pivot->product_count;
            $shoppingCartProduct->save();
            $shoppingCartProduct->pivot->delete();
        }



        return redirect()->route("account.orders");
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
        return view("pages.admin.orders.orders", ["orders" => $orders]);
    }

    public function approveOrder($id)
    {
        $order = Order::find($id);
        $order->is_delivered = true;

        $order->save();
        return redirect()->route('admin.orders');
    }
}
