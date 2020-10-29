<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', [HomeController::class, "index"])->name("home");

Route::get('/register', function () {
    return view('pages.register');
})->name("register");

Route::get('/login', function () {return view('pages.login');})->name("login");
Route::post("/login", [LoginController::class, "login"])->name("loginRequest");


Route::get('/products', function () {
    return view('pages.products');
})->name("products");
