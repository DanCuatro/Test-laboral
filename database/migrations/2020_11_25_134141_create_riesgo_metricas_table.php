<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiesgoMetricasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riesgo_metricas', function (Blueprint $table) {
            $table->id();
            $table->integer('metrica_nulo');
            $table->integer('metrica_bajo');
            $table->integer('metrica_medio');
            $table->integer('metrica_alto');
            //$table->integer('metrica_muyalto');
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
        Schema::dropIfExists('riesgo_metricas');
    }
}
