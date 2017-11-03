<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->string('size');
            $table->unsignedInteger('weight');
            $table->unsignedInteger('price');
            $table->unsignedInteger('qualify');
            $table->timestamps();
        });

        Schema::create('dish_restaurant', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('dish_id')->index();
            $table->foreign('dish_id')->references('id')->on('dishes')->onDelete('cascade');

            $table->unsignedInteger('restaurant_id')->index();
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
        });
    }

        /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dishes');
        Schema::dropIfExists('dish_restaurant');
    }
}
