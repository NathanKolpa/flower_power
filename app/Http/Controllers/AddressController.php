<?php


namespace App\Http\Controllers;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;


class AddressController
{
    public function index()
    {
        $userId = Auth::user()->id;

        $addresses = Address::all()->where("user_id", "=", $userId);
        return view("pages.address", ["addresses"=>$addresses]);
    }
}
