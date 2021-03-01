<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Model\Usuario\Catalogos\Cat_genero;
use App\Model\Usuario\Catalogos\Cat_estados_civil;
use App\Model\Usuario\Catalogos\Cat_nivel_estudio;
use App\Model\Usuario\Catalogos\Cat_tipos_contratacion;
use App\Model\Usuario\Catalogos\Cat_tipos_personal;
use App\Model\Usuario\Catalogos\Cat_jornada_trabajo;
use App\Model\Usuario\Campu;

$factory->define(User::class, function (Faker $faker) {
    $Cat_genero=Cat_genero::all()->count();
    $Cat_estados_civil=Cat_estados_civil::all()->count();
    $Cat_nivel_estudio=Cat_nivel_estudio::all()->count();
    $Cat_tipos_contratacion=Cat_tipos_contratacion::all()->count();
    $Cat_tipos_personal=Cat_tipos_personal::all()->count();
    $Cat_jornada_trabajo=Cat_jornada_trabajo::all()->count();
    $Campu=Campu::all()->count();
    return [
        'name' => $faker->name,
        'apellido_P' => $faker->name,
        'apellido_M' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('123456789'), // password
        'remember_token' => Str::random(10),
        'estado' => true,
        'fecha_nacimiento' => '1996-10-10',
        'correo_id' => 2,
        'id_generos' => rand(1,$Cat_genero),
        'id_estados_civil' => rand(1,$Cat_estados_civil),
        'id_nivele_estudio' => rand(1,$Cat_nivel_estudio),
        'id_tipos_contratacion' => rand(1,$Cat_tipos_contratacion),
        'id_tipos_personal' => rand(1,$Cat_tipos_personal),
        'id_jornada_trabajo' => rand(1,$Cat_jornada_trabajo),
        'campu_id' => rand(1,$Campu),
    ];
});
