<?php

use Illuminate\Database\Seeder;
use App\Model\Usuario\Catalogos\Cat_genero;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cat_genero::create([
            'name' => 'Femenino'
        ]);
        Cat_genero::create([
            'name' => 'Masculino'
        ]);
        Cat_genero::create([
            'name' => 'Indefinido'
        ]);
        Cat_genero::create([
            'name' => 'Prefiero no Decir'
        ]);

       
    }
}
