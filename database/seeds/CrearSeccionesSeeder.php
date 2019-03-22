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
            'seccion_nombre' => 'tecnologias',
            'seccion_descripcion' => 'Sección de articulos tecnologicos',
            'seccion_imagen' => 'celular.svg',
        ]);

        App\Seccion::create([
            'seccion_nombre' => 'zapatos',
            'seccion_descripcion' => 'Sección de venta de calzado',
            'seccion_imagen' => 'zapatos.svg',
        ]);

        App\Seccion::create([
            'seccion_nombre' => 'joyas',
            'seccion_descripcion' => 'Sección de venta de joyas',
            'seccion_imagen' => 'joyas.svg',
        ]);
    }
}
