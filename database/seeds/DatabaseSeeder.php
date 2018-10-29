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
        // $this->truncateTables([
        //     'roles',
        //     'secciones',
        //     'users',
        //     'categorias',
        //     'cod_descuentos',
        //     'modo_pago',
        //     'pedidos',
        //     'productos',
        //     'detalle_pedidos',
        //     'imagenes_productos'
        // ]);
        $this->call([
        	CrearRolesSeeder::class,
        	CrearSeccionesSeeder::class,
        	CrearUsersSeeder::class,
            CrearCategoriasSeeder::class,
        	CrearCodDescuentoSeeder::class,
            CrearModoPagoSeeder::class,
            CrearPedidosSeeder::class,
            CrearProductosSeeder::class,
            CrearDetallePedidosSeeder::class,
            CrearImagenProductoSeeder::class,
        ]);
    }

    // protected function truncateTables(array $tables)
    // {
    //     DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

    //     foreach ($tables as $table) {
    //         DB::table($table)->truncate();
    //     }

    //     DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    // }
}
