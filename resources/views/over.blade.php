@extends("layouts.default")
@section("docTitle")
    Over
@endsection
@section('content')
    <style>
        .servicepage-img {
            background-image: url("../images/{{$serviceData->banner}}");
        }
    </style>
    <div class="servicepage-img">
        <h3 class="center">{{$serviceData->title}}</h3>
    </div>
    <div class="servicePage_section section">
        <div class="row container">
            <div class="col s12 m12 l12 xl12">
                <div class="row" style="padding: 0px 50px;">
                    {!! $serviceData->body !!}
                </div>
            </div>
            <div class="col s12 m12 l12 xl12">
                <h5 class="center">My work</h5>
                <div class="slider">
                    <ul class="slides">
                        @foreach($serviceData->ServiceMedia->all() as $media)
                            @if($media->image)
                                <li>
                                    <img width="100%" height="100%" src="../images/{{$media->link}}">
                                </li>
                            @else
                                <li>
                                    <iframe width="100%" height="100%" src="{{$media->link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('.slider').slider({
                interval: 8000,
            });
        });
        $(document).ready(function(){
            $('select').formSelect();
        });
    </script>
@endsection
