<?php

namespace App\Http\Controllers;

use App\Estacionamiento;
use Illuminate\Http\Request;

class ArrendarController extends Controller
{
    public function __construct () {
        $this->middleware('auth');
        $this->middleware('role:cliente');
    }

    public function arrendar() {
        return view( 'arrendar.arrendar');
    }

    public function busqueda(){
        $estacionamientos = Estacionamiento::all();
        return view( 'arrendar.busqueda',compact('estacionamientos'));
    }

    public function show(Estacionamiento $estacionamiento){
        return view('arrendar.show', compact('estacionamiento'));
    }
}
