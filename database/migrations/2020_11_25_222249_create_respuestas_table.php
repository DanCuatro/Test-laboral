<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuestas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pregunta_id')->nullable()->references('id')->on('preguntas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('cuestionario_resuelto_id')->nullable()->references('id')->on('cuestionario_resueltos')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('respuesta');
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
        Schema::dropIfExists('respuestas');
    }
}
