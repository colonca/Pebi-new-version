<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisponibilidadTalleristasTable extends Migration
{

    public function up()
    {
        Schema::create('disponibilidad_talleristas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tallerista_id')->comment('Campo foráneo a la tabla tallerista');
            $table->foreign('tallerista_id')->references('id')->on('talleristas')->cascadeOnDelete();
            $table->foreignId('horario_id')->comment('Campo foráneo a la tabla horario');
            $table->foreign('horario_id')->references('id')->on('horarios')->cascadeOnDelete();
            $table->enum('disponible',['DISPONIBLE','OCUPADO']);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('disponibilidad_talleristas');
    }
}
