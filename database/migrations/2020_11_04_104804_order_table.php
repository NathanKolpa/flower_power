<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained();
            $table->integer("price_paid");
            $table->boolean("is_delivered");
            $table->timestamps();
        });

        Schema::create('ordered_products', function (Blueprint $table) {
            $table->foreignId("product_id")->constrained();
            $table->foreignId("order_id")->constrained();
            $table->primary(["product_id", "order_id"]);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordered_products');

        Schema::dropIfExists('orders');
    }
}
