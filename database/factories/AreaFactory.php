<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Usuario\Area;
use Faker\Generator as Faker;

$factory->define(Area::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'estado' => true
    ];
});
