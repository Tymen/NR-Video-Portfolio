<!doctype html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>NR Video Panel - @yield("docTitle")</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href={{asset("../assets/vendor/bootstrap/css/bootstrap.min.css")}}>
    <link href={{asset("../assets/vendor/fonts/circular-std/style.css")}} rel="stylesheet">
    <link rel="stylesheet" href={{asset("../assets/libs/css/style.css")}}>
    <link rel="stylesheet" href={{asset("../assets/vendor/fonts/fontawesome/css/fontawesome-all.css")}}>
    <link rel="shortcut icon" href={{asset("../images/favicon.ico")}} type="image/x-icon">
    <link rel="icon" href={{asset("../images/favicon.ico")}} type="image/x-icon">
</head>

<body>
<!-- ============================================================== -->
<!-- main wrapper -->
<!-- ============================================================== -->
<div class="dashboard-main-wrapper">
    <!-- ============================================================== -->
    <!-- navbar -->
    <!-- ============================================================== -->
    <div class="dashboard-header">
        <nav class="navbar navbar-expand-lg bg-white fixed-top">
            <img class="brand-logo MainLogo" width="140" src="/images/logo_lang.png"/>
            <p class="logoTekst">PANEL</p>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto navbar-right-top">
{{--                    <li class="nav-item">--}}
{{--                        <div id="custom-search" class="top-search-bar">--}}
{{--                            <input class="form-control" type="text" placeholder="Search..">--}}
{{--                        </div>--}}
{{--                    </li>--}}
                    <li class="nav-item dropdown notification">
                        <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span class="indicator"></span></a>
                        <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                            <li>
                                <div class="notification-title"> Notification</div>
                                <div class="notification-list">
                                    <div class="list-group">
                                        @if (count(\App\Contact::where("opened", 0)->get()) > 0)
                                        @foreach(\App\Contact::where("opened", 0)->get() as $noti)
                                            <a href="/admin/contact/{{$noti->id}}" class="list-group-item list-group-item-action active">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img" style="padding: 10px"><i class="fas fa-envelope"></i></div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">{{$noti->firstName}} {{$noti->lastName}}</span>{{$noti->subject}}
                                                        <div class="notification-date">2 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach
                                            @else
                                            <div class="notification-info">
                                                <div class="notification-list-user-block">
                                                    No notifications
                                                </div>
                                            </div>
                                            @endif
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="list-footer"> <a href="#">View all notifications</a></div>
                            </li>
                        </ul>
                    </li>
{{--                    <li class="nav-item dropdown connection">--}}
{{--                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-fw fa-th"></i> </a>--}}
{{--                        <ul class="dropdown-menu dropdown-menu-right connection-dropdown">--}}
{{--                            <li class="connection-list">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">--}}
{{--                                        <a href="#" class="connection-item"><img src="/assets/images/github.png" alt="" > <span>Github</span></a>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">--}}
{{--                                        <a href="#" class="connection-item"><img src="/assets/images/dribbble.png" alt="" > <span>Dribbble</span></a>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">--}}
{{--                                        <a href="#" class="connection-item"><img src="/assets/images/dropbox.png" alt="" > <span>Dropbox</span></a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">--}}
{{--                                        <a href="#" class="connection-item"><img src="/assets/images/bitbucket.png" alt=""> <span>Bitbucket</span></a>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">--}}
{{--                                        <a href="#" class="connection-item"><img src="/assets/images/mail_chimp.png" alt="" ><span>Mail chimp</span></a>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">--}}
{{--                                        <a href="#" class="connection-item"><img src="/assets/images/slack.png" alt="" > <span>Slack</span></a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="conntection-footer"><a href="#">More</a></div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
                    <li class="nav-item dropdown nav-user">
                        <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="/assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                        <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                            <div class="nav-user-info">
                                <h5 class="mb-0 text-white nav-user-name">
                                    {{\Illuminate\Support\Facades\Auth::user()->name}}</h5>
                                <span class="status"></span><span class="ml-2">Available</span>
                            </div>
                            <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a>
                            <a class="dropdown-item" href="/logout"><i class="fas fa-power-off mr-2"></i>Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- ============================================================== -->
    <!-- end navbar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- left sidebar -->
    <!-- ============================================================== -->
    <div class="nav-left-sidebar sidebar-dark">
        <div class="menu-list">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-divider">
                            Menu
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link active" href="/admin"><i class="fas fa-fw fa-table"></i>Dashboard <span class="badge badge-success">6</span></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#editpagemenu" aria-controls="submenu-1"><i class="far fa-edit"></i>Edit content <span class="badge badge-success">6</span></a>
                            <div id="editpagemenu" class="collapse submenu" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="/admin/editpage/home/edit">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#editpageService" aria-controls="submenu-1-1">Services</a>
                                        <div id="editpageService" class="collapse submenu" style="">
                                            <ul class="nav flex-column">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="/admin/editservice/trouwen/edit">Trouwen</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="/admin/editservice/after-movie/edit">AfterMovie</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="/admin/editservice/anders/edit">Anders</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#contactmenu" aria-controls="submenu-2"><i class="fas fa-address-card"></i></i>Contact Messages <span class="badge badge-success">6</span></a>
                            <div id="contactmenu" class="collapse submenu" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="/admin/contact">inbox</a>
                                    </li>
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link" href="../dashboard-sales.html">Portfolio</a>--}}
{{--                                    </li>--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#editpageService" aria-controls="submenu-1-1">Services</a>--}}
{{--                                        <div id="editpageService" class="collapse submenu" style="">--}}
{{--                                            <ul class="nav flex-column">--}}
{{--                                                <li class="nav-item">--}}
{{--                                                    <a class="nav-link" href="/admin/editservice/trouwen/edit">Trouwen</a>--}}
{{--                                                </li>--}}
{{--                                                <li class="nav-item">--}}
{{--                                                    <a class="nav-link" href="/admin/editservice/after-movie/edit">AfterMovie</a>--}}
{{--                                                </li>--}}
{{--                                                <li class="nav-item">--}}
{{--                                                    <a class="nav-link" href="/admin/editservice/anders/edit">Anders</a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link active" href="/admin/users"><i class="fas fa-users"></i>User Accounts <span class="badge badge-success">6</span></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link active" href="/admin/settings"><i class="fas fa-sliders-h"></i>settings <span class="badge badge-success">6</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end left sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- wrapper  -->
    <!-- ============================================================== -->
    <div class="dashboard-wrapper">
        <div class="container-fluid dashboard-content">
            <!-- ============================================================== -->
            <!-- pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">@yield("title") </h2>
                        <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
{{--                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>--}}
{{--                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Pages</a></li>--}}
{{--                                    <li class="breadcrumb-item active" aria-current="page">Blank Pageheader</li>--}}
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    @yield("content")
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="text-md-right footer-links d-none d-sm-block">
                            <a href="javascript: void(0);">About</a>
                            <a href="javascript: void(0);">Support</a>
                            <a href="javascript: void(0);">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- end main wrapper -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->
<script src={{asset("../assets/vendor/jquery/jquery-3.3.1.min.js")}}></script>
<script src={{asset("../assets/vendor/bootstrap/js/bootstrap.bundle.js")}}></script>
<script src={{asset("../assets/vendor/slimscroll/jquery.slimscroll.js")}}></script>
<script src={{asset("../assets/libs/js/main-js.js")}}></script>
</body>

</html>
