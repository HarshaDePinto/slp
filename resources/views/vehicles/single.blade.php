@extends('layouts.admin')

@section('css')
    {{--Calendar--}}
        <link href='{{asset('assets/fullcalendar/packages/core/main.css')}}' rel='stylesheet' />
        <link href='{{asset('assets/fullcalendar/packages/daygrid/main.css')}}' rel='stylesheet' />
        <link href='{{asset('assets/fullcalendar/packages/timegrid/main.css')}}' rel='stylesheet' />
        <link href='{{asset('assets/fullcalendar/packages/list/main.css')}}' rel='stylesheet' />
        <script src='{{asset('assets/fullcalendar/packages/core/main.js')}}'></script>
        <script src='{{asset('assets/fullcalendar/packages/interaction/main.js')}}'></script>
        <script src='{{asset('assets/fullcalendar/packages/daygrid/main.js')}}'></script>
        <script src='{{asset('assets/fullcalendar/packages/timegrid/main.js')}}'></script>
        <script src='{{asset('assets/fullcalendar/packages/list/main.js')}}'></script>
    {{--Chart--}}
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
@endsection

@section('option')
        {{--Links--}}
            <a href="{{route('vehicles.index')}}" style="background-color:#FF851B;" class="btn text-white  btn-block"><i class="fas fa-car"></i> Vehicles</a>
            <a href="{{route('vehicles.edit',$vehicle->id)}}" class="btn btn-info btn-block  text-white" ><i class="fas fa-edit"></i>Edit Vehicle</a>

        {{--Details--}}
            <h2 class="mt-0 text-primary"> {{$vehicle->name}}</h2>
            @if ($vehicle->image)
            <img class="mr-3 rounded" width="200" src="{{ asset('images/'.$vehicle->image->path) }}" alt="Generic placeholder image">
            @else
            <img class="mr-3 rounded" width="200" src="{{ asset('images/vehicle.jpg') }}" alt="Generic placeholder image">
            @endif

    <h5 class="mt-0 "><span class="text-info">Number: </span>{{$vehicle->number}}</h5>
    <h5 class="mt-0 "><span class="text-info">Location: </span>{{$vehicle->location}}</h5>
      <h5 class="mt-0 "><span class="text-info">Next Service In: </span>{{$vehicle->next_service-$vehicle->cMilage}} Km</h5>

      <h5 class="mt-0 "><span class="text-info">Licen Exp: </span>{{$vehicle->license_exp->diffForHumans()}}</h5>

      <h5 class="mt-0 "><span class="text-info">Insurence Exp: </span>{{$vehicle->insurance_exp->diffForHumans()}}</h5>
      <h5 class="mt-0 "><span class="text-info">Seats: </span>{{$vehicle->seat}}</h5>
      <h5 class="mt-0 "><span class="text-info">Vehical Owner: </span>{{$vehicle->owner}}</h5>
      <h5 class="mt-0 "><span class="text-info">Meter: </span>{{$vehicle->cMilage}}</h5>
      <h5 class="mt-0 "><span class="text-info">Engine Oil Type: </span>{{$vehicle->engine_oil}}</h5>
      <h5 class="mt-0 "><span class="text-info">Gear Oil Type: </span>{{$vehicle->gear_oil}}</h5>
      <h5 class="mt-0 "><span class="text-info">AC Modal: </span>{{$vehicle->ac}}</h5>
      <h5 class="mt-0 "><span class="text-info">Tyre Size: </span>{{$vehicle->tyre_size}}</h5>
      <h5 class="mt-0 "><span class="text-info">Tyre Air Type: </span>{{$vehicle->tyre_air}}</h5>
      <h5 class="mt-0 "><span class="text-info">Brake Pad Modal: </span>{{$vehicle->break_pad}}</h5>
      <h5 class="mt-0 "><span class="text-info">Brake Oil Type: </span>{{$vehicle->brak_oil}}</h5>
      <h5 class="mt-0 "><span class="text-info">Fuel Type: </span>{{$vehicle->fuel_type}}</h5>
      <h5 class="mt-0 "><span class="text-info">Engine Number: </span>{{$vehicle->engine_number}}</h5>
      <h5 class="mt-0 "><span class="text-info">Chassis No: </span>{{$vehicle->chase_number}}</h5>

@endsection


@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-6">
            @if ($vehicle->fuels()->count()!=0)
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Amount</th>
                        <th scope="col">Meter</th>
                        <th scope="col">Liters</th>
                        <th scope="col">Time</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($vehicle->fuels as $fuel)
                            <tr>

                                <td>{{$fuel->amount}}</td>
                                <td>{{$fuel->meter}}</td>
                                <td>{{$fuel->liters}}</td>
                                <td>{{$fuel->author}} <br>
                                    {{$fuel->created_at->diffForHumans()}}</td>

                            </tr>
                         @endforeach

                        <tr>
                            <td colspan="3">Total</td>
                            <th>{{$fuel->sum('amount')}}</th>
                        </tr>

                    </tbody>
                </table>


            @else
               No Fuel Details Available
            @endif
      </div>
      <div class="col-md-6">
        <div id='calendar' class="mb-5"></div>
    </div>
  </div>




{{-- Calendar --}}


@endsection


@section('script')
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
          aspectRatio: 2.5,
          events:{!! $bookings1 !!},
        });

        calendar.render();
      });



    </script>

@endsection
