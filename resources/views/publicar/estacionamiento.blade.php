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
                <p>Selecciona o busca tu dirección para publicar tu estacionamiento </p>
                {{-- <button onclick="getLocation()" class="btn btn-outline-light btn-block">Utilizar mi dirección</button> --}}
                <form method="POST" action="/publicar">
                  @csrf
                  <label for="direccion">Dirección</label>
                  <input id="map-search" name="direccion" id="direccion" class="form-control mb-3" value="Antonio Varas 666, Providencia, Chile" type="text">
                  @error('direccion')
                  <span class="text-danger" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                  <label for="precio">Precio por hora</label>
                  <input type="text" name="precio" id="precio" placeholder="Precio por hora" class="form-control"></label>
                  @error('precio')
                  <span class="text-danger" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                  <input type="hidden" name="lat" value="-33.43299226260324" class="latitude"></label>
                  <input type="hidden" name="lon" value="-70.61501918650816" class="longitude"></label>
                  <input type="hidden" class="reg-input-city" placeholder="City"></label>
                  
              
                  <button class="btn btn-block btn-light mt-3">Publicar</button>
                </form>
              </div>
      </div>
    </div>
</div>

<script src="/js/mapa.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAl8VWHE7KL4wcDz6tzOMTg17ZtAhsu8tA&libraries=places&callback=initialize"></script>
@endsection