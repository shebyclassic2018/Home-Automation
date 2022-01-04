@extends('template.home')
@section('home-rsb')
<h3 class="pad-15 txt-fff bold">APPLIANCES</h3>
<div class="bg-whitesmoke appliance-bg pad-15 appliance-page">
    <div class="row bold bg-blue pad-tb-15 txt-fff">
        <div class="pad-lr-15">S/N</div>
        <div class="flex-1">Appliance name</div>
        <div class="flex-1 align-center">Switch Number</div>
        
        <div class="flex-1 flex-center">Action</div>
        <div class="flex-1 flex-center">Statistics</div>
        <div class="flex-1 flex-center"></div>
    </div>
    @foreach($appliances as $app)
        <div class="row stripe">
            @if($i < 10) 
                <div class="pad-lr-15">&nbsp;&nbsp;{{ $i++ }}</div>
            @else
                <div class="pad-lr-15">{{ $i++ }}</div>
            @endif
            <div class="flex-1 padl-10">{{ $app->app_name }}</div>
            <div class="flex-1 flex-center">{{ $app->switch_no }}</div>
            
            <div class="flex-1 flex-center">
                <a href="/edit-appliance" style="color:blue"><span class="fa fa-edit"></span></a>
            </div>
            <div class="flex-1 flex-center">
                <a href="/graph" style="color:blue"><span class="fa fa-bar-chart"></span> Graph</a>
            </div>
            @if ($app->state == 1) 
                <div class="flex-1 flex-center"><input type="checkbox" value = "{{ $app->switch_no }}<!>{{ $app->app_name }}" class="sw-btn pointer" checked></div>
            @else
                <div class="flex-1 flex-center"><input type="checkbox" value = "{{ $app->switch_no }}<!>{{ $app->app_name }}" class="sw-btn pointer" id=""></div>
            @endif
        </div>
    @endforeach
</div>
@stop