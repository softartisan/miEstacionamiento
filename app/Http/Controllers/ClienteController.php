<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function index()
    {
        return Usuario::all()->where( 'tipo_usuario', '=', 'cliente' );
    }

    public function show(Usuario $usuario)
    {
        return $usuario;
    }

    // public function store(Request $request)
    // {
    //     $usuario = Usuario::create($request->all());

    //     return response()->json($usuario, 201);
    // }

    public function update(Request $request, Usuario $usuario)
    {
        $password = Hash::make($request->password);
        $usuario->nombre_usuario = $request->nombre;
        $usuario->apellido_usuario = $request->apellido;
        $usuario->telefono_usuario = $request->telefono;
        $usuario->password_usuario = $password;
        $usuario->save();

        $user = User::where('usuario_id',$usuario->id)->first();
        $user->password = $password;
        $user->save();
        //Save

        return response()->json($user->usuario(), 200);
    }

    public function delete(Usuario $usuario)
    {
        $user = User::where('usuario_id',$usuario->id)->first();
        $user->delete();
        $usuario->delete();

        return response()->json(null, 204);
    }
}
