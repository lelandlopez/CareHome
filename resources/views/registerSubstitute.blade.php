@extends('layouts.layout')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="list-group">
            <li class="list-group-item active">Register as a Substitute</li>
                <li class="list-group-item col-md-5">
                    <form method="POST" action="/registersubstitute">
                    {!!csrf_field() !!}
                    <div class="form-group">
                        <label for="labelAddress">Address/Zipcode of where you centrally can commute to</label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="Address">
                    </div>
                    <div class="form-group">
                        <label for="labelDistance">Distance from Address provided you can commute</label>
                        <input type="text" class="form-control" name="distance" id="distance" placeholder="Distance">
                    </div>
                    <button type="submit" class="btn btn-default">Register</button>
                    </form>

                </li>
                <div class="col-md-7">
                </div>
            </div>

    </div>
</div>

@endsection
