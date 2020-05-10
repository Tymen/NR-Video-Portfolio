@extends("layouts.default")
@section("head")
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section("docTitle")
    Contact
@endsection
@section("content")
    <div class="row" style="margin-bottom: 0;">
        <div class="col s12 m12 l5 contact-info" style="background-image: url('{{asset("../images/WJNW5235No.jpg")}}');">
            <div class="container">

            </div>
        </div>
        <div class="col s12 m12 l7 contact-form">
            <div class="container">
                <form class="" method="POST" action="/contact">
                    <a href="mailto:info@nrvideo.nl" class="fa fa-envelope"></a>
                    <a href="#" class="fa fa-facebook-square"></a>
                    <a href="#" class="fa fa-instagram"></a>
                    <div class="section">
                        <div class="row">
                            <h5>Neem contact op!</h5>
                            <div class="">
                                @csrf
                                <div class="white">
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
                                    <input type="hidden" value="contact" name="page">
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
    </div>
    <script>
        $(document).ready(function(){
            $('select').formSelect();
        });
    </script>
@endsection
