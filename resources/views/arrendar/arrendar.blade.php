@extends('layouts.app')


@section('imports')
<title>Map</title>
	<style>
#myMap {
   height: 350px;
   width: 680px;
}

</style>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwkqnh-BCwN7SFu-d2BBL8p7otc66uzlE&amp;sensor=false"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
</script>
<script type="text/javascript"> 
var map;
var marker;
var myLatlng = new google.maps.LatLng(-33.433332,-70.615599);
var geocoder = new google.maps.Geocoder();
var infowindow = new google.maps.InfoWindow();
function initialize(){
var mapOptions = {
zoom: 18,
center: myLatlng,
mapTypeId: google.maps.MapTypeId.ROADMAP
};

map = new google.maps.Map(document.getElementById("myMap"), mapOptions);

marker = new google.maps.Marker({
map: map,
position: myLatlng,
draggable: true 
}); 

geocoder.geocode({'latLng': myLatlng }, function(results, status) {
if (status == google.maps.GeocoderStatus.OK) {
if (results[0]) {
$('#latitude,#longitude').show();
$('#address').val(results[0].formatted_address);
$('#latitude').val(marker.getPosition().lat());
$('#longitude').val(marker.getPosition().lng());
infowindow.setContent(results[0].formatted_address);
infowindow.open(map, marker);
}
}
});

google.maps.event.addListener(marker, 'dragend', function() {

geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
if (status == google.maps.GeocoderStatus.OK) {
if (results[0]) {
$('#address').val(results[0].formatted_address);
$('#latitude').val(marker.getPosition().lat());
$('#longitude').val(marker.getPosition().lng());
infowindow.setContent(results[0].formatted_address);
infowindow.open(map, marker);
}
}
});
});

}
google.maps.event.addDomListener(window, 'load', initialize);
</script>



@endsection

@section('content')

<div class="container">
    <div class="row">
      <div class="col-md-8">
          <div id="myMap"></div>
      </div>
      <div class="col-md-4 mt-5 mt-md-0">
          <div class="card bg-dark text-white ">
              <h5 class="card-header">Selecciona tu ubicación en el mapa</h5>
              <div class="card-body">
                <p>Selecciona el lugar donde estas para buscar estacionamiento cercano</p>
                {{-- <button onclick="getLocation()" class="btn btn-outline-light btn-block">Utilizar mi dirección</button> --}}
                <form method="POST" action="/arrendar/busqueda">
                  @csrf
                    <input id="address" class="form-control" type="hidden" name="direccion"/><br/>
                    <input type="hidden" id="latitude" name="latitud" placeholder="Latitude"/>
                    <input type="hidden" id="longitude" name="longitud" placeholder="Longitude"/>
                  <button class="btn btn-block btn-light">Buscar</button>
                </form>
              </div>
      </div>
    </div>
</div>

@endsection