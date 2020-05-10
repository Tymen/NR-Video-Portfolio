<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href={{asset('/css/style.css')}}>
    <link rel="stylesheet" type="text/css" href={{asset('/css/app.css')}}>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="57x57" href={{asset("../images/favicon/apple-icon-57x57.png")}}>
    <link rel="apple-touch-icon" sizes="60x60" href={{asset("../images/favicon/apple-icon-60x60.png")}}>
    <link rel="apple-touch-icon" sizes="72x72" href={{asset("../images/favicon/apple-icon-72x72.png")}}>
    <link rel="apple-touch-icon" sizes="76x76" href={{asset("../images/favicon/apple-icon-76x76.png")}}>
    <link rel="apple-touch-icon" sizes="114x114" href={{asset("../images/favicon/apple-icon-114x114.png")}}>
    <link rel="apple-touch-icon" sizes="120x120" href={{asset("../images/favicon/apple-icon-120x120.png")}}>
    <link rel="apple-touch-icon" sizes="144x144" href={{asset("../images/favicon/apple-icon-144x144.png")}}>
    <link rel="apple-touch-icon" sizes="152x152" href={{asset("../images/favicon/apple-icon-152x152.png")}}>
    <link rel="apple-touch-icon" sizes="180x180" href={{asset("../images/favicon/apple-icon-180x180.png")}}>
    <link rel="icon" type="image/png" sizes="192x192"  href={{asset("../images/favicon/android-icon-192x192.png")}}>
    <link rel="icon" type="image/png" sizes="32x32" href={{asset("../images/favicon/favicon-32x32.png")}}>
    <link rel="icon" type="image/png" sizes="96x96" href={{asset("../images/favicon/favicon-96x96.png")}}>
    <link rel="icon" type="image/png" sizes="16x16" href={{asset("../images/favicon/favicon-16x16.png")}}>
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    @yield("head")
    <title>@yield("docTitle") | NR Video's</title>
</head>
<body>
<nav>
    <ul id="dropdown1" class="dropdown-content">
        <li><a href="/services/trouwen">Trouwen</a></li>
        <li><a href="/services/after-movie">After movie</a></li>
        <li><a href="/services/anders">Anders</a></li>
    </ul>
    <div class="nav-wrapper col s12 grey darken-4">
        <a href="/"> <img class="brand-logo MainLogo" src="../images/logo_lang_outlines_wit.png" width="140"/></a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li><a href="/">Home</a></li>
            <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Diensten<i class="material-icons right">arrow_drop_down</i></a></li>
            <li><a href="/contact">Contact</a></li>
            @if(\Illuminate\Support\Facades\Auth::check())
                @if (\Illuminate\Support\Facades\Auth::user()->hasrole('admin'))
                    <li><a href="/admin">Admin panel</a></li>
                @endif
            @endif
        </ul>
    </div>
</nav>
<ul id="dropdown2" class="dropdown-content">
    <li><a href="/services/trouwen">Trouwen</a></li>
    <li><a href="/services/after-movie">After movie</a></li>
    <li><a href="/services/anders">Anders</a></li>
</ul>
<ul class="sidenav" id="mobile-demo">
    <li><a href="/">Home</a></li>
    <li><a class="dropdown-trigger" href="#!" data-target="dropdown2">Diensten<i class="material-icons right">arrow_drop_down</i></a></li>
    <li><a href="/contact">Contact</a></li>
    @if(\Illuminate\Support\Facades\Auth::check())
        @if (\Illuminate\Support\Facades\Auth::user()->hasrole('admin'))
            <li><a href="/admin">Admin panel</a></li>
        @endif
    @endif
</ul>
    @yield("content")
<footer class="page-footer grey darken-2">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <img class="brand-logo MainLogo" src="../images/logo_lang_outlines_wit.png" width="170"/>
                <p class="grey-text text-lighten-4">Ik ben een AV-Specialist</p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Sitemap</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="/">Home</a></li>
                    <li><a class="grey-text text-lighten-3" href="/services/trouwen">Trouwen</a></li>
                    <li><a class="grey-text text-lighten-3" href="/services/after-movie">After movies</a></li>
                    <li><a class="grey-text text-lighten-3" href="/services/anders">Anders</a></li>
                    <li><a class="grey-text text-lighten-3" href="/contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright grey darken-3">
        <div class="container centerText">
            &copy; 2020 Copyright NR Video - Developed by <a href="https://tvis.nl">Tymen Vis | WebDeveloper</a>
        </div>
    </div>
</footer>
<script>
    $(document).ready(function(){
        $('.sidenav').sidenav();
    });
    $(document).ready(function(){
        $('.parallax').parallax();
    });
    $(".dropdown-trigger").dropdown();
</script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-166030771-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-166030771-1');
</script>
</body>
</html>
