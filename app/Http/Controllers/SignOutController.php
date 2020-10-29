<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class SignOutController extends Controller
{
    public function index()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
