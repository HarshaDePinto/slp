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

    {{--Driver--}}
        @else
            {{--GET TOUR OR DUTY--}}
                @if ($tours)
                    @foreach ($tours as $tour)
                        {{-- Selecting Tours On That Day --}}

                        @if ($tour->start<=date('Y-m-d H:i:s') && $tour->end>=date('Y-m-d H:i:s') && $tour->status==1 )
                           {{-- Selecting Tours OF THe Driver --}}
                            @if ($tour->user_id==$user->id)
                               <h5 class="text-primary">Your Duty Today:
                                <span class="text-danger">{{$tour->title}}</span></h5>
                                @foreach ($vehicles as $vehicle)
                                    @if ($tour->vehicle_id==$vehicle->id)
                                    <h5 class="text-primary">Today You Driving:
                                    @if ($vehicle->image)

                                    <img class="rounded-circle mr-2" height="20" src="{{ asset('images/'.$vehicle->image->path) }}" alt="No Image">
                                    @else
                                    {{'No Image'}}
                                    @endif
                                    <span class="text-danger">{{$vehicle->number}}</span></h5>
                                    @endif


                                @endforeach
                                <a href="{{route('locations.create')}}" style="background-color:#FF851B;" class="btn   btn-block  text-white" > Locations </a>

                                <a href="{{route('fuels.create')}}" style="background-color:#FF851B;" class="btn   btn-block  text-white" > Fuel </a>
                                <a href="{{route('maintenances.create')}}" style="background-color:#FF851B;" class="btn   btn-block  text-white" > Maintenances </a>
                                <a href="{{route('activities.create')}}" style="background-color:#FF851B;" class="btn   btn-block  text-white" > Activities </a>

                                <a href="{{route('shops.create')}}" style="background-color:#FF851B;" class="btn   btn-block  text-white" > Shops </a>
                            @else

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
                @if ($tours)
                    @foreach ($tours as $tour)
                        {{-- Selecting Tours On That Day --}}

                        @if ($tour->start<=date('Y-m-d H:i:s') && $tour->end>=date('Y-m-d H:i:s') && $tour->status==1 )
                           {{-- Selecting Tours OF THe Driver --}}
                            @if ($tour->user_id==$user->id)
                               <h4 class="text-primary">Instructions:</h4>
                               @if ($tour->instructions()->count()!=0)
                               <table class="table table-hover">
                                   <thead>
                                   <tr>
                                       <th scope="col">Instruction</th>
                                       <th scope="col">Status</th>
                                       <th scope="col"></th>

                                   </tr>
                                   </thead>
                                   <tbody>





                                           @foreach ($tour->instructions as $intruction)
                                           <tr>
                                               <td >{{$intruction->name}}</td>
                                               <td>
                                                   @if ($intruction->status==0)
                                                       <h5 class="text-primary">Pending</h5>
                                                   @else
                                                       <h4 class="text-success"><i class="fas fa-check-circle"></i></h4>
                                                   @endif
                                               </td>
                                               <td>
                                                   @if ($intruction->status==0)
                                                   <form class="form-inline" action="{{route('instructions.update',$intruction->id)}}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="text" class="form-control" name="author_u" value="{{ Auth::user()->name}}" hidden >

                                                    <input type="text" class="form-control" name="name" value="{{ $intruction->name}}" hidden >

                                                    <input type="text" class="form-control" name="status" value="1" hidden >
                                                    <input type="text" class="form-control" name="tour" value="{{$tour->id}}" hidden >
                                                    <button type="submit" class="btn btn-success text-white btn-sm"><i class="fas fa-check-circle"></i></button>

                                                    </form>

                                                   @else
                                                   <form class="form-inline" action="{{route('instructions.update',$intruction->id)}}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="text" class="form-control" name="author_u" value="{{ Auth::user()->name}}" hidden >

                                                    <input type="text" class="form-control" name="name" value="{{ $intruction->name}}" hidden >

                                                    <input type="text" class="form-control" name="status" value="0" hidden >
                                                    <input type="text" class="form-control" name="tour" value="{{$tour->id}}" hidden >
                                                    <button type="submit" class="btn btn-danger text-white btn-sm"><i class="fas fa-times-circle"></i></button>

                                                    </form>


                                                   @endif
                                               </td>
                                            </tr>

                                           @endforeach


                                   </tbody>
                               </table>
                               @else
                               No Ins
                               @endif



                            @else
                            @endif

                        @endif

                    @endforeach

                @endif

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
