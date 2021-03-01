<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seccion_id')->nullable()->references('id')->on('secciones')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('dimension_id')->nullable()->references('id')->on('dimensiones')->onDelete('cascade')->onUpdate('cascade');
            $table->string('pregunta',600);
            $table->boolean('escala');
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
        Schema::dropIfExists('preguntas');
    }
}
