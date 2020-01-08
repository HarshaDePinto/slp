<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SLPD</title>
    <link rel="shortcut icon" type="image/png" href="http://www.srilankanpersonaldrivers.com/favican.png">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"

      crossorigin="anonymous"
    />


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mycss.css') }}" rel="stylesheet">
    @yield('css')

    <style>

        body {
          margin: 40px 10px;
          padding: 0;
          font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
          font-size: 14px;
        }

        #calendar {
          max-width: 900px;
          margin: 0 auto;
        }

      </style>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
                    <img height="50" class="" src="{{asset('images/logo.png')}}" alt="">
        </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link h4" style="color:#115278;" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link h4" style="color:#115278;" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link h4 dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item"  href="{{ route('users.show',Auth::user()->id) }}">
                                        {{ __('My Profile') }}
                                    </a>
                                    <a class="dropdown-item"  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
</nav>

{{-- Head Action Buttons --}}
<section class="py-2   bg-light">

    <div class="container">{{-- Action Buttons --}}
        {{-- Admin Action --}}
             @if (Auth::user()->role_id==1)
                <div class="row ">
                <div class="col-md-3 mb-2">
                    <a href="{{route('users.index')}}"  style="background-color:#39CCCC;" class="btn btn-block  text-white" >
                        <i class="fas fa-user"></i> USERS</a>
                </div>
                <div class="col-md-3 mb-2">
                    <a href="{{route('vehicles.index')}}" style="background-color:#FF851B;" class="btn text-white  btn-block">
                    <i class="fas fa-car"></i> Vehicles</a>
                </div>

                <div class="col-md-3 mb-2">
                        <a href="{{route('tours.index')}}" class="btn btn-success btn-block">
                            <i class="far fa-map"></i> Tours</a>
                </div>
                <div class="col-md-3 mb-2">
                    <a href="{{ url('/home') }}" class="btn btn-dark btn-block">
                    <i class="fas fa-tachometer-alt"></i> Dashboard</a>
                </div>
                </div>
            @endif


        {{-- Staff Action --}}

            @if (Auth::user()->role_id==2)
                <div class="row ">
                <div class="col-md-3 mb-2">
                <a href="" class="btn btn-primary btn-block dropdown">
                <i class="fas fa-plus"></i> Add Vehicale</a>
                </div>
                <div class="col-md-3 mb-2">
                <a href="" class="btn btn-success btn-block">
                <i class="fas fa-plus"></i> Add Drivers</a>
                </div>
                <div class="col-md-3 mb-2">
                <a href="tours.php?source=add_tour" class="btn btn-warning btn-block">
                <i class="fas fa-plus"></i> Add Tours</a>
                </div>
                <div class="col-md-3 mb-2">
                <a href="duty.php?source=add_duty" class="btn btn-dark btn-block">
                <i class="fas fa-plus"></i> Add Duty</a>
                </div>
                </div>
            @endif

    </div>

</section>

<section>
    <div class="container">
        <div class="row">
            {{--OPTIONS--}}
                <div class="col-md-3 mb-5">
                    @yield('option')
                </div>
            {{--Containt--}}
                <div class="col-md-9">
                     {{--Session Masseges--}}
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{session()->get('success')}}
                            </div>
                        @endif
                    @yield('content')

                </div>

                </div>
                </div>
</section>


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

@yield('script')


</body>
</html>
