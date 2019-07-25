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
            'codigo_postal' => 200001,
            'defecto' => 1
        ]);


        $users = factory(App\User::class, 3)->create();
    }
}
