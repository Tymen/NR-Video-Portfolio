<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<style>
    * {
        padding: 0;
        margin: 0;
    }
    .center{
        display: flex;
        height: 200px;
        margin: auto;
        border-radius: 10px;
        min-height: 100vh;
        background-color: rgba(0, 0, 0, 0.67);
    }
    .center div {
        margin: auto; /* Important */
        text-align: center;
    }
    .fa {
        padding: 20px;
        font-size: 30px;
        width: 30px;
        text-align: center;
        text-decoration: none;
        margin: 5px 2px;
        border-radius: 50%;
    }

    .fa:hover {
        opacity: 0.7;
    }
    .fa-envelope, .fa-instagram {
        background: #00b2ff;
        color: white;
    }
    .link, .link:visited{
        color:white;
    }
</style>
<body>
    <div style="font-family: Arial; text-align: center; color: white; min-height: 100vh; background-image: url('{{asset('../images/WJNW5235No.jpg')}}'); background-position: center; background-size: cover">
        <div class="center">
            <div>
                <img src="{{asset("../images/logo_outlines_wit-01.png")}}" width="20%">
            <h1>De website is momenteel in onderhoud</h1>
            <a href="mailto:info@nrvideo.nl" class="fa fa-envelope"></a>
            <a href="#" class="fa fa-instagram"></a>
            <p>Powered by <a href="https://tvis.nl" class="link">Tymen Vis - WebDeveloper</a></p>
            </div>
        </div>
    </div>
</body>
</html>
