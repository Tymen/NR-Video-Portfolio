<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @yield("head")
    <title>@yield("docTitle") | NR Video's</title>
</head>
<body>
<nav>
    <div class="nav-wrapper col s12 grey darken-4">
        <a href="#" class="brand-logo">NR VIDEO</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li><a href="/">Home</a></li>
            <li><a href="/portfolio">Portfolio</a></li>
            <li><a href="/prijzen">Prijzen</a></li>
            <li><a href="/contact">Contact</a></li>
        </ul>
    </div>
</nav>
<ul class="sidenav" id="mobile-demo">
    <li><a href="/">Home</a></li>
    <li><a href="/portfolio">Portfolio</a></li>
    <li><a href="/prijzen">Prijzen</a></li>
    <li><a href="/contact">Contact</a></li>
</ul>
    @yield("content")
<footer class="page-footer grey darken-2">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">NR VIDEO</h5>
                <p class="grey-text text-lighten-4">Ik ben een AV-Specialist</p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Sitemap</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="/">Home</a></li>
                    <li><a class="grey-text text-lighten-3" href="/portfolio">Portfolio</a></li>
                    <li><a class="grey-text text-lighten-3" href="/prijzen">Prijzen</a></li>
                    <li><a class="grey-text text-lighten-3" href="/contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright grey darken-3">
        <div class="container centerText">
            &copy; 2020 Copyright NR VIDEO
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
</script>
</body>
</html>