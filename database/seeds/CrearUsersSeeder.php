<?php

use Illuminate\Database\Seeder;

class CrearUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([

            'id_rol'           => 1,
            'nombre_completo'  => 'Odannys De La Cruz Calvo',
            'num_cedula'       => '1065825573',
            'telefono'         => '3107484079',
            'email'            => 'el_odanis321@hotmail.com',
            'pais'             => 'Colombia',
            'ciudad'           => 'Valledupar',
            'barrio'           => 'La Nevada',
            'direccion'        => 'Cll 6b # 41-36',
            'password'         => bcrypt('odannys321'),
            'fecha_registro'   => '2018-2-2',
            'remember_token'   => str_random(10),
        ]);
        $users = factory(App\User::class, 5)->create();
    }
}