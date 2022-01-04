@extends('layouts.backend')
@section('content')

    

    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            <div class="row">
                <div class="col-md-5 col-xl-3">
                    <!-- Toggle Inbox Side Navigation -->
                    <div class="d-md-none push">
                        <!-- Class Toggle, functionality initialized in Helpers.coreToggleClass() -->
                        <button type="button" class="btn btn-block btn-primary" data-toggle="class-toggle"
                            data-target="#one-inbox-side-nav" data-class="d-none">
                            Inbox Menu
                        </button>
                    </div>
                    <!-- END Toggle Inbox Side Navigation -->

                    <!-- Inbox Side Navigation -->
                    <div id="one-inbox-side-nav" class="d-none d-md-block push">
                        <!-- Inbox Menu -->
                        <div class="block">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Inbox</h3>
                                <div class="block-options">
                                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal"
                                        data-target="#one-inbox-new-message">
                                        <i class="fa fa-pencil-alt mr-1"></i> New Message
                                    </button>
                                </div>
                            </div>
                            <div class="block-content">
                                <ul class="nav nav-pills flex-column font-size-sm push">
                                    <li class="nav-item my-1">
                                        <a class="nav-link d-flex justify-content-between align-items-center active"
                                            href="">
                                            <span>
                                                <i class="fa fa-fw fa-inbox mr-1"></i> Inbox
                                            </span>
                                            <span class="badge badge-pill badge-secondary">3</span>
                                        </a>
                                    </li>
                                    <li class="nav-item my-1">
                                        <a class="nav-link d-flex justify-content-between align-items-center"
                                            href="javascript:void(0)">
                                            <span>
                                                <i class="fa fa-fw fa-star mr-1"></i> Starred
                                            </span>
                                            <span class="badge badge-pill badge-secondary">48</span>
                                        </a>
                                    </li>
                                    <li class="nav-item my-1">
                                        <a class="nav-link d-flex justify-content-between align-items-center"
                                            href="javascript:void(0)">
                                            <span>
                                                <i class="fa fa-fw fa-paper-plane mr-1"></i> Sent
                                            </span>
                                            <span class="badge badge-pill badge-secondary">1480</span>
                                        </a>
                                    </li>
                                    <li class="nav-item my-1">
                                        <a class="nav-link d-flex justify-content-between align-items-center"
                                            href="javascript:void(0)">
                                            <span>
                                                <i class="fa fa-fw fa-pencil-alt mr-1"></i> Draft
                                            </span>
                                            <span class="badge badge-pill badge-secondary">2</span>
                                        </a>
                                    </li>
                                    <li class="nav-item my-1">
                                        <a class="nav-link d-flex justify-content-between align-items-center"
                                            href="javascript:void(0)">
                                            <span>
                                                <i class="fa fa-fw fa-folder mr-1"></i> Archive
                                            </span>
                                            <span class="badge badge-pill badge-secondary">1987</span>
                                        </a>
                                    </li>
                                    <li class="nav-item my-1">
                                        <a class="nav-link d-flex justify-content-between align-items-center"
                                            href="javascript:void(0)">
                                            <span>
                                                <i class="fa fa-fw fa-trash-alt mr-1"></i> Trash
                                            </span>
                                            <span class="badge badge-pill badge-secondary">10</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- END Inbox Menu -->

                        <!-- Friends -->
                        <div class="block">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Friends</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option">
                                        <i class="si si-settings"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content">
                                <ul class="nav-items font-size-sm">
                                    <li>
                                        <a class="media py-2" href="javascript:void(0)">
                                            <div class="mr-3 ml-2 overlay-container overlay-bottom">
                                                <img class="img-avatar img-avatar48"
                                                    src="assets/media/avatars/avatar4.jpg" alt="">
                                                <span
                                                    class="overlay-item item item-tiny item-circle border border-2x border-white bg-success"></span>
                                            </div>
                                            <div class="media-body">
                                                <div class="font-w600">Amber Harvey</div>
                                                <div class="font-w400 text-muted">Web Designer</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="media py-2" href="javascript:void(0)">
                                            <div class="mr-3 ml-2 overlay-container overlay-bottom">
                                                <img class="img-avatar img-avatar48"
                                                    src="assets/media/avatars/avatar11.jpg" alt="">
                                                <span
                                                    class="overlay-item item item-tiny item-circle border border-2x border-white bg-success"></span>
                                            </div>
                                            <div class="media-body">
                                                <div class="font-w600">Justin Hunt</div>
                                                <div class="font-w400 text-muted">Graphic Designer</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="media py-2" href="javascript:void(0)">
                                            <div class="mr-3 ml-2 overlay-container overlay-bottom">
                                                <img class="img-avatar img-avatar48"
                                                    src="assets/media/avatars/avatar5.jpg" alt="">
                                                <span
                                                    class="overlay-item item item-tiny item-circle border border-2x border-white bg-warning"></span>
                                            </div>
                                            <div class="media-body">
                                                <div class="font-w600">Amber Harvey</div>
                                                <div class="font-w400 text-muted">Photographer</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="media py-2" href="javascript:void(0)">
                                            <div class="mr-3 ml-2 overlay-container overlay-bottom">
                                                <img class="img-avatar img-avatar48"
                                                    src="assets/media/avatars/avatar12.jpg" alt="">
                                                <span
                                                    class="overlay-item item item-tiny item-circle border border-2x border-white bg-warning"></span>
                                            </div>
                                            <div class="media-body">
                                                <div class="font-w600">Henry Harrison</div>
                                                <div class="font-w400 text-muted">Copywriter</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="media py-2" href="javascript:void(0)">
                                            <div class="mr-3 ml-2 overlay-container overlay-bottom">
                                                <img class="img-avatar img-avatar48"
                                                    src="assets/media/avatars/avatar13.jpg" alt="">
                                                <span
                                                    class="overlay-item item item-tiny item-circle border border-2x border-white bg-danger"></span>
                                            </div>
                                            <div class="media-body">
                                                <div class="font-w600">Jesse Fisher</div>
                                                <div class="font-w400 text-muted">UI designer</div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- END Friends -->

                        <!-- Account -->
                        <div class="block">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Account</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option">
                                        <i class="si si-settings"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content">
                                <!-- Easy Pie Chart (.js-pie-chart class is initialized in Helpers.easyPieChart()) -->
                                <!-- For more info and examples you can check out http://rendro.github.io/easy-pie-chart/ -->
                                <!-- Pie Chart Container -->
                                <br>
                                <div class="js-pie-chart pie-chart push" data-percent="35" data-line-width="3"
                                    data-size="100" data-bar-color="#abe37d" data-track-color="#eeeeee"
                                    data-scale-color="#dddddd">
                                    <span>
                                        <img class="img-avatar" src="{{URL::to('media/avatars/avatar3.jpg') }}" alt="">
                                    </span>
                                </div><br>
                                <a class="block block-bordered block-rounded block-link-shadow"
                                    href="javascript:void(0)">
                                    <div class="block-content block-content-full text-center">
                                        <div class="push">
                                            <i class="si si-like fa-2x text-success"></i>
                                        </div>
                                        <div class="font-size-h2 font-w700">
                                            <span class="text-muted">+</span> 2.5TB
                                        </div>
                                        <div class="font-size-sm text-muted text-uppercase">Upgrade Now</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!-- END Account -->
                    </div>
                    <!-- END Inbox Side Navigation -->
                </div>
                <div class="col-md-7 col-xl-9">
                    <!-- Message List -->
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">
                                15-30 <span class="font-w400 text-lowercase">from</span> 700
                            </h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-toggle="tooltip"
                                    data-placement="left" title="Previous 15 Messages">
                                    <i class="si si-arrow-left"></i>
                                </button>
                                <button type="button" class="btn-block-option" data-toggle="tooltip"
                                    data-placement="left" title="Next 15 Messages">
                                    <i class="si si-arrow-right"></i>
                                </button>
                                <button type="button" class="btn-block-option" data-toggle="block-option"
                                    data-action="state_toggle" data-action-mode="demo">
                                    <i class="si si-refresh"></i>
                                </button>
                                <button type="button" class="btn-block-option" data-toggle="block-option"
                                    data-action="fullscreen_toggle"></button>
                            </div>
                        </div>
                        <div class="block-content">
                            <!-- Messages Options -->
                            <div class="d-flex justify-content-between push">
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-light" type="button">
                                        <i class="fa fa-archive text-primary"></i>
                                        <span class="d-none d-sm-inline ml-1">Archive</span>
                                    </button>
                                    <button class="btn btn-sm btn-light" type="button">
                                        <i class="fa fa-star text-warning"></i>
                                        <span class="d-none d-sm-inline ml-1">Star</span>
                                    </button>
                                </div>
                                <button class="btn btn-sm btn-light" type="button">
                                    <i class="fa fa-times text-danger"></i>
                                    <span class="d-none d-sm-inline ml-1">Delete</span>
                                </button>
                            </div>
                            <!-- END Messages Options -->

                            <!-- Messages and Checkable Table (.js-table-checkable class is initialized in Helpers.tableToolsCheckable()) -->
                            <div class="pull-x">
                                <table class="js-table-checkable table table-hover table-vcenter font-size-sm">
                                    <tbody>
                                        <tr>
                                            <td class="text-center" style="width: 60px;">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="inbox-msg15"
                                                        name="inbox-msg15">
                                                    <label class="custom-control-label font-w400"
                                                        for="inbox-msg15"></label>
                                                </div>
                                            </td>
                                            <td class="d-none d-sm-table-cell font-w600" style="width: 140px;">David
                                                Fuller</td>
                                            <td>
                                                <a class="font-w600" data-toggle="modal"
                                                    data-target="#one-inbox-message" href="#">Welcome to our service</a>
                                                <div class="text-muted mt-1">It's a pleasure to have you on our
                                                    service..</div>
                                            </td>
                                            <td class="d-none d-xl-table-cell text-muted" style="width: 80px;">
                                                <i class="fa fa-paperclip mr-1"></i> (3)
                                            </td>
                                            <td class="d-none d-xl-table-cell text-muted" style="width: 120px;">
                                                <em>2 min ago</em>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="inbox-msg14"
                                                        name="inbox-msg14">
                                                    <label class="custom-control-label font-w400"
                                                        for="inbox-msg14"></label>
                                                </div>
                                            </td>
                                            <td class="d-none d-sm-table-cell font-w600">Jose Parker</td>
                                            <td>
                                                <a class="font-w600" data-toggle="modal"
                                                    data-target="#one-inbox-message" href="#">Your subscription was
                                                    updated</a>
                                                <div class="text-muted mt-1">We are glad you decided to go with a vip..
                                                </div>
                                            </td>
                                            <td class="d-none d-xl-table-cell text-muted">
                                                <i class="fa fa-paperclip mr-1"></i> (2)
                                            </td>
                                            <td class="d-none d-xl-table-cell text-muted">
                                                <em>10 min ago</em>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="inbox-msg13"
                                                        name="inbox-msg13">
                                                    <label class="custom-control-label font-w400"
                                                        for="inbox-msg13"></label>
                                                </div>
                                            </td>
                                            <td class="d-none d-sm-table-cell font-w600">Amber Harvey</td>
                                            <td>
                                                <a class="font-w600" data-toggle="modal"
                                                    data-target="#one-inbox-message" href="#">Update is available</a>
                                                <div class="text-muted mt-1">An update is under way for your app..</div>
                                            </td>
                                            <td class="d-none d-xl-table-cell text-muted"></td>
                                            <td class="d-none d-xl-table-cell text-muted">
                                                <em>25 min ago</em>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="inbox-msg12"
                                                        name="inbox-msg12">
                                                    <label class="custom-control-label font-w400"
                                                        for="inbox-msg12"></label>
                                                </div>
                                            </td>
                                            <td class="d-none d-sm-table-cell font-w600">Helen Jacobs</td>
                                            <td>
                                                <a class="font-w600" data-toggle="modal"
                                                    data-target="#one-inbox-message" href="#">New Sale!</a>
                                                <div class="text-muted mt-1">You had a new sale and earned..</div>
                                            </td>
                                            <td class="d-none d-xl-table-cell text-muted">
                                                <i class="fa fa-paperclip mr-1"></i> (1)
                                            </td>
                                            <td class="d-none d-xl-table-cell text-muted">
                                                <em>30 min ago</em>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="inbox-msg11"
                                                        name="inbox-msg11">
                                                    <label class="custom-control-label font-w400"
                                                        for="inbox-msg11"></label>
                                                </div>
                                            </td>
                                            <td class="d-none d-sm-table-cell font-w600">Andrea Gardner</td>
                                            <td>
                                                <a class="font-w600" data-toggle="modal"
                                                    data-target="#one-inbox-message" href="#">Action Required for your
                                                    account!</a>
                                                <div class="text-muted mt-1">Your account is inactive for a long time
                                                    and..</div>
                                            </td>
                                            <td class="d-none d-xl-table-cell text-muted"></td>
                                            <td class="d-none d-xl-table-cell text-muted">
                                                <em>1 hour ago</em>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="inbox-msg10"
                                                        name="inbox-msg10">
                                                    <label class="custom-control-label font-w400"
                                                        for="inbox-msg10"></label>
                                                </div>
                                            </td>
                                            <td class="d-none d-sm-table-cell font-w600">Adam McCoy</td>
                                            <td>
                                                <a class="font-w600" data-toggle="modal"
                                                    data-target="#one-inbox-message" href="#">New Photo Pack!</a>
                                                <div class="text-muted mt-1">Our new photo pack is available now! You..
                                                </div>
                                            </td>
                                            <td class="d-none d-xl-table-cell text-muted"></td>
                                            <td class="d-none d-xl-table-cell text-muted">
                                                <em>2 hrs ago</em>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="inbox-msg9"
                                                        name="inbox-msg9">
                                                    <label class="custom-control-label font-w400"
                                                        for="inbox-msg9"></label>
                                                </div>
                                            </td>
                                            <td class="d-none d-sm-table-cell font-w600">Jesse Fisher</td>
                                            <td>
                                                <a class="font-w600" data-toggle="modal"
                                                    data-target="#one-inbox-message" href="#">Product is released!</a>
                                                <div class="text-muted mt-1">This is a notification about our new
                                                    product..</div>
                                            </td>
                                            <td class="d-none d-xl-table-cell text-muted">
                                                <i class="fa fa-paperclip mr-1"></i> (1)
                                            </td>
                                            <td class="d-none d-xl-table-cell text-muted">
                                                <em>1 day ago</em>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="inbox-msg8"
                                                        name="inbox-msg8">
                                                    <label class="custom-control-label font-w400"
                                                        for="inbox-msg8"></label>
                                                </div>
                                            </td>
                                            <td class="d-none d-sm-table-cell font-w600">Sara Fields</td>
                                            <td>
                                                <a class="font-w600" data-toggle="modal"
                                                    data-target="#one-inbox-message" href="#">Now on Sale!</a>
                                                <div class="text-muted mt-1">Our Book is out! You can buy a copy and..
                                                </div>
                                            </td>
                                            <td class="d-none d-xl-table-cell text-muted">
                                                <i class="fa fa-paperclip mr-1"></i> (9)
                                            </td>
                                            <td class="d-none d-xl-table-cell text-muted">
                                                <em>1 day ago</em>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="inbox-msg7"
                                                        name="inbox-msg7">
                                                    <label class="custom-control-label font-w400"
                                                        for="inbox-msg7"></label>
                                                </div>
                                            </td>
                                            <td class="d-none d-sm-table-cell font-w600">Carol White</td>
                                            <td>
                                                <a class="font-w600" data-toggle="modal"
                                                    data-target="#one-inbox-message" href="#">Monthly Report</a>
                                                <div class="text-muted mt-1">The monthly report you requested for..
                                                </div>
                                            </td>
                                            <td class="d-none d-xl-table-cell text-muted">
                                                <i class="fa fa-paperclip mr-1"></i> (6)
                                            </td>
                                            <td class="d-none d-xl-table-cell text-muted">
                                                <em>3 days ago</em>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="inbox-msg6"
                                                        name="inbox-msg6">
                                                    <label class="custom-control-label font-w400"
                                                        for="inbox-msg6"></label>
                                                </div>
                                            </td>
                                            <td class="d-none d-sm-table-cell font-w600">David Fuller</td>
                                            <td>
                                                <a class="font-w600" data-toggle="modal"
                                                    data-target="#one-inbox-message" href="#">Trial Started!</a>
                                                <div class="text-muted mt-1">You 30-day trial has now started and..
                                                </div>
                                            </td>
                                            <td class="d-none d-xl-table-cell text-muted"></td>
                                            <td class="d-none d-xl-table-cell text-muted">
                                                <em>3 days ago</em>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="inbox-msg5"
                                                        name="inbox-msg5">
                                                    <label class="custom-control-label font-w400"
                                                        for="inbox-msg5"></label>
                                                </div>
                                            </td>
                                            <td class="d-none d-sm-table-cell font-w600">Megan Fuller</td>
                                            <td>
                                                <a class="font-w600" data-toggle="modal"
                                                    data-target="#one-inbox-message" href="#">Invoice #INV001645</a>
                                                <div class="text-muted mt-1">This is the invoice for the project we..
                                                </div>
                                            </td>
                                            <td class="d-none d-xl-table-cell text-muted"></td>
                                            <td class="d-none d-xl-table-cell text-muted">
                                                <em>5 days ago</em>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="inbox-msg4"
                                                        name="inbox-msg4">
                                                    <label class="custom-control-label font-w400"
                                                        for="inbox-msg4"></label>
                                                </div>
                                            </td>
                                            <td class="d-none d-sm-table-cell font-w600">Laura Carr</td>
                                            <td>
                                                <a class="font-w600" data-toggle="modal"
                                                    data-target="#one-inbox-message" href="#">Friend Request!</a>
                                                <div class="text-muted mt-1">You have a new friend request. Click the..
                                                </div>
                                            </td>
                                            <td class="d-none d-xl-table-cell text-muted">
                                                <i class="fa fa-paperclip mr-1"></i> (5)
                                            </td>
                                            <td class="d-none d-xl-table-cell text-muted">
                                                <em>1 week ago</em>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="inbox-msg3"
                                                        name="inbox-msg3">
                                                    <label class="custom-control-label font-w400"
                                                        for="inbox-msg3"></label>
                                                </div>
                                            </td>
                                            <td class="d-none d-sm-table-cell font-w600">Jack Estrada</td>
                                            <td>
                                                <a class="font-w600" data-toggle="modal"
                                                    data-target="#one-inbox-message" href="#">Enjoy life!</a>
                                                <div class="text-muted mt-1">Thank you for helping us with our cause...
                                                </div>
                                            </td>
                                            <td class="d-none d-xl-table-cell text-muted">
                                                <i class="fa fa-paperclip mr-1"></i> (3)
                                            </td>
                                            <td class="d-none d-xl-table-cell text-muted">
                                                <em>1 week ago</em>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="inbox-msg2"
                                                        name="inbox-msg2">
                                                    <label class="custom-control-label font-w400"
                                                        for="inbox-msg2"></label>
                                                </div>
                                            </td>
                                            <td class="d-none d-sm-table-cell font-w600">Brian Stevens</td>
                                            <td>
                                                <a class="font-w600" data-toggle="modal"
                                                    data-target="#one-inbox-message" href="#">New Twitter follower!</a>
                                                <div class="text-muted mt-1">You have a new follower, congratulations..
                                                </div>
                                            </td>
                                            <td class="d-none d-xl-table-cell text-muted">
                                                <i class="fa fa-paperclip mr-1"></i> (1)
                                            </td>
                                            <td class="d-none d-xl-table-cell text-muted">
                                                <em>2 weeks ago</em>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="inbox-msg1"
                                                        name="inbox-msg1">
                                                    <label class="custom-control-label font-w400"
                                                        for="inbox-msg1"></label>
                                                </div>
                                            </td>
                                            <td class="d-none d-sm-table-cell font-w600">Lori Moore</td>
                                            <td>
                                                <a class="font-w600" data-toggle="modal"
                                                    data-target="#one-inbox-message" href="#">Huge Discount
                                                    available!</a>
                                                <div class="text-muted mt-1">Due to the fact that you are a great..
                                                </div>
                                            </td>
                                            <td class="d-none d-xl-table-cell text-muted"></td>
                                            <td class="d-none d-xl-table-cell text-muted">
                                                <em>3 weeks ago</em>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- END Messages and Checkable Table -->
                        </div>
                    </div>
                    <!-- END Message List -->
                </div>
            </div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->


    <!-- Apps Modal -->
    <!-- Opens from the modal toggle button in the header -->
    <div class="modal fade" id="one-modal-apps" tabindex="-1" role="dialog" aria-labelledby="one-modal-apps"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-top modal-sm" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Apps</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="row gutters-tiny">
                            <div class="col-6">
                                <!-- CRM -->
                                <a class="block block-rounded block-themed bg-default" href="javascript:void(0)">
                                    <div class="block-content text-center">
                                        <i class="si si-speedometer fa-2x text-white-75"></i>
                                        <p class="font-w600 font-size-sm text-white mt-2 mb-3">
                                            CRM
                                        </p>
                                    </div>
                                </a>
                                <!-- END CRM -->
                            </div>
                            <div class="col-6">
                                <!-- Products -->
                                <a class="block block-rounded block-themed bg-danger" href="javascript:void(0)">
                                    <div class="block-content text-center">
                                        <i class="si si-rocket fa-2x text-white-75"></i>
                                        <p class="font-w600 font-size-sm text-white mt-2 mb-3">
                                            Products
                                        </p>
                                    </div>
                                </a>
                                <!-- END Products -->
                            </div>
                            <div class="col-6">
                                <!-- Sales -->
                                <a class="block block-rounded block-themed bg-success mb-0" href="javascript:void(0)">
                                    <div class="block-content text-center">
                                        <i class="si si-plane fa-2x text-white-75"></i>
                                        <p class="font-w600 font-size-sm text-white mt-2 mb-3">
                                            Sales
                                        </p>
                                    </div>
                                </a>
                                <!-- END Sales -->
                            </div>
                            <div class="col-6">
                                <!-- Payments -->
                                <a class="block block-rounded block-themed bg-warning mb-0" href="javascript:void(0)">
                                    <div class="block-content text-center">
                                        <i class="si si-wallet fa-2x text-white-75"></i>
                                        <p class="font-w600 font-size-sm text-white mt-2 mb-3">
                                            Payments
                                        </p>
                                    </div>
                                </a>
                                <!-- END Payments -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Apps Modal -->



<!-- Message Modal -->
<div class="modal fade" id="one-inbox-message" tabindex="-1" role="dialog" aria-labelledby="one-inbox-message"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-popout" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Welcome to our service</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="tooltip" data-placement="left"
                            title="Reply" aria-label="Reply">
                            <i class="fa fa-fw fa-reply"></i>
                        </button>
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content block-content-full text-center bg-image"
                    style="background-image: url('assets/media/photos/photo7.jpg');">
                    <img class="img-avatar img-avatar96 img-avatar-thumb" src="assets/media/avatars/avatar4.jpg" alt="">
                </div>
                <div class="block-content block-content-full font-size-sm d-flex justify-content-between bg-body-light">
                    <a href="javascript:void(0)">user@example.com</a>
                    <span class="text-muted"><em>2 min ago</em></span>
                </div>
                <div class="block-content">
                    <p>Dear John,</p>
                    <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing
                        luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor
                        tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum
                        quis in sit varius lorem sit metus mi.</p>
                    <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing
                        luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor
                        tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum
                        quis in sit varius lorem sit metus mi.</p>
                    <p>Best Regards,</p>
                    <p>Amanda Powell</p>
                </div>
                <div class="block-content bg-body-light">
                    <div class="row gutters-tiny items-push font-size-sm">
                        <div class="col-md-4">
                            <div class="options-container fx-item-zoom-in mb-2">
                                <img class="img-fluid options-item" src="assets/media/photos/photo1.jpg" alt="">
                                <div class="options-overlay bg-black-75">
                                    <div class="options-overlay-content">
                                        <a class="btn btn-sm btn-light" href="javascript:void(0)">
                                            <i class="fa fa-download mr-1"></i> Download
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="text-muted">01.jpg (350kb)</div>
                        </div>
                        <div class="col-md-4">
                            <div class="options-container fx-item-zoom-in mb-2">
                                <img class="img-fluid options-item" src="assets/media/photos/photo2.jpg" alt="">
                                <div class="options-overlay bg-black-75">
                                    <div class="options-overlay-content">
                                        <a class="btn btn-sm btn-light" href="javascript:void(0)">
                                            <i class="fa fa-download mr-1"></i> Download
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="text-muted">02.jpg (480kb)</div>
                        </div>
                        <div class="col-md-4">
                            <div class="options-container fx-item-zoom-in mb-2">
                                <img class="img-fluid options-item" src="assets/media/photos/photo3.jpg" alt="">
                                <div class="options-overlay bg-black-75">
                                    <div class="options-overlay-content">
                                        <a class="btn btn-sm btn-light" href="javascript:void(0)">
                                            <i class="fa fa-download mr-1"></i> Download
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="text-muted">03.jpg (652kb)</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Message Modal -->
@stop