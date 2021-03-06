@extends('layouts.admin')

@section('option')
    <a href="{{route('tours.index')}}" class="btn btn-success btn-block">
        <i class="far fa-map"></i> Tours</a>

    <a href="{{route('tours.show',$tour->id)}}" class="btn btn-primary btn-block  text-white" ><i class="fas fa-backward"></i> {{$tour->number}}</a>

    <a href="{{route('agreement.show',$tour->id)}}" style="background-color:#8E44AD;" class="btn   btn-block  text-white" ><i class="far fa-handshake"></i> </i>Agreement</a>

    <a  href="{{route('agreement.edit',$tour->id)}}" style="background-color:#2471A3;" class="btn   btn-block  text-white" ><i class="fas fa-edit"></i>Edit Agreement</a>

    <button style="background-color:#6A5ACD;" class="btn btn-block  text-white" onclick="show('operation1')"><i class="fas fa-users"></i> Passengers</button>

    <button style="background-color:#8B008B;" class="btn btn-block  text-white" onclick="show('operation2')"><i class="fas fa-plane"></i> Pick & Drop</button>

    <button style="background-color:#8A2BE2;" class="btn btn-block  text-white" onclick="show('operation3')"><i class="fas fa-utensils"></i> Hotels</button>

    <button style="background-color:#6B8E23;" class="btn btn-block  text-white" onclick="show('operation4')"><i class="fab fa-ravelry"></i> Itinerary</button>

    <button style="background-color:#FF8C00;" class="btn btn-block  text-white" onclick="show('operation5')"><i class="fas fa-republican"></i> <i class="fab fa-grunt"></i> Activities</button>

    <button style="background-color:#191970;" class="btn btn-block  text-white" onclick="show('operation6')"><i class="fas fa-money-bill-wave"></i> Payment</button>

    <button style="background-color:#8B0000;" class="btn btn-block  text-white" onclick="show('operation7')"><i class="fas fa-exclamation-triangle"></i> Condition</button>



        {{-- OPTIONS --}}
            {{-- 01.Passenger's Details --}}
            <div id="operation1" style="display:none">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="mb-3">
                            <h3>01.Passenger's Details


                            </h3>
                            <div style="font-size: 18px;">
                            {!!$agreement->passenger_details!!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    {{-- 02.First Pick-up & Last Drop off Place --}}
            <div id="operation2" style="display:none">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="mb-3">
                            <h3>02.First Pick-up & Last Drop off Place</h3><br>
                            <h4>Pick-up Details</h4>
                        <div style="font-size: 18px;">
                            {!!$agreement->start_details!!}
                        </div><br>
                        <h4>Drop-off Details</h4>
                        <div style="font-size: 18px;">
                            {!!$agreement->end_details!!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>

                    {{-- 03.Hotel you stay in Sri Lanka --}}
            <div id="operation3" style="display:none">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="mb-4">
                            <h3>03.Hotel you stay in Sri Lanka</h3>
                        <div style="font-size: 18px;">
                            {!!$agreement->hotel_details!!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>

                    {{-- 04.Things You Planning To Do In Your Tour --}}

            <div id="operation4" style="display:none">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4">
                        <h3>04.Things You Planning To Do In Your Tour</h3>
                        <div style="font-size: 18px;">
                            {!!$agreement->plan_details!!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
                    {{-- 05.Activities You Planning To Do In Your Tour --}}

            <div id="operation5" style="display:none">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4">
                            <h3>05.Activities You Planning To Do In Your Tour</h3>
                        <div style="font-size: 18px;">
                                {!!$agreement->activity_details!!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>

                    {{-- 06.About the Total cost --}}
            <div id="operation6" style="display:none">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="mb-4">
                            <h3>06.About the Total cost</h3>
                        <div style="font-size: 18px;">
                                {!!$agreement->cost_details!!}
                        </div>
                            <h6><u>CARD PAYMENT:</u></h6>
                            <p class="text-danger">On arrival you have to pay Total cost + Government tax 03%If your Card fails, You should pay the total cost by cash.
                            </p><br>
                            <h3>07.Payment method:</h3><br>
                        <div style="font-size: 18px;">
                                {!!$agreement->payment_method!!}
                        </div>
                        <br>
                            <h6><u>ABOUT PAYMENT: </u></h6>
                            <ul>
                                <li class="text-primary">We accept only cash </li>
                                <li class="text-danger">MULTI ALTERED OR DEFACED CURRENCY NOTES OR COINS ARE NOT ACCEPTED.(WRITE, DRAW, STAMP, CUT OR DAMAGE CURRENCY)
                            </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Condition --}}
            <div id="operation7" style="display:none">
                <div class="card mb-4">
                    <div class="card-body">
                        <h3>08.Total cost include the following: </h3>
                        <div style="font-size: 18px;" class="mb-4">
                            {!!$agreement->includes_details!!}
                        </div>
                        <h3>09.About driver accommodation and service:  </h3><br>
                        <div style="font-size: 18px;" class="mb-4">
                            {!!$agreement->accommodation_details!!}
                        </div>
                        <h3 class="text-danger">CONDITIONS:  </h3><br>
                        <div style="font-size: 18px;" class="mb-4">
                            {!!$agreement->condition!!}
                        </div>
                    </div>
                </div>
            </div>


@endsection

@section('content')

    <div id="main_place">
        {{-- Main Agreement --}}
        <div class="card mb-4">
            <div class="card-header">
                <a class="btn btn-sm btn-primary float-right" href="{{action('AgreementController@pdf',$agreement->id)}}">Download PDF</a>
            </div>
            <div class="card-body">
                {{-- 01.Passenger's Details --}}
                <div class="mb-3">
                    <h3>01.Passenger's Details

                    </h3>
                    <div style="font-size: 18px;">
                    {!!$agreement->passenger_details!!}
                    </div>
                </div>
                {{-- 02.First Pick-up & Last Drop off Place --}}
                <div class="mb-3">
                    <h3>02.First Pick-up & Last Drop off Place</h3><br>
                    <h4>Pick-up Details</h4>
                    <div style="font-size: 18px;">
                        {!!$agreement->start_details!!}
                    </div><br>
                    <h4>Drop-off Details</h4>
                    <div style="font-size: 18px;">
                        {!!$agreement->end_details!!}
                    </div>
                </div>
                {{-- 03.Hotel you stay in Sri Lanka --}}
                <div class="mb-4">
                    <h3>03.Hotel you stay in Sri Lanka</h3>
                    <div style="font-size: 18px;">
                        {!!$agreement->hotel_details!!}
                    </div>
                </div>

                {{-- 04.Things You Planning To Do In Your Tour --}}
                <div class="mb-4">
                    <h3>04.Things You Planning To Do In Your Tour</h3>
                    <div style="font-size: 18px;">
                        {!!$agreement->plan_details!!}
                    </div>
                </div>

                {{-- 05.Activities You Planning To Do In Your Tour --}}
                <div class="mb-4">
                    <h3>05.Activities You Planning To Do In Your Tour</h3>
                    <div style="font-size: 18px;">
                        {!!$agreement->activity_details!!}
                    </div>
                </div>

                {{-- 06.About the Total cost --}}
                <div class="mb-4">
                    <h3>06.About the Total cost</h3>
                    <div style="font-size: 18px;">
                        {!!$agreement->cost_details!!}
                    </div>
                    <h6><u>CARD PAYMENT:</u></h6>
                    <p class="text-danger">On arrival you have to pay Total cost + Government tax 03%If your Card fails, You should pay the total cost by cash.
                    </p><br>
                    <h3>07.Payment method:</h3><br>
                    <div style="font-size: 18px;">
                        {!!$agreement->payment_method!!}
                    </div>
                    <br>
                    <h6><u>ABOUT PAYMENT: </u></h6>
                    <ul>
                        <li class="text-primary">We accept only cash </li>
                        <li class="text-danger">MULTI ALTERED OR DEFACED CURRENCY NOTES OR COINS ARE NOT ACCEPTED.(WRITE, DRAW, STAMP, CUT OR DAMAGE CURRENCY)
                    </li>
                    </ul>
                </div>

                {{-- Condition --}}
                <div class="mb-4">
                    <h3>08.Total cost include the following: </h3>
                    <div style="font-size: 18px;" class="mb-4">
                        {!!$agreement->includes_details!!}
                    </div>
                    <h3>09.About driver accommodation and service:  </h3><br>
                    <div style="font-size: 18px;" class="mb-4">
                        {!!$agreement->accommodation_details!!}
                    </div>
                    <h3 class="text-danger">CONDITIONS:  </h3><br>
                    <div style="font-size: 18px;" class="mb-4">
                        {!!$agreement->condition!!}
                    </div>
                </div>

            </div>
        </div>

    </div>


@endsection

@section('script')
    {{-- OPTION VIEW SCRIPT --}}
    <script>
        function show(param_div_id) {
        document.getElementById('main_place').innerHTML = document.getElementById(param_div_id).innerHTML;
        }
    </script>
@endsection

