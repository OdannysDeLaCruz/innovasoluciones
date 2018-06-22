<?php

use Illuminate\Database\Seeder;

class CrearProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productos = factory(App\Producto::class, 50)->create();
    }
}
