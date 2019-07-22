<?php

use Illuminate\Database\Seeder;

class CrearProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $proveedores = factory(App\Proveedor::class, 5)->create();
    }
}
