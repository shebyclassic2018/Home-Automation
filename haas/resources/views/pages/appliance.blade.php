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
    <div class="bg-body-dark">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item"><i class="si si-home"></i> My Room</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Turn ON/OFF</a>
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
                <h3 class="block-title">Appliance(s)</h3>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-simple">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 15%">#</th>
                            <th>Name</th>
                            <th class="d-none d-sm-table-cell text-center" style="width: 15%;">switch #</th>
                            <th class="d-sm-table-cell text-center" style="width: 15%;">Statistics</th>
                            <th class="text-center" style="width: 15%;">Action</th>
                            <th class="text-center">OFF/ON</th>
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

                            <td align=center class="d-none d-sm-table-cell">
                            <button class="btn graph-btn" value="{{ $app->switch_no }}"><span class="fa fa-chart-bar"></span></button>
                            </td>
                            <td align=center>
                                <button type="button" style="color: rgb(226, 120, 120);" class="btn delete-appliance js-swal-confirm" value="{{$app->app_id}}"><i class="fa fa-trash"></i></button>
                            </td>
                            <td align=center>
                            @if ($app->state == 1)
                            <div class="custom-control custom-switch custom-control-success mb-1">
                                <input type="checkbox" class="custom-control-input sw-btn" value="{{ $app->switch_no }}<!>{{ $app->app_name }}" id="sw{{$i}}" name="example-sw-success1" checked>
                                <label class="custom-control-label" for="sw{{$i}}"></label>
                            </div>
                            @else
                            <div class="custom-control custom-switch custom-control-success mb-1">
                                <input type="checkbox" class="custom-control-input sw-btn" value="{{ $app->switch_no }}<!>{{ $app->app_name }}"  id="sw{{$i}}" name="example-sw-success1">
                                <label class="custom-control-label" for="sw{{$i}}"></label>
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
