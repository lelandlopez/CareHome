@extends('layouts.layout')
@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="list-group">
            <li class="list-group-item active">Message Call For Substitute</li>
            <li class="list-group-item">
                <form method="POST" action="/sendmessage/callforsubstitute/{{$id}}">
                {!!csrf_field() !!}
                <div class="form-group">
                    <label for="labelMessage">Title</label>
                    <input value="" type="text" class="form-control" name="title" id="title" placeholder="">
                </div>
                <div class="form-group">
                    <label for="labelMessage">Message</label>
                    <input value="" type="text" class="form-control" name="message" id="message" placeholder="">
                </div>
                <button type="submit" class="btn btn-default">Message</button>
                </form>
        </div>
    </div>
</div>

@endsection
