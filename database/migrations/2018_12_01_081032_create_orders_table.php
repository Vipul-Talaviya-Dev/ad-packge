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
            $table->unsignedInteger('shipping_charge')->default(0)->comment("In Paisa");
            $table->unsignedInteger('gst')->default(0)->comment("In Paisa");
            $table->unsignedInteger('total_amount')->comment("In Paisa");
            $table->unsignedInteger('cart_amount')->comment("In Paisa, Payable Amount");
            $table->tinyInteger('payment_mode')->default(1)->comment("1: COD, 2: DebitCard, 3: Net Banking");
            $table->text('payment_reference')->nullable()->comment('Payable reference key');
            $table->longText('payment_response')->nullable();
            $table->unsignedTinyInteger('order_status')->comment('1: Order Checkout, 2: Order Placed, 3: Order Success, 4: Delivery Boy Pickup Order, 5: Delivery Boy To Customer, 6: Delivered, 7: Return, 8: Canceled')->default(1);
            $table->unsignedTinyInteger('payment_status')->comment('1: No, 2: Yes');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('address_id')->references('id')->on('addresses');
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
