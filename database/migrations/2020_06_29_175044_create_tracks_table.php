<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracks', function (Blueprint $table) {
            $table->increments('track_id');
            $table->string('track_name')->unique();
            $table->integer('artist_id')->unsigned();
            $table->foreign('artist_id')->references('artist_id')->on('artists')->onDelete('cascade');
            $table->integer('album_id')->unsigned();
            $table->string('track_file');
            $table->foreign('album_id')->references('album_id')->on('albums')->onDelete('cascade');
            $table->time('track_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tracks');
    }
}
