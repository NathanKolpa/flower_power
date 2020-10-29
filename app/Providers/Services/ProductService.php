<?php


namespace App\Providers\Services;


use App\Models\Products;

class ProductService
{
    public function getAll()
    {
        $products = Products::all();

        return $products;
    }

    public function getSale()
    {
        $products = Products::all()->where("onSale", "=", true);;

        return $products;
    }
}
