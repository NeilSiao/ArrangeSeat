<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomSeatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_seats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id');
            //$table->foreignId('team_id')->nullable();
            $table->bigInteger('student_id')->nullable();
            $table->string('pos_left', 10);
            $table->string('pos_top', 10);
            $table->string('rotate', 10);
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
        Schema::dropIfExists('room_seats');
    }
}
