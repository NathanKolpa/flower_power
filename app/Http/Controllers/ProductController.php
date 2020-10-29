<?php


namespace App\Http\Controllers;


use App\Models\Products;

class ProductController
{
    public function getAllProducts()
    {
        $products = Products::all();


        return view('pages.products', ['products'=>$products]);
    }
}
