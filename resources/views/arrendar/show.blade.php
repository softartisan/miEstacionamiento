@extends('layouts.app')



@section('imports')

<style>
  /* Set the size of the div element that contains the map */
 #map {
   height: 400px;  /* The height is 400 pixels */
   width: 100%;  /* The width is the width of the web page */
  }
</style>
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6">
        <div class="card " style="width: 18rem;">
            <div class="card-header">
              {{$estacionamiento->direccion}}
            </div>
            <form action="/arrendar/{{$estacionamiento->id}}" method="post">
                @csrf
                <ul class="list-group list-group-flush">
                <li class="list-group-item">Precio: <span id="precio">{{$estacionamiento->precio_hora}}</span></li>
                <li class="list-group-item">Propietario: {{$estacionamiento->usuario->nombre_usuario}}</li>
                <li class="list-group-item">Numero: {{$estacionamiento->usuario->telefono_usuario}}</li>
                <li class="list-group-item">Email: {{$estacionamiento->usuario->email_usuario}}</li>
                <li class="list-group-item">
                  <label for="cantidad">Cantidad de horas</label>
                  <input type="text" id="cantidad" class="form-control">
                </li>
                <li class="list-group-item"><p id="total">Total a pagar: </p></li>
                <button type="submit" class="btn btn-dark" id="boton">Arrendar Ahora</button>
              </ul>
           </form>
          </div>
    </div>
    <div class="col-md-6">
      <div id="map"></div>
    </div>
  </div>
</div>


<script>
  // Initialize and add the map
  function initMap() {
    // The location of Uluru
    const uluru = { lat: {{$estacionamiento->lat}}, lng: {{$estacionamiento->lon}} };
    // The map, centered at Uluru
    const map = new google.maps.Map(
        document.getElementById('map'), {zoom: 18, center: uluru});
    // The marker, positioned at Uluru
    const marker = new google.maps.Marker({position: uluru, map: map});
  }
</script>


<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAl8VWHE7KL4wcDz6tzOMTg17ZtAhsu8tA&callback=initMap">
</script>

@endsection

@section('jsimports')

<script src="/js/calculo.js"></script>
@endsection
