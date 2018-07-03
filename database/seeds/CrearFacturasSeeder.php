<?php

use Illuminate\Database\Seeder;

class CrearFacturasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faturas = factory(App\Factura::class, 50)->create();
    }
}
