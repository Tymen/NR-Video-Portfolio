@extends("layouts.default")
@section("docTitle")
    Prijzen
@endsection
@section("content")
    <div class="row">
        <div class="defaultPage">
            <div class="parallax-container">
                <div class="row valign-wrapper defaultPageTitle">
                    <div class="col s12">
                        <h1 class="white-text center-block title-text">Prijzen</h1>
                    </div>
                </div>
                <div class="parallax">
                    <img src="./images/WJNW5235No.JPG">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="mainPage">
            <div class="container">
                <div class="section">
                    <table>
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Item Name</th>
                            <th>Item Price</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <td>Alvin</td>
                            <td>Eclair</td>
                            <td>$0.87</td>
                        </tr>
                        <tr>
                            <td>Alan</td>
                            <td>Jellybean</td>
                            <td>$3.76</td>
                        </tr>
                        <tr>
                            <td>Jonathan</td>
                            <td>Lollipop</td>
                            <td>$7.00</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="container">
                <div class="section">
                    <div class="row">
                        <div class="centerText">
                            <h4>Special</h4>
                            <hr>
                        </div>
                        <div class="col s4 m4">
                            <div class="card">
                                <div class="card-image">
                                    <img src="images/sample-1.jpg">
                                    <span class="card-title">Card Title</span>
                                </div>
                                <div class="card-content">
                                    <p>I am a very simple card. I am good at containing small bits of information.
                                        I am convenient because I require little markup to use effectively.</p>
                                </div>
                                <div class="card-action">
                                    <a href="#">This is a link</a>
                                </div>
                            </div>
                        </div>
                        <div class="col s4 m4">
                            <div class="card">
                                <div class="card-image">
                                    <img src="images/sample-1.jpg">
                                    <span class="card-title">Card Title</span>
                                </div>
                                <div class="card-content">
                                    <p>I am a very simple card. I am good at containing small bits of information.
                                        I am convenient because I require little markup to use effectively.</p>
                                </div>
                                <div class="card-action">
                                    <a href="#">This is a link</a>
                                </div>
                            </div>
                        </div>
                        <div class="col s4 m4">
                            <div class="card">
                                <div class="card-image">
                                    <img src="images/sample-1.jpg">
                                    <span class="card-title">Card Title</span>
                                </div>
                                <div class="card-content">
                                    <p>I am a very simple card. I am good at containing small bits of information.
                                        I am convenient because I require little markup to use effectively.</p>
                                </div>
                                <div class="card-action">
                                    <a href="#">This is a link</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection