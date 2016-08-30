<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
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

            $table->integer('day_id')->unsigned();
            $table->foreign('day_id')
                ->references('id')
                ->on('days')
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
        Schema::drop('groups');
    }
}
