<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RefactorReleasedDateColumnOnNextmovieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('next_movies', function (Blueprint $table) {
            $table->date('release_date')->change();
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
            $table->string('release_date')->change();
        });
    }
}
