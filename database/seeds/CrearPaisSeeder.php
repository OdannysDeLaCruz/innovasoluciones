<?php

use Illuminate\Database\Seeder;
use App\Pais;
class CrearPaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Pais::create( [
		'id'=>5,
		'pais_nombre'=>'Argentina'
		] );
					
		Pais::create( [
		'id'=>123,
		'pais_nombre'=>'Bolivia'
		] );
					
		Pais::create( [
		'id'=>12,
		'pais_nombre'=>'Brasil'
		] );
					
		Pais::create( [
		'id'=>32,
		'pais_nombre'=>'Canadá'
		] );

		Pais::create( [
		'id'=>81,
		'pais_nombre'=>'Chile'
		] );
					
		Pais::create( [
		'id'=>35,
		'pais_nombre'=>'China'
		] );

		Pais::create( [
		'id'=>82,
		'pais_nombre'=>'Colombia'
		] );
					
		Pais::create( [
		'id'=>36,
		'pais_nombre'=>'Costa Rica'
		] );
					
		Pais::create( [
		'id'=>113,
		'pais_nombre'=>'Cuba'
		] );
					
		Pais::create( [
		'id'=>103,
		'pais_nombre'=>'Ecuador'
		] );
					
		Pais::create( [
		'id'=>51,
		'pais_nombre'=>'El Salvador'
		
		] );
					
		Pais::create( [
		'id'=>28,
		'pais_nombre'=>'España'
		] );
					
		Pais::create( [
		'id'=>55,
		'pais_nombre'=>'Estados Unidos'
		] );
					
		Pais::create( [
		'id'=>64,
		'pais_nombre'=>'Francia'
		] );
					
		Pais::create( [
		'id'=>17,
		'pais_nombre'=>'Guadalupe'
		] );
					
		Pais::create( [
		'id'=>185,
		'pais_nombre'=>'Guatemala'
		] );
					
		Pais::create( [
		'id'=>137,
		'pais_nombre'=>'Honduras'
		] );

		Pais::create( [
		'id'=>42,
		'pais_nombre'=>'México'
		] );

		Pais::create( [
		'id'=>209,
		'pais_nombre'=>'Nicaragua'
		] );
					
		Pais::create( [
		'id'=>124,
		'pais_nombre'=>'Panamá'
		] );					
					
		Pais::create( [
		'id'=>110,
		'pais_nombre'=>'Paraguay'
		] );
					
		Pais::create( [
		'id'=>89,
		'pais_nombre'=>'Perú'
		] );

		Pais::create( [
		'id'=>48,
		'pais_nombre'=>'Portugal'
		] );
					
		Pais::create( [
		'id'=>246,
		'pais_nombre'=>'Puerto Rico'
		] );					
					
		Pais::create( [
		'id'=>138,
		'pais_nombre'=>'República Dominicana'
		] );
	
		Pais::create( [
		'id'=>111,
		'pais_nombre'=>'Uruguay'
		] );

		Pais::create( [
		'id'=>95,
		'pais_nombre'=>'Venezuela'
		] );		
    }
}
