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
                    @if($pageData->banner)
                        <img src="../images/{{$pageData->banner}}">
                    @else
                        <img src="./images/WJNW5235No.JPG">
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="pageColor">
        <div class="section myServices">
            <div class=" row container">
                <div class="col s12 m4 center-align" style="text-align: center">
                    @if (json_decode($pageData->body) && json_decode($pageData->body)->aboutMeImages[0])
                        <div style="
                        width: 200px; display: inline-block; height: 200px; border-radius: 50%; background-color: gray;
                        background-image: url('{{asset("../images" . json_decode($pageData->body)->aboutMeImages[0])}}'); background-position: center; background-size: cover"></div>
{{--                        <img src="{{asset("../images/" . json_decode($pageData->body)->images[0])}}" class="responsive-img" width="350px">--}}
                    @else
                        <img src="" class="responsive-img" width="350px">
                    @endif
                </div>
                <div class="col s12 m8 left-align">
                    @if (json_decode($pageData->body) && json_decode($pageData->body)->aboutMeBody[0])
                        {!! json_decode($pageData->body)->aboutMeBody[0] !!}
                    @else
                    @endif
                </div>
            </div>
        </div>
        <div class="section">
            <div class="row container">
                <div class="col s12 m2">
                </div>
                <div class="col s12 m8">
                    @if (json_decode($pageData->body) && json_decode($pageData->body)->aboutMeBodyExt[0])
                        {!! json_decode($pageData->body)->aboutMeBodyExt[0] !!}
                    @else
                    @endif
                </div>
                <div class="col s12 m2">
                </div>
            </div>
        </div>
        <div class="section">
            <div class="row container">
                <h3 class="center">Mijn diensten</h3>
                <div class="divider"></div>
                <div class="section">
                    @foreach($services as $service)
                        @if($service->name == "over" || $service->name == "after-movie")
                        @else
                            <div class="col s12 m6">
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
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="section myServices">
            <div class="row">
                <div class="container">
                    <div class="col s12 m6 left-align">
                        @if (json_decode($pageData->body) && json_decode($pageData->body)->body[0])
                            {!! json_decode($pageData->body)->body[0] !!}
                        @else
                        @endif
                    </div>
                    <div class="col s12 m6 center-align">
                        @if (json_decode($pageData->body) && json_decode($pageData->body)->images[0])
                            <img src="{{asset("../images/" . json_decode($pageData->body)->images[0])}}" class="responsive-img" width="350px">
                        @else
                            <img src="" class="responsive-img" width="350px">
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <div class="col s12 m6 center-align">
                        @if (json_decode($pageData->body) && json_decode($pageData->body)->images[1])
                            <img src="{{asset("../images/" . json_decode($pageData->body)->images[1])}}" class="responsive-img" width="350px">
                        @else
                            <img src="" class="responsive-img" width="350px">
                        @endif
                    </div>
                    <div class="col s12 m6 right-align">
                        @if (json_decode($pageData->body) && json_decode($pageData->body)->body[1])
                            {!! json_decode($pageData->body)->body[1] !!}
                        @else
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <div class="slider homeSlider">
                        <ul class="slides">
                            @foreach($pageData->PagesMedia->all() as $media)
                            <li>
                                <img src="{{asset("../images/" . $media->link)}}"> <!-- random image -->
                                <div class="caption left-align">
                                    <h3>{{$media->title}}</h3>
                                    <h5 class="light grey-text text-lighten-3">{{$media->subtitle}}.</h5>
                                </div>
                            </li>
                            @endforeach
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
