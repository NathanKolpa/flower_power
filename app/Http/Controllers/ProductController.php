<?php


namespace App\Http\Controllers;


use App\Models\Products;
use App\Providers\ProductServiceProvider;
use App\Providers\Services\ProductService;

class ProductController
{
    public function getAllProducts(ProductService $productService)
    {
        $products = $productService->getAll();


        return view('pages.products', ['products' => $products]);
    }
}
