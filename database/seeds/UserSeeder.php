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
        
        factory(App\User::class,300)->create();

        App\User::create([
            'name' => 'Daniel',
            'email' => 'alucard11096@gmail.com',
            'password' => bcrypt('123456789'),
            'estado' => true
        ]);



    }
}
