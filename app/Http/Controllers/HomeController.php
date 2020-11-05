<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use app\Http\Controllers\ProductController;
use App\Models\Product;
use App\Providers\Services\ProductService;

class HomeController extends Controller
{
    public function index(ProductService $productService)
    {
        $saleProducts = $productService->getSale();

        return view('pages.home', ["saleProducts" => $saleProducts]);
    }
}
