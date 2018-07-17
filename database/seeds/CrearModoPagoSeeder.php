<?php

use Illuminate\Database\Seeder;

class CrearModoPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\ModoPago::create([
            'num_pago' => 11111,
            'nombre_pago' => 'Tarjeta Credito'
        ]);
        App\ModoPago::create([
            'num_pago' => 22222,
            'nombre_pago' => 'Paypal'
        ]);
        App\ModoPago::create([
            'num_pago' => 33333,
            'nombre_pago' => 'Payu'
        ]);
        App\ModoPago::create([
            'num_pago' => 44444,
            'nombre_pago' => 'Transferencia bancaria'
        ]);
        App\ModoPago::create([
            'num_pago' => 55555,
            'nombre_pago' => 'Efecty'
        ]);
    }
}
