@extends ('template.headers')
@section ('content')
    <div class="container pos-rel bg-ddd ht-100 home">
        <header class="flex txt-ddd pad-15 shadow-000-5">
            <h2 class=" visible-m transition">
                <span class="open-menu pointer">&#9776;</span>
                <span class="close-menu pointer hide">&times;</span>
            </h2>
            <!-- <h2><span class="fa fa-home"></span></h2> -->
            <div class="flex-1"><img src="{{URL::to ('/image/logo1.png') }}"></div>
            <h2 class="padl-15"><span class="fa fa-power-off pointer logout-btn"></span></h2>
        </header>
        <main class="home bg-fff txt-333 ff-CG flex pos-rel">
            <div class="pos-abs-m wt-250 ht-100 bg-333 menu left-menu-m flow-y-auto shadow-000-5">
                <div class="profile">
                    <div class="flex-center">
                        <img src="{{ URL::to('image/background/sl1.png')}}" alt="" class="responsive-image round">
                    </div>
                    <div class="caption txt-ddd">shrajabu18@mustudent.ac.tz</div>
                </div>
                <div class="menu-item txt-ddd flex"><h2 class="flex-center"><a href="/home/appliance" class="txt-ddd flex-center"><span class="fa fa-home"></span> <span class="padl-15" style="font-size: 16px">Home</span></a></h2></div>
                <div class="menu-item txt-ddd flex"><h2 class="flex-center"><a href="/statistics" class="txt-ddd flex-center"><span class="fa fa-cog"></span> <span class="padl-15" style="font-size: 16px">Statistics</span></a></h2></div>
                <div class="menu-item txt-ddd flex"><h2 class="flex-center"><a href="/subscribe" class="txt-ddd flex-center"><span class="fa fa-dollar"></span> <span class="padl-15" style="font-size: 16px">&nbsp;&nbsp;Subscriptions</span></a></h2></div>
                <div class="menu-item txt-ddd flex"><h2 class="flex-center"><a href="/setting/setting" class="txt-ddd flex-center"><span class="fa fa-wrench"></span> <span class="padl-15" style="font-size: 16px">Setting</span></a></h2></div>
            
            </div>
            <div class="flex-1 flow-y-auto rsb">
                @yield('home-rsb')
            </div>
        </main>
    </div>
@stop