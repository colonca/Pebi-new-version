<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudTable extends Migration
{
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('estudiante');
            $table->foreign('estudiante')->references('id')->on('estudiantes');
            $table->string('estado', 30);
            $table->string('motivo', 50);
            $table->string('discapacidad');
            $table->string('esDiscapacitado', 4);
            $table->timestamp('fecha');
            $table->timestamp('fecha_remision')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('disponibilidad_estudiante', function (Blueprint $table) {
            $table->id();
            $table->foreignId('solicitud_id')->comment('Campo foráneo a la tabla solicitudes');
            $table->foreign('solicitud_id')->references('id')->on('solicitudes')->cascadeOnDelete();
            $table->foreignId('horario_id')->comment('Campo foráneo a la tabla horario');
            $table->foreign('horario_id')->references('id')->on('horarios')->cascadeOnDelete();
            $table->enum('disponible', ['DISPONIBLE', 'OCUPADO']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('solicitudes');
    }
}
