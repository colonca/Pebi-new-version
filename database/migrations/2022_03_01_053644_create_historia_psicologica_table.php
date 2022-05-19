<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriaPsicologicaTable extends Migration
{

    public function up()
    {
        Schema::create('historia_psicologica', function (Blueprint $table) {
            $table->id()->comment('identificador de la tabla historia psicologica');
            $table->string('direccion', 60);
            $table->foreignId('estado_civil');
            $table->foreign('estado_civil')->references('id')->on('estado_civil');
            $table->enum('trabaja', ['SI', 'NO']);
            $table->string('procedencia_recursos')->nullable();
            $table->foreignId('tipo_familia');
            $table->foreign('tipo_familia')->references('id')->on('familias');
            $table->enum('relacion_compañeros', ['MALA', 'REGULAR', 'BUENA', 'EXCELENTE']);
            $table->enum('relacion_docente', ['MALA', 'REGULAR', 'BUENA', 'EXCELENTE']);
            $table->string('plan_de_accion')->nullable();
            $table->string('conclusiones')->nullable();
            $table->foreignId('estudiante_id');
            $table->foreign('estudiante_id')->references('id')->on('estudiantes');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('rel_historia_impresion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('historia_psicologica_id')->unsigned();
            $table->foreign('historia_psicologica_id')->references('id')->on('historia_psicologica');
            $table->bigInteger('impresion_diagnostica_id')->unsigned();
            $table->foreign('impresion_diagnostica_id')->references('id')->on('impresion_diagnostica');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rel_historia_impresion');
        Schema::dropIfExists('historia_psicologica');
    }
}
