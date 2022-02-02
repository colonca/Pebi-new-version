<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnCodigoToProgramas extends Migration
{

	public function up()
	{
		Schema::table('programas', function (Blueprint $table) {
			$table->string('codigo')->unique()->nullable()->after('facultad_id')->comment('codigo unico del programa');
		});
	}

	public function down()
	{
		Schema::table('programas', function (Blueprint $table) {
			$table->dropColumn('codigo');
		});
	}
}
