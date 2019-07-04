<?php

namespace App\Http\Controllers;

use App\Estacionamiento;
use Illuminate\Http\Request;

class EstacionamientoController extends Controller
{
    public function all()
    {
        // return Estacionamiento::all();
        return Estacionamiento::where('islibre','1')->get();
    }
}
