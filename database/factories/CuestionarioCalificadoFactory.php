<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cuestionarios_resuelto;
use App\Cuestionarios_calificado;
use Faker\Generator as Faker;


$factory->define(Cuestionarios_calificado::class, function (Faker $faker) {
    $cues = Cuestionarios_resuelto::find($faker->unique(true)->numberBetween(1, Cuestionarios_resuelto::count()));
    $dimension1 = $cues->s3+$cues->s1;
    $dimension2 = $cues->s2+$cues->s4;
    $dimension3 = $cues->s5;
    $dimension4 = $cues->s6+$cues->s12;
    $dimension5 = $cues->s7+$cues->s8;
    $dimension6 = $cues->s9+$cues->s10+$cues->s11;
    $dimension7 = $cues->s65+$cues->s66+$cues->s67+$cues->s68;
    $dimension8 = $cues->s13+$cues->s14;
    $dimension9 = $cues->s15+$cues->s16;
    $dimension10 = $cues->s25+$cues->s26+$cues->s27+$cues->s28;
    $dimension11 = $cues->s23+$cues->s24;
    $dimension12 = $cues->s29+$cues->s30;
    $dimension13 = $cues->s35+$cues->s36;
    $dimension14 = $cues->s17+$cues->s18;
    $dimension15 = $cues->s19+$cues->s20;
    $dimension16 = $cues->s21+$cues->s22;
    $dimension17 = $cues->s31+$cues->s32+$cues->s33+$cues->s34;
    $dimension18 = $cues->s37+$cues->s38+$cues->s39+$cues->s40+$cues->s41;
    $dimension19 = $cues->s42+$cues->s43+$cues->s44+$cues->s45+$cues->s46;
    $dimension20 = $cues->s69+$cues->s70+$cues->s71+$cues->s72;
    $dimension21 = $cues->s57+$cues->s58+$cues->s59+$cues->s60+$cues->s61+$cues->s62+$cues->s63+$cues->s64;
    $dimension22 = $cues->s47+$cues->s48;
    $dimension23 = $cues->s49+$cues->s50+$cues->s51+$cues->s52;
    $dimension24 = $cues->s55+$cues->s56;
    $dimension25 = $cues->s53+$cues->s54;
    return [
        'id_cuestionario_resueltos' =>  $cues->id,
        'estado' => 'finalizado',
        'dimension1' => $dimension1,
        'dimension2' => $dimension2,
        'dimension3' => $dimension3,
        'dimension4' => $dimension4,
        'dimension5' => $dimension5,
        'dimension6' => $dimension6,
        'dimension7' => $dimension7,
        'dimension8' => $dimension8,
        'dimension9' => $dimension9,
        'dimension10' => $dimension10,
        'dimension11' => $dimension11,
        'dimension12' => $dimension12,
        'dimension13' => $dimension13,
        'dimension14' => $dimension14,
        'dimension15' => $dimension15,
        'dimension16' => $dimension16,
        'dimension17' => $dimension17,
        'dimension18' => $dimension18,
        'dimension19' => $dimension19,
        'dimension20' => $dimension20,
        'dimension21' => $dimension21,
        'dimension22' => $dimension22,
        'dimension23' => $dimension23,
        'dimension24' => $dimension24,
        'dimension25' => $dimension25,
        'dominio1' => $dimension1+$dimension2+$dimension3,
        'dominio2' => $dimension4+$dimension5+$dimension6+$dimension7+$dimension8+$dimension9,
        'dominio3' => $dimension10+$dimension11+$dimension12+$dimension13,
        'dominio4' => $dimension14,
        'dominio5' => $dimension15+$dimension16,
        'dominio6' => $dimension17+$dimension18,
        'dominio7' => $dimension19+$dimension20,
        'dominio8' => $dimension21,
        'dominio9' => $dimension22+$dimension23,
        'dominio10' => $dimension24+$dimension25,
        'categoría1' => $dimension1+$dimension2+$dimension3,
        'categoría2' => $dimension4+$dimension5+$dimension6+$dimension7+$dimension8+$dimension9+
                        $dimension10+$dimension11+$dimension12+$dimension13,
        'categoría3' => $dimension14+
                        $dimension15+$dimension16,
        'categoría4' => $dimension17+$dimension18+
                        $dimension19+$dimension20+
                        $dimension21,
        'categoría5' => $dimension22+$dimension23+$dimension24+$dimension25
    ];
});