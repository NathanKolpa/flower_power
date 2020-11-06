<?php

use App\Http\Controllers\AdminProductsController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\SignOutController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;

use App\Models\Product;


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

Route::get('/sign-out', [SignOutController::class, "index"])->name("sign-out");

Route::get('/login', [SignInController::class, "index"])->name("login");
Route::post("/login", [SignInController::class, "login"])->name("loginRequest");

Route::get('/products', [ProductController::class, "getAllProducts"])->name("products");

Route::get('/register', [SignUpController::class, "index"])->name("register");
Route::post('/register/create', [SignUpController::class, "register"])->name("register.create");

Route::get("/admin/products", [AdminProductsController::class, "index"])->name("admin.products");
Route::get("/admin/products/edit/{id}", [AdminProductsController::class, "editIndex"])->name("admin.products.edit");
Route::get("/admin/products/create", [AdminProductsController::class, "createIndex"])->name("admin.products.create");

Route::put("/products/{id}", [AdminProductsController::class, "editAction"])->name("admin.products.edit.update");
Route::delete("/products/{id}", [AdminProductsController::class, "deleteAction"])->name("admin.products.edit.delete");
Route::post("/products", [AdminProductsController::class, "createAction"])->name("admin.products.edit.create");

Route::get("/account", [SettingsController::class, "index"])->name("account");
Route::post("/account/update", [SettingsController::class, "update"])->name("account.update");

Route::get("/account/orders", [OrderController::class, "getAllOrders"])->name("account.orders");

Route::get("/account/orders", [OrderController::class, "getOrdersByUser"])->name("account.orders");
Route::get("/admin/orders", [OrderController::class, "getAllOrders"])->name("admin.orders");
Route::get("/admin/orders/approve/{id}", [OrderController::class, "approveOrder"])->name("admin.order.approve");
Route::delete("/orders/{id}", [OrderController::class, "deleteOrder"])->name("account.orders.delete");
Route::post("/orders", [OrderController::class, "createOrder"])->name("account.orders.create");

Route::get("/shopping-cart", [ShoppingCartController::class, 'index'])->name("shopping-cart");
Route::delete("/users/{userId}/shopping-cart/{productId}", [ShoppingCartController::class, 'deleteItemAction'])->name("shopping-cart.delete");

Route::get('/product/detail/{id}', [ProductController::class, 'getProductById'])->name("product.detail");

Route::get('/contact', [ContactController::class, 'index'])->name("contact");
Route::post("/shopping-cart/{productId}", [ShoppingCartController::class, 'createItemAction'])->name("shopping-cart.create");

Route::get("/account/address", [AddressController::class, "index"])->name("account.address");
