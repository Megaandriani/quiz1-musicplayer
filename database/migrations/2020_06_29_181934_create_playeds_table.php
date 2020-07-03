<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playeds', function (Blueprint $table) {
            $table->increments('play_id');
            $table->integer('track_id')->unsigned();
            $table->foreign('track_id')->references('track_id')->on('tracks')->onDelete('cascade');
            $table->date('play_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('playeds');
    }
}
