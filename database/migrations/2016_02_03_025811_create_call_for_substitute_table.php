<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCallForSubstituteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calls_for_substitute', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('care_home_id')->unsigned();
            $table->foreign('care_home_id')->references('id')->on('care_homes');
            $table->string('start_date');
            $table->string('start_time');
            $table->string('end_date');
            $table->string('end_time');
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
        Schema::drop('calls_for_substitute');
    }
}
