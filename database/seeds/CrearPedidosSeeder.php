<?php

use Illuminate\Database\Seeder;

class CrearPedidosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// $id_codigo     = App\CodDescuento::where('codigo_descuento', '554ipsa369')->value('id');
    	// $numero_canjeo = App\CodDescuento::where('id', $id_codigo)->value('numero_canjeo');

    	// $codigos_usados = App\Pedido::select('id_codigo_descuento')->where('id_codigo_descuento', $id_codigo)->count();

        // if ($codigos_usados < $numero_canjeo ) { 
        //        App\Pedido::where('id', 1)->update(['id_codigo_descuento' => 1]); 
        //    } 
        //    else {	
        //        echo 'Cantidad de uso exedida';
        //    }

        $pedidos = factory(App\Pedido::class, 10)->create();
    }
}
