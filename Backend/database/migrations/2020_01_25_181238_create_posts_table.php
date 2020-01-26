<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('posts', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('title');
          $table->integer('likes')->unsigned()->nullable();
          $table->longText('text');
          $table->integer('dislikes')->unsigned()->nullable();
          $table->unsignedBigInteger('user_id');
          $table->timestamps();
      });
      Schema::table('posts', function (Blueprint $table) {
        $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');

  });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
