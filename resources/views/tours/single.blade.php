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
        <i class="far fa-map"></i> Duties</a>

    <a href="{{route('tours.edit',$tour->id)}}" class="btn btn-info btn-block  text-white" >
        <i class="fas fa-edit"></i>Edit</a>

    <a href="{{route('agreement.show',$tour->id)}}" class="btn btn-primary  btn-block  text-white" >
        <i class="far fa-handshake"></i> </i>Agreement</a>
    <a href="{{route('agreement.edit',$tour->id)}}" class="btn btn-info  btn-block  text-white" ><i class="fas fa-edit"></i>Edit Agreement</a>

    <a href="{{route('tour.manage',$tour->id)}}" class="btn btn-primary  btn-block  text-white" ><i class="fas fa-gamepad"></i> Controller </a>


@endsection

@section('content')

    <div class="media">

        <div class="media-body">
            <div class="row mb-3">
                <div class="col-md-8 mb-2">
                    <div class="row">
                        <div class="col-md-6 ">
                            <h2 class="mt-0 " style="color:{{$tour->color}};">{{$tour->title}}
                            </h2>
                        </div>
                        <div class="col-md-2 ">
                            <form action="{{route('tours.destroy',$tour->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger "><i class="far fa-window-close"></i></button>
                            </form>
                        </div>
                    </div>



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
                            @if (isset($driver))
                                <a href="{{route('users.show',$driver->id)}}">
                                    @if ($driver->image)
                                    <img class="rounded mr-2" width="50" src="{{ asset('images/'.$driver->image->path) }}" alt="No Image">
                                    @else
                                    <img class="mr-2 rounded" width="50" src="{{ asset('images/no.png') }}" alt="Generic placeholder image">
                                    @endif

                                    {{$driver->name}}
                                </a></h5>
                            @else
                            NO DRIVER
                            @endif

                    </div>
                        @if (isset($driver))
                        <div id='calendar-d' class="mb-5"></div>
                        @endif
                </div>

                <div class="col-md-1 mb-2">

                </div>

                <div class="col-md-5 mb-2">
                    @if (isset($vehicle))
                    <h5 class="mt-0 "><a href="{{route('vehicles.show',$vehicle->id)}}">
                        @if ($vehicle->image)
                        <img class="rounded-circle mr-2" height="50" src="{{ asset('images/'.$vehicle->image->path) }}" alt="No Image">
                        @else
                        <img class="mr-3 rounded" width="50" src="{{ asset('images/vehicle.jpg') }}" alt="Generic placeholder image">
                        @endif

                        {{$vehicle->number}}


                    </a>

                </h5>

                <div id='calendar-v' class="mb-5"></div>
                    @endif


                </div>
            </div>







            </div>
        </div>


@endsection

@section('script')

        @if (isset($driver))
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
                aspectRatio: 1,
                events:{!! $bookingsd !!},
                });

                calendar.render();
            });
            </script>
        @endif


    @if (isset($vehicle))
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
            aspectRatio: 1,
            events:{!! $bookingsv !!},
            });

            calendar.render();
        });
        </script>
    @endif

        {{-- View Option --}}
        <script>
            function show(param_div_id) {
            document.getElementById('main_place').innerHTML = document.getElementById(param_div_id).innerHTML;
            }
        </script>
@endsection


