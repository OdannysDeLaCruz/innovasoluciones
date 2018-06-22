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
    
    static $password;
	return [
	    'id_rol'           => 2,
	    'nombre_completo'  => $faker->name,
	    'num_cedula'       => rand(000000000, 999999999),
	    'telefono'         => $faker->phoneNumber,
	    'email'            => $faker->unique()->safeEmail,
	    'pais'             => $faker->country,
	    'ciudad'           => $faker->city,
	    'barrio'           => $faker->streetName,
	    'direccion'        => $faker->address,
	    'password'         => $password ?: $password = bcrypt('secret'),
	    'fecha_registro'   => $faker->date,
	    'remember_token'   => str_random(10)
	];
});
