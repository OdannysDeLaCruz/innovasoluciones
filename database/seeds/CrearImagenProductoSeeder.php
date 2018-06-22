<?php

use Illuminate\Database\Seeder;

class CrearImagenProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $imagenes = factory(App\ImagenProducto::class, 100)->create();
    }
}
