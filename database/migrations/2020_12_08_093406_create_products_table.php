<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id('id_product');
            $table->unsignedBigInteger('store_id');
            $table->foreign('store_id')->references('store_id')->on('stores');
            $table->unsignedBigInteger('id_category');
            $table->foreign('id_category')->references('id_category')->on('categories');
            $table->string('product_name');
            $table->integer('product_price');
            $table->string('product_description');
            $table->string('product_img1')->nullable();
            $table->string('product_img2')->nullable();
            $table->string('product_img3')->nullable();
            $table->string('product_lazada')->nullable();
            $table->string('product_tokopedia')->nullable();
            $table->string('product_shopee')->nullable();
            $table->string('product_bukalapak')->nullable();
            $table->string('product_condition');
            $table->string('product_brand');
            $table->timestamps();
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
