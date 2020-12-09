<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id('id_profile');
            $table->string('address')->nullable();
            $table->string('age')->nullable();
            $table->string('city')->nullable();
            $table->string('img_profile')->nullable();
            $table->string('handphone')->nullable();
            $table->unsignedBigInteger('store_id');
            $table->foreign('store_id')->references('store_id')->on('stores');
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
        Schema::dropIfExists('user_profiles');
    }
}
