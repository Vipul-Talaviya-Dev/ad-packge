<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->integer('address_id')->unsigned();
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('price')->comment("In Paisa");
            $table->unsignedInteger('shipping_charge')->comment("In Paisa");
            $table->unsignedInteger('gst')->comment("In Paisa");
            $table->unsignedInteger('qty');
            $table->unsignedInteger('total_amount')->comment("In Paisa");
            $table->unsignedInteger('cart_amount')->comment("In Paisa, Payable Amount");
            $table->text('payment_reference')->comment('Payable reference key');
            $table->unsignedTinyInteger('order_status')->comment('0: checkout, 1: Pending, 2: Success, 3: Cancel');
            $table->unsignedTinyInteger('payment_status')->comment('0: checkout, 1: Success');
            $table->timestamps();
            $table->softDeletes();
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
        Schema::dropIfExists('orders');
    }
}
