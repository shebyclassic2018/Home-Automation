<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <!-- <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="{{ asset('/css/default/awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/default/classio/css/classio.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/default/datatable/sc-datatable.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/default/jquery.message.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/default/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/admin/desktop.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/admin/mobile.css')}}">
    <title>Admin panel</title>
</head>
<body class="body">
    <div class="container">
        <header>
            <div>
                <span class="cs cs-menu menu-icon"></span>
                <div class="close">&times;</div>
            </div>
            <div class="header-text">
                <div class="logo">
                </div>
            </div>
            <div class="center">
                <div class="message-list message-icon">
                    <span class="fa fa-envelope"></span>
                    <div class="badge center">99+</div>
                </div>
                <div class="bell-icon">
                    <span class="fa fa-bell"></span>
                    <div class="badge center">34</div>
                </div>
            </div>
        </header>
        <main>
            <div class="side-bar">
                <div class="left-side-bar">
                    <div class="profile">
                        <div class="details">
                            <img class="round" src="image/icon/profile.png" alt="">
                            <div class="profile-name" style="font-size: 12px">
                                {{session('username')}}
                                <small>{{session('email')}}</small>
                            </div>
                        </div>
                        <div class="profile-icon center">
                            <span class="fa fa-user"></span>
                        </div>
                    </div>
                    <div class="home left-side-btn"><span class="fa fa-home"></span> <span class="ls-text">Home</div>
                    <div class="register-customer left-side-btn"><span class="fa fa-edit"></span> <span class="ls-text">Register customer</span></div>
                    <div class="action left-side-btn"><span class="fa fa-anchor"></span> <span class="ls-text">Action </span></div>
                    <div class="post-advert left-side-btn"><span class="fa fa-upload"></span> <span class="ls-text">Upload adverts </span></div>
                    <div class="registered-customer left-side-btn"><span class="fa fa-eye"></span> <span class="ls-text">View </span> <span style="float: right;" class="fa fa-angle-right"></span></div>
                    <div class="logout"><span class="fa fa-sign-out"></span> <span class="ls-text">Logout </span></div>
                    <!-- <div class="copy">&copy; 2020 - All right reserved</div> -->
                </div>
                <div class="right-side-bar">
                    
                    
                    @yield('content')
                    
                </div>
                <!-- LOGOUT-CONTENT -->
                <form method='GET' action='/logout' class="logout-content center">
                    <div class="logout-box">
                        <div class="box-header"><span class="fa fa-sign-out"></span> LOGOUT</div>
                        <div class="box-main center"><span class="fa fa-warning"></span>&nbsp;Are you sure?</div>
                        <div class="box-footer center">
                            <div><button type="button" class="logout-cancel btn btn-cancel">Cancel</button></div>
                            <div><button type='submit'>Confirm</button></div>
                        </div>
                    </div>
                </form>
                <!-- <div class="blur-region"></div> -->
        </main>
    </div>
    <!-- INPUT HIDDEN -->
    <input type="hidden" id="countCheckBox">
    <input type="hidden" id="range">
    
    <script src="js/default/jquery-3.3.1.min.js"></script>
    <script src="js/default/jquery.message.js"></script>
    <script src="js/default/classicQuery.js"></script>
    <script src="js/default/jquery.dataTables.min.js"></script>
    <script src="js/default/jquery.canvasjs.min.js"></script>
    <script src="js/default/jquery.canvasjs.stock.min.js"></script>
    <script>
        var message_url = "{{route('outgoing_messages')}}";
        var conversation_url = "{{route('conversation')}}";
        var customer_list = "{{route('customer_list')}}";
        var customer_details = "{{route('customer_details')}}";
        var updatecustomerstatus = "{{route('updatecustomerstatus')}}";
        var viewlist = "{{route('getcustomer')}}";
        var pdf = "{{route('pdf')}}";
    </script>    
    <script src="js/admin/admin.js"></script>
    <script>
        $(document).ready(function() {
            $('#customer-list').DataTable( {
                'ajax': 'js/ajax/data/array.txt'
            } );
        } );
    </script>
    <script type="text/javascript">
$(function () {
	$("#chartContainer").CanvasJSChart({ //Pass chart options
		data: [
		{
		type: "splineArea", //change it to column, spline, line, pie, etc
		dataPoints: [
			{ x: 10, y: 10 },
			{ x: 20, y: 14 },
			{ x: 30, y: 18 },
			{ x: 40, y: 22 },
			{ x: 50, y: 18 },
			{ x: 60, y: 28 }
		]
	}
	]
});

});
</script>
</body>
</html>