<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


class CrudController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('role:administrador');
    }

    public function index()
    {
        $request = Request::create('/api/cliente/', 'GET');
        $response = Route::dispatch($request);
        $clientes = json_decode( $response->getContent());
        return View( 'crud.read', compact('clientes') );
    }

    public function edit($id){
        $url = '/api/cliente/'.$id;
        $request = Request::create($url, 'GET');
        $response = Route::dispatch($request);
        $cliente = json_decode( $response->getContent());
        if($cliente != null){
            return View( 'crud.edit', compact('cliente') );
        }
        return Redirect('/crud');
    }

    public function update($id)
    {
        //Preparando la data
        $data = request()->validate([
            'password' => ['required', 'string', 'min:8','min:50', 'confirmed'],
            'nombre' => ['required', 'string', 'max:50'],
            'apellido' => ['required', 'string', 'max:50'],
            'telefono' => ['required', 'string', 'max:20'],
        ]);

        $url = '/api/cliente/'.$id;
        $request = Request::create($url, 'PATCH', $data);
        $response = Route::dispatch($request);
        $cliente = json_decode( $response->getContent());
        return Redirect('/crud');
    }

    public function destroy($id){
        $url = '/api/cliente/'.$id;
        $request = Request::create($url, 'DELETE');
        $response = Route::dispatch($request);
        $clientes = json_decode( $response->getContent());
        return Redirect('/crud');
    }
    
}
