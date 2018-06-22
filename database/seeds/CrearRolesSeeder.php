<?php

use Illuminate\Database\Seeder;

class CrearRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Rol::create(['nombre' => 'Admin']);

        App\Rol::create(['nombre' => 'Cliente']);
    }
}
