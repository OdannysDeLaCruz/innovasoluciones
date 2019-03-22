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
            // Los campos nullable se llenaran cunado se necesiten le indique al usuario actualizar info
            $table->increments('id');
            $table->integer('rol_id')->unsigned();
            $table->string('usuario_nombre');
            $table->string('usuario_apellido');
            $table->string('usuario_cedula', 15)->nullable()->unique();
            $table->string('usuario_telefono')->nullable();
            $table->string('usuario_email', 60)->unique();
            $table->string('usuario_pais')->nullable();
            $table->string('usuario_ciudad')->nullable();
            $table->string('usuario_barrio')->nullable();
            $table->string('usuario_direccion')->nullable();
            $table->string('usuario_password');
            $table->boolean('usuario_estado');

            $table->timestamp('fecha_creado');
            $table->timestamp('fecha_actualizado')->nullable();

            $table->rememberToken();

            $table->foreign('rol_id')->references('id')->on('roles')->onDelete('cascade');
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
