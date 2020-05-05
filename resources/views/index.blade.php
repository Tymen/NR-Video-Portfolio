@extends("layouts.default")
@section("docTitle")
    Home
@endsection
@section("content")
    <div class="row homeRow">
        <div class="HomePage">
            <div class="parallax-container">
                <div class="row valign-wrapper main-title">
                    <div class="col s12">
                        <img class="brand-logo MainLogo" src="./images/logo_outlines_wit-01.png" width="340"/>
                    </div>
                </div>
                <div class="parallax">
                    <img src="./images/WJNW5235No.JPG">
                </div>
            </div>
        </div>
    </div>
    <div class="pageColor">
        <div class="section">
            <div class="row container">
                <h3 class="center">Mijn diensten</h3>
                <div class="divider"></div>
                <div class="section">
                    @foreach($services as $service)
                        <div class="col s12 m4">
                            <div class="card waves-effect waves-light">
                                <a href="/services/{{$service->name}}">
                                    <div class="card-image">
                                        <img class="servicesCardImg" src="../images/{{$service->banner}}">
                                        <span class="card-title">{{$service->title}}</span>
                                    </div>
                                    <div class="card-content">
                                        <p>Leg u speciale dag vast op film zodat je later terug kan kijken of jouwn perfecte
                                            dag! Lees hier hoe dit proces verloopt!</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="section myServices">
            <div class="row">
                <div class="container">
                    <div class="col s6 left-align">
                        <h3>Titel</h3>
                        <p>faucibus sit amet. Duis vitae tellus nec dui accumsan pharetra quis sed sapien.
                            Integer sit amet ipsum nec urna imperdiet convallis. Suspendisse id consectetur
                            turpis. Nulla facilisi. Sed placerat laoreet dolor,
                            nec vestibulum nulla commodo vel. Donec lacinia purus ornare tellus imperdiet,
                            id condimentum quam varius. Proin ut leo nec est condimentum ultrices. Donec
                            suscipit lacinia sodales. </p>
                    </div>
                    <div class="col s6 center-align">
                        <img src="./images/concept2.jpg" class="responsive-img" width="350px">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <div class="col s6 center-align">
                        <img src="./images/concept1.jpg" class="responsive-img" width="350px">
                    </div>
                    <div class="col s6 right-align">
                        <h3>Titel</h3>
                        <p>faucibus sit amet. Duis vitae tellus nec dui accumsan pharetra quis sed sapien.
                            Integer sit amet ipsum nec urna imperdiet convallis. Suspendisse id consectetur
                            turpis. Nulla facilisi. Sed placerat laoreet dolor,
                            nec vestibulum nulla commodo vel. Donec lacinia purus ornare tellus imperdiet,
                            id condimentum quam varius. Proin ut leo nec est condimentum ultrices. Donec
                            suscipit lacinia sodales. </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <div class="slider homeSlider">
                        <ul class="slides">
                            <li>
                                <img src="./images/banter-snaps-y4bE8ST_CTg-unsplash.jpg"> <!-- random image -->
                                <div class="caption center-align">
                                    <h3>This is our big Tagline!</h3>
                                    <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                                </div>
                            </li>
                            <li>
                                <img src="./images/sharegrid-Y7BSXW12rw0-unsplash.jpg"> <!-- random image -->
                                <div class="caption left-align">
                                    <h3>Left Aligned Caption</h3>
                                    <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                                </div>
                            </li>
                            <li>
                                <img src="./images/camera.jpg"> <!-- random image -->
                                <div class="caption right-align">
                                    <h3>Right Aligned Caption</h3>
                                    <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                                </div>
                            </li>
                            <li>
                                <img src="./images/WJNW5235No.jpg"> <!-- random image -->
                                <div class="caption center-align">
                                    <h3>This is our big Tagline!</h3>
                                    <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('.slider').slider();
        });
    </script>
@endsection
