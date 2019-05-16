<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class CrearUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        date_default_timezone_set('America/Bogota');
        App\User::create([
            'rol_id'            => 1,
            'usuario_nombre'    => 'Odannys',
            'usuario_apellido'  => 'De La Cruz Calvo',
            'usuario_cedula'    => '1065825573',
            'usuario_telefono'  => '3107484079',
            'email'              => 'el_odanis321@hotmail.com',
            'usuario_pais'      => 'Colombia',
            'usuario_ciudad'    => 'Valledupar',
            'usuario_barrio'    => 'La Nevada',
            'usuario_direccion' => 'Cll 6b # 41-36',
            'password'          => bcrypt('odannys321'),
            'usuario_estado'    => 1,
            // 'remember_token'   => str_random(10),            
        ]);
        App\User::create([
            'rol_id'            => 2,
            'usuario_nombre'    => 'Carlos',
            'usuario_apellido'  => 'De La Cruz Calvo',
            'usuario_cedula'    => '1065825574',
            'usuario_telefono'  => '3107484079',
            'email'              => 'carlos321@hotmail.com',
            'usuario_pais'      => 'Colombia',
            'usuario_ciudad'    => 'Valledupar',
            'usuario_barrio'    => 'La Nevada',
            'usuario_direccion' => 'Cll 6b # 41-36',
            'password'          => bcrypt('carlos321'),
            'usuario_estado'    => 1,
            // 'remember_token'   => str_random(10),

        ]);

        $users = factory(App\User::class, 5)->create();
    }
}
