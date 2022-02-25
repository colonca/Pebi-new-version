<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnPeriodoToIntervencionesGrupales extends Migration
{

    public function up()
    {
        Schema::table('intervenciones_grupales', function (Blueprint $table) {
            $table->foreignId('periodo_id');
            $table->foreign('periodo_id')
                ->references('id')
                ->on('periodos_academicos');
        });
    }

    public function down()
    {
        Schema::table('intervenciones_grupales', function (Blueprint $table) {
            $table->dropForeign('periodo_id');
        });
    }

}
