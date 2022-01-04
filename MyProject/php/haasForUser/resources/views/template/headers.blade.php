
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="refresh" content="0"> -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <title>Home Automation</title>
    <link rel="stylesheet" href="{{ asset ('css/default/awesome/css/font-awesome.min.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset ('css/default/bootstrap/css/bootstrapmin.css') }}"> -->
    <link rel="stylesheet" href="{{ asset ('css/default/jquery.message.css') }}">
    <link rel="stylesheet" href='{{ asset ("css/default.min.css") }}'>
    <link rel="stylesheet" href="{{ asset ('css/ha.min.css') }}">  
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
</head>
<body>
    <!-- Confirm box -->
    <div class="alert-body  pos-abs top-0 wt-100 ht-100 bg-000-5 z100 flex-center">
        <div class="box round-5 bg-whitesmoke">
            <div class="title"><span class="icon fa"></span> <span class="icon-text"></span></div>
            <div class="alert flex-center">Are you sure></div>
            <div class="alert-btn flex">
                <div class="flex-1"></div>
                <button class="btn btn-red notConfirm"><span class="fa fa-times"></span> Cancel</button>&nbsp;
                <a href="" class="btn btn-blue padl-15"><span class="fa fa-check"></span> Confirm</a>&nbsp;
            </div>
        </div>
    </div>
    <!-- Page Loader -->
    <div class="loader pos-abs wt-100 ht-100 z100 bg-000-5 flex-center">
        <span class="fa fa-spinner fa-2x fa-spin txt-ddd"></span>
    </div>

    @yield('content')

    
    <script src="{{ asset ('js/default/jquery-3.3.1.min.js') }}"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token]').attr('content')
            }
        });
        var _token =  $('meta[name=csrf-token]').attr('content');
    </script>
    <script src="{{ asset ('css/default/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset ('js/default/jquery.message.js') }}"></script>
    <script src="{{ asset ('js/default/jquery.canvasjs.min.js') }}"></script>
    <script src="{{ asset ('js/default/classicQuery.js') }}"></script>
    <script>
        var addApplianceUrl = "{{route('addApplianceUrl')}}";
        var getScheduleUrl = "{{route('getScheduleUrl')}}";
        var applianceTableJSONUrl = "{{route('applianceTableJSONUrl')}}";
        var insertScheduleUrl = "{{route('insertScheduleUrl')}}";
        var turn_appliance_off_on_url = "{{route('turn_appliance_off_on_url')}}";
    </script>
    <script src="{{ asset ('js/main.js') }}"></script>
    <script src="{{ asset ('js/onloadjs.js') }}"></script>
    <script>
        var amount;
        $('.subscribe .card button').click(function() {
            amount = $(this).val();
        });
        paypal.Button.render({
            //confihgure environment
            env: 'sandbox',
            client : {
                sandbox: 'AeatnFoXL1V45NZiv9TZUG73vpMMDVUpgtfSGffIH4iq609h0mc8ejqsd02PBC5NARSflsmr1cya5c0t',
                production: ''
            },
            //customize button

            locale: 'en_US',
            style: {
                size: 'large',
                color: 'gold',
                shape: 'pill',
            },

            //set up payment
            payment: function (data, actions) {
                return actions.payment.create({
                    transactions: [{
                        amount: {
                            total: amount,
                            currency: 'USD'
                        }
                    }]
                });
            },

            //execute the payment
            onAuthorize: function (data, actions) {
                return actions.payment.execute().then(function() {
                    //show confirmation message to the buyer
                    window.alert('thank you for purchase')
                });
            }

        }, '#paypal-button');
        //     paypal.Buttons({
        //     createOrder: function(data, actions) {
        //     // This function sets up the details of the transaction, including the amount and line item details.
        //     return actions.order.create({
        //         purchase_units: [{
        //         amount: {
        //             value: '0.01'
        //         }
        //         }]
        //     });
        //     },
        //     onApprove: function(data, actions) {
        //     // This function captures the funds from the transaction.
        //     return actions.order.capture().then(function(details) {
        //         // This function shows a transaction success message to your buyer.
        //         alert('Transaction completed by ' + details.payer.name.given_name);
        //     });
        //     }
        //     }).render('#paypal-button');
        // //This function displays Smart Payment Buttons on your web page.
        
    </script>
</body>
</html>