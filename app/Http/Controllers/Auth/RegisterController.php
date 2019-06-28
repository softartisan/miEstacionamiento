<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Usuario;
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
    protected $redirectTo = '/home';

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
            'email' => ['required', 'string', 'email', 'max:30', 'unique:users'],
            'password' => ['required', 'string', 'min:8','min:50', 'confirmed'],
            'nombre' => ['required', 'string', 'max:50'],
            'apellido' => ['required', 'string', 'max:50'],
            'telefono' => ['required', 'string', 'max:20']
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
        $password = Hash::make($data['password']);

        $usuario = Usuario::create([
        'isenabled_usuario' => true,
        'tipo_usuario' => 'cliente',
        'email_usuario' => $data['email'],
        'password_usuario' => $password,
        'nombre_usuario' => $data['nombre'],
        'apellido_usuario' => $data['apellido'],
        'telefono_usuario' => $data['telefono'],
        ]);

        $user = User::create([
            'usuario_id' => $usuario->id,
            'email' => $data['email'],
            'password' => $password
        ]);

        return $user;

    }
}
