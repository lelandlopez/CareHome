@extends('layouts.layout')
@section('content')

<style>
.scrollable-list {
    height: auto;
    max-height: 65%;
    overflow-x: hidden;
}
#map { height: 65%; }
</style>

<script>
$(document).ready(function(){
    $.ajax({                                      
    url: '/getstates',                  //the script to call to get data          
        data: "",                        //you can insert url argumnets here to pass to api.php
        //for example "id=5&parent=6"
        dataType: 'json',                //data format      
        success: function(data)          //on recieve of reply
        {
            $('#state')
                .append($('<option>', { value : "0"})
                .text("Choose A State")); 
            $.each(data, function(index, element) {
                $('#state')
                    .append($('<option>', { value : element.id })
                    .text(element.state)); 
            });
        } 
});
$( "#state" ).change(function() {
    $('#city')
        .empty();
    $.ajax({                                      
    url: '/getcities',                  //the script to call to get data          
        data: "id="+$("#state").val(),                        //you can insert url argumnets here to pass to api.ph
            //for example "id=5&parent=6"
            dataType: 'json',                //data format      
            success: function(data)          //on recieve of reply
            {
                $.each(data, function(index, element) {
                    $('#city')
                        .append($('<option>', { value : element.zipcode})
                        .text(element.city + " ("+ element.zipcode + ")")); 
                });
            } 
        });
});
$( "#buttonfind" ).click(function() {
    $.ajax({                                      
    url: '/getcarehomerooms',
        data: "zipcode=" + $("#city").val(),
            //for example "id=5&parent=6"
            dataType: 'json',                //data format      
            success: function(data)          //on recieve of reply
            {
                $('#care_homes_list')
                    .empty();
                $.each(data, function(index, element) {
                    addmarker(element.careHome);
                    
                    var $address = $('<li class="list-group-item"><b>' + element.careHome.address + ' (' + element.rooms.length + ')</b></li>');
                    var $listgroup = $('<ul class="list-group"></ul>');

                    $('#care_homes_list')
                        .append($listgroup);
                    $listgroup.append($address);
                    $.each(element.rooms, function(i, roomelement) {
                        var $room = $(  '<li class="list-group-item"><h4>Name:</h5><p>square footage: ' + roomelement.square_footage + '</p></li>');
                        $room.hide();
                        $listgroup.append($room);
                        $address.on('click', function() {
                            if($($room).is(":visible")) { 
                                $room.hide();
                            } else {
                                $room.show();
                            }
                        });
                    });
                });

            } 
    });

    $.ajax({                                      
    url: 'https://maps.googleapis.com/maps/api/geocode/json?address=' + $("#city").val(),                  //the script to call to get data          
            data: "id="+$("#state").val(),                        //you can insert url argumnets here to pass to api.ph
                //for example "id=5&parent=6"
                dataType: 'json',                //data format      
                success: function(data)          //on recieve of reply
                {
                    var latlngobj = data.results[0].geometry.location;
                    var latlng = new google.maps.LatLng(latlngobj.lat, latlngobj.lng);
                    center(latlng);
                } 
    });
    
});
});

function addmarker(element) {
    var latlng = new google.maps.LatLng(element.lat, element.lng);
    var infowindow = new google.maps.InfoWindow({
    content: element.address 
    });
    var marker = new google.maps.Marker({
    position: latlng,
        map: map
});

marker.addListener('click', function() {
    infowindow.open(marker.get('map'), marker);
});

}

function center(latilongi) {
    map.setCenter(latilongi);
    map.setZoom(10);
}

</script>

<div class="row">
    <div class="col-md-12">
        <div class="list-group">
            <li class="list-group-item active">Find A Care Home</li>
            <li class="list-group-item">
                <form class="form-inline">
                    <div class="form-group">
                        <label for="labelState">State</label>
                        <select name="state" id="state" class="form-control" >
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="labelCity">City</label>
                        <select name="city" id="city" class="form-control">
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="labelPrice">Price</label>
                        <input type="text" class="form-control" name="price" id="price" placeholder="Price">
                    </div>
                    <button type="button" id="buttonfind" class="btn btn-default">Find</button>
                </form>

            </li>
        </div>

    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="list-group">
            <li class="list-group-item active">Matching Care Homes With Available Rooms</li>
            <div id="care_homes_list" class="scrollable-list">
            </div>
        </div>

    </div>
    <div class="col-md-9">
        <div id="map"></div>
    </div>
</div>
<script type="text/javascript">

var map;
function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -34.397, lng: 150.644},
        zoom: 8
});
}

</script>
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCaEIfcIHEgee4FRaQ1eA64BD957b8SeQ0&callback=initMap">
    </script>
@endsection
