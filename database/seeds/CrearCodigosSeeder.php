<?php

use Illuminate\Database\Seeder;

class CrearCodigosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	App\Codigo::create([ 
	        'codigo_nombre' => 'Descuento # 1',
	        'codigo_texto' => 'descuento1',
	        'codigo_fecha_inicio' => '2019-01-01 01:00:00',
        	'codigo_fecha_final' => '2019-12-31 00:00:00',
	        'codigo_numero_canjeo' => 3,
	        'codigo_minimo_carrito' => 500000,
	        'codigo_descuento_porciento' => 20,
	        'categoria_id' => 1
    	]);
        App\Codigo::create([ 
            'codigo_nombre' => 'Descuento # 2',
            'codigo_texto' => 'descuento2',
            'codigo_fecha_inicio' => '2019-01-01 01:00:00',
            'codigo_fecha_final' => '2019-12-31 00:00:00',
            'codigo_numero_canjeo' => 3,
            'codigo_minimo_carrito' => 100000,
            'codigo_descuento_porciento' => 10,
            'categoria_id' => 1
        ]);
    }
}

