@extends('layouts.app')


@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6">
        <div class="card " style="width: 18rem;">
            <div class="card-header">
            Estacionamiento
            </div>
            <ul class="list-group list-group-flush">
            <li class="list-group-item">Precio: {{$estacionamiento->precio_hora}}</li>
            <li class="list-group-item">Propietario: {{$estacionamiento->usuario->nombre_usuario}}</li>
            <li class="list-group-item">Numero: {{$estacionamiento->usuario->telefono_usuario}}</li>
            <li class="list-group-item">Numero: {{$estacionamiento->usuario->email_usuario}}</li>
            <button class="btn btn-dark">Arrendar Ahora</button>
            </ul>
          </div>
    </div>
    <div class="col-md-6">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1664.8124267194094!2d-70.61608134197573!3d-33.43302359519473!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662cf7b8a17a02b%3A0x29d0f904a70a87b0!2sAntonio+Varas+666%2C+Providencia%2C+Regi%C3%B3n+Metropolitana!5e0!3m2!1ses!2scl!4v1561737413490!5m2!1ses!2scl" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
  </div>
</div>
@endsection