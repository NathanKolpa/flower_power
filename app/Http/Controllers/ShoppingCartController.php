<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\ShoppingCartProduct;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShoppingCartController extends Controller
{
    public function index()
    {
        $user = User::with("addresses")->find(Auth::user()->id);
        $products = $user->shoppingCartProducts()->get();

        return view("pages.shopping-cart", [
            'products' => $products,
            'user' => $user
        ]);
    }

    public function createItemAction($productId, \Illuminate\Http\Request $request)
    {
        // dit is beun en het boeit me niet
        $user = Auth::user();
        $product = Product::find($productId);

        DB::table('shopping_cart_products')
            ->insertOrIgnore([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'product_count' => min($product->quantity, $request->all()['product_count'])
            ]);

        return redirect()->route("shopping-cart");
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
