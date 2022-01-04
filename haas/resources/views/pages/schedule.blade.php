@extends('layouts.backend')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">
@endsection

@section('js_after')
    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.colVis.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('js/pages/tables_datatables.js') }}"></script>
@endsection

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item"><i class="si si-home"></i> My Room</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Schedule</a>
                        </li>
                    </ol>
                </nav>
            </div>
       </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content appliance-page">
        <!-- Dynamic Table Full -->
        <div class="block">
            <div class="block-header">
                <h3 class="block-title">Schedule</h3>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                <table class="schedule table table-bordered table-striped table-vcenter js-dataTable-simple">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 15%">#</th>
                            <th>Name</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">switch #</th>
                            <th style="width: 15%;">Start (hhmm)</th>
                            <th style="width: 15%;">To (hhmm)</th>
                            <th>Deactivate/Activate</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appliances as $app)
                        <tr>
                            <td class="text-center"><?php echo $i++; ?></td>
                            <td class="font-w600">
                                <a href="javascript:void(0)">{{ $app->app_name }}</a>
                            </td>
                            <td align=center class="d-none d-sm-table-cell">
                            {{ $app->switch_no }}
                            </td>
                            <td align=center>
                                <input type="number" class="form-control start" name="{{$app->app_id}}" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength)" maxlength=4 placeholder="{{$app->shr}}:{{$app->smin}}" name="{{$app->switch_no}} start" id="start-time{{$app->id}}">
                            </td>
                            <td align=center>
                            <input type="number" class="form-control end" name="{{$app->app_id}}" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength)" maxlength=4 placeholder="{{$app->ehr}}:{{$app->emin}}" name="{{$app->switch_no}} to" id="to-time{{$app->id}}">
                            </td>
                            <td align=center>
                            @if ($app->state == 1)
                            <div class="custom-control custom-switch custom-control-success mb-1">
                                <input type="checkbox" class="custom-control-input sync" value="{{ $app->app_id }}" id="sync{{$i}}" checked>
                                <label class="custom-control-label" for="sync{{$i}}"></label>
                            </div>
                            @else
                            <div class="custom-control custom-switch custom-control-success mb-1">
                                <input type="checkbox" class="custom-control-input sync" value="{{ $app->app_id }}"  id="sync{{$i}}">
                                <label class="custom-control-label" for="sync{{$i}}"></label>
                            </div>
                            @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Dynamic Table Full -->
    </div>
    <!-- END Page Content -->
@endsection
