<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('movies', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('name');
          $table->string('genre');
          $table->longText('summary');
          $table->integer('running_time')->unsigned();
          $table->string('directed_by');
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
        Schema::dropIfExists('movies');
    }
}