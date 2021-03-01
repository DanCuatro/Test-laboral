<?php

use Illuminate\Database\Seeder; 
use App\Model\Usuario\Catalogos\Cat_tipos_contratacion;

class TiposContratacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cat_tipos_contratacion::create([
            'name' => 'Base'
        ]);
        Cat_tipos_contratacion::create([
            'name' => 'Honorarios'
        ]);
    }
}
