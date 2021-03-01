<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDominiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dominios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categoria_id')->nullable()->references('id')->on('categorias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('riesgo_metrica_id')->nullable()->references('id')->on('riesgo_metricas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nombre');
            $table->boolean('estado');
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
        Schema::dropIfExists('dominios');
    }
}
