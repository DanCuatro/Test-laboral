<?php

use Illuminate\Database\Seeder;
use App\Model\Cuestionario\Seccion;
use App\Model\Cuestionario\Categoria;
use App\Model\Cuestionario\RiesgoMetrica;


class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RiesgoMetrica::create([
            'metrica_nulo'  =>25,
            'metrica_bajo'  =>25,
            'metrica_medio' =>25,
            'metrica_alto'  =>25,
            'metrica_muyalto'   =>25
        ])->categoria()->create([
            'nombre' => 'Ambiente de trabajo', 
            'estado' => true
        ]);

        /*$seccion=Seccion::create([
            'titulo' => 'Para responder las preguntas siguientes considere las condiciones ambientales de su centro de trabajo.',
            'estado' => true
        ]);
        $seccion->pregunta()->create([
            'pregunta' => 'El espacio donde trabajo me permite realizar mis actividades de manera segura e higiénica',
            'escala' => true,
            'estado' => true
        ]);*/
    }
}
