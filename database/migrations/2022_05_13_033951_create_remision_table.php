<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemisionTable extends Migration
{

    public function up()
    {
        Schema::create('remisiones', function (Blueprint $table) {
            $table->id();
            $table->string('area', 50)->comment('Area donde se remitio el estudiante');
            $table->string('estado', 100)->comment('Estado de la remision');
            $table->dateTime('fecha_cita')->nullable()->comment('Fecha de la cita');
            $table->foreignId('tallerista')->nullable()->comment('Campo foráneo a la tabla tallerista');
            $table->foreign('tallerista')->references('id')->on('talleristas');
            $table->foreignId('solicitud')->comment('Campo foráneo a la tabla solicitud');
            $table->foreign('solicitud')->references('id')->on('solicitudes');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('remisiones');
    }
}
