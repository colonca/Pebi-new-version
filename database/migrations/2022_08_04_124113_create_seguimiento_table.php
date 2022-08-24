<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeguimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguimientos', function (Blueprint $table) {
            $table->id();
            $table->text('seguimiento');
            $table->text('conclusion');
            $table->foreignId('tallerista_id');
            $table->foreign('tallerista_id')->references('id')->on('talleristas');
            $table->enum('remision_ips', ['SI', 'NO']);
            $table->foreignId('historia_id');
            $table->foreign('historia_id')->references('id')->on('historia_psicologica');
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
        Schema::dropIfExists('seguimiento');
    }
}
