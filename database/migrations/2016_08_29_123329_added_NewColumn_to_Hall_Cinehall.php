<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddedNewColumnToHallCinehall extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookseat1', function (Blueprint $table) {
            $table->integer('hall_id')->unsigned();
            $table->foreign('hall_id')
                ->references('id')
                ->on('halls')
                ->onDelete('cascade');
            $table->integer('cinehall_id')->unsigned();
            $table->foreign('cinehall_id')
                ->references('id')
                ->on('cinehall')
                ->onDelete('cascade');
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
            //
        });
    }
}
