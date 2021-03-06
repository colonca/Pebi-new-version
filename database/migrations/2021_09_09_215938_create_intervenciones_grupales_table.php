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
			$table->foreignId('programa_id');
			$table->foreign('programa_id')->references('id')->on('programas')->cascadeOnDelete();
			$table->foreignId('asignatura_id');
			$table->foreign('asignatura_id')->references('id')->on('asignaturas')->cascadeOnDelete();
			$table->foreignId('taller_id');
			$table->foreign('taller_id')->references('id')->on('talleres_grupales')->cascadeOnDelete();
			$table->foreignId('tallerista_id');
			$table->foreign('tallerista_id')->references('id')->on('talleristas')->cascadeOnDelete();
			$table->foreignId('campanha_id');
			$table->foreign('campanha_id')->references('id')->on('campanhas')->cascadeOnDelete();
			$table->foreignId('linea_id')->comment('linea de atención de pebi');
			$table->foreign('linea_id')->references('id')->on('lineas')->cascadeOnDelete();
			$table->string('lugar')->comment('Lugar donde se va a realizar la intervencion grupal')->nullable();
			$table->string('profesor');
			$table->string('celular_profesor');
			$table->timestamp('fecha');
			$table->softDeletes();
			$table->timestamps();
		});

		Schema::create('grupales_estudiante', function (Blueprint $table) {
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
