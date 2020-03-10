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
            <h1 class="white-text center-block title-text">NR VIDEO</h1>
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
          <div class="col s12 m4">
            <div class="card waves-effect waves-light">
              <div class="card-image">
                <img class="servicesCardImg" src="./images/banter-snaps-y4bE8ST_CTg-unsplash.jpg">
                <span class="card-title">Trouw films</span>
              </div>
              <div class="card-content">
                <p>Leg u speciale dag vast op film zodat je later terug kan kijken of jouwn perfecte dag! Lees hier hoe dit proces verloopt!</p>
              </div>
            </div>
          </div>
          <div class="col s12 m4">
            <div class="card waves-effect waves-light">
              <div class="card-image">
                <img class="servicesCardImg" src="./images/concept3.jpg">
                <span class="card-title">After movies</span>
              </div>
              <div class="card-content">
                <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
              </div>
            </div>
          </div>
          <div class="col s12 m4">
            <div class="card waves-effect waves-light">
              <div class="card-image">
                <img class="servicesCardImg" src="./images/sharegrid-Y7BSXW12rw0-unsplash.jpg">
                <span class="card-title">Anders</span>
              </div>
              <div class="card-content">
                <p>Heeft u iets anders in gedachte? wilt u iets anders op film hebben? Of wilt u een fotoshoot? lees hier hoe dit proces verloopt! </p>
              </div>
            </div>
          </div>
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
    $(document).ready(function(){
      $('.slider').slider();
    });
  </script>
@endsection