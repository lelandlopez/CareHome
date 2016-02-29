@extends('layouts.layout')
@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="list-group">
            <li class="list-group-item active">Substitute Vacancy Messages</li>
            @foreach ($substituteMessages as $substituteMessage)
            <li class="list-group-item">
            	<?php
            		$user = \App\User::find($substituteMessage->user_id);

            	?>
            	<p> {{$substituteMessage->title}} {{$substituteMessage->message}} {{$user->name}} {{$substituteMessage->created_at}}<a class="pull-right" href="/delete/substitutemessage/{{$substituteMessage->id}}">Delete</a></p>
            </li>
            @endforeach
        </div>
    </div>
</div>

@endsection
