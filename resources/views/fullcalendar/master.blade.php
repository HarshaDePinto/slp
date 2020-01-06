<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='{{'assets/fullcalendar/packages/core/main.css'}}' rel='stylesheet' />
<link href='{{'assets/fullcalendar/packages/daygrid/main.css'}}' rel='stylesheet' />
<link href='{{'assets/fullcalendar/packages/timegrid/main.css'}}' rel='stylesheet' />
<link href='{{'assets/fullcalendar/packages/list/main.css'}}' rel='stylesheet' />
<script src='{{'assets/fullcalendar/packages/core/main.js'}}'></script>
<script src='{{'assets/fullcalendar/packages/interaction/main.js'}}'></script>
<script src='{{'assets/fullcalendar/packages/daygrid/main.js'}}'></script>
<script src='{{'assets/fullcalendar/packages/timegrid/main.js'}}'></script>
<script src='{{'assets/fullcalendar/packages/list/main.js'}}'></script>
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
      events: {!! $bookings !!},


    });

    calendar.render();
  });



</script>
<style>

  body {
    margin: 40px 10px;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }

</style>
</head>
<body>

  <div id='calendar'></div>

</body>
</html>
