@extends('layouts.layout')
@section('content')

<style>
#map { height: 300px; }
</style>

<div class="row">
    <div class="col-md-6">
        <h1>CareHome</h1>
        <p>{{$careHomeInfo->address}}</p>
        <p>Home Has {{count($rooms)}} Rooms</p>
		<h1>Contact Information</h1>
		<p>{{$contact[0]->name}}</p>
		<p>{{$contact[0]->email}}</p>
    </div>
    <div class="col-md-6">
        <div id="map"></div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h1>Available Rooms ({{count($rooms)}})</h1>
        @foreach ($rooms as $room)
            @if($room->available == 1)
                <p>{{$room}}</p>
            @endif
        @endforeach

    </div>
</div>

<script type="text/javascript">

var map;
function initMap() {
    var lat = "{{$careHomeInfo->lat}}";
    var lng = "{{$careHomeInfo->lng}}";
    var address = "{{$careHomeInfo->address}}";
    map = new google.maps.Map(document.getElementById('map'), {
        center: new google.maps.LatLng(lat, lng),
        zoom: 14
    });

    addmarker(lat, lng, address);

}

function addmarker(lat, lng, address) {
    var latlng = new google.maps.LatLng(lat, lng);

    var infowindow = new google.maps.InfoWindow({
        content: address
    });

    var marker = new google.maps.Marker({
        position: latlng,
            map: map
    });

    marker.addListener('click', function() {
        infowindow.open(marker.get('map'), marker);
        map.setCenter(marker.getPosition());
    });
}
</script>
<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCaEIfcIHEgee4FRaQ1eA64BD957b8SeQ0&callback=initMap">
</script>
@endsection
