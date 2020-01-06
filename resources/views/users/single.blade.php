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
<a href="{{route('users.edit',$user->id)}}" class="btn btn-info btn-block  text-white" >
    <i class="fas fa-edit"></i>Edit User</a>

<a href="{{route('users.changePassword',$user->id)}}" class="btn btn-info btn-block  text-white" >
    <i class="fas fa-key"></i></i>Change Password</a>

    <h2 class="mt-0 text-primary">

        {{$user->name}}



    </h2>
      <h5 class="mt-0 "><span class="text-info">Email: </span>{{$user->email}}</h5>
      <h5 class="mt-0 "><span class="text-info">ID: </span>{{$user->nic}}</h5>
      <h5 class="mt-0 "><span class="text-info">Users Licence: </span>{{$user->dln}}</h5>

      <h5 class="mt-0 "><span class="text-info">Contact Details: </span></h5><h5>{!!$user->tel!!}</h5>

      <h5 class="mt-0 "><span class="text-info">Bank Details: </span></h5><h5 class="mt-0 ">{!!$user->bank!!}</h5>

      <h5 class="mt-0 "><span class="text-info">Complain: </span></h5><h5 class="mt-0 ">{!!$user->complain!!}</h5>

      <h5 class="mt-0 "><span class="text-info">Note: </span></h5><h5 class="mt-0 ">{!!$user->note!!}</h5>

      <h5 class="mt-0 "><span class="text-info">Emergency: </span></h5><h5 class="mt-0 ">{!!$user->emergency!!}</h5>
      <h5 class="mt-0 "><span class="text-info">Address: </span></h5><h5 class="mt-0 ">{!!$user->address!!}</h5>



@endsection

@section('content')

<div class="media">
    @if ($user->image)
    <img class="mr-3 rounded" width="200" src="{{ asset('images/'.$user->image->path) }}" alt="Generic placeholder image">
    @else
    {{'No Image'}}
    @endif


  <div class="media-body">

    <div id='calendar' class="mb-5"></div>



  </div>
</div>


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
