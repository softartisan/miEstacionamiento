

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
            Pago realizado con exito
            </div>
            
                <ul class="list-group list-group-flush">
                <h1 class="display-4">Pago realizado con exito</h1>
                <li class="list-group-item">Propietario: {{$estacionamiento->usuario->nombre_usuario}} {{$estacionamiento->usuario->apellido_usuario}}</li>
                <li class="list-group-item">Telefono: {{$estacionamiento->telefono_usuario}}</li>
                <li class="list-group-item">Precio por hora: <span id="precio">{{$estacionamiento->precio_hora}}</span></li>
                <li class="list-group-item">Dirección: {{$estacionamiento->direccion}}</li>
            </ul>
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

