<?php

use Illuminate\Database\Seeder;

class CrearSeccionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Seccion::create([
            'nombre' => 'Innonva Tecnologias',
            'descripcion' => 'Sección de articulos tecnologicos',
            'imagen' => 'celular.svg',
        ]);

        App\Seccion::create([
            'nombre' => 'Innonva Zapatos',
            'descripcion' => 'Cliente',
            'imagen' => 'zapatos.svg',
        ]);

        App\Seccion::create([
            'nombre' => 'Innonva Joyas',
            'descripcion' => 'Cliente',
            'imagen' => 'joyas.svg',
        ]);
    }
}
