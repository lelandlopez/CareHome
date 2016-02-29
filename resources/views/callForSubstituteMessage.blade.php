@extends('layouts.layout')
@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="list-group">
            <li class="list-group-item active">Call For Substitute Message</li>
            <li class="list-group-item">
            	<p>{{$user->name}}</p>
            	<p>{{$callForSubstituteMessage->title}}</p>
            	<p>{{$callForSubstituteMessage->message}}</p>
            </li>
            <li class="list-group-item">
            	<p><a href="">Reply</a></p>
            </li>

    </div>
</div>

@endsection
