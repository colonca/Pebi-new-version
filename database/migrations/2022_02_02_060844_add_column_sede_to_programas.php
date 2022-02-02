<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnSedeToProgramas extends Migration
{
	public function up()
	{
		Schema::table('programas', function (Blueprint $table) {
			$table->string('sede')->default('UNIVERSIDAD POPULAR DEL CESAR');
		});
	}

	public function down()
	{
		Schema::table('programas', function (Blueprint $table) {
			$table->dropColumn('sede');
		});
	}
}
