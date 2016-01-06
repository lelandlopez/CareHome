@extends('layouts.layout')
@section('content')

<form method="POST" action="/login" class="form-horizontal">
    {!!csrf_field() !!}
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{old('email') }}">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
            <label>
            <input type="checkbox" name="remember"> Remember me
            </label>
        </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Sign in</button>
        </div>
    </div>
</form>

@endsection
