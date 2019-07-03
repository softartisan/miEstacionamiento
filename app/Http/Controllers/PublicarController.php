<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Estacionamiento;
use Illuminate\Http\Request;

class PublicarController extends Controller
{
    public function __function () {

    }

    public function estacionamiento () {
        return view( 'publicar.estacionamiento');
    }

    public function publicar () {
        $data = request()->validate([
            'precio' => ['required', 'numeric', 'min:1000'],
            'lat' => ['required', 'numeric'],
            'lon' => ['required', 'numeric'],
            'direccion' => ['required', 'string'],
        ]);

        $estacionamiento = Estacionamiento::create([
            'precio_hora' => $data['precio'],
            'islibre' => 1,
            'lat' => $data['lat'],
            'lon' => $data['lon'],
            'direccion' => $data['direccion'],
            'usuario_id' => Auth::user()->usuario_id
        ]);

        return View('publicar.resumen', compact('estacionamiento'));

    }
}
