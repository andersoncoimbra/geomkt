@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Map de associações</h1>
@stop

@section('content')
<div class="col-md-8">
  <div class="row">
    <div id="google-map" style="height: 550px;"></div>
  </div>
</div>

<div class="col-md-4">
  <div class="row">   
    <button data-toggle="collapse" class="btn btn-primary pull-right" data-target="#form">Add Cooperativa</button>

<div id="form" class="collapse">
<form role="form" method="post" action="{{route('admin.mapa.post')}}" >
{{ csrf_field() }}
    <div class="form-group">
      <label for="nomecooperativa">Nome Cooperativa</label>
      <input type="text" class="form-control" id="nomecooperativa" name="nomecooperativa"  placeholder="Nome da cooperativa">
    </div>
    <div class="form-group">
      <label for="desccooperativa">Descrição</label>
      <textarea name="desccooperativa" id="desccooperativa" class="form-control"></textarea>
    </div>
    <div class="form-group">
      <label for="nomecooperativa">Latitude da Cooperativa</label>
      <input type="text" class="form-control"  id="latitude" name="latitude"  placeholder="Latitude">
    </div>
    <div class="form-group">
      <label for="nomecooperativa">Longitude da Cooperativa</label>
      <input type="text" class="form-control" id="longitude" name="longitude"  placeholder="Longitude">
    </div>
    <button type="submit" class="btn btn-primary">Registra</button>
  </form>     
</div>
  </div>
  <div class="row">
                <table class="table table-dark">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    </tr>
                </thead>
                <tbody>
                            @foreach($cooperativas as $coop) 
                            <tr>
                            <td>{{$coop->id}}</td>
                            <td>{{$coop->nome}}</td>
                            </tr>

                            @endforeach
                    </tbody>
            </table>
  </div>
</div>
<script type="text/javascript">

  function initialize_map() {

            var centerlizedmap = new google.maps.LatLng({{$cooperativas->avg('latitude')}},{{$cooperativas->avg('longitude')}});
            var mapOptions = {
              zoom: 6,
              scrollwheel: false,
              center: centerlizedmap
            };
            var map = new google.maps.Map(document.getElementById('google-map'), mapOptions);
            var contentString = '';		

            //
            @foreach($cooperativas as $coop)
            var myLatlng{{$coop->id}} = new google.maps.LatLng({{$coop->latitude}},{{$coop->longitude}});
            var infowindow{{$coop->id}} = new google.maps.InfoWindow({
              content: '<div class="map-content">' +'<h4>{{$coop->nome}}</h4>{{$coop->descricao}}' + '</div>'
            });
            var marker{{$coop->id}} = new google.maps.Marker({
              position: myLatlng{{$coop->id}},
              map: map
            });
            infowindow{{$coop->id}}.open(map,marker{{$coop->id}});
            @endforeach
          }            
      
</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?callback=initialize_map">
    </script>
@stop
