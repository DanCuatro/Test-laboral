<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriaCalificadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_calificadas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categoria_id')->nullable()->references('id')->on('categorias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('cuestionario_resuelto_id')->nullable()->references('id')->on('cuestionario_resueltos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('cat_nivel_riesgo_id')->nullable()->references('id')->on('cat_nivel_riesgos')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('calificacion');
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
        Schema::dropIfExists('categoria_calificadas');
    }
}
