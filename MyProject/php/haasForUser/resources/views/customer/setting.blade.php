@extends('template.home')
@section('home-rsb')


<h3 class="pad-15 txt-fff bold"><span class="fa fa-wrench"></span> SETTING</h3>
<div class="bg-whitesmoke setting-bg flow-y-auto pos-rel">

    <h3 class="pad-15 underline">Switch configuration</h3>
    <h4 class="pad-15 txt-blue"><span class="fa fa-long-arrow-right"></span> Add appliance</h4>
    <form method="post" action="" class="grid-auto underline row add-appliance-form">
        @csrf
        <div class="add-device-inputs wt-100">
            <div class="padl-15"><input type="text" name="app-name" class="btn" placeholder="Appliance Name"></div>
            <div class="padl-15">
                <select name="swn" class="btn switch-number-btn pad-15">
                    <option value="none">-- Choose switch --</option>
                    @for($j = 1; $j <= 8; $j++)
                    <option value="{{$j}}">{{$j}}</option>
                    @endfor
                </select>
            </div>
        </div>
        <div class="flex add-device-btn-row">
            <div class="flex-1 "></div>
            <button class="btn btn-green round-5 floatr" type="submit">Save</button>
        </div>
    </form>
    <div class="pad-15 underline applianceSettingTable">
        @if( count($appliances) > 0)
        <div class="row bold bg-blue pad-tb-15 txt-fff appliance">
            <div class="pad-lr-15">S/N</div>
            <div class="flex-1">Appliance name</div>
            <div class="flex-1 align-center">Switch Number</div>
            <div class="flex-1 flex-center">Sync</div>
            <div class="flex-1 flex-center">Disable/Enable</div>
        </div>
        
        @foreach($appliances as $app)
        <div class="row stripe">
            @if($i < 10) 
            <div class="pad-lr-15">&nbsp;&nbsp;{{ $i++ }}</div>
            @else
            <div class="pad-lr-15">{{ $i++  }}</div>
            @endif
            <div class="flex-1 padl-10">{{ $app->app_name }}</div>
            <div class="flex-1 flex-center">{{ $app->switch_no }}</div>
            
            <div class="flex-1 flex-center">
                @if($app->sync == 1)
                <input type="checkbox" value="{{ $app->schedule_id }}" name="schedule_id"  class="sw-btn sync pointer" id="" checked="">
                @else
                <input type="checkbox" value="{{ $app->schedule_id }}" name="schedule_id"  class="sw-btn sync pointer" id="">
                @endif
            </div>
            <div class="flex-1 flex-center">
                @if($app->access == 1)
                <input type="checkbox" value="{{ $app->switch_no }}"  class="sw-btn permit pointer" id="" checked="">
                @else
                <input type="checkbox" value="{{ $app->switch_no }}"  class="sw-btn permit pointer" id="">
                @endif
            </div>

        </div>
        @endforeach
        @else
            <div class="flex-center"><h4>Home is empty, Please add your preferrable appliances</h4></div>
        @endif
    </div>
    <div class="pad-15">
        <h5>Schedule</h5>
        <table cellpadding=5 cellspacing=0 border=1 class="schedule">
            <tr>
                <th>S/N</th>
                <th>Appliance Name</th>
                <th>Switch Number</th>
                <th>Time</th>
                <th>Repeat</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Radio</td>
                <td align=center>4</td>
                <td>12:00 - 16:00</td>
                <td>All days</td>
            </tr>
        </table>
    </div>
    <h3 class="pad-15 underline">Other configuration</h3>
    <h4 class="pad-15 txt-blue"><span class="fa fa-long-arrow-right "></span> Temperature Sensor</h4>
    <div class="pad-15 underline">Average room tempearute : 30 &#8451; <button class="txt-red bold pad-8 round-5 no-outline no-border pointer">Change</button></div>

    <h4 class="pad-15 txt-blue"><span class="fa fa-long-arrow-right "></span> Wi-Fi</h4>
    <div class="pad-15 flex underline">
        <div class="ssid-inputs">
            <div>SSID Name<br><input type="text" name="ssid" id=""></div>
            <div class="padl-15">Password<br><input type="password" name="wifi-password" id=""></div>
        </div>
        <div class="padl-15"><br><button class="txt-red bold pad-8 round-5 no-outline no-border pointer">Save</button></div>
    </div>
</div>


<!--  SCHEDULE DIALOG -->
<div class="transparent-coat pos-abs top-0 ht-100 invisible schedule-body">
    <form id="sch-form" class="schedule-box pos-abs btm-15 right-30 bg-whitesmoke shadow-000-5 pad-15">
    @csrf
        <div class="title">Schedule</div>
        <div class="body">
            <div class="row">
                <div class="flex-1">From</div>
                <div class="flex-1 padl-15"><input type="time" name="from" id="starting"></div>
            </div>
            <div class="row">
                <div class="flex-1">To</div>
                <div class="flex-1 padl-15"><input type="time" name="to" id="ending"></div>
            </div>
            <div class="row">
                <div class="flex-1"></div>
                <select name="period" id="period">
                    <option value="All days">All days</option>
                    <option value="Weekdays">Weekdays</option>
                </select>
            </div>
            <!-- input hidden -->
            <input type="hidden" name="schedule-id" id="sch-id">
            <div class="row">
                <div class="flex-1"></div>
                <button class="btn btn-green round-5" id="schedule-btn">Save</button>
            </div>
        </div>
    </form>
</div>
@stop 