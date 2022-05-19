<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnSoporteToHistoriaPsicologica extends Migration
{

    public function up()
    {
        Schema::table('historia_psicologica', function (Blueprint $table) {
            $table->string('soporte')->nullable();
        });
    }

    public function down()
    {
        Schema::table('historia_psicologica', function (Blueprint $table) {
            $table->dropColumn('soporte');
        });
    }
}
