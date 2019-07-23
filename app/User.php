<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rol_id',
        'usuario_nombre',
        'usuario_apellido',
        'usuario_cedula',
        'usuario_sexo',
        'usuario_avatar',
        'usuario_telefono',
        'email',
        'password',
        'usuario_estado',
        'remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'usuario_password', 'remember_token',
    ];

    public $timestamps = false;

    public function direccion()
    {
        return $this->hasMany('App\Direccion');
    }
}
