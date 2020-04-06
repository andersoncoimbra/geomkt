@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Map de associações</h1>
@stop

@section('content')
<div class="col-md-8">
<div id="google-map" ></div>
</div>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAEZe1dNPPdc_lwtJGgs1Cq4fdzmOLuQTY&v=3"></script>
<script type="text/javascript">

  function initialize_map() {

            var centerlizedmap = new google.maps.LatLng(-1.4354115,-48.4641122);
            var mapOptions = {
              zoom: 13.9,
              scrollwheel: false,
              center: centerlizedmap
            };
            var map = new google.maps.Map(document.getElementById('google-map'), mapOptions);
            var contentString = '';		

            //Pin Clinica Centro
            var myLatlng = new google.maps.LatLng(-1.4559776,-48.5016697);
            var infowindow = new google.maps.InfoWindow({
              content: '<div class="map-content"><ul class="address">' + $('.centro').html() + '</ul></div>'
            });
            var marker = new google.maps.Marker({
              position: myLatlng,
              map: map
            });
            infowindow.open(map,marker);          


            google.maps.event.addListener(marker, 'click', function() {
              infowindow.open(map,marker);
            });

            }            
      google.maps.event.addDomListener(window, 'load', initialize_map);
</script>
@stop
