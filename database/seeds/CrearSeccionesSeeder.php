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
            'nombre' => 'innova tecnologias',
            'descripcion' => 'Sección de articulos tecnologicos',
            'imagen' => 'celular.svg',
        ]);

        App\Seccion::create([
            'nombre' => 'innova zapatos',
            'descripcion' => 'Sección de venta de calzado',
            'imagen' => 'zapatos.svg',
        ]);

        App\Seccion::create([
            'nombre' => 'innova joyas',
            'descripcion' => 'Sección de venta de joyas',
            'imagen' => 'joyas.svg',
        ]);
    }
}
