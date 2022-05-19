<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiantesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('estudiantes', function (Blueprint $table) {
			$table->id();
			$table->string('identificacion', 15)->comment('Numero de identificación del estudiante')->unique()->index();
			$table->string('tipo_documento', 5)->comment('Tipo de documento del estudiante');
			$table->string('primer_nombre', 30)->comment('Primer nombre del estudiante');
			$table->string('segundo_nombre', 30)->nullable()->comment('Segundo nombre del estudiante');
			$table->string('primer_apellido', 30)->comment('Primer apellido del estudiante');
			$table->string('segundo_apellido', 30)->comment('Segundo apellido del estudiante');
			$table->string('direccion')->nullable()->comment('Dirección de residencia del estudiante');
			$table->string('telefono', 30)->nullable()->comment('Telefono del estudiante');
			$table->string('celular', 30)->nullable()->comment('Numero de celular del estudiante');
			$table->string('correo', 100)->nullable()->comment('Correo electronico del estudiante');
			$table->string('estado', 12)->comment('Estado del estudiante');
			$table->date('fecha_nacimiento')->comment('Fecha de nacimiento del estudiante');
			$table->string('sexo', 15)->comment('Sexo del estudiante');
			$table->text('procedencia')->nullable()->comment('Procedencia del estudiante');
			$table->date('fecha_ingreso')->comment('Fecha de ingreso a la universidad');
			$table->string('semestre', 2)->comment('semestre actual del estudiante')->nullable();
			$table->foreignId('programa_id')->comment('Campo foráneo a la tabla programa');
			$table->foreign('programa_id')->references('id')->on('programas');
			$table->string('sede')->comment('sede del campus universitario')->nullable();
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
		Schema::dropIfExists('estudiantes');
	}
}
