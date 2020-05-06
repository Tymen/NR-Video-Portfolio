@extends('layouts.default')
@section('docTitle')
    @if($serviceData)
    {{$serviceData->name}}
        @else
        Example
    @endif
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
            <div class="col s12 m12 l12 xl6">
                <h5 class="center">Mijn werk proces</h5>
                <div class="row">
                    {!! $serviceData->body !!}
                </div>
                <div class="row">
                    <main>
                        @foreach(json_decode($serviceData->workplan) as $workItem)
                            <p>{{$workItem}}</p>
                        @endforeach
                    </main>
                </div>
            </div>
            <form class="col s12 m12 l12 xl6">
                <div class="row">
                    <div class="card grey lighten-3">
                        <div class="card-content grey lighten-2 ">
                            <span class="card-title black-text">Neem contact op!</span>
                            <div class="row">
                                <div class="input-field col s6">
                                    <input id="first_name" type="text" class="validate">
                                    <label for="first_name">First Name</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="last_name" type="text" class="validate">
                                    <label for="last_name">Last Name</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="email" type="email" class="validate">
                                    <label for="email">Email</label>
                                </div>
                                <div class="input-field col s12">
                                    <textarea id="textarea1" class="materialize-textarea"></textarea>
                                    <label id="labelTextArea1" for="textarea1">Textarea</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="col s12 m12 l12 xl6">
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

    </script>
@endsection
