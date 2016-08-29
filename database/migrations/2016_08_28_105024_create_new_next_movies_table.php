<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewNextMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('next_movies', function (Blueprint $table) {
            $table->string('description');
            $table->string('release_date');
            $table->string('run_time');
            $table->string('director');
            $table->string('cast');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('next_movies', function (Blueprint $table) {
            $table->dropColumn(['description', 'release_date', 'run_time', 'director', 'cast']);
        });
    }
}