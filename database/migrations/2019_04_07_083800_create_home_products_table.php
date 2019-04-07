<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->nullable()->unsigned();
            $table->string('name');
            $table->string('image');
            $table->tinyInteger('status')->comment('1: Active, 2: In-active')->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('home_products');
    }
}
