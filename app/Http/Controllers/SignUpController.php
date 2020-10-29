<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SignUpController extends Controller
{
    public function index()
    {
        return view("pages.register");
    }

    public function register(Request $request)
    {
        $messages = [
            "required" => __('errors.required'),
            "email" => __("errors.email"),
            "min" => __("errors.min"),
            "max" => __("errors.max"),
            "unique" => __("errors.unique"),
        ];

        $attributes = [
            "first_name" => __('general.first_name'),
            "middle_name" => __('general.middle_name'),
            "last_name" => __('general.last_name'),
            "email" => __('general.email'),
            "password" => __('general.password'),
        ];

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|min:2|max:24',
            'middle_name' => 'max:24',
            'last_name' => 'required|min:2|max:24',
            'email' => 'required|max:64|email|unique:users,email',
            'password' => 'required|max:256|min:8'
        ], $messages, $attributes);

        if ($validator->fails()) {

            return redirect()
                ->route("register")
                ->withErrors($validator->getMessageBag()->get('*'));
        }

        $validatedBody = $validator->validated();

        $newUser = new User();
        $newUser->first_name = ucfirst($validatedBody['first_name']);
        $newUser->middle_name = $validatedBody['middle_name'];
        $newUser->last_name = ucfirst($validatedBody['last_name']);
        $newUser->email = $validatedBody['email'];
        $newUser->password = Hash::make($validatedBody['password']);

        if (!$newUser->save()) {
            dd(":(");
        }

        Auth::login($newUser);

        return redirect()->route("home");
    }
}
