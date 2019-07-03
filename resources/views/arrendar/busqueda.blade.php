@extends('layouts.app')

@section('imports')
  <style>
    /* Always set the map height explicitly to define the size of the div
    * element that contains the map. */
    #map {
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
  
<div id="map"></div>

</div>
    <script>
        function initMap() {
        const map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(-33.432773, -70.615008),
          zoom: 18
        });
        const infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl('/api/estacionamiento', function(data) {
            const estacionamientos = JSON.parse(data.responseText);
            estacionamientos.forEach((estacionamiento) =>  {
              const point = new google.maps.LatLng(
                  parseFloat(estacionamiento.lat),
                  parseFloat(estacionamiento.lon));


              //Contenedor
              const infowincontent = document.createElement('div');
              infowincontent.classList.add('card');

              //Header
              const strong = document.createElement('div');
              strong.classList.add('card-header');
              strong.classList.add('text-white');
              strong.classList.add('bg-dark');
              strong.textContent = `Precio: ${estacionamiento.precio_hora}`;

              //Body
              const body = document.createElement('div');
              body.classList.add('card-body');

              //BodyText
              const text = document.createElement('p');
              text.classList.add('card-text');
              text.textContent = estacionamiento.direccion;
        
              //Anchor
              const anchor = document.createElement('a');
              anchor.classList.add('btn');
              anchor.classList.add('btn-dark');
              anchor.textContent = 'Arrendar';
              anchor.href=`/arrendar/${estacionamiento.id}`;


              body.appendChild(text);
              body.appendChild(anchor);

              infowincontent.appendChild(strong);
              infowincontent.appendChild(body);


            
              const marker = new google.maps.Marker({
                map: map,
                position: point,
                label: 'E'
              });

              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });

            });
          });
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAl8VWHE7KL4wcDz6tzOMTg17ZtAhsu8tA&callback=initMap">
    </script>

    
@endsection