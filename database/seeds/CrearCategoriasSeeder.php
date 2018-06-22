<?php

use Illuminate\Database\Seeder;

class CrearCategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = factory(App\Categoria::class, 15)->create();
    }
}
