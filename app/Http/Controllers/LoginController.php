<?php


namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {

        $validatedData = $request->validate([
            'email' => 'required|max:64|email',
            'password' => 'required|min:8',
        ]);

        if(Auth::attempt($validatedData))
        {
            return redirect()->route("home");
        }
        else
        {
            return "bok";
        }
        //$db = DB::table('users')->where('email', "=", $email);

    }
}
