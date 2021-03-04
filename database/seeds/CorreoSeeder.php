<?php

use Illuminate\Database\Seeder;
use App\Model\Usuario\Correo;

class CorreoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Correo::create([
            'name' => 'itsx.edu.mx',
            'estado' => true
        ]);
        //factory(App\Cuestionarios_calificado::class,250)->create();
        
    }
}
