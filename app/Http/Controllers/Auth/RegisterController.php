<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/productos';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'usuario_nombre'   => 'required|string|max:45',
            'usuario_apellido' => 'required|string|max:45',
            'usuario_cedula'   => 'required|string|max:15|unique:users',
            'usuario_telefono' => 'required|string|max:15',
            'email'            => 'required|string|email|max:100|unique:users',
            'usuario_pais'     => 'string|max:100',
            'usuario_ciudad'   => 'string|max:100|',
            'usuario_barrio'   => 'string|max:100|',
            'usuario_direccion'=> 'string|max:100|',
            'password'         => 'required|string|min:6|max:15|confirmed',
        ]);
        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'rol_id'            => 2,
            'usuario_nombre'    => $data['usuario_nombre'],
            'usuario_apellido'  => $data['usuario_apellido'],
            'usuario_cedula'    => $data['usuario_cedula'],
            'usuario_telefono'  => $data['usuario_telefono'],
            'email'             => $data['email'],            
            'usuario_pais'      => $this->verificarExistenciaCampo('usuario_pais', $data),
            'usuario_ciudad'    => $this->verificarExistenciaCampo('usuario_ciuda', $data),
            'usuario_barrio'    => $this->verificarExistenciaCampo('usuario_barrio', $data),
            'usuario_direccion' => $this->verificarExistenciaCampo('usuario_direccion', $data),
            'password'          => bcrypt($data['password']),
            'usuario_estado'    => 1
        ]);        
    }

    protected function verificarExistenciaCampo($key, $data) {
        if (array_key_exists('usuario_pais', $data)) {
            return $data;
        }else {
            return "Vacio";
        }
    }
}
