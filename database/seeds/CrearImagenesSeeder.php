<?php

use Illuminate\Database\Seeder;

class CrearImagenesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $imagenes = factory(App\Imagen::class, 100)->create();
    }
}

