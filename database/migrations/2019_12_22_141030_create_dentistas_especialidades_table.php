<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDentistasEspecialidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dentistas_especialidades', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('dentista_id');
            $table->unsignedInteger('especialidade_id');
            $table->timestamps();

            $table->foreign('dentista_id')->references('id')->on('dentistas');
            $table->foreign('especialidade_id')->references('id')->on('especialidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dentistas_especialidades');
    }
}
