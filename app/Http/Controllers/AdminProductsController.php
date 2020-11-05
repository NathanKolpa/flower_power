<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use app\Http\Controllers\ProductController;
use App\Models\Product;
use App\Providers\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\UnauthorizedException;

class AdminProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view("pages.admin.products.products", [
            'products' => $products
        ]);
    }

    public function editIndex($id)
    {
        $product = Product::find($id);

        return view('pages.admin.products.edit-product', [
            'product' => $product
        ]);
    }

    public function createIndex()
    {
        return view("pages.admin.products.create-product", [
        ]);
    }

    public function deleteAction($id)
    {
        $product = Product::find($id);
        $this->authorize('delete', $product);

        $product->delete();

        return redirect()->route('admin.products');
    }

    public function createAction(Request $request)
    {
        $this->authorize('create', Product::class);

        $validator = $this->validateRequest($request);

        if ($validator->fails()) {

            return redirect()
                ->route("admin.products.create")
                ->withErrors($validator->getMessageBag()->get('*'));
        }

        $validatedBody = $validator->validated();

        $product = new Product();
        $product->name = $validatedBody['name'];
        $product->price = $validatedBody['price'];
        $product->description = $validatedBody['description'];
        $product->quantity = $validatedBody['quantity'];
        $product->on_sale = $request->post('onSale') != null ? 1 : 0;
        $product->picture = '';
        $product->save();

        return redirect()->route('admin.products.edit', [$product->id]);
    }

    public function editAction($id, Request $request)
    {
        $product = Product::find($id);
        $this->authorize('update', $product);

        $validator = $this->validateRequest($request);

        if ($validator->fails()) {

            return redirect()
                ->route("admin.products.edit", $product->id)
                ->withErrors($validator->getMessageBag()->get('*'));
        }

        $validatedBody = $validator->validated();

        $product->name = $validatedBody['name'];
        $product->price = $validatedBody['price'];
        $product->description = $validatedBody['description'];
        $product->quantity = $validatedBody['quantity'];
        $product->on_sale = $request->post('onSale') != null ? 1 : 0;

        $product->save();

        return redirect()->route('admin.products.edit', [$product->id]);
    }

    private function validateRequest(Request $request): \Illuminate\Contracts\Validation\Validator
    {
        $messages = [
            "required" => __('errors.required'),
            "min" => __("errors.min"),
            "max" => __("errors.max"),
            "numeric" => __("errors.numeric"),
            "integer" => __("errors.integer"),
        ];

        $attributes = [
            "name" => __('general.name'),
            "description" => __('general.description'),
            "price" => __('general.price'),
            "quantity" => __('general.quantity'),
            'onSale' => __('general.on_sale'),
        ];

        return Validator::make($request->all(), [
            'name' => 'required|min:1|max:64',
            'description' => 'max:256',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ], $messages, $attributes);
    }
}

