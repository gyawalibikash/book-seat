<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnBookseatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookseat1', function (Blueprint $table) {
            $table->integer('day_id')->unsigned();
            $table->foreign('day_id')
                ->references('id')
                ->on('days');
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
            $table->dropForeign(['day_id']);
        });
    }
}
