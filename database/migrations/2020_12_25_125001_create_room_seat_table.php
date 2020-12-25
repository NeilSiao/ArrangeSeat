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
        Schema::create('room_seat', function (Blueprint $table) {
            $table->id();
            $table->foreignkey('room_id');
            $table->foreignkey('seat_id');
            $table->foreignkey('student_id');
            $table->tinyInteger('left');
            $table->tinyInteger('top');
            $table->tinyInteger('rotate');
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
        Schema::dropIfExists('room_seat');
    }
}
