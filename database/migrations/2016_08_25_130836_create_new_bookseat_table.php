<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewBookseatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookseat1', function (Blueprint $table) {
            $table->integer('showtime_id')->unsigned();
            $table->foreign('showtime_id')
                ->references('id')
                ->on('showtime');
            $table->integer('movie_id')->unsigned();
            $table->foreign('movie_id')
                ->references('id')
                ->on('movies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookseat1', function (Blueprint $table) {
            $table->dropForeign(['showtime_id']);
            $table->dropForeign(['movie_id']);
        });
    }
}
