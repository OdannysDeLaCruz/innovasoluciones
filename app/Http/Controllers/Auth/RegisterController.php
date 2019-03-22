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
            'usuario_cedula'   => 'required|string|max:15',
            'usuario_telefono' => 'required|string|max:15',
            'usuario_email'    => 'required|string|email|max:100|unique:users',
            'usuario_pais'     => 'required|string|max:100',
            'usuario_ciudad'   => 'required|string|max:100|',
            'usuario_barrio'   => 'required|string|max:100|',
            'usuario_direccion'=> 'required|string|max:100|',
            'usuario_password' => 'required|string|min:6|confirmed',
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
            'usuario_nombre'    => $data['nombre'],
            'usuario_apellido'  => $data['apellido'],
            'usuario_cedula'    => $data['cedula'],
            'usuario_telefono'  => $data['telefono'],
            'usuario_email'     => $data['email'],            
            // Datos de envios
            'usuario_pais'      => $data['pais'],
            'usuario_ciudad'    => $data['ciudad'],
            'usuario_barrio'    => $data['barrio'],
            'usuario_direccion' => $data['direccion'],

            'usuario_password'  => Hash::make($data['password']),
            'usuario_estado'    => 1
        ]);
    }
}
