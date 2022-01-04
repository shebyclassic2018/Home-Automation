@extends('template.home')
@section('home-rsb')

<h3 class="pad-15 txt-fff bold"><span class="fa fa-dollar"></span> SUBSCRIPTIONS</h3>
<div class="pad-tb-15 subscribe bg-whitesmoke appliance-bg flow-y-auto pos-rel">
    
    <h3 class="pad-15 underline">Select a plan</h3>
    <div class="flex">
        <div class="flex-1 grid-auto mg-5">
            <div class="card wt-250 border-blue">
                <div class="title pad-15 bg-blue txt-fff bold ">Normal Plan</div>
                <div class="body flow-y-auto" style="height: calc(100% - 85px)">
                <div class="row padl-15 underline"><small><em><b>Devices</b></em></small></div>
                    <div class="row padl-15">4 - Relay module</div>
                    <div class="row padl-15 underline"><small><em><b>Connections</b></em></small></div>
                    <div class="row padl-15">Wi-Fi</div>
                    <div class="row padl-15">Internet</div>
                </div>
                <div class="flex">
                    <div class="flex-center">&nbsp;Price : $50</div>
                    <div class="flex-1 padl-15"><button type="button" value="50" class="btn btn-red  wt-90 mg-auto">Subscribe</button></div>
                </div>
            </div>
            <div class="card wt-250 border-orange">
                <div class="title pad-15 bg-orange txt-fff bold ">Standard Plan</div>
                <div class="body flow-y-auto" style="height: calc(100% - 85px)">
                    <div class="row padl-15 underline"><small><em><b>Devices</b></em></small></div>
                    <div class="row padl-15">8 - Relay module</div>
                    <div class="row padl-15 underline"><small><em><b>Connections</b></em></small></div>
                    <div class="row padl-15">Bluetooth</div>
                    <div class="row padl-15">Wi-Fi</div>
                    <div class="row padl-15">Internet</div>
                </div>
                <div class="flex">
                    <div class="flex-center">&nbsp;Price : $70</div>
                    <div class="flex-1 padl-15"><button type="button" value="70" class="btn btn-red  wt-90 mg-auto">Subscribe</button></div>
                </div>
            </div>
            <div class="card wt-250 border-green">
                <div class="title pad-15 underline bg-green txt-fff bold ">Extended Plan</div>
                <div class="body flow-y-auto" style="height: calc(100% - 85px)">
                    <div class="row padl-15 underline"><small><em><b>Devices</b></em></small></div>
                    <div class="row padl-15">16 - Relay module</div>
                    <div class="row padl-15">Temperature sensor</div>
                    <div class="row padl-15 underline"><small><em><b>Connections</b></em></small></div>
                    <div class="row padl-15">Bluetooth</div>
                    <div class="row padl-15">Wi-Fi</div>
                    <div class="row padl-15">GSM</div>
                    <div class="row padl-15">Internet</div>
                </div>
                <div class="flex">
                    <div class="flex-center">&nbsp;Price : $100</div>
                    <div class="flex-1 padl-15"><button type="button" value="100" class="btn btn-red  wt-90 mg-auto">Subscribe</button></div>
                </div>
            </div>
        </div>
    </div>

    <h3 class="pad-15 underline">My plan</h3>
    <h3 class='pad-15 txt-blue bold'><span class="fa fa-long-arrow-right"></span> Normal Plan</h3>
    <div class="plan-detail-table pad-15">
        <div class="row stripe">
            <div class="flex-1 padl-15 txt-red bold">Account name</div>
            <div class="flex-1">SHABANI H RAJABU</div>
        </div>
        <div class="row stripe">
            <div class="flex-1 padl-15  txt-red bold">Paid through</div>
            <div class="flex-1">Paypal Personal Account</div>
        </div>
        <div class="row stripe">
            <div class="flex-1 padl-15  txt-red bold">Amount paid</div>
            <div class="flex-1">$50</div>
        </div>
        <div class="row stripe">
            <div class="flex-1 padl-15 txt-red bold">Confirmation ID</div>
            <div class="flex-1">HXFID45654909</div>
        </div>
        <div class="row stripe">
            <div class="flex-1 padl-15 txt-red bold">Date subscribed</div>
            <div class="flex-1">23-Apr-2021</div>
        </div>
    </div>

</div>


<div class="payment-method-box coat bg-transparent pos-abs top-0 ht-100 wt-100 flex-center invisible z9999">
        <div class="payment-box bg-whitesmoke">
            <div class="title bg-333 txt-ddd pad-15">Select payment method</div>
            <div class="paymentlist pad-15">
                <div id="paypal-button"></div>
            </div>
        </div>
    </div>

    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
@stop 