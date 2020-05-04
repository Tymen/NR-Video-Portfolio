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
            background-image: url("../images/banter-snaps-y4bE8ST_CTg-unsplash.jpg");
        }
    </style>
    <div class="servicepage-img">
        <h3 class="center">Trouwen</h3>
    </div>
    <div class="servicePage_section section">
        <div class="row container">
            <div class="col s6">
                <h5 class="center">Mijn werk proces</h5>
                <main>
                    <p>Doggo ipsum long bois lotsa pats blep. What a nice floof ruff super chub very good spot, the neighborhood pupper lotsa pats. Borkdrive shibe shoober what a nice floof, borking doggo.</p>
                    <p>Shoober shooberino adorable doggo many pats, heckin good boys many pats pupper wrinkler, corgo maximum borkdrive. A frighten puggo wow very biscit.</p>
                    <p>Big ol h*ck adorable doggo vvv smol borking doggo with a long snoot for pats big ol, he made many woofs doing me a frighten puggo wow very biscit, ruff fat boi ruff long doggo. </p>
                    <p>Long bois mlem I am bekom fat wrinkler puggo maximum borkdrive big ol pupper I am bekom fat, fluffer vvv adorable doggo lotsa pats snoot. I am bekom fat ur givin me a spook length boy wow very biscit very good spot.</p>
                    <p>Doggo ipsum long bois lotsa pats blep. What a nice floof ruff super chub very good spot, the neighborhood pupper lotsa pats. Borkdrive shibe shoober what a nice floof, borking doggo.</p>
                </main>
            </div>
            <form class="col s6">
                <h5 class="center">Neem contact op!</h5>
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
                        <textarea id="textarea1" class="materialize-textarea"></textarea>
                        <label id="labelTextArea1" for="textarea1">Textarea</label>
                    </div>
                </div>
            </form>
            <div class="col s6">
                <h5 class="center">My work</h5>
                <div class="slider">
                    <ul class="slides">
                        <li>
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/-4Px4eInw2Y" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </li>
                        <li>
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/8gqAC913_4o" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </li>
                        <li>
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/DpLaUSzxL9A" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </li>
                        <li>
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/ngcAJINHgUY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('.slider').slider({
                interval: 7000,
            });
        });

    </script>
@endsection
