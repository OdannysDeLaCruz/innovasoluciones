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
        $app_url = env('APP_URL');

        if($app_url == 'http://www.innovasoluciones.com'){  
            $this->truncateTables([
                'roles',
                'secciones',
                'users',
                'categorias',
                'promociones',
                'envios',
                'transacciones',
                // 'pedidos',
                'productos',
                // 'detalle_pedidos',
                'imagenes'
            ]);
        }
        $this->call([
        	CrearRolesSeeder::class,
        	CrearSeccionesSeeder::class,
        	CrearUsersSeeder::class,
            CrearCategoriasSeeder::class,
            CrearPromocionesSeeder::class,
        	CrearEnviosSeeder::class,
            // CrearPedidosSeeder::class,
            CrearProductosSeeder::class,
            // CrearDetallePedidosSeeder::class,
            CrearImagenesSeeder::class,
        ]);
    }

    protected function truncateTables(array $tables)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
