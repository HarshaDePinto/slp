<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SLPD</title>
    <link rel="shortcut icon" type="image/png" href="http://www.srilankanpersonaldrivers.com/favican.png">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"

      crossorigin="anonymous"
    />

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>

        <div class="container">
            <nav class="navbar navbar-expand-sm navbar-light bg-light">

            <a href="#" class="navbar-brand"><img height="50" class="" src="{{asset('images/logo.png')}}" alt=""></a>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                  <ul class="navbar-nav ml-auto ">
                    @if (Route::has('login'))
                    @auth
                       <li class="nav-item"><a  class="nav-link h4 " style="color:#115278;"  href="{{ url('/home') }}">Home</a></li>
                    @else

                    <li class="nav-item"><a class="nav-link h4 " style="color:#115278;" href="{{ route('login') }}">Login</a></li>

                    <li class="nav-item"><a target="_blank" class="nav-link h4 " style="color:#115278;" href="http://www.srilankanpersonaldrivers.com/contact.html">Contact Us</a></li>

                    <li class="nav-item"><a target="_blank" class="nav-link h4 " style="color:#115278;" href="http://www.srilankanpersonaldrivers.com/tailor.html">Tailor Made Tours</a></li>

                    @if (Route::has('register'))
                    <li class="nav-item"><a class="nav-link h4 " style="color:#115278;" href="{{ route('register') }}">Register</a></li>



                    @endif
                    @endauth

                    @endif



                  </ul>
                </div>

            </nav>
            </div>


{{-- Slider --}}
<div class="container">

    @if (session()->has('danger'))
    <div class="alert alert-danger">
       <h1>{{session()->get('danger')}}</h1>
    </div>
@endif


    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
        <div class="carousel-item active">
        <img class="d-block w-100" src="{{asset('images/image3.jpg')}}" alt="First slide">

        <div class="carousel-caption d-none d-md-block">
            <h1>SLPD</h1>
            <p>ADMIN PANEL</p>
          </div>
            </div>
        <div class="carousel-item">
        <img class="d-block w-100" src="{{asset('images/image4.jpg')}}" alt="Second slide">

        <div class="carousel-caption d-none d-md-block">
            <h1>SLPD</h1>
            <p>ADMIN PANEL</p>
          </div>
            </div>
        <div class="carousel-item">
        <img class="d-block w-100" src="{{asset('images/image7.jpg')}}" alt="Third slide">

        <div class="carousel-caption d-none d-md-block">
            <h1>SLPD</h1>
            <p>ADMIN PANEL</p>
          </div>
            </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
        </div>

        </div>

        </div>



</body>
</html>
