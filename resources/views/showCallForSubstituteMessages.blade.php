@extends('layouts.layout')
@section('content')

<script>
$(document).ready(function(){
	$(".q").click(function(){
        window.location = "/callforsubstitutemessage/" + event.target.id;
    });
});
</script>

<div class="row">
    <div class="col-md-12">
        <div class="list-group">
            <li class="list-group-item active">Responses to Call For Substitute</li>
            @foreach($callForSubstituteMessages as $callForSubstituteMessage)
            	<?php
            		$substituteInfo = \App\User::find($callForSubstituteMessage->user_id);
            	?>
            	<li class="list-group-item q" id="{{$callForSubstituteMessage->id}}">{{$substituteInfo->name}} i
            		{{$callForSubstituteMessage->title}} 
            		{{$callForSubstituteMessage->message}} 
            		{{$callForSubstituteMessage->created_at}}
            		<a href="/delete/callforsubstitutemessages/{{$callForSubstituteMessage->id}}/{{$id}}" class="pull-right">Delete</a>
            	</li>
            @endforeach

    </div>
</div>

@endsection
