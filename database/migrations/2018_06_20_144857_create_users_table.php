<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            // Los campos nullable se llenaran cunado se necesiten
            $table->increments('id');
            $table->integer('id_rol')->unsigned();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('num_cedula')->nullable();
            $table->string('telefono')->nullable();
            $table->string('email', 60)->unique();
            $table->string('pais')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('barrio')->nullable();
            $table->string('direccion')->nullable();
            $table->string('password');
            $table->timestamp('fecha_registro');

            $table->rememberToken();
            // $table->timestamps();

            $table->foreign('id_rol')->references('id')->on('roles')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
