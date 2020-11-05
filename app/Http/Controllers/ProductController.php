<?php


namespace App\Http\Controllers;


use App\Models\Product;
use App\Providers\ProductServiceProvider;
use App\Providers\Services\ProductService;

class ProductController
{
    public function getAllProducts(ProductService $productService)
    {
        $products = $productService->getAll();


        return view('pages.products', ['products' => $products]);
    }

    public function getProductById($id)
    {
        $product = Product::find($id);

        return view('pages.detail', ['product' => $product]);
    }
}
