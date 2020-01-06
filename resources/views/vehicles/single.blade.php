@extends('layouts.admin')

@section('css')
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
<a href="{{route('vehicles.edit',$vehicle->id)}}" class="btn btn-info btn-block  text-white" >
    <i class="fas fa-edit"></i>Edit Vehicle</a>

    <h2 class="mt-0 text-primary">

        {{$vehicle->name}}
    </h2>

    <h5 class="mt-0 "><span class="text-info">Number: </span>{{$vehicle->number}}</h5>
    <h5 class="mt-0 "><span class="text-info">Location: </span>{{$vehicle->location}}</h5>
      <h5 class="mt-0 "><span class="text-info">Next Service In: </span>{{$vehicle->next_service-$vehicle->cMilage}} Km</h5>

      <h5 class="mt-0 "><span class="text-info">Licen Exp: </span>{{$vehicle->license_exp->diffForHumans()}}</h5>

      <h5 class="mt-0 "><span class="text-info">Insurence Exp: </span>{{$vehicle->insurance_exp->diffForHumans()}}</h5>

@endsection


@section('content')
<div class="media">
    @if ($vehicle->image)
    <img class="mr-3 rounded" width="200" src="{{ asset('images/'.$vehicle->image->path) }}" alt="Generic placeholder image">
    @else
    {{'No Image'}}
    @endif


  <div class="media-body">


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
