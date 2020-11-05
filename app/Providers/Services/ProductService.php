<?php


namespace App\Providers\Services;


use App\Models\Product;

class ProductService
{
    public function getAll()
    {
        $products = Product::all();

        return $products;
    }

    public function getSale()
    {
        $products = Product::all()->where("on_sale", "=", true);;

        return $products;
    }
}
