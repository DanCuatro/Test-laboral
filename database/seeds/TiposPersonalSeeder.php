<?php

use Illuminate\Database\Seeder;
use App\Model\Usuario\Catalogos\Cat_tipos_personal;
use App\Model\Usuario\Campu;

class TiposPersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cat_tipos_personal::create([
            'name' => 'Sindicalizado'
        ]);
        Cat_tipos_personal::create([
            'name' => 'No Sindicalizado'
        ]);

        Campu::create([
            'name' => 'Arco Sur',
            'estado' =>true
        ]);
        Campu::create([
            'name' => 'Praderas',
            'estado' => true
        ]);
    }
}
