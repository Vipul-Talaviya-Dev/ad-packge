<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('order_id');
            $table->unsignedInteger('user_id');
            $table->integer('address_id')->unsigned();
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('price')->comment("In Paisa");
            $table->unsignedInteger('qty');
            $table->unsignedTinyInteger('order_status')->comment('1: Order Checkout, 2: Order Placed, 3: Order Success, 4: Delivery Boy Pickup Order, 5: Delivery Boy To Customer, 6: Delivered, 7: Return, 8: Canceled')->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('address_id')->references('id')->on('addresses');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_products');
    }
}
