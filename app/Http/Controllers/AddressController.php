<?php


namespace App\Http\Controllers;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AddressController
{
    public function index()
    {
        $userId = Auth::user()->id;

        $addresses = Address::all()->where("user_id", "=", $userId);
        return view("pages.address", ["addresses"=>$addresses]);
    }

    public function createView()
    {
        return view("pages.createAddress");
    }

    public function saveAddress(Request $request)
    {
        $userId = Auth::user()->id;
        $address = new Address();
        $address->user_id = $userId;
        $address->street_name = $request->straatnaam;
        $address->house_number = $request->Huisnummer;
        $address->postal_code = $request->postcode;
        $address->save();

        $addresses = Address::all()->where("user_id", "=", $userId);
        return view("pages.address", ["addresses"=>$addresses]);
    }
}
