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
            $table->string('identificacion',12)->comment('Numero de identificación del estudiante');
            $table->text('tipo_documento', 20)->comment('Tipo de documento del estudiante');
            $table->text('primer_nombre', 20)->comment('Primer nombre del estudiante');
            $table->text('segundo_nombre', 20)->nullable()->comment('Segundo nombre del estudiante');
            $table->text('primer_apellido', 20)->comment('Primer apellido del estudiante');
            $table->text('segundo_apellido', 20)->comment('Segundo apellido del estudiante');
            $table->text('direccion')->nullable()->comment('Dirección de residencia del estudiante');
            $table->text('telefono', 20)->nullable()->comment('Telefono del estudiante');
            $table->text('celular', 20)->nullable()->comment('Numero de celular del estudiante');
            $table->text('correo', 100)->nullable()->comment('Correo electronico del estudiante');
            $table->date('fecha_nacimiento')->comment('Fecha de nacimiento del estudiante');
            $table->string('sexo', 15)->comment('Sexo del estudiante');
            $table->text('procedencia')->nullable()->comment('Procedencia del estudiante');
            $table->date('fecha_ingreso')->comment('Fecha de ingreso a la universidad');
            $table->text('semestre',2)->comment('semestre actual del estudiante')->nullable();
            $table->foreignId('programa_id')->comment('Campo foráneo a la tabla programa');
            $table->foreign('programa_id')->references('id')->on('programas')->onDelete('CASCADE');
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
