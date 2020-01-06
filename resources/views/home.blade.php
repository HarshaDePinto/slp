@extends('layouts.admin')
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
@section('content')

@if (Auth::user()->role_id==1 || Auth::user()->role_id==2 )
<div id='calendar' class="mb-5"></div>

@else
Dashbord
@endif


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
          events: {!! $bookings1 !!},


        });

        calendar.render();
      });



    </script>

@endsection
