@extends('layouts.admin')
    {{--CSS--}}
        @section('css')
            <link href='{{'assets/fullcalendar/packages/core/main.css'}}' rel='stylesheet' />
            <link href='{{'assets/fullcalendar/packages/daygrid/main.css'}}' rel='stylesheet' />
            <link href='{{'assets/fullcalendar/packages/timegrid/main.css'}}' rel='stylesheet' />
            <link href='{{'assets/fullcalendar/packages/list/main.css'}}' rel='stylesheet' />
            <script src='{{'assets/fullcalendar/packages/core/main.js'}}'></script>
            <script src='{{'assets/fullcalendar/packages/interaction/main.js'}}'></script>
            <script src='{{'assets/fullcalendar/packages/daygrid/main.js'}}'></script>
            <script src='{{'assets/fullcalendar/packages/timegrid/main.js'}}'></script>
            <script src='{{'assets/fullcalendar/packages/list/main.js'}}'></script>
        @endsection
@section('option')
    {{--ADMIN AND STAFF--}}
        @if (Auth::user()->role_id==1 || Auth::user()->role_id==2 )
            hjkhkhkh
    {{--Driver--}}
        @else
            {{--GET TOUR OR DUTY--}}
                @if ($tours)
                    @foreach ($tours as $tour)
                        {{-- Selecting Tours On That Day --}}

                        @if ($tour->start<=date('Y-m-d H:i:s') && $tour->end>=date('Y-m-d H:i:s') && $tour->status==1 )
                           {{-- Selecting Tours OF THe Driver --}}
                            @if ($tour->user_id==$user->id)
                               <h2 class="text-primary">Your Duty Today:</h2>
                                <h3 class="text-danger">{{$tour->title}}</h3>
                                @foreach ($vehicles as $vehicle)
                                    @if ($tour->vehicle_id==$vehicle->id)
                                    <h2 class="text-primary">Today You Driving:</h2>
                                    @if ($vehicle->image)
                                    <img class="rounded-circle mr-2" height="50" src="{{ asset('images/'.$vehicle->image->path) }}" alt="No Image">
                                    @else
                                    {{'No Image'}}
                                    @endif
                                    <h3 class="text-danger">{{$vehicle->number}}</h3>

                                    @endif
                                @endforeach

                            @else
                            <h3 class="text-danger">YOU DO NOT HAVE ANY DUTY TODAY!!</h3>
                            @endif

                        @endif

                    @endforeach

                    @endif
                @endif
@endsection

@section('content')

    {{--ADMIN AND STAFF--}}
        @if (Auth::user()->role_id==1 || Auth::user()->role_id==2 )
            <div id='calendar' class="mb-5"></div>
    {{--Drivers--}}
        @else
            <div class="row">
                <div class="col-md-6">

                </div>
                <div class="col-md-6">
                    <div id='calendar-d' class="mb-5"></div>
                </div>
            </div>

        @endif


@endsection


@section('script')

    {{--ADMIN AND STAFF CALENDAR--}}
        <script>

            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');

                var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                },
                defaultDate:new Date(),
                navLinks: true, // can click day/week names to navigate views
                businessHours: true, // display business hours
                editable: true,
                events: {!! $bookings1 !!},


                });

                calendar.render();
            });



        </script>
    {{--DRIVER CALENDAR--}}
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
                events: {!! $bookings2 !!},


                });

                calendar.render();
            });



        </script>
@endsection
