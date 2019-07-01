@extends('layouts.app')

@section('content')
<div class="container">


  <div class="row">
      @foreach($estacionamientos as $estacionamiento)
      <div class="col-md-6 mb-md-5">
          <div class="card" style="width: 18rem;">
              <div class="card-header">
              Estacionamiento
              </div>
              <ul class="list-group list-group-flush">
              <li class="list-group-item">Precio: {{$estacionamiento->precio_hora}}</li>
              <li class="list-group-item">Propietario: {{$estacionamiento->usuario->nombre_usuario}}</li>
              <li class="list-group-item">Numero: {{$estacionamiento->usuario->telefono_usuario}}</li>
              <a href="/arrendar/{{$estacionamiento->id}}" class="btn btn-block btn-dark">Ver</a>
              </ul>
            </div>
      </div>
      @endforeach

  </div>
</div>


@endsection