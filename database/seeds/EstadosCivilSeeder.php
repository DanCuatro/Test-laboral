<?php

use Illuminate\Database\Seeder;
use App\Model\Usuario\Catalogos\Cat_estados_civil;

class EstadosCivilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cat_estados_civil::create([
            'name' => 'Casado'
        ]);
        Cat_estados_civil::create([
            'name' => 'Divorciado'
        ]);
        Cat_estados_civil::create([
            'name' => 'Soltero'
        ]);
        Cat_estados_civil::create([
            'name' => 'Viudo'
        ]);
        Cat_estados_civil::create([
            'name' => 'Unión libre'
        ]);
    }
}
