<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameDayIdToDate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('groups', function (Blueprint $table) {
            $table->renameColumn('day_id', 'date');
        });
        Schema::table('bookseat1', function (Blueprint $table) {
            $table->renameColumn('day_id', 'date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('groups', function (Blueprint $table) {
            $table->renameColumn('date', 'day_id');
        });

        Schema::table('bookseat1', function (Blueprint $table) {
            $table->renameColumn('date', 'day_id');
        });
    }
}
