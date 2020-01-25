
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"

      crossorigin="anonymous"
    />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>
  <body>

        <img height="50" class="" src="{{asset('images/logo.png')}}" alt="">
        <h4 class="text-primary d-inline text-center">Sri Lanka Personal Drivers</h4>
        <div class="card mb-5">

            <div class="card-body">
            <h4 class="text-primary mb-4">Agreement Number: {{$agreement->number}} </h4>

        {{-- 01.Passenger's Details --}}
            <h5 class="text-primary mb-2">01.Passenger's Details </h5>
            <div style="font-size: 16px;">
                {!!$agreement->passenger_details!!}
                </div>

        {{-- 02.First Pick-up & Last Drop off Place --}}
            <h5 class="text-primary my-4">02.First Pick-up & Last Drop off Place</h5>
            <h5 class="text-primary mb-4">Pick-up Details</h5>
            <div style="font-size: 16px;">
                {!!$agreement->start_details!!}
            </div>
            <h5 class="text-primary my-4">Drop-off Details</h5>
            <div style="font-size: 16px;">
                {!!$agreement->end_details!!}
            </div>
        {{-- 03.Hotel you stay in Sri Lanka --}}
            <h5 class="text-primary my-4">03.Hotels you stay in Sri Lanka</h5>
            <div style="font-size: 16px;">
                {!!$agreement->hotel_details!!}
            </div>

        {{-- 04.Things You Planning To Do In Your Tour --}}
            <h5 class="text-primary my-4">04.Things You Planning To Do In Your Tour</h5>
            <div style="font-size: 16px;">
                {!!$agreement->plan_details!!}
            </div>

        {{-- 05.Activities You Planning To Do In Your Tour --}}
            <h5 class="text-primary my-4">05.Activities You Planning To Do In Your Tour</h5>
            <div style="font-size: 16px;">
                {!!$agreement->activity_details!!}
            </div>





        {{-- 06.About the Total cost --}}
            <h5 class="text-primary my-4">06.About the Total cost</h5>
            <div style="font-size: 16px;">
                {!!$agreement->cost_details!!}
            </div>
            <h6><u>CARD PAYMENT:</u></h6>
                            <p class="text-danger">On arrival you have to pay Total cost + Government tax 03%If your Card fails, You should pay the total cost by cash.
                            </p>
        {{-- 07.Payment method: --}}
            <h5 class="text-primary my-4" >07.Payment method:</h5>
            <div style="font-size: 16px;">
                {!!$agreement->payment_method!!}
            </div>
            <h6><u>ABOUT PAYMENT: </u></h6>
                            <ul>
                                <li class="text-primary">We accept only cash </li>
                                <li class="text-danger">MULTI ALTERED OR DEFACED CURRENCY NOTES OR COINS ARE NOT ACCEPTED.(WRITE, DRAW, STAMP, CUT OR DAMAGE CURRENCY)
                            </li>
                            </ul>
        {{-- 08.Total cost include the following --}}
            <h5 class="text-primary my-4">08.Total cost include the following: </h5>
            <div style="font-size: 16px;" class="mb-4">
                {!!$agreement->includes_details!!}
            </div>

        {{-- 09.About driver accommodation and service:--}}
            <h5 class="text-primary my-4" >09.About driver accommodation and service:  </h5 ><br>
            <div style="font-size: 16px;" class="mb-4">
                {!!$agreement->accommodation_details!!}
            </div>

        {{-- CONDITIONS:--}}
            <h3 class="text-danger my-4">CONDITIONS:  </h3><br>
            <div style="font-size: 14px;" class="mb-4">
                {!!$agreement->condition!!}
            </div>


        </div>



        <footer id="sticky-footer" class="fixed-bottom py-2 text-50">
            <div class="text-right">
                <p class="mb-0 mr-3">Copyright
                    {{date('g:ia \o\n l jS F Y')}}
                © <a href="">Harsha De Pinto</a></p>
            </div>
        </footer>
  </body>
</html>
