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


<div class="container my-5">


    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <img class="center" width="250" src="{{ asset('images/elephant-orp.gif') }}" />
                </div>
                <div class="col-md-6">
                    <h3 class="mt-2"><a href="http://www.srilankanpersonaldrivers.com/elephant.html"> Elephant Orphanage</a></h3>
                    <p>Pinnawala Elephant Orphanage is an orphanage, nursery and captive breeding ground for wild Asian elephants located at Pinnawala village</p>
                    <a href="http://www.srilankanpersonaldrivers.com/elephant.html" class="btn btn-primary float-right">more</a>
                </div>
            </div>

        </div>
        <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <img class="center" width="250" src="{{ asset('images/dambulla.gif') }}" />
                    </div>
                    <div class="col-md-6">
                        <h3><a href="http://www.srilankanpersonaldrivers.com/dambulla.html">Dambulla</a></h3>
                        <p>Dambulla is a town, situated in the Matale District, Central Province of Sri Lanka, situated 148 km north-east of Colombo</p>
                        <a href="http://www.srilankanpersonaldrivers.com/dambulla.html" class="btn btn-primary float-right">more</a>

                    </div>

                </div>
        </div>
    </div>

    <div class="row my-4">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <img class="center" width="250" src="{{ asset('images/galle(1).gif') }}" />
                </div>
                <div class="col-md-6">
                    <h3><a href="http://www.srilankanpersonaldrivers.com/galled.html">Galle</a></h3>
                    <p>Galle is a city on the southwest coast of Sri Lanka. It’s known for Galle Fort, the fortified old city founded by Portuguese colonists in the 16th century. </p>
                    <a href="http://www.srilankanpersonaldrivers.com/galled.html" class="btn btn-primary float-right">more</a>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <img class="center" width="250" src="{{ asset('images/kithul.gif') }}" />
                </div>
                <div class="col-md-6">
                    <h3><a href="http://www.srilankanpersonaldrivers.com/kithulgala.html">Kithulgala</a></h3>
                    <p>Kitulgala is a small town in the west of Sri Lanka. It is in the wet zone rain forest, which gets two monsoons each year,</p>
                    <a href="http://www.srilankanpersonaldrivers.com/kithulgala.html" class="btn btn-primary float-right">more</a>

                </div>

            </div>
        </div>

    </div>

    <div class="row my-4">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <img class="center" width="250" src="{{ asset('images/benthota.gif') }}" />
                </div>
                <div class="col-md-6">
                    <h3><a href="http://www.srilankanpersonaldrivers.com/bentota.html">Bentota</a></h3>
                    <p>Bentota is a resort town on Sri Lanka’s southwest coast. Its long Bentota Beach stretches north,  </p>
                    <a href="http://www.srilankanpersonaldrivers.com/bentota.html" class="btn btn-primary float-right">more</a>


                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <img class="center" width="250" src="{{ asset('images/nuwara-eliya.gif') }}" />
                </div>
                <div class="col-md-6">
                    <h3><a href="http://www.srilankanpersonaldrivers.com/nuwara.html">Nuwara Eliya</a></h3>
                    <p>Nuwara Eliya is a city in the tea country hills of central Sri Lanka. The naturally landscaped Hakgala Botanical Gardens displays roses and tree ferns</p>
                    <a href="http://www.srilankanpersonaldrivers.com/nuwara.html" class="btn btn-primary float-right">more</a>

                </div>

            </div>
        </div>
    </div>

</div>


<footer id="sticky-footer" class="fixed-bottom py-2 bg-dark text-white-50">
    <div class="text-right">
        <p class="mb-0 mr-3">Copyright
            <script>
                var CurrentYear = new Date().getFullYear()
                document.write(CurrentYear)
            </script>
        © <a href="">Harsha De Pinto</a></p>
    </div>
</footer>



</body>
</html>
