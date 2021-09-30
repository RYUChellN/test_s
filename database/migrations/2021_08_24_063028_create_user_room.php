<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRoom extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_user_rooms', function (Blueprint $table) {
		    $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('room_id');
            $table->timestamps();
		    $table->foreign('user_id')
			    ->references('user_id')
			    ->on('chat_users')
			    ->onDelete('cascade');
		    $table->foreign('room_id')
			    ->references('id')
			    ->on('chat_rooms')
			    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_user_rooms');
    }
}
