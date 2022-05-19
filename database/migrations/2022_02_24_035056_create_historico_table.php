<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoricoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historico', function (Blueprint $table) {
            $table->id()->comment('Identificador de la tabla autonumerico');
            $table->integer('semestre_actual')->comment('semestre actual del estudiante');
            $table->text('estado', 30)->comment('Estado del estudiante en ese período');
            $table->foreignId('estudiante_id')->comment('Campo foráneo a la tabla estudiante');
            $table->foreign('estudiante_id')->references('id')->on('estudiantes')->onDelete('CASCADE');
            $table->foreignId('periodo_id')->comment('Campo foráneo a la tabla periodoacademico');
            $table->foreign('periodo_id')->references('id')->on('periodos_academicos')->onDelete('CASCADE');
            $table->string('riesgo');
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
        Schema::dropIfExists('historico');
    }
}
