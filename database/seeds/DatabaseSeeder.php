<?php

use Illuminate\Database\Seeder;
use app\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionsTableSeeder::class);
        $this->call(CorreoSeeder::class);
        
        $this->call(GeneroSeeder::class);
        $this->call(EstadosCivilSeeder::class);
        $this->call(NivelEstudioSeeder::class);
        
        $this->call(TiposContratacionSeeder::class);
        $this->call(TiposPersonalSeeder::class);
        $this->call(JornadaTrabajoSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CuestionarioFormato::class);
        
        
    }
}
