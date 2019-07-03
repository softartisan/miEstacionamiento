@extends('layouts.app')


@section('imports')


@section('content')
<div class="container">
        <div class="jumbotron text-light" style="background-size: cover; background-image: url('/img/estacio.jpg');">
            <div class="row">
                <div class="col-md-6">
                        <h1 class="display-4">Pago realizado con exito</h1>
                        <p class="lead">{{ Auth::user()->usuario->nombre_usuario}} {{Auth::user()->usuario->apellido_usuario}}</p>
                        <p></p>
                        <h3>La información del estacionamiento que arrendaste es:</h3>
                        <p class="lead">Direccion : {{$estacionamiento->direccion}}</p>
                        <p class="lead">Propietario: {{$estacionamiento->usuario->nombre_usuario}} {{$estacionamiento->usuario->apellido_usuario}}</p>
                        <p class="lead">Numero de telefono : {{$estacionamiento->usuario->telefono_usuario}}</p>
                </div>
            </div>
    </div>
</div>
@endsection
