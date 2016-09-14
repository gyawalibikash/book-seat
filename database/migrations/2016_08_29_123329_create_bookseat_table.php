<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookSeatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookseat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('seat');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->integer('movie_id')->unsigned();
            $table->foreign('movie_id')
                ->references('id')
                ->on('movies')
                ->onDelete('cascade');
            $table->integer('showtime_id')->unsigned();
            $table->foreign('showtime_id')
                ->references('id')
                ->on('showtime')
                ->onDelete('cascade');
            $table->integer('cinehall_id')->unsigned();
            $table->foreign('cinehall_id')
                ->references('id')
                ->on('cinehall')
                ->onDelete('cascade');
            $table->integer('hall_id')->unsigned();
            $table->foreign('hall_id')
                ->references('id')
                ->on('halls')
                ->onDelete('cascade');
            $table->date('date');
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
        Schema::drop('bookseat', function(Blueprint $table){
            $table->dropForeign(['user_id', 'movie_id', 'showtime_id', 'cinehall_id', 'hall_id']);   
        });
    }
}
