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
            $table->increments('id');
            $table->integer('id_rol')->unsigned();
            $table->string('nombre_completo');
            $table->string('num_cedula');
            $table->string('telefono');
            $table->string('email', 60)->unique();
            $table->string('pais');
            $table->string('ciudad');
            $table->string('barrio');
            $table->string('direccion');
            $table->string('password');
            $table->string('fecha_registro');

            $table->rememberToken();
            $table->timestamps();

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
