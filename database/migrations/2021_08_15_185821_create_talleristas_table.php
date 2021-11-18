<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTalleristasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('talleristas', function (Blueprint $table) {
            $table->id()->comment('llave primaria');
            $table->string('identificacion', 12);
            $table->string('nombres')->comment('Nombre completo del tallerista');
            $table->string('celular', 20)->comment('numero de telefono de contacto');
            $table->string('correo_institucional')->comment('correo institucional');
            $table->string('correo_personal')->nullable()->comment('correo personal');
            $table->integer('numero_horas_semanales')->comment('numero de horas disponibles a las semana');
            $table->enum('tipo', ['PROFESIONAL', 'PRACTICANTE'])->comment('tipo de tallerista si es profesional o practicante');
            $table->softDeletes();
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
        Schema::dropIfExists('talleristas');
    }
}
