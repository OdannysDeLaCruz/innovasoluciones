<?php

use Illuminate\Database\Seeder;

class CrearMarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Marca::class, 10)->create();
    }
}
