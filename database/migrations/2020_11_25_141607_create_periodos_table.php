<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodosTable extends Migration
{

    public function up()
    {
        Schema::create('periodos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cuestionario_id')->nullable()->references('id')->on('cuestionarios')->onDelete('cascade')->onUpdate('cascade');
            $table->date('periodo');
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_cierre')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('periodos');
    }
}
