<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>Login</title>

        <meta name="description" content="OneUI - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <!-- Open Graph Meta -->
        <meta property="og:title" content="OneUI - Bootstrap 4 Admin Template &amp; UI Framework">
        <meta property="og:site_name" content="OneUI">
        <meta property="og:description" content="OneUI - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta property="og:type" content="website">
        <meta property="og:url" content="">
        <meta property="og:image" content="">

        

        <!-- Stylesheets -->
        <!-- Fonts and OneUI framework -->
        <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700"> -->
        <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/oneui.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/default/jquery.message.css') }}">

        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/amethyst.min.css"> -->
        <!-- END Stylesheets -->
    </head>
    <body>
        <div id="page-container">

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="bg-image" style="background-image: url('media/image/logo1.png');background-size: 100% 100%;">
                    <div class="hero-static bg-white-95">
                        <div class="content">
                            <div class="row justify-content-center">
                                <div class="col-md-8 col-lg-6 col-xl-4">
                                    <!-- Sign In Block -->
                                    <div class="block block-themed block-fx-shadow mb-0">
                                        <div class="block-header">
                                            <h3 class="block-title">Sign In </h3>
                                            <div class="block-options">
                                                <a class="btn-block-option font-size-sm" href="op_auth_reminder.html">Forgot Password?</a>
                                                <a class="btn-block-option" href="op_auth_signup.html" data-toggle="tooltip" data-placement="left" title="New Account">
                                                    <i class="fa fa-user-plus"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="block-content">
                                            <div class="p-sm-3 px-lg-4 py-lg-5 " style="display:flex;justify-content: center">
                                                
                                                    <img src="{{ URL::to('media/image/logo1.png') }}" height="70px">
                                                </div>

                                                <!-- Sign In Form -->
                                                <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _es6/pages/op_auth_signin.js) -->
                                                <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                                <form class="login-form js-validation-signin" method="POST" action="/login">
                                                @csrf
                                                    <div class="py-3">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-alt form-control-lg" id="login-username" name="username" placeholder="Username">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="password" class="form-control form-control-alt form-control-lg" id="login-password" name="pwd" placeholder="Password">
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="login-remember" name="remember" value='checked'>
                                                                <label class="custom-control-label font-w400" for="login-remember">Remember Me</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-6 col-xl-5">
                                                            <button type="submit" class="btn btn-block btn-primary" id="login-btn">
                                                                <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Sign In
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <!-- END Sign In Form -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Sign In Block -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
        </div>


            
    



        <script src="{{ asset('assets/js/oneui.core.min.js') }}"></script>

        <script src="{{ asset('assets/js/oneui.app.min.js') }}"></script>

        <!-- Page JS Plugins -->
        <script src="{{ asset('assets/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>

        <!-- Page JS Code -->
        <script src="{{ asset('assets/js/pages/op_auth_signin.min.js') }}"></script>


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
    var getScheduleUrl = "{{route('getScheduleUrl')}}";
    var applianceTableJSONUrl = "{{route('applianceTableJSONUrl')}}";
    var getjsonUrl = "{{route('getjsonUrl')}}";
    var insertScheduleUrl = "{{route('insertScheduleUrl')}}";
    var turn_appliance_off_on_url = "{{route('turn_appliance_off_on_url')}}";
    var temp_data_url = "{{route('temp_data_url')}}";
    var loginUrl = "{{route('login_url')}}";
    </script>
    
    <script src="{{ asset ('js/onloadjs.js') }}"></script>
    <script src="{{ asset ('js/default/jquery.message.js') }}"></script>
    <script src="{{ asset ('js/main.js') }}"></script>

    

    </body>
</html>
