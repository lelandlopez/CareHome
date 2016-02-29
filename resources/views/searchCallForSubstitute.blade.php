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
            <li class="list-group-item active">Search For Call For Substitutes</li>
            <li class="list-group-item">Searching within <b><u>{{$substituteInfo[0]->distance}}</b></u> miles of <b><u>{{$substituteInfo[0]->address}}</b></u></li>
            @foreach($callsForSubstitute as $callForSubstitute)
                <li class="list-group-item">
                    <?php
                        $careHome = \App\CareHome::where('id', $callForSubstitute->care_home_id)->get();
                        $startTime = getTimeString($callForSubstitute->start_time);
                        $endTime = getTimeString($callForSubstitute->end_time);
                    ?>
                    <p>
                        <span style="display:inline-block; width:80px;">Address:</span>
                        <span style="display:inline-block; width:300px;">{{$careHome[0]->address}}</span>
                        <span style="display:inline-block; width:200px;" class="pull-right"><a href="/sendmessage/callforsubstitute/{{$callForSubstitute->id}}">Inquire Call For Substitute</a></span>
                    </p>
                    <p>
                        <span style="display:inline-block; width:80px;">Start Date:</span>
                        <span style="display:inline-block; width:300px;">{{$callForSubstitute->start_date}} {{$startTime}}</span>
                    </p>
                    <p>
                        <span style="display:inline-block; width:80px;">End Date:</span>
                        <span style="display:inline-block; width:300px;">{{$callForSubstitute->end_date}} {{$endTime}}</span>
                    </p>
                </li>
            @endforeach
        </div>
    </div>
</div>

@endsection
