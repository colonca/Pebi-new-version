<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('programas', function (Blueprint $table) {
			$table->id();
			$table->string('nombre');
			$table->foreignId('facultad_id');
			$table->foreign('facultad_id')->references('id')->on('facultades')->onDelete('CASCADE');;
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
		Schema::dropIfExists('programas');
	}
}
