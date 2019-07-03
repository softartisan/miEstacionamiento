@extends('layouts.app')


@section('imports')


@section('content')
<div class="container">
        <div class="jumbotron text-light" style="background-size: cover; background-image: url('/img/estacio.jpg');">
            <div class="row">
                <div class="col-md-6">
                        <h1 class="display-4">Pago realizado con exito</h1>
                        <p class="lead">{{ Auth::user()->usuario->nombre_usuario}} {{Auth::user()->usuario->apellido_usuario}}</p>
                        <p class="lead">Direccion : {{$estacionamiento->direccion}}</p>
                </div>
            </div>
    </div>
</div>
@endsection
