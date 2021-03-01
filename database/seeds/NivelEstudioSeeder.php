<?php

use Illuminate\Database\Seeder;
use App\Model\Usuario\Catalogos\Cat_nivel_estudio;

class NivelEstudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cat_nivel_estudio::create([
            'name' => 'Primaria (incompleta)'
        ]);
        Cat_nivel_estudio::create([
            'name' => 'Primaria (terminado)' 
        ]);

        Cat_nivel_estudio::create([
            'name' => 'Secundaria (incompleta)'
        ]);
        Cat_nivel_estudio::create([
            'name' => 'Secundaria (terminado)'
        ]);

        Cat_nivel_estudio::create([
            'name' => 'Preparatoria (incompleta)'
        ]);
        Cat_nivel_estudio::create([
            'name' => 'Preparatoria (terminado)'
        ]);

        Cat_nivel_estudio::create([
            'name' => 'Técnico Superior (incompleta)'
        ]);
        Cat_nivel_estudio::create([
            'name' => 'Técnico Superior (terminado)'
        ]);

        Cat_nivel_estudio::create([
            'name' => 'Licenciatura (incompleta)'
        ]);
        Cat_nivel_estudio::create([
            'name' => 'Licenciatura (terminado)'
        ]);
        
        Cat_nivel_estudio::create([
            'name' => 'Maestría (incompleta)'
        ]);
        Cat_nivel_estudio::create([
            'name' => 'Maestría (terminado)'
        ]);
        
        Cat_nivel_estudio::create([
            'name' => 'Doctorado (incompleta)'
        ]);
        Cat_nivel_estudio::create([
            'name' => 'Doctorado (terminado)'
        ]);
    }
}
