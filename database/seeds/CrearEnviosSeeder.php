<?php

use Illuminate\Database\Seeder;

class CrearEnviosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Envio::create([
            'envio_metodo' => 'Domicilio'
        ]);

        App\Envio::create([
            'envio_metodo' => 'Tienda fisica'
        ]);
    }
}
