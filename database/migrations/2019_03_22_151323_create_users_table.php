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
            $table->char('usuario_sexo', 1)->nullable();
            $table->string('usuario_avatar')->default('avatar.png');
            $table->string('usuario_telefono')->nullable();
            $table->string('email', 60)->unique();

            // $table->string('usuario_pais')->nullable();
            // $table->string('usuario_ciudad')->nullable();
            // $table->string('usuario_barrio')->nullable();
            // $table->string('usuario_direccion')->nullable();

            $table->string('password');
            $table->boolean('usuario_estado');

            $table->timestamp('fecha_creado')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('fecha_actualizado')->default(\DB::raw('CURRENT_TIMESTAMP'));

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
