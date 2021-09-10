<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntervencionesGrupalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intervenciones_grupales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('programa_id')->comment('Campo foráneo a la tabla programa');
            $table->foreign('programa_id')->references('id')->on('programas')->onDelete('CASCADE');
            $table->foreignId('asignatura_id')->comment('Campo foráneo a la tabla programa');
            $table->foreign('asignatura_id')->references('id')->on('asignaturas')->onDelete('CASCADE');
            $table->foreignId('taller_id');
            $table->foreign('taller_id')->references('id')->on('talleres_grupales')->cascadeOnDelete();
            $table->date('fecha');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('grupales_estudiante', function(Blueprint $table){
            $table->id();
            $table->foreignId('grupal_id')->comment('Campo foraneo de la tabla taller_grupal');
            $table->foreign('grupal_id')->references('id')->on('intervenciones_grupales')->onDelete('CASCADE');
            $table->foreignId('estudiante_id')->comment('Campo foraneo de la tabla estudiantes');
            $table->foreign('estudiante_id')->references('id')->on('estudiantes')->onDelete('CASCADE');
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
        Schema::dropIfExists('grupales_estudiante');
        Schema::dropIfExists('intervenciones_grupales');
    }
}
