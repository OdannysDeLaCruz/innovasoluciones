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
            'nombre' => 'tecnologias',
            'descripcion' => 'Sección de articulos tecnologicos',
            'imagen' => 'celular.svg',
        ]);

        App\Seccion::create([
            'nombre' => 'zapatos',
            'descripcion' => 'Sección de venta de calzado',
            'imagen' => 'zapatos.svg',
        ]);

        App\Seccion::create([
            'nombre' => 'joyas',
            'descripcion' => 'Sección de venta de joyas',
            'imagen' => 'joyas.svg',
        ]);
    }
}
