@extends('layouts.backend')

@section('css_before')
<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">



<!-- Icons -->
<!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
<link rel="shortcut icon" href="{{ asset('assets/img/favicons/favicon.png') }}">

<link rel="icon" type="image/png" href="{{ asset('assets/img/favicons/favicon-16x16.png') }}" sizes="16x16">
<link rel="icon" type="image/png" href="{{ asset('assets/img/favicons/favicon-32x32.png') }}" sizes="32x32">
<link rel="icon" type="image/png" href="{{ asset('assets/img/favicons/favicon-96x96.png') }}" sizes="96x96">
<link rel="icon" type="image/png" href="{{ asset('assets/img/favicons/favicon-160x160.png') }}" sizes="160x160">
<link rel="icon" type="image/png" href="{{ asset('assets/img/favicons/favicon-192x192.png') }}" sizes="192x192">

<link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/img/favicons/apple-touch-icon-57x57.png') }}">
<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/img/favicons/apple-touch-icon-60x60.png') }}">
<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/img/favicons/apple-touch-icon-72x72.png') }}">
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/favicons/apple-touch-icon-76x76.png') }}">
<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/img/favicons/apple-touch-icon-114x114.png') }}">
<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/img/favicons/apple-touch-icon-120x120.png') }}">
<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/img/favicons/apple-touch-icon-144x144.png') }}">
<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/img/favicons/apple-touch-icon-152x152.png') }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicons/apple-touch-icon-180x180.png') }}">
<!-- END Icons -->

<!-- Stylesheets -->
<!-- Web fonts -->


<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="{{ asset('assets/js/plugins/magnific-popup/magnific-popup.min.css') }}">

<!-- Bootstrap and OneUI CSS framework -->
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" id="css-main" href="{{ asset('assets/css/oneui.css') }}">

<!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
<!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
<!-- END Stylesheets -->
@endsection

@section('js_after')

@endsection

@section('content')
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">

            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item"><i class="si si-home"></i> My Room</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="">Temperature</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<!-- Main Container -->
<main id="main-container" class="col-xs-12 mg-auto">
    <!-- Hero -->

    <!-- Hero Content -->
    <div class="bg-image" style="background-image: url('../../../assets/img/photos/photo23@2x.jpg');">
        <div class="bg-white-op">
            <section class="content content-full content-boxed overflow-hidden">
                <!-- Section Content -->
                <div class="push-150-t push-150 text-center">
                    <h1 class="text-white push-10 visibility-hidde" data-toggle="appear"
                        data-class="animated fadeInDown"><span id="temperature-reader"></span>&deg; C</h1>
                    <h2 class="h5 text-white visibility-hidde" data-toggle="appear" data-class="animated fadeInDown">
                       <i class="fa fa-cloud"></i> Today</h2>
                </div>
                <!-- END Section Content -->
            </section>
        </div>
    </div>
    <!-- END Hero Content -->

    <!-- More Stories -->
    <section class="content content-boxed">
        <!-- Weather -->
        <div class="block">
            <div class="bg-image" style="background-image: url('../../../assets/img/photos/photo2.jpg');">
                <div class="bg-black-op">
                    <div class="block-content block-content-full text-center">
                        <i class="fa fa-4x fa-sun-o text-warning push-30-t"></i>
                        <h3 class="h4 text-uppercase text-white push-30-t push-5">Chania, Crete</h3>
                        <h4 class="h5 text-white-op push-20">Greece</h4>
                    </div>
                </div>
            </div>
            <div class="block-content block-content-full">
                <div class="row text-center">
                    <div class="col-xs-4">
                        <div class="h2 font-w300">28&deg;C</div>
                        <div class="h5 text-muted push-5-t">MON</div>
                    </div>
                    <div class="col-xs-4">
                        <div class="h2 font-w300">30&deg;C</div>
                        <div class="h5 text-muted push-5-t">TUE</div>
                    </div>
                    <div class="col-xs-4">
                        <div class="h2 font-w300">32&deg;C</div>
                        <div class="h5 text-muted push-5-t">WED</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Weather -->
    </section>
    <!-- END More Stories -->
</main>
<!-- END Main Container -->


@endsection