<?php

use Illuminate\Database\Seeder;

class CrearDetallePedidosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $detalles = factory(App\DetallePedido::class, 10)->create();
    }
}
