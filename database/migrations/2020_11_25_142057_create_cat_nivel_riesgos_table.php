<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatNivelRiesgosTable extends Migration
{
    public function up()
    {
        Schema::create('cat_nivel_riesgos', function (Blueprint $table) {
            $table->id();
            $table->string('nivel');
            $table->string('descripcion',10000);
            $table->integer('r');
            $table->integer('g');
            $table->integer('b');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cat_nivel_riesgos');
    }
}
