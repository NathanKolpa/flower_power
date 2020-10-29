<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\ProductController;


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

Route::get('/login', [SignInController::class, "index"])->name("login");
Route::post("/login", [SignInController::class, "login"])->name("loginRequest");

Route::get('/products', [ProductController::class, "getAllProducts"])->name("products");

Route::get('/register', [SignUpController::class, "index"])->name("register");
Route::post('/register/create', [SignUpController::class, "register"])->name("register.create");
