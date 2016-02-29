@extends('layouts.layout')
@section('content')

<script>
$(document).ready(function(){
  $( "#numberRooms" ).change(function() {
    $( "#roomDiv" ).empty();
    console.log($( "#numberRooms" ).val());
    for(var i = 0; i < $( "#numberRooms" ).val(); i++) {
      var roomNum = i+1;
      $( "#roomDiv" ).append( 
        "<div class='form-group'>" + 
        "<h3>Room " + roomNum + "</h3>" +
        "<label>Square Footage</label>" +
        "<input class='form-control' type='text' name='squareFootage" + roomNum + "'></input>" +
        "</div>" + 
        "<div class='form-group'>" + 
        "<label>Pictures</label>" +
        "<input class='form-control' type='text'></input>" +
        "</div>" + 
"<div class='checkbox'> <label> <input name='available" + roomNum + "'type='checkbox'> <b>Available</b></label> </div>"
        ); 
    }
  }); 
});
</script>

<style>
#map { height: 65%; }
</style>

<div class="row">
    <div class="col-md-12">
        <div class="list-group">
            <li class="list-group-item active">Register Care Home</li>
            <li class="list-group-item">
                <form role="form" method="POST" action="/register/carehome">
                   {!!csrf_field() !!}
                   <div class="form-group">
                        <label for="labelAddress">Address of Care Home</label>

                        <input class="form-control" value="" type="text" class="form-control" name="address" id="address" placeholder="address">
                        <input id="lat" name="lat" hidden>
                        <input id="lng" name="lng" hidden>
                        <input id="postal_code" name="postal_code" hidden>

                    </div>
                   <div class="form-group" id="map">
                   </div>
                   <div class="form-group">
                        <label for="labelNumberRooms">Number of Rooms</label>
                        <select class="form-control" name="numberRooms" id="numberRooms">
                          <option value=0>0</option>
                          <option value=1>1</option>
                          <option value=2>2</option>
                          <option value=3>3</option>
                          <option value=4>4</option>
                          <option value=5>5</option>
                        </select>
                   </div>

                   <div id="roomDiv">
                   </div>

                   <button type="submit" class="btn btn-default">Preview</button>
 
                </form>
 
            </li>
        </div>

    </div>
</div>

<script>
function initMap() {
    console.log('this was called');
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 8,
    center: {lat: -34.397, lng: 150.644}
  });
  var geocoder = new google.maps.Geocoder();

  document.getElementById('address').addEventListener("change", function() {
    geocodeAddress(geocoder, map);
  });

}

function geocodeAddress(geocoder, resultsMap) {
  var address = document.getElementById('address').value;
  geocoder.geocode({'address': address}, function(results, status) {
    if (status === google.maps.GeocoderStatus.OK) {
        console.log(results[0].formatted_address);
        document.getElementById('lat').value = results[0].geometry.location.lat();
        document.getElementById('lng').value = results[0].geometry.location.lng();
        document.getElementById('address').value = results[0].formatted_address;
        for(var i = 0; i < results[0].address_components.length; i++) {
            if(results[0].address_components[i].types[0] == "postal_code") {
                document.getElementById('postal_code').value = results[0].address_components[i].long_name;
                break;
            }
            }
          var marker = new google.maps.Marker({
        map: resultsMap,
        position: results[0].geometry.location
      });
      resultsMap.setZoom(14);
    } else {
      alert('Geocode was not successful for the following reason: ' + status);
    }

  });
}

</script>
<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCaEIfcIHEgee4FRaQ1eA64BD957b8SeQ0&callback=initMap">
</script>

@endsection
