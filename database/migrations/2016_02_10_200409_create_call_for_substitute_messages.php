<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCallForSubstituteMessages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('call_for_substitute_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('call_for_substitute_id')->unsigned();
            $table->foreign('call_for_substitute_id')->references('id')->on('calls_for_substitute');
            $table->string('title');
            $table->string('message');
            $table->boolean('read');
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
        Schema::drop('call_for_substitute_messages');
    }
}
