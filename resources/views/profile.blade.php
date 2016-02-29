@extends('layouts.layout')
@section('content')


<?php
function getTimeString($string) {
    $timeArray = explode(" ", $string);
    $timeString = $timeArray[0] . ":";
    switch($timeArray[1]) {
        case 0:
            $timeString .= "00";
            break;
        case 15:
            $timeString .= "15";
            break;
        case 30:
            $timeString .= "30";
            break;
        case 45:
            $timeString .= "45";
            break;
    }
    switch($timeArray[2]) {
        case 0:
            $timeString .= " am";
            break;
        case 1:
            $timeString .= " pm";
            break;
    }
    return $timeString;
}
?>

<div class="row">
    <div class="col-md-12">
        <div class="list-group">
            <li class="list-group-item active">Profile</li>
        </div>

        <div class="list-group">
            <li class="list-group-item active">Substitute Information</li>
            <li class="list-group-item">
                @if( count($substituteInfo) == 0)
                <a href="/registersubstitute">Register as a Substitute</a>
                @else
                <p>Willing to service <b><u>{{$substituteInfo[0]->distance}}</u></b> miles from <b><u>{{$substituteInfo[0]->address}}</u></b>
                 <a class="pull-right" href="/edit/substituteinfo" style="width:50px">Edit</a>
                 <a class="pull-right" href="/search/callforsubstitute/{{$substituteInfo[0]->id}}" style="width:300px">Search for Matching Call for Substitutes</a>
                @endif
            </li>
            <li class="list-group-item">
                <a href="/substitutemessages">Substitute Vacancy Messages (You have {{count($substituteMessages)}} unread Messages)</a>
            </li>
        </div>

        <div class="list-group">
            <li class="list-group-item active">Registered Care Home</li>
            @foreach($careHomes as $careHome)
            <li class="list-group-item">
                <p> <a href="/careHome/{{$careHome->id}}">{{$careHome->address}}</a> <a href="/delete/carehome/{{$careHome->id}}" class="pull-right" style="width:50px">Delete </a>  <a href="/edit/carehome/{{$careHome->id}}" class="pull-right"style="width:50px">Edit </a> </p>
            </li>
            @endforeach
            <li class="list-group-item">
                <a href="/register/carehome">Register a new Care Home</a>
            </li>
        </div>

        <div class="list-group">
            <li class="list-group-item active">Call for Substitutes</li>
            @foreach($callsForSubstitute as $callForSubstitute)
                <li class="list-group-item">
                    <?php
                        $careHome = \App\CareHome::where('id', $callForSubstitute->care_home_id)->get();
                    ?>
                    <p>{{$careHome[0]->address}}<a href="/edit/callforsubstitute/{{$callForSubstitute->id}}" class="pull-right" >Edit</a></p>
                    <p>
                        <?php
                        $startTime = getTimeString($callForSubstitute->start_time);
                        $endTime = getTimeString($callForSubstitute->end_time);
                        ?>
                        {{$callForSubstitute->start_date}} {{$startTime}}
                        <a href="/search/substitute/{{$callForSubstitute->id}}" class="pull-right">Search For Substitutes</a></span>
                    </p>
                    <p>
                        {{$callForSubstitute->end_date}} {{$endTime}}
                        <a href="/delete/callforsubstitute/{{$callForSubstitute->id}}" class="pull-right">Delete</a></span>
                    </p>
                    <p>
                        <?php
                        $callForSubstituteMessages = \App\CallForSubstituteMessage::where('call_for_substitute_id', $callForSubstitute->id)->get();
                        ?>
                        <span display="block">
                        <a href="/show/callforsubstitutemessages/{{$callForSubstitute->id}}">Show Messages In Response To This (You have {{count($callForSubstituteMessages)}} unread Messages)</a></span>
                    </p>
                </li>
            @endforeach
            <li class="list-group-item"><a href="/create/callforsubstitute">Add a Call for a Substitute</a></li>
        </div>

    </div>
</div>

@endsection
