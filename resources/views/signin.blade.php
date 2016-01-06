@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="list-group">
            <li class="list-group-item active">Sign In</li>
            <li class="list-group-item">
                <form>
                <div class="form-group">
                    <label for="labelPassword">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="labelPassword">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-default">Sign In</button>
                </form>

            </li>
        </div>

    </div>
</div>

@endsection
