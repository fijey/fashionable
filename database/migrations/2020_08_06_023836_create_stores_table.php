<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id('store_id');
            $table->string('store_name')->nullable();
            $table->string('store_address')->nullable();
            $table->string('store_img')->nullable();
            $table->string('store_img_banner')->nullable();
            $table->string('store_lazada')->nullable();
            $table->string('store_shopee')->nullable();
            $table->string('store_tokopedia')->nullable();
            $table->string('store_bukalapak')->nullable();
            $table->string('store_about')->nullable();
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
        Schema::dropIfExists('stores');
    }
}
