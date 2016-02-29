<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCareHomeRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('care_home_rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('care_home_id')->unsigned();
            $table->foreign('care_home_id')->references('id')->on('care_homes');
            $table->integer('square_footage');
            $table->boolean('available');
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
        Schema::drop('care_home_rooms');
    }
}
