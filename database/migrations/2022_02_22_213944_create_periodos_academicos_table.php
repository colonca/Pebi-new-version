<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodosAcademicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodos_academicos', function (Blueprint $table) {
            $table->id()->comment('Llave primaria autoincrementable');
            $table->text('estado', 15)->comment('Indica si el período esta ACTIVO o INACTIVO');
            $table->integer('periodo')->comment('Indica el período 1 o 2');
            $table->date('fecha_inicio')->comment('fecha inicio del período');
            $table->date('fecha_fin')->comment('fecha fin del período');
            $table->integer('anio')->comment('año del período académico');
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
        Schema::dropIfExists('periodos_academicos');
    }
}
