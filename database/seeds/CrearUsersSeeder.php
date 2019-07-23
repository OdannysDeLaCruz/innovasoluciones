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

        $odannys = new App\User;
        $odannys->rol_id           = 1;
        $odannys->usuario_nombre   = 'Odannys';
        $odannys->usuario_apellido = 'De La Cruz Calvo';
        $odannys->usuario_cedula   = '1065825573';
        $odannys->usuario_sexo     = 'm';
        $odannys->usuario_avatar   = 'avatar.png';
        $odannys->usuario_telefono = '3107484079';
        $odannys->email            = 'el_odanis321@hotmail.com';
        $odannys->password         = bcrypt('odannys321');
        $odannys->usuario_estado   = 1;
        $odannys->save();
        $odannys->direccion()->create([
            'pais'       => 'Colombia',
            'estado'     => 'Cesar',
            'ciudad'     => 'Valledupar',
            'direccion'  => 'Calle 6b # 41 - 36 La Nevada',
            'codigo_postal' => 200001
        ]);


        // App\Direccion::create([
        //     'user_id' => $user_id,
        //     'pais' => 'Colombia',
        //     'departamento' => 'Cesar',
        //     'distrito' => '',
        //     'ciudad' => 'Valledupar',
        //     'barrio' => 'La Nevada',
        //     'calle' => 'Cll 6b',
        //     'numero' => '41-36',
        //     'codigo_postal' => '200001'
        // ]);
        // App\User::create([
        //     'rol_id'            => 1,
        //     'usuario_nombre'    => 'Jose',
        //     'usuario_apellido'  => 'Meriño',
        //     'usuario_cedula'    => '7582574',
        //     'usuario_sexo'      => 'm',
        //     'usuario_avatar'    => 'avatar.png',
        //     'usuario_telefono'  => '3046124657',
        //     'email'             => 'jl562@hotmail.com',
        //     // 'usuario_pais'      => 'Colombia',
        //     // 'usuario_ciudad'    => 'Valledupar',
        //     // 'usuario_barrio'    => 'Comfacesar',
        //     // 'usuario_direccion' => 'En algún lado de este Bello mundo',
        //     'password'          => bcrypt('jose321'),
        //     'usuario_estado'    => 1,
        // ]);
        // App\User::create([
        //     'rol_id'            => 2,
        //     'usuario_nombre'    => 'Eduardo',
        //     'usuario_apellido'  => 'Lodico',
        //     'usuario_cedula'    => '1065825574',
        //     'usuario_sexo'      => 'm',
        //     'usuario_avatar'    => 'avatar.png',
        //     'usuario_telefono'  => '3043275975',
        //     'email'             => 'eduardolodico@gmail.com',
        //     // 'usuario_pais'      => 'Colombia',
        //     // 'usuario_ciudad'    => 'Valledupar',
        //     // 'usuario_barrio'    => 'La Nevada',
        //     // 'usuario_direccion' => 'En algún lado de este Bello mundo',
        //     'password'          => bcrypt('eduardo321'),
        //     'usuario_estado'    => 1,
        // ]);
        $users = factory(App\User::class, 3)->create();
    }
}
