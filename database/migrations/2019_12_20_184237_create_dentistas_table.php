<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDentistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dentistas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 100);
            $table->string('email', 100);
            $table->bigInteger('cro')->length(11)->unsigned();
            $table->char('cro_uf', 2);
            $table->timestamps();
        });
    }

    //Why bigINT?
    //https://stackoverflow.com/questions/28884918/laravel-table-there-can-be-only-one-auto-column-and-it-must-be-defined-as-a-key

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dentistas');
    }
}
