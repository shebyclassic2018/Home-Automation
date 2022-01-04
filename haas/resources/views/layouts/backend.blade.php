<?php session_start(); ?>
<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title>Home Appliance Automation System</title>

    <meta name="description"
        content="OneUI - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Icons -->
    <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
    <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">
    <link rel="stylesheet" href="{{ asset('css/default/jquery.message.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/default.min.css') }}">

    <!-- Fonts and Styles -->
    @yield('css_before')
    <link rel="stylesheet" id="css-main" href="{{ mix('/css/oneui.css') }}">

    <!-- You can include a specific file from public/css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="{{ mix('/css/themes/amethyst.css') }}"> -->
    @yield('css_after')
    <!-- Page JS Plugins -->
    <script src="{{ asset('js/default/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.colVis.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{asset ('js/plugins/es6-promise/es6-promise.auto.min.js')}}"></script>
    <script src="{{asset ('js/plugins/sweetalert2/sweetalert2.min.js')}}"></script>

    <!-- Page JS Plugins -->
    <script src="{{asset('assets/js/plugins/chartjsv2/Chart.min.js') }}"></script>

    <!-- Page JS Code -->
    




    <!-- OneUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock, Appear, CountTo, Placeholder, Cookie and App.js -->

    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/jquery.scrollLock.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/jquery.countTo.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/jquery.placeholder.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/js.cookie.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>


    <!-- Page JS Plugins -->
    <script src="{{ asset('assets/js/plugins/magnific-popup/magnific-popup.min.js') }}"></script>
    <!-- <script src="{{ asset ('assets/js/pages/base_pages_login.js') }}"></script> -->

    <!-- Page JS Code -->
    <script>
    jQuery(function() {
        // Init page helpers (Appear + Magnific Popup plugins)
        App.initHelpers(['appear', 'magnific-popup']);
    });
    </script>

    <!-- Page JS Code -->
    <script src="{{ asset('js/pages/tables_datatables.js') }}"></script>
</head>

