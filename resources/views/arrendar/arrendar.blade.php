@extends('layouts.app')


@section('imports')
<style>
 #map-canvas {
      height: 400px;
    }
    /* Optional: Makes the sample page fill the window. */
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
    }
</style>
@endsection

@section('content')

<div class="container">
    <div class="row">
      <div class="col-md-8">
          <div id="map-canvas"></div>
      </div>
      <div class="col-md-4 mt-5 mt-md-0">
          <div class="card bg-dark text-white ">
              <h5 class="card-header">Selecciona tu ubicación en el mapa</h5>
              <div class="card-body">
                <p>Selecciona o busca tu dirección para buscar estacionamientos cercanos </p>
                {{-- <button onclick="getLocation()" class="btn btn-outline-light btn-block">Utilizar mi dirección</button> --}}
                <form method="POST" action="/arrendar/busqueda">
                  @csrf
                  <input id="map-search" name="direccion" class="form-control" type="text" placeholder="Tu dirección">
                  <input type="hidden" name="lat" class="latitude"></label>
                  <input type="hidden" name="lon" class="longitude"></label>
                  <input type="hidden" class="reg-input-city" placeholder="City"></label>
                  
              
                  <button class="btn btn-block btn-light mt-3">Buscar</button>
                </form>
              </div>
      </div>
    </div>
</div>

<script src="/js/mapa.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAl8VWHE7KL4wcDz6tzOMTg17ZtAhsu8tA&libraries=places&callback=initialize"></script>
@endsection