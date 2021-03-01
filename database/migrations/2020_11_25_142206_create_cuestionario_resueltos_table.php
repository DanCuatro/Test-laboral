<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuestionarioResueltosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuestionario_resueltos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('seccion_id')->nullable()->references('id')->on('secciones')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('puesto_id')->nullable()->references('id')->on('puestos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('cat_nivel_riesgo_id')->nullable()->references('id')->on('cat_nivel_riesgos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('periodo_id')->nullable()->references('id')->on('periodos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('dato_personal_id')->nullable()->references('id')->on('dato_personals')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('calificacion')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cuestionario_resueltos');
    }
}
