<?php

namespace App\Providers;

use App\Http\Controllers\ProductController;
use App\Models\Products;
use App\Providers\Services\ProductService;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
       $this->app->singleton(ProductService::class, function($app){
           return new ProductService();
       });
    }

    public function provides()
    {
        return [ProductService::class];
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
