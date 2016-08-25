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
        Schema::create('bookseat1', function (Blueprint $table) {
            $table->increments('id');
            $table->string('seat');
//            $table->integer('showtime_id')->unsigned();
//            $table->foreign('showtime_id')
//                ->references('id')
//                ->on('showtime');
//            $table->integer('movies_id')->unsigned();
//            $table->foreign('movies_id')
//                ->references('id')
//                ->on('movies');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
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
            $table->dropForeign(['user_id']);
        });
    }
}
