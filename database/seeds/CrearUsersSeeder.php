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
            'nombre_completo' => 'Odannys De La Cruz',
            'pais'       => 'Colombia',
            'estado'     => 'Cesar',
            'ciudad'     => 'Valledupar',
            'direccion'  => 'Calle 6b # 41 - 36 La Nevada',
            'telefono'   => 3043614864,
            'codigo_postal' => 200001,
            'defecto' => 1
        ]);

        $ruben = new App\User;
        $ruben->rol_id           = 1;
        $ruben->usuario_nombre   = 'Ruben';
        $ruben->usuario_apellido = 'Gonzales';
        $ruben->usuario_cedula   = '1065640192';
        $ruben->usuario_sexo     = 'm';
        $ruben->usuario_avatar   = 'avatar.png';
        $ruben->usuario_telefono = '3172660830';
        $ruben->email            = 'rubensistenas@gmail.com';
        $ruben->password         = bcrypt('gonbel2019');
        $ruben->usuario_estado   = 1;
        $ruben->save();
        $ruben->direccion()->create([
            'nombre_completo' => 'Ruben Gonzales',
            'pais'       => 'Colombia',
            'estado'     => 'Cesar',
            'ciudad'     => 'Valledupar',
            'direccion'  => 'Calle 6b # 41 - 36 La Nevada',
            'telefono'   => 3172660830,
            'codigo_postal' => 200001,
            'defecto' => 1
        ]);

        $jose = new App\User;
        $jose->rol_id           = 1;
        $jose->usuario_nombre   = 'Jose';
        $jose->usuario_apellido = 'Meriño';
        $jose->usuario_cedula   = '432423423';
        $jose->usuario_sexo     = 'm';
        $jose->usuario_avatar   = 'avatar.png';
        $jose->usuario_telefono = '3172660830';
        $jose->email            = 'jl@gmail.com';
        $jose->password         = bcrypt('jose321');
        $jose->usuario_estado   = 1;
        $jose->save();
        $jose->direccion()->create([
            'nombre_completo' => 'Jose Meriño',
            'pais'       => 'Colombia',
            'estado'     => 'Cesar',
            'ciudad'     => 'Valledupar',
            'direccion'  => 'Mz 15 casa 6b -  La Castellana',
            'telefono'   => 3172660830,
            'codigo_postal' => 200001,
            'defecto' => 1
        ]);

        $eduardo = new App\User;
        $eduardo->rol_id           = 1;
        $eduardo->usuario_nombre   = 'Eduardo';
        $eduardo->usuario_apellido = 'Lodico';
        $eduardo->usuario_cedula   = '55555555';
        $eduardo->usuario_sexo     = 'm';
        $eduardo->usuario_avatar   = 'avatar.png';
        $eduardo->usuario_telefono = '3172660830';
        $eduardo->email            = 'lodico@gmail.com';
        $eduardo->password         = bcrypt('eduardo321');
        $eduardo->usuario_estado   = 1;
        $eduardo->save();
        $eduardo->direccion()->create([
            'nombre_completo' => 'Eduardo Lodico',
            'pais'       => 'Venezuela',
            'estado'     => 'Algún Lugar',
            'ciudad'     => 'Ni idea loco',
            'direccion'  => 'Si no me se la ciudad, la dirección menos.',
            'telefono'   => 3172660830,
            'codigo_postal' => 20005,
            'defecto' => 1
        ]);


        $users = factory(App\User::class, 3)->create();
    }
}