<body>
    <div id="page-container" class="sidebar-o enable-page-overlay sidebar-dark side-scroll page-header-fixed">
        <nav id="sidebar" aria-label="Main Navigation">
            <!-- Side Header -->
            <div class="content-header bg-white-5">
                <!-- Logo -->
                <a class="font-w600 text-dual" href="/">
                    <img src="{{URL::to ('media/image/logo1.png') }}" alt="" height="30px">
                </a>
                <!-- END Logo -->
            </div>
            <!-- END Side Header -->

            <!-- Side Navigation -->
            <div class="content-side content-side-full">
                <ul class="nav-main">
                    <li class="nav-main-item">
                        <a class="nav-main-link{{ request()->is('dashboard') ? ' active' : '' }}" href="/dashboard">
                            <i class="nav-main-link-icon si si-cursor"></i>
                            <span class="nav-main-link-name">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-main-heading">Appliances</li>
                    <li class="nav-main-item{{ request()->is('home/*') ? ' open' : '' }}">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                            aria-expanded="true" href="#">
                            <i class="nav-main-link-icon si si-home"></i>
                            <span class="nav-main-link-name">My Room</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <span
                                    class="pointer nav-main-link{{ request()->is('home/add_appliance') ? ' active' : '' }}"
                                    data-toggle="modal" data-target="#add-appliance-modal" data-dismiss="#sidebar">
                                    <span class="nav-main-link-name">New Appliance</span>
                                </span>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link{{ request()->is('home/appliance') ? ' active' : '' }}"
                                    href="/home/appliance">
                                    <span class="nav-main-link-name">Turn ON/OFF</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link{{ request()->is('home/schedule') ? ' active' : '' }}"
                                    href="/home/schedule">
                                    <span class="nav-main-link-name">Schedule</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link{{ request()->is('home/temperature') ? ' active' : '' }}"
                                    href="/home/temperature">
                                    <span class="nav-main-link-name">Temperature</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-main-heading">More</li>
                    <li class="nav-main-item open">
                        <span class="nav-main-link" data-toggle="modal" data-target="#report-modal" data-dismiss="#sidebar">
                            <i class="nav-main-link-icon fa fa-file"></i>
                            <span class="nav-main-link-name">Report</span>
                        </span>
                    </li>
                    <li class="nav-main-item open">
                        <a class="nav-main-link" href="/">
                            <i class="nav-main-link-icon si si-settings"></i>
                            <span class="nav-main-link-name">Setting</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- END Side Navigation -->
        </nav>
        <!-- END Sidebar -->


        <!-- Pop In Block Modal -->
        <div class="modal fade" id="add-appliance-modal" tabindex="-1" role="dialog"
            aria-labelledby="add-appliance-modal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-popin" role="document">
                <div class="modal-content">
                    <form class="add-appliance-form block block-themed block-transparent mb-0">
                        @csrf
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">New Appliance</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content font-size-sm">
                            <div class="col-lg-12">
                                <!-- Form Labels on top - Default Style -->
                                <div class="mb-5">
                                    <div class="form-group">
                                        <label for="appInput">Appliance Name</label>
                                        <input type="text" class="form-control" id="appInput" name="app-name"
                                            placeholder="Your Appliance..">
                                    </div>
                                    <div class="form-group">
                                        <label for="swnInput">Connected at Switch #</label>
                                        <select class="form-control" id="swnInput" name="swn"
                                            placeholder="Select switch">
                                            <option value="none">-- Choose --</option>
                                            @foreach($switches as $sw)
                                            <option value="{{ $sw->sw }}>!<{{ $sw->pin }}">{{ $sw->sw }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- END Form Labels on top - Default Style -->
                            </div>
                        </div>
                        <div class="block-content block-content-full text-right border-top">
                            <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-primary" id="submit-button"><i
                                    class="fa fa-save mr-1"></i>Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END Pop In Block Modal -->


        <!-- Pop In Block Modal -->
        <div class="modal fade" id="report-modal" tabindex="-1" role="dialog"
            aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog modal-dialog-popin modal-xl" role="document">
                <div class="modal-content" style="width:600px; height:1000px">
                <div id="chartContaier"></div>
                </div>
            </div>
        </div>
        <!-- END Pop In Block Modal -->






        <!-- Header -->
        <header id="page-header" style="z-index: 10">
            <!-- Header Content -->
            <div class="content-header">
                <!-- Left Section -->
                <div class="d-flex align-items-center">
                    <!-- Toggle Sidebar -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                    <button type="button" class="btn btn-sm btn-dual mr-2 d-lg-none" data-toggle="layout"
                        data-action="sidebar_toggle">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                    <!-- END Toggle Sidebar -->

                    <!-- Toggle Mini Sidebar -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                    <button type="button" class="btn btn-sm btn-dual mr-2 d-none d-lg-inline-block" data-toggle="layout"
                        data-action="sidebar_mini_toggle">
                        <i class="fa fa-fw fa-ellipsis-v"></i>
                    </button>
                    <!-- END Toggle Mini Sidebar -->
                </div>
                <!-- END Left Section -->

                <!-- Right Section -->
                <div class="d-flex align-items-center">
                    <!-- User Dropdown -->
                    <div class="dropdown d-inline-block ml-2">
                        <button type="button" class="btn btn-sm btn-dual" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded" src="{{ asset('media/avatars/avatar10.jpg') }}" alt="Header Avatar"
                                style="width: 18px;">
                            <span class="d-none d-sm-inline-block ml-1" style="text-transform: capitalize;">
                                @if (!empty(Session::get('username')))
                                {{ Session::get('username') }}
                                @else
                                {{$_COOKIE['username']}}
                                @endif
                            </span>
                            <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right p-0 border-0 font-size-sm"
                            aria-labelledby="page-header-user-dropdown">
                            <div class="p-3 text-center bg-primary">
                                <img class="img-avatar img-avatar48 img-avatar-thumb"
                                    src="{{ asset('media/avatars/avatar10.jpg') }}" alt="">
                            </div>
                            <div class="p-2">
                                <h5 class="dropdown-header text-uppercase">User Options</h5>
                                <a class="dropdown-item d-flex align-items-center justify-content-between"
                                    href="/home/inbox">
                                    <span>Inbox</span>
                                    <span>
                                        <span class="badge badge-pill badge-primary">3</span>
                                        <i class="si si-envelope-open ml-1"></i>
                                    </span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between"
                                    href="javascript:void(0)">
                                    <span>Profile</span>
                                    <span>
                                        <span class="badge badge-pill badge-success">1</span>
                                        <i class="si si-user ml-1"></i>
                                    </span>
                                </a>
                                <div role="separator" class="dropdown-divider"></div>
                                <h5 class="dropdown-header text-uppercase">Actions</h5>
                                <a class="dropdown-item d-flex align-items-center justify-content-between js-swal-logout-confirm"
                                    href="javascript:void(0)">
                                    <span>Log Out</span>
                                    <i class="si si-logout ml-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- END User Dropdown -->

                    <!-- Notifications Dropdown -->
                    <div class="dropdown d-inline-block ml-2">
                        <button type="button" class="btn btn-sm btn-dual" id="page-header-notifications-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="si si-envelope"></i>
                            <span class="badge badge-primary badge-pill">6</span>
                        </button>
                    </div>
                    <!-- END Notifications Dropdown -->

                </div>
                <!-- END Right Section -->
            </div>

            <!-- input hidden -->
            <input type="hidden" id="app_id">

            <div id="page-header-loader" class="overlay-header bg-white">
                <div class="content-header">
                    <div class="w-100 text-center">
                        <i class="fa fa-fw fa-circle-notch fa-spin"></i>
                    </div>
                </div>
            </div>
            <!-- END Header Loader -->
        </header>
        <!-- END Header -->


        <!-- Main Container -->
        <main id="main-container">
            @yield('content')
        </main>
        <!-- END Main Container -->

        <!-- Footer -->
        <footer id="page-footer" class="bg-body-light">
            <div class="content py-3">
                <div class="row font-size-sm">
                    <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-left">
                        <a class="font-w600" href="" target="_blank">HAAS</a> &copy; <span
                            data-toggle="year-copy"></span>
                    </div>
                </div>
            </div>
        </footer>
        <!-- END Footer -->
    </div>
    <!-- END Page Container -->

    <!-- OneUI Core JS -->

    

    <script src="{{ asset ('js/default/jquery-3.3.1.min.js') }}"></script>
    <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token]').attr('content')
        }
    });
    var _token = $('meta[name=csrf-token]').attr('content');
    </script>
    <script src="{{ asset ('css/default/bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset ('js/default/jquery.canvasjs.min.js') }}"></script>
    <script src="{{ asset ('js/default/classicQuery.js') }}"></script>
    <script>
    var addApplianceUrl = "{{route('addApplianceUrl')}}";
    var deleteApplianceUrl = "{{route('deleteApplianceUrl')}}";
    var getScheduleUrl = "{{route('getScheduleUrl')}}";
    var applianceTableJSONUrl = "{{route('applianceTableJSONUrl')}}";
    var savejsonUrl = "{{route('savejsonUrl')}}";
    var getjsonUrl = "{{route('getjsonUrl')}}";
    var setAppIDUri = "{{route('setAppIDUri')}}";
    var insertScheduleUrl = "{{route('insertScheduleUrl')}}";
    var validateScheduleUrl = "{{route('validateScheduleUrl')}}";
    var turn_appliance_off_on_url = "{{route('turn_appliance_off_on_url')}}";
    var temp_data_url = "{{route('temp_data_url')}}";
    var loginUrl = "{{route('login_url')}}";
    </script>
    <script src="{{ asset ('js/onloadjs.js') }}"></script>
    <script src="{{ mix('js/oneui.app.js') }}"></script>
    <script src="{{ asset ('js/default/jquery.message.js') }}"></script>
    <script src="{{ asset ('js/main.js') }}"></script>
    <script src="{{asset ('js/pages/be_comp_dialogs.min.js')}}"></script>
    <script src="{{asset ('js/default/canvasjs.min.js') }}"></script>



    
    


    <!-- Laravel Scaffolding JS -->
    <!-- <script src="{{ mix('/js/laravel.app.js') }}"></script> -->

    @yield('js_after')
</body>

</html>