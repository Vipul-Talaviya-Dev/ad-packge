<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id');
            $table->string('name');
            $table->text('slug');
            $table->text('meta_keyword')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('price')->default(0)->comment("In Paisa");
            $table->unsignedInteger('shipping_charge')->default(0)->comment("In Paisa");
            $table->unsignedInteger('qty')->default(0);
            $table->string('height_with_length');
            $table->string('image');
            $table->string('pack')->comment('Bundle');
            $table->string('piece')->comment('piece');
            $table->string('weight')->comment('weight');
            $table->text('prices_box')->comment('per box prices list');
            $table->unsignedTinyInteger('status')->default(1)->comment('1: Active 0: In-Active');
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
        Schema::dropIfExists('products');
    }
}
