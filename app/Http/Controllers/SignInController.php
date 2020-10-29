<?php


namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SignInController extends Controller
{
    public function index()
    {
        return view("pages.login");
    }

    public function login(Request $request)
    {
        $messages = [
            "required" => __('errors.required'),
            "email" => __("errors.email"),
            "min" => __("errors.min"),
            "max" => __("errors.max"),
            "exists" => __("errors.exists")
        ];

        $attributes = [
            "email" => __('general.email'),
            "password" => __('general.password'),
        ];

        $validator = Validator::make($request->all(), [
            'email' => 'required|max:64|email|exists:users,email',
            'password' => 'required|min:8',
        ], $messages, $attributes);


        if ($validator->fails()) {
            return redirect()
                ->route("login")
                ->withErrors($validator->getMessageBag()->get('*'));
        }

        $validatedData = $validator->validated();

        if (!Auth::attempt($validatedData)) {
            return redirect()
                ->route('login')
                ->withErrors(['password' => [__("errors.invalid_password")]]);
        }

        return redirect()->route("home");

    }
}
