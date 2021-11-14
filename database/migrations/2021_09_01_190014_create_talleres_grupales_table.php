<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTalleresGrupalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('talleres_grupales', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->comment('este es el nombre del taller');
            $table->string('descripcion')->nullable()->comment('breve descripción del taller');
            $table->foreignId('campanha');
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
        Schema::dropIfExists('talleres_grupales');
    }
}
