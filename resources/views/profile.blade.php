@extends('layouts.layout')
@section('content')




<div class="row">
    <div class="col-md-12">
        <div class="list-group">
            <li class="list-group-item active">Profile</li>
            <li class="list-group-item">
                @if( count(\App\Substitute::where('user_id', \Auth::id())->get()) == 0 )
                <a href="/registersubstitute">Register as a Substitute</a>
                @else
                Substitute Information
                @endif
            </li>
        </div>

        <div class="list-group">
            <li class="list-group-item active">Registered Care Home</li>
            <li class="list-group-item">
                <a href="/registercarehome">Register a new Care Home</a>
            </li>
        </div>

    </div>
</div>

@endsection
