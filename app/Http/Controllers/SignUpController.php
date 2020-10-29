<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SignUpController extends Controller
{
    public function index()
    {
        return view("pages.register");
    }

    public function register(Request $request)
    {
        $validatedBody = $request->validate([
            'first_name' => 'required|min:2|max:24',
            'middle_name' => 'max:24',
            'last_name' => 'required|min:2|max:24',
            'email' => 'required|max:64|email|unique:users,email',
            'password' => 'required|max:256|min:8'
        ]);

        $newUser = new User();
        $newUser->first_name = $validatedBody['first_name'];
        $newUser->middle_name = $validatedBody['middle_name'];
        $newUser->last_name = $validatedBody['last_name'];
        $newUser->email = $validatedBody['email'];
        $newUser->password = Hash::make($validatedBody['password']);

        if(!$newUser->save())
        {
            dd(":(");
        }

        return redirect()->route("home");
    }
}
