@extends('layouts.admin')

@section('css')
    {{-- Calendar --}}
        <link href='{{asset('assets/fullcalendar/packages/core/main.css')}}' rel='stylesheet' />
        <link href='{{asset('assets/fullcalendar/packages/daygrid/main.css')}}' rel='stylesheet' />
        <link href='{{asset('assets/fullcalendar/packages/timegrid/main.css')}}' rel='stylesheet' />
        <link href='{{asset('assets/fullcalendar/packages/list/main.css')}}' rel='stylesheet' />
        <script src='{{asset('assets/fullcalendar/packages/core/main.js')}}'></script>
        <script src='{{asset('assets/fullcalendar/packages/interaction/main.js')}}'></script>
        <script src='{{asset('assets/fullcalendar/packages/daygrid/main.js')}}'></script>
        <script src='{{asset('assets/fullcalendar/packages/timegrid/main.js')}}'></script>
        <script src='{{asset('assets/fullcalendar/packages/list/main.js')}}'></script>
@endsection


@section('option')
    <a href="{{route('tours.index')}}" class="btn btn-success btn-block">
        <i class="far fa-map"></i> Tours</a>

    <a href="{{route('tours.edit',$tour->id)}}" class="btn btn-info btn-block  text-white" >
        <i class="fas fa-edit"></i>Edit Tour</a>

    <a style="color:{{$tour->color}};" href="{{route('agreement.show',$tour->id)}}" class="btn btn-primary  btn-block  text-white" >
        <i class="far fa-handshake"></i> </i>Agreement</a>
    <a style="color:{{$tour->color}};" href="{{route('agreement.edit',$tour->id)}}" class="btn btn-info  btn-block  text-white" ><i class="fas fa-edit"></i>Edit Agreement</a>

@endsection

@section('content')

    <div class="media">

        <div class="media-body">
            <div class="row mb-3">
                <div class="col-md-8 mb-2">
                    <h2 class="mt-0" style="color:{{$tour->color}};">{{$tour->title}}
                    </h2>
                </div>
                <div class="col-md-4 mb-2">
                    @if ($tour->status==1)
                        @if ($tour->start<=date('Y-m-d H:i:s') && $tour->end>=date('Y-m-d H:i:s'))
                            <h5 class="text-info">{{'On Going'}}</h5>

                        @else
                        <form class="form-inline" action="{{route('tours.makePending',$tour->id)}}" method="POST">
                            @csrf
                            <label class="text-success mr-2" >CONFIRM</label>
                            <button type="submit" class="btn btn-info text-white btn-sm">Make Pending</button>

                            </form>

                        @endif
                    @else

                    <form class="form-inline" action="{{route('tours.makeConfirm',$tour->id)}}" method="POST">
                        @csrf
                        <label class="text-info mr-2" >PENDING</label>
                        <button type="submit" class="btn btn-success text-white btn-sm">Make Confirm</button>

                        </form>
                    @endif
                </div>

            </div>




            <div class="row ">

                <div class="col-md-5 mb-2">
                    <div>
                        <h5 class="mt-0 ">
                            <a href="{{route('users.show',$driver->id)}}">
                                @if ($driver->image)
                                <img class="rounded-circle mr-2" height="50" src="{{ asset('images/'.$driver->image->path) }}" alt="No Image">
                                @else
                                {{'No Image'}}
                                @endif

                                {{$driver->name}}
                            </a></h5>
                    </div>

                        <div id='calendar-d' class="mb-5"></div>


                </div>

                <div class="col-md-1 mb-2">

                </div>

                <div class="col-md-5 mb-2">
                    <h5 class="mt-0 "><a href="{{route('vehicles.show',$vehicle->id)}}">
                        @if ($vehicle->image)
                        <img class="rounded-circle mr-2" height="50" src="{{ asset('images/'.$vehicle->image->path) }}" alt="No Image">
                        @else
                        {{'No Image'}}
                        @endif

                        {{$vehicle->number}}
                    </a> </h5>
                    <div id='calendar-v' class="mb-5"></div>
                </div>
            </div>







            </div>
        </div>


@endsection

@section('script')

    {{-- Calender-d Script --}}
    <script>

        document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar-d');

        var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
        header: {
            left: 'prev,next',

            right: 'dayGridMonth,listMonth'
        },
        defaultDate:new Date(),
        navLinks: true, // can click day/week names to navigate views
        businessHours: true, // display business hours
        editable: true,
        aspectRatio: 2,
        events:{!! $bookingsd !!},
        });

        calendar.render();
    });



    </script>

    {{-- Calender-v Script --}}
    <script>

        document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar-v');

        var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
        header: {
            left: 'prev,next',
            right: 'dayGridMonth,listMonth'
        },
        defaultDate:new Date(),
        navLinks: true, // can click day/week names to navigate views
        businessHours: true, // display business hours
        editable: true,
        aspectRatio: 2,
        events:{!! $bookingsv !!},
        });

        calendar.render();
    });



    </script>
        {{-- View Option --}}
        <script>
            function show(param_div_id) {
            document.getElementById('main_place').innerHTML = document.getElementById(param_div_id).innerHTML;
            }
        </script>
@endsection
