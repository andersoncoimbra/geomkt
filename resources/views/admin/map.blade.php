@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Map de associações</h1>
@stop

@section('content')
<div class="col-md-8">
<div id="google-map" style="height: 550px;"></div>
</div>
<script type="text/javascript">

  function initialize_map() {

            var centerlizedmap = new google.maps.LatLng(-1.4354115,-48.4641122);
            var mapOptions = {
              zoom: 6,
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


           

            }            
      
</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?callback=initialize_map">
    </script>
@stop
