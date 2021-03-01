<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{

    public function up()
    {
                                //Datos de empleados
        // Extencion del correo electronico permitios por el Tec, ejemplo: @itsx.edu.mx
        Schema::create('correos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('estado');
            $table->timestamps();
        });

        //Areas dentro del tec, estas pueden ser dadas de baja o editadas
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('estado');
            $table->timestamps();
        });
        
        //Areas dentro del tec, estas pueden ser dadas de baja o editadas
        Schema::create('puestos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('area_id')->references('id')->on('areas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->boolean('estado');
            $table->timestamps();
        });

        /*//Relacion Areas_Puestos ... un area puede compartir puestos con otra area 
        Schema::create('area_puesto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('area_id')->references('id')->on('areas');
            $table->foreignId('puesto_id')->references('id')->on('puestos');
            $table->timestamps();
        });*/

        //Catalogos para datos de Empleados
        Schema::create('cat_generos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('cat_estados_civil', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('cat_nivele_estudio', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('cat_tipos_contratacion', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('cat_tipos_personal', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('cat_jornada_trabajo', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('campus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('estado');
            $table->timestamps();
        });
        
        //Tabla principal de Empleados
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            
            $table->boolean('estado');
            $table->string('email')->unique();
            $table->string('password');
            
            $table->date('fecha_nacimiento')->nullable();
            $table->string('name')->nullable();
            $table->string('apellido_P')->nullable();
            $table->string('apellido_M')->nullable();

            $table->foreignId('correo_id')->nullable()->references('id')->on('correos')->onDelete('cascade')->onUpdate('cascade');
            
            $table->foreignId('campu_id')->nullable()->references('id')->on('campus')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_generos')->nullable()->references('id')->on('cat_generos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_estados_civil')->nullable()->references('id')->on('cat_estados_civil')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_nivele_estudio')->nullable()->references('id')->on('cat_nivele_estudio')->onDelete('cascade')->onUpdate('cascade');
            
            $table->foreignId('id_tipos_contratacion')->nullable()->references('id')->on('cat_tipos_contratacion')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_tipos_personal')->nullable()->references('id')->on('cat_tipos_personal')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_jornada_trabajo')->nullable()->references('id')->on('cat_jornada_trabajo')->onDelete('cascade')->onUpdate('cascade');
            
            
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        //Relacion puestos_empleados .... Un empleado puede tener hasta dos puestos
        Schema::create('puesto_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_puesto')->references('id')->on('puestos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_final')->nullable();
            $table->timestamps();
        });

        Schema::create('peticions', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('correo_id')->nullable()->references('id')->on('correos')->onDelete('cascade')->onUpdate('cascade');
            $table->string('email')->unique();
            $table->timestamps();
        });

        Schema::create('dato_personals', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('puesto_user_id')->references('id')->on('puesto_user')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('campu_id')->nullable()->references('id')->on('campus')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_generos')->nullable()->references('id')->on('cat_generos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_estados_civil')->nullable()->references('id')->on('cat_estados_civil')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_nivele_estudio')->nullable()->references('id')->on('cat_nivele_estudio')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_tipos_contratacion')->nullable()->references('id')->on('cat_tipos_contratacion')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_tipos_personal')->nullable()->references('id')->on('cat_tipos_personal')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_jornada_trabajo')->nullable()->references('id')->on('cat_jornada_trabajo')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });


    }

    public function down()
    {
        /*Schema::dropIfExists('cuestionarios_calificados');
        Schema::dropIfExists('cuestionarios_resueltos');
        Schema::dropIfExists('cuestionarios');
        Schema::dropIfExists('puesto_user');
        Schema::dropIfExists('users');
        
        Schema::dropIfExists('cat_tipos_personal');
        Schema::dropIfExists('cat_tipos_contratacion');
        Schema::dropIfExists('cat_nivele_estudio');
        Schema::dropIfExists('cat_estados_civil');
        Schema::dropIfExists('cat_generos');


        Schema::dropIfExists('puestos');
        Schema::dropIfExists('areas');
        Schema::dropIfExists('correos');*/

        Schema::dropIfExists('dato_personals');
        Schema::dropIfExists('cuestionarios_calificados');
        Schema::dropIfExists('cuestionarios_resueltos');
        Schema::dropIfExists('cuestionarios');
        Schema::dropIfExists('peticions');
        Schema::dropIfExists('puesto_user');
        Schema::dropIfExists('users');
        Schema::dropIfExists('campus');
        Schema::dropIfExists('cat_jornada_trabajo');
        Schema::dropIfExists('cat_tipos_personal');
        Schema::dropIfExists('cat_tipos_contratacion');
        Schema::dropIfExists('cat_nivele_estudio');
        Schema::dropIfExists('cat_estados_civil');
        Schema::dropIfExists('cat_generos');
        Schema::dropIfExists('puestos');
        Schema::dropIfExists('areas');
        Schema::dropIfExists('correos');

//

    }
}
