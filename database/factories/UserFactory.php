<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    date_default_timezone_set('America/Bogota');
    static $password;
	return [
	    'rol_id'            => 2,
	    'usuario_nombre'    => $faker->firstName,
	    'usuario_apellido'  => $faker->lastName,
	    'usuario_cedula'    => rand(000000000, 999999999),
	    'usuario_telefono'  => $faker->phoneNumber,
	    'email'     		=> $faker->unique()->safeEmail,
	    'usuario_pais'      => $faker->country,
	    'usuario_ciudad'    => $faker->city,
	    'usuario_barrio'    => $faker->streetName,
	    'usuario_direccion' => $faker->address,
	    'password'  		=> bcrypt('secret'),
	    'usuario_estado'    => rand(0, 1)
	    // 'remember_token'   => str_random(10)
	];
});
