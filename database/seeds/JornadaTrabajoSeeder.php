<?php

use Illuminate\Database\Seeder;
use App\Model\Usuario\Catalogos\Cat_jornada_trabajo;

class JornadaTrabajoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cat_jornada_trabajo::create([
            'name' => 'Matutino'
        ]);
        Cat_jornada_trabajo::create([
            'name' => 'Vespertino'
        ]);
        Cat_jornada_trabajo::create([
            'name' => 'Mixto'
        ]);
    }
}
