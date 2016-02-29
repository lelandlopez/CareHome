@extends('layouts.layout')
@section('content')



<div class="row">
    <div class="col-md-12">
        <div class="list-group">
            <li class="list-group-item active">Create Call For Substitute</li>
            <li class="list-group-item">
                <form role="form" method="POST" action="/create/callforsubstitute">
                    {!!csrf_field() !!}
                    <div class="form-group col-md-12">
                        <label for="labelState">Start Date And Time</label>
                        <div class="form-inline">
                            <div class="form-group col-md-6">
                                <label for="startDate" style="width:80px">Start Date:</label>
                                <select name="startMonth" id="startMonth" class="form-control" >
                                    <option value=1>January</option>
                                    <option value=2>February</option>
                                    <option value=3>March</option>
                                    <option value=4>April</option>
                                    <option value=5>May</option>
                                    <option value=6>June</option>
                                    <option value=7>July</option>
                                    <option value=8>August</option>
                                    <option value=9>September</option>
                                    <option value=10>October</option>
                                    <option value=11>November</option>
                                    <option value=12>December</option>
                                </select>
                                <input name="startDay" placeholder="dd" type="text" class="form-control" id="startDay" style="width:50px">
                                <input name="startYear" placeholder="yyyy" type="text" class="form-control" id="startYear" style="width:80px">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="startDate" style="width:80px">Start Time:</label>
                                <select name="startHour" id="startHour" class="form-control" >
                                    <option value=1>1</option>
                                    <option value=2>2</option>
                                    <option value=3>3</option>
                                    <option value=4>4</option>
                                    <option value=5>5</option>
                                    <option value=6>6</option>
                                    <option value=7>7</option>
                                    <option value=8>8</option>
                                    <option value=9>9</option>
                                    <option value=10>10</option>
                                    <option value=11>11</option>
                                    <option value=12>12</option>
                                </select>
                                :
                                <select name="startMinute" id="startMinute" class="form-control" >
                                    <option value=0>00</option>
                                    <option value=15>15</option>
                                    <option value=30>30</option>
                                    <option value=45>45</option>
                                </select>
                                 <select name="startAMorPM" id="startAMorPM" class="form-control" >
                                    <option value=0>AM</option>
                                    <option value=1>PM</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="labelState">End Date And Time</label>
                        <div class="form-inline">
                            <div class="form-group col-md-6">
                                <label for="startDate" style="width:80px">End Date:</label>
                                <select name="endMonth" id="endMonth" class="form-control" >
                                    <option value=1>January</option>
                                    <option value=2>February</option>
                                    <option value=3>March</option>
                                    <option value=4>April</option>
                                    <option value=5>May</option>
                                    <option value=6>June</option>
                                    <option value=7>July</option>
                                    <option value=8>August</option>
                                    <option value=9>September</option>
                                    <option value=10>October</option>
                                    <option value=11>November</option>
                                    <option value=12>December</option>
                                </select>
                                <input name="endDay" placeholder="dd" type="text" class="form-control" id="endDay" style="width:50px">
                                <input name="endYear" placeholder="yyyy" type="text" class="form-control" id="endYear" style="width:80px">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="startDate" style="width:80px">End Time:</label>
                                <select name="endHour" id="endHour" class="form-control" >
                                    <option value=1>1</option>
                                    <option value=2>2</option>
                                    <option value=3>3</option>
                                    <option value=4>4</option>
                                    <option value=5>5</option>
                                    <option value=6>6</option>
                                    <option value=7>7</option>
                                    <option value=8>8</option>
                                    <option value=9>9</option>
                                    <option value=10>10</option>
                                    <option value=11>11</option>
                                    <option value=12>12</option>
                                </select>
                                :
                                <select name="endMinute" id="endMinute" class="form-control" >
                                    <option value=0>00</option>
                                    <option value=15>15</option>
                                    <option value=30>30</option>
                                    <option value=45>45</option>
                                </select>
                                 <select name="endAMorPM" id="endAMorPM" class="form-control" >
                                    <option value=0>AM</option>
                                    <option value=1>PM</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="labelState">Which Care Home</label>
                        <select name="careHomeSelect" id="careHomeSelect" class="form-control" >
                            @foreach($careHomeInfo as $careHome)
                                <option value="{{$careHome->id}}">{{$careHome->address}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="container">
                        <button type="submit" id="buttonfind" class="btn btn-default">Create</button>
                    </div>
                </form>
            </li>
        </div>

    </div>
</div>


@endsection
