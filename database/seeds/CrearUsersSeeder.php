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
            'usuario_sexo'      => 'm',
            'usuario_avatar'    => 'avatar.png',
            'usuario_telefono'  => '3107484079',
            'email'             => 'el_odanis321@hotmail.com',
            'usuario_pais'      => 'Colombia',
            'usuario_ciudad'    => 'Valledupar',
            'usuario_barrio'    => 'La Nevada',
            'usuario_direccion' => 'Cll 6b # 41-36',
            'password'          => bcrypt('odannys321'),
            'usuario_estado'    => 1,           
        ]);
        App\User::create([
            'rol_id'            => 1,
            'usuario_nombre'    => 'Jose',
            'usuario_apellido'  => 'Meriño',
            'usuario_cedula'    => '7582574',
            'usuario_sexo'      => 'm',
            'usuario_avatar'    => 'avatar.png',
            'usuario_telefono'  => '3046124657',
            'email'             => 'jl562@hotmail.com',
            'usuario_pais'      => 'Colombia',
            'usuario_ciudad'    => 'Valledupar',
            'usuario_barrio'    => 'Comfacesar',
            'usuario_direccion' => 'En algún lado de este Bello mundo',
            'password'          => bcrypt('jose321'),
            'usuario_estado'    => 1,
        ]);
        App\User::create([
            'rol_id'            => 2,
            'usuario_nombre'    => 'Eduardo',
            'usuario_apellido'  => 'Lodico',
            'usuario_cedula'    => '1065825574',
            'usuario_sexo'      => 'm',
            'usuario_avatar'    => 'avatar.png',
            'usuario_telefono'  => '3043275975',
            'email'             => 'eduardolodico@gmail.com',
            'usuario_pais'      => 'Colombia',
            'usuario_ciudad'    => 'Valledupar',
            'usuario_barrio'    => 'La Nevada',
            'usuario_direccion' => 'En algún lado de este Bello mundo',
            'password'          => bcrypt('eduardo321'),
            'usuario_estado'    => 1,
        ]);
        $users = factory(App\User::class, 3)->create();
    }
}
