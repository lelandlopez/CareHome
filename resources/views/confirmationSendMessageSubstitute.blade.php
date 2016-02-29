@extends('layouts.layout')
@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="list-group">
            <li class="list-group-item active">Confirmation</li>
            <li class="list-group-item">
            	<h3 style="text-align:center">You have successfully messaged {{$user->name}} about the Substitute Vacancy</h3>
            </li>
        </div>
    </div>
</div>

@endsection
