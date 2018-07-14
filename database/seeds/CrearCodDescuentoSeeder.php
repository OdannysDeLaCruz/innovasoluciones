<?php

use Illuminate\Database\Seeder;

class CrearCodDescuentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	App\CodDescuento::create([ 
	        'nombre_descuento'  => 'Descuento # 1',
	        'codigo_descuento'  => '554ipsa369',
	        'fecha_inicio'      => '2018-06-22 00:00:00',
        	'fecha_final'       => '2018-06-23 00:00:00',
	        'numero_canjeo'     => 3,
	        'minimo_carrito'    => 500000,
	        'descuento'         => 20,
	        'tipo_producto'     => 1
    	]);
        App\CodDescuento::create([ 
            'nombre_descuento'  => 'Descuento # 2',
            'codigo_descuento'  => '636maxime891',
            'fecha_inicio'      => '2018-06-22 00:00:00',
            'fecha_final'       => '2018-06-23 00:00:00',
            'numero_canjeo'     => 3,
            'minimo_carrito'    => 300000,
            'descuento'         => 10,
            'tipo_producto'     => 2
        ]);
        App\CodDescuento::create([ 
            'nombre_descuento'  => 'Descuento # 3',
            'codigo_descuento'  => '743itaque220',
            'fecha_inicio'      => '2018-06-22 00:00:00',
            'fecha_final'       => '2018-06-23 00:00:00',
            'numero_canjeo'     => 3,
            'minimo_carrito'    => 1000000,
            'descuento'         => 30,
            'tipo_producto'     => 3
        ]);

        $codigos = factory(App\CodDescuento::class, 20)->create();
    }
}
