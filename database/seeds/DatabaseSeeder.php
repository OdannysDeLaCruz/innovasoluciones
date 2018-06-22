<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
        	CrearRolesSeeder::class,
        	CrearSeccionesSeeder::class,
        	CrearUsersSeeder::class,
        	CrearPedidosSeeder::class,
        	CrearCategoriasSeeder::class,
            CrearProductosSeeder::class,
            CrearDetallePedidosSeeder::class,
        	CrearImagenProductoSeeder::class,
        ]);
    }
}
