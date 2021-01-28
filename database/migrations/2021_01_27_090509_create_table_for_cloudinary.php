<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableForCloudinary extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cloud_images', function (Blueprint $table) {
            $table->id();
            $table->string('asset_id');
            $table->string('public_id');
            $table->string('version');
            $table->string('version_id');
            $table->string('signature');
            $table->string('resource_type');
            $table->string('tags');
            $table->string('bytes');
            $table->string('etag');
            $table->string('url');
            $table->string('secure_url');
            $table->foreignId('student_id');
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
        Schema::dropIfExists('cloud_images');
    }
}
