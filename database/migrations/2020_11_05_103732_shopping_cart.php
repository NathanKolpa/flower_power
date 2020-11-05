<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ShoppingCart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_cart_products', function (Blueprint $table) {
            $table->foreignId("product_id")->constrained();
            $table->foreignId("user_id")->constrained();
            $table->primary(["product_id", "user_id"]);
            $table->integer("product_count");
        });

        Schema::table('ordered_products', function (Blueprint $table)
        {
            $table->integer("product_count");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ordered_products', function (Blueprint $table)
        {
            $table->dropColumn("product_count");
        });

        Schema::dropIfExists("shopping_cart_products");
    }
}
