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
        $pedidos = factory(App\Pedido::class, 5)->create();
    }
}
