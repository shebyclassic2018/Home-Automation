@extends('layouts.backend')
@section('content')
<!-- Hero -->
<div class="bg-body-dark">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item"><a href="/home/appliance">Go back</a></li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Chart</a>
                        </li>
                    </ol>
                </nav>
            </div>
       </div>
    </div>
    <!-- END Hero -->
      <div id="chartContainer" style="height: 100%; width: calc(100% - 40px);padding:15px"></div>
@stop