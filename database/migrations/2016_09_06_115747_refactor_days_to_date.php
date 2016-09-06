<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RefactorDaysToDate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('days');
        Schema::table('groups', function (Blueprint $table) {          
            $table->date('day_id')->change();
        });
        Schema::table('bookseat1', function (Blueprint $table) {           
            $table->date('day_id')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('days', function (Blueprint $table) {
            $table->increments('id');
            $table->string('day');
            $table->timestamps();
        });
        Schema::table('groups', function (Blueprint $table) {  
            $table->integer('day_id')->change();
        });
        Schema::table('bookseat1', function (Blueprint $table) {  
            $table->integer('day_id')->change();
        });
    }
}
