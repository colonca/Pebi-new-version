<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->id();
            $table->string('identificacion', 15);
            $table->string('nombres')->comment('Nombre completo del tallerista');
            $table->string('celular', 20)->comment('numero de telefono de contacto');
            $table->string('correo_institucional')->comment('correo institucional');
            //$table->foreignId('programa')->comment('programa al que pertenece el programa');
            //$table->foreign('programa')->references('id')->on('programas');
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
        Schema::dropIfExists('docentes');
    }
}
