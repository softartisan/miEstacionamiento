@extends('layouts.app')


@section('imports')


@section('content')
<div class="container">
        <div class="jumbotron text-light bg-dark">
            <div class="row">
                <div class="col-md-6">
                        <h1 class="display-4">Pago fallido</h1>
                        <p class="lead">{{ Auth::user()->usuario->nombre_usuario}} {{Auth::user()->usuario->apellido_usuario}}</p>
                        <h3>Lamentamos los inconvenientes, intentalo más tarde</h3>
                </div>
            </div>
    </div>
</div>
@endsection
