@extends('layouts.layout')
@section('content')


<?php
function getTimeString($string) {
    $timeArray = explode(" ", $string);
    if(count($timeArray) == 0) {
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
                $timeString .= " AM";
                break;
            case 1:
                $timeString .= " PM";
                break;
        }
        return $timeString;
    } else {
        return "";
    }
}
?>

<div class="row">
    <div class="col-md-12">
        <div class="list-group">
            <li class="list-group-item active">Call For Substitute</li>
            <li class="list-group-item">
                <?php
                    $careHome = \App\CareHome::where('id', $callForSubstitute->care_home_id)->get();
                    $startTime = getTimeString($callForSubstitute->start_time);
                    $endTime = getTimeString($callForSubstitute->end_time);
                ?>
                <p>{{$careHome[0]->address}}<a href="/edit/callforsubstitute/{{$callForSubstitute->id}}" class="pull-right" >Edit</a></p>
                <p>{{$callForSubstitute->start_date}} {{$startTime}}</p>
                <p>{{$callForSubstitute->end_date}} {{$endTime}}</p>
            </li>
        </div>

        <div class="list-group">
            <li class="list-group-item active">Substitutes that fit your availability</li>
            @foreach($substitutesInfo as $index =>  $substituteInfo)
                <?php
                    $user = \App\User::where('id', $substituteInfo->user_id)->first();
                ?>
                <li class="list-group-item">
                    <a href="/substitute/{{$user->id}}">{{$user->name}}</a> <b>Rating: {{$averageSubstituteRatings[$index]}}</b> <a href="/sendmessage/substitute/{{$substituteInfo->user_id}}">Send {{$user->name}} a Message</a>
                </li>
            @endforeach
        </div>
    </div>
</div>

@endsection
