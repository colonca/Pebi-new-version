<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRiesgos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riesgos', function (Blueprint $table) {
            $table->id()->comment('Identificador de la tabla autonumerico');
            $table->string('descripcion')->comment('descripcion del tipo de riesgo');
            $table->double('nota_inicio', 2, 1)->comment('Nota inicio del rango del riesgo');
            $table->double('nota_fin', 2, 1)->comment('Nota fin del rango del riesgo');
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
        Schema::dropIfExists('riesgos');
    }
}
