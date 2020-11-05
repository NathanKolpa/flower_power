<?php

namespace App\Http\Controllers;


use App\Models\ShoppingCartProduct;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $products = $user->shoppingCartProducts()->get();

        return view("pages.shopping-cart", [
            'products' => $products,
            'user' => $user
        ]);
    }

    public function deleteItemAction($userId, $productId)
    {
        $shoppingCartItem = ShoppingCartProduct::where('user_id', '=', $userId)
            ->where('product_id', '=', $productId)
            ->first();

        $this->authorize('delete', $shoppingCartItem);

        // TODO: dit is crack maar de delete() method doet het niet want het zou ooit een keer goed werken he🤮🤮🤮🤮🤮🤮🤮
        ShoppingCartProduct::where('user_id', '=', $userId)
            ->where('product_id', '=', $productId)
            ->delete();

        return redirect()->route("shopping-cart");
    }
}
