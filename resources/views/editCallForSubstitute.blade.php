@extends('layouts.layout')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="list-group">
            <li class="list-group-item active">Edit Call For Substitute</li>
            <li class="list-group-item">
                <form role="form" method="POST" action="/edit/callforsubstitute/{{$id}}">
                    {!!csrf_field() !!}
                    <div class="form-group col-md-12">
                        <label for="labelState">Start Date And Time</label>
                        <div class="form-inline">
                            <div class="form-group col-md-6">
                                <label for="startDate" style="width:80px">Start Date:</label>
                                <select name="startMonth" id="startMonth" class="form-control" >
                                    <option value=1 <?php if($startDate[0] == '1') echo "selected"; ?>>January</option>
                                    <option value=2 <?php if($startDate[0] == '2') echo "selected"; ?>>February</option>
                                    <option value=3 <?php if($startDate[0] == '3') echo "selected"; ?>>March</option>
                                    <option value=4 <?php if($startDate[0] == '4') echo "selected"; ?>>April</option>
                                    <option value=5 <?php if($startDate[0] == '5') echo "selected"; ?>>May</option>
                                    <option value=6 <?php if($startDate[0] == '6') echo "selected"; ?>>June</option>
                                    <option value=7 <?php if($startDate[0] == '7') echo "selected"; ?>>July</option>
                                    <option value=8 <?php if($startDate[0] == '8') echo "selected"; ?>>August</option>
                                    <option value=9 <?php if($startDate[0] == '9') echo "selected"; ?>>September</option>
                                    <option value=10 <?php if($startDate[0] == '10') echo "selected"; ?>>October</option>
                                    <option value=11 <?php if($startDate[0] == '11') echo "selected"; ?>>November</option>
                                    <option value=12 <?php if($startDate[0] == '11') echo "selected"; ?>>December</option>
                                </select>
                                <input name="startDay" placeholder="dd" value="{{$startDate[1]}}" type="text" class="form-control" id="startDay" style="width:50px">
                                <input name="startYear" placeholder="yyyy" value="{{$startDate[2]}}" type="text" class="form-control" id="startYear" style="width:80px">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="startDate" style="width:80px">Start Time:</label>
                                <select name="startHour" id="startHour" class="form-control" >
                                    <option value=1 <?php if($startTime[0] == '1') { echo "selected"; } ?>>1</option>
                                    <option value=2 <?php if($startTime[0] == '2') { echo "selected"; } ?>>2</option>
                                    <option value=3 <?php if($startTime[0] == '3') { echo "selected"; } ?>>3</option>
                                    <option value=4 <?php if($startTime[0] == '4') { echo "selected"; } ?>>4</option>
                                    <option value=5 <?php if($startTime[0] == '5') { echo "selected"; } ?>>5</option>
                                    <option value=6 <?php if($startTime[0] == '6') { echo "selected"; } ?>>6</option>
                                    <option value=7 <?php if($startTime[0] == '7') { echo "selected"; } ?>>7</option>
                                    <option value=8 <?php if($startTime[0] == '8') { echo "selected"; } ?>>8</option>
                                    <option value=9 <?php if($startTime[0] == '9') { echo "selected"; } ?>>9</option>
                                    <option value=10 <?php if($startTime[0] == '10') { echo "selected"; } ?>>10</option>
                                    <option value=11 <?php if($startTime[0] == '11') { echo "selected"; } ?>>11</option>
                                    <option value=12 <?php if($startTime[0] == '12') { echo "selected"; } ?>>12</option>
                                </select>
                                :
                                <select name="startMinute" id="startMinute" class="form-control" >
                                    <option value=0 <?php if($startTime[1] == '0') { echo "selected"; } ?>>00</option>
                                    <option value=15 <?php if($startTime[1] == '15') { echo "selected"; } ?>>15</option>
                                    <option value=30 <?php if($startTime[1] == '30') { echo "selected"; } ?>>30</option>
                                    <option value=45 <?php if($startTime[1] == '45') { echo "selected"; } ?>>45</option>
                                </select>
                                 <select name="startAMorPM" id="startAMorPM" class="form-control" >
                                    <option value=0 <?php if($startTime[2] == '0') { echo "selected"; } ?>>AM</option>
                                    <option value=1 <?php if($startTime[2] == '1') { echo "selected"; } ?>>PM</option>
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
                                    <option value=1 <?php if($endDate[0] == '1') echo "selected"; ?>>January</option>
                                    <option value=2 <?php if($endDate[0] == '2') echo "selected"; ?>>February</option>
                                    <option value=3 <?php if($endDate[0] == '3') echo "selected"; ?>>March</option>
                                    <option value=4 <?php if($endDate[0] == '4') echo "selected"; ?>>April</option>
                                    <option value=5 <?php if($endDate[0] == '5') echo "selected"; ?>>May</option>
                                    <option value=6 <?php if($endDate[0] == '6') echo "selected"; ?>>June</option>
                                    <option value=7 <?php if($endDate[0] == '7') echo "selected"; ?>>July</option>
                                    <option value=8 <?php if($endDate[0] == '8') echo "selected"; ?>>August</option>
                                    <option value=9 <?php if($endDate[0] == '9') echo "selected"; ?>>September</option>
                                    <option value=10 <?php if($endDate[0] == '10') echo "selected"; ?>>October</option>
                                    <option value=11 <?php if($endDate[0] == '11') echo "selected"; ?>>November</option>
                                    <option value=12 <?php if($endDate[0] == '11') echo "selected"; ?>>December</option>
                                </select>
                                <input name="endDay" placeholder="dd" value="{{$endDate[1]}}"  type="text" class="form-control" id="endDay" style="width:50px">
                                <input name="endYear" placeholder="yyyy" value="{{$endDate[2]}}"  type="text" class="form-control" id="endYear" style="width:80px">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="startDate" style="width:80px">End Time:</label>
                                <select name="endHour" id="endHour" class="form-control" >
                                    <option value=1 <?php if($endTime[0] == '1') { echo "selected"; } ?>>1</option>
                                    <option value=2 <?php if($endTime[0] == '2') { echo "selected"; } ?>>2</option>
                                    <option value=3 <?php if($endTime[0] == '3') { echo "selected"; } ?>>3</option>
                                    <option value=4 <?php if($endTime[0] == '4') { echo "selected"; } ?>>4</option>
                                    <option value=5 <?php if($endTime[0] == '5') { echo "selected"; } ?>>5</option>
                                    <option value=6 <?php if($endTime[0] == '6') { echo "selected"; } ?>>6</option>
                                    <option value=7 <?php if($endTime[0] == '7') { echo "selected"; } ?>>7</option>
                                    <option value=8 <?php if($endTime[0] == '8') { echo "selected"; } ?>>8</option>
                                    <option value=9 <?php if($endTime[0] == '9') { echo "selected"; } ?>>9</option>
                                    <option value=10 <?php if($endTime[0] == '10') { echo "selected"; } ?>>10</option>
                                    <option value=11 <?php if($endTime[0] == '11') { echo "selected"; } ?>>11</option>
                                    <option value=12 <?php if($endTime[0] == '12') { echo "selected"; } ?>>12</option>

                                </select>
                                :
                                <select name="endMinute" id="endMinute" class="form-control" >
                                    <option value=0 <?php if($endTime[1] == '0') { echo "selected"; } ?>>00</option>
                                    <option value=15 <?php if($endTime[1] == '15') { echo "selected"; } ?>>15</option>
                                    <option value=30 <?php if($endTime[1] == '30') { echo "selected"; } ?>>30</option>
                                    <option value=45 <?php if($endTime[1] == '45') { echo "selected"; } ?>>45</option>
                                </select>
                                 <select name="endAMorPM" id="endAMorPM" class="form-control" >
                                    <option value=0 <?php if($endTime[2] == '0') { echo "selected"; } ?>>AM</option>
                                    <option value=1 <?php if($endTime[2] == '1') { echo "selected"; } ?>>PM</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="labelState">Which Care Home</label>
                        <select name="careHomeSelect" id="careHomeSelect" class="form-control" >
                            @foreach($careHomeInfo as $careHome)
                                <option value="{{$careHome->id}}" <?php if($careHomeId ==  $careHome->id ) { echo "selected"; } ?>>{{$careHome->address}}</option>
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
