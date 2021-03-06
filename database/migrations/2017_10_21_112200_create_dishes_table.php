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
        Schema::create('dishes', function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('position_id');
            $table->string('name');
            $table->string('description');
            $table->string('size');
            $table->unsignedInteger('weight');
            $table->unsignedInteger('price');
            $table->unsignedInteger('qualify');
            $table->timestamps();

            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');
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
    }
}
