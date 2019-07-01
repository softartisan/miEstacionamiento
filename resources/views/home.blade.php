@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Inicio</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>Bienvenido de nuevo {{ Auth::user()->usuario->nombre_usuario}} {{Auth::user()->usuario->apellido_usuario}}</p>
                    
            </div>
        </div>
    </div> --}}


    <div class="jumbotron text-light" style="background-size: cover; background-image: url('/img/estacio.jpg');">
            <div class="row">
                <div class="col-md-6">
                        <h1 class="display-4">Bienvenido</h1>
                        <p class="lead">{{ Auth::user()->usuario->nombre_usuario}} {{Auth::user()->usuario->apellido_usuario}}</p>
                        <p>Estacionarse en Santiago nunca habia sido tan fácil, arrienda un estacionamiento en cualquier lugar a cualquier hora.</p>
                        <p class="lead">
                        @if(Auth::user()->usuario->tipo_usuario == 'administrador')
                          <a class="btn btn-light btn-lg" href="/crud" role="button">Administrar <i class="fas fa-arrow-right"></i></a>
                        @else
                        <a class="btn btn-light btn-lg" href="/home" role="button">Arrendar <i class="fas fa-arrow-right"></i></a>
                        @endif
                        </p>
                </div>
            </div>
    </div>
</div>
@endsection
