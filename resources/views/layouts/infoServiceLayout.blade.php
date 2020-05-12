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
                <div class="row" style="padding: 0px 50px;">
                    {!! $serviceData->body !!}
                </div>
                <div class="workflow">
                    @if($serviceData->workplan)
                    @foreach(json_decode($serviceData->workplan) as $workItem)
                        <p>{{$workItem}}</p>
                    @endforeach
                    @endif
                </div>
            </div>
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
            <form class="col s12 m12 l12 xl6" method="POST" action="/contact">
                <div class="section">
                    <div class="row">
                        <div class="card grey lighten-3">
                            @csrf
                            <div class="card-content grey lighten-2 ">
                                @if (count($errors) > 0)
                                    <div class="card-content red darken-2">
                                        <strong>Whoops!</strong> There were some problems with your input.
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if ($succes)
                                    <div class="card-content green darken-2">
                                        <p>{{$succes}}</p>
                                    </div>
                                @endif
                                <input type="hidden" value="{{$serviceData->name}}" name="page">
                                <span class="card-title black-text">Neem contact op!</span>
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input id="first_name" type="text" name="firstName" class="validate" required>
                                        <label for="first_name">Voornaam</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input id="last_name" type="text" name="lastName" class="validate" required>
                                        <label for="last_name">Achternaam</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <input id="email" type="email" name="email" class="validate" required>
                                        <label for="email">Email</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <select name="contactService" required>
                                            <option value="" disabled selected>Kies dienst</option>
                                            <option value="trouwen">Trouwen</option>
                                            <option value="after-movie">AfterMovies</option>
                                            <option value="anders">Anders</option>
                                        </select>
                                        <label>Kies dienst</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <input placeholder="Onderwerp" name="subject" id="first_name" type="text" class="validate" required>
                                        <label for="first_name">Onderwerp</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <textarea id="textarea1" name="message" class="materialize-textarea" required></textarea>
                                        <label id="labelTextArea1" for="textarea1">Bericht</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <button class="btn waves-effect waves-light" type="submit" name="action">Verstuur
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
