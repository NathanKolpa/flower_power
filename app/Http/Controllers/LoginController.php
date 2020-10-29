<?php


namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function getSingleUser(Request $request)
    {

        $validatedData = $request->validate([
            'email' => 'required|max:64|email',
            'password' => 'required|min:8',
        ]);

        $password = $validatedData["password"];

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
