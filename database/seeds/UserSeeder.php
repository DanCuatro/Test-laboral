<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;


class UserSeeder extends Seeder
{
    public function run()
    {
        Role::create([
        	'name' 		=> 'Admin',
        	'slug' 		=> 'Admin',
        	'special' 	=> 'all-access',
        ]);
        
        
        $usuario=App\User::create([
            'name' => 'Daniel',
            'email' => 'alucard11096@gmail.com',
            'password' => bcrypt('123456789'),
            'estado' => true
        ]);
        $usuario->roles()->sync(1);

        $usuario=App\User::create([
            'name' => 'Viky',
            'email' => 'virginia.lb@xalapa.tecnm.mx',
            'password' => bcrypt('Testlaboral2021'),
            'estado' => true
        ]);
        $usuario->roles()->sync(1);

        $usuario=App\User::create([
            'name' => 'Administracion',
            'email' => 'administracion@itsx.edu.mx',
            'password' => bcrypt('Testlaboral2021'),
            'estado' => true
        ]);
        $usuario->roles()->sync(1);
    }
}
