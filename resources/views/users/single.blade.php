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

        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
@endsection


@section('option')
    {{-- Links --}}
        <a href="{{route('users.edit',$user->id)}}" class="btn btn-info btn-block  text-white" >
            <i class="fas fa-edit"></i>Edit</a>

        <a href="{{route('users.changePassword',$user->id)}}" class="btn btn-info btn-block  text-white" >
            <i class="fas fa-key"></i></i>Change Password</a>



    {{--Details--}}
        <div class="row">
        <div class="col-md-10 ">
            <h2 class="mt-0 text-primary">{{$user->name}}
            </h2>
        </div>
        <div class="col-md-2 ">

        </div>
        </div>


            @if ($user->image)
                <img class="mr-3 rounded" width="250" src="{{ asset('images/'.$user->image->path) }}" alt="Generic placeholder image">
            @else
                <img class="mr-3 rounded" width="250" src="{{ asset('images/no.png') }}" alt="Generic placeholder image">
            @endif

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
<div class="container">
    <div class="row">
      <div class="col-md-6">
          <h4 class="text-primary d-inline">Income Details</h4>
          <button class="btn  btn-sm btn-primary float-right" onclick="show('operation1')">See All</button>
          {{--All Details--}}
            <div id="operation1" style="display:none">
                @if ($user->salaries()->count()!=0)
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Salary</th>
                        <th scope="col">Activity</th>
                        <th scope="col">Shopping</th>
                        <th scope="col">Other</th>
                        <th scope="col">Date</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($user->salaries as $salary)
                            <tr>

                                <td>{{$salary->salary}}</td>
                                <td>{{$salary->activity}}</td>
                                <td>{{$salary->shopping}}</td>
                                <td>{{$salary->other}}</td>
                                <td>{{$salary->created_at->diffForHumans()}}</td>

                            </tr>
                         @endforeach
                        <tr>

                            <th>{{$salary->sum('salary')}}</th>
                            <th>{{$salary->sum('activity')}}</th>
                            <th>{{$salary->sum('shopping')}}</th>
                            <th>{{$salary->sum('other')}}</th>

                        </tr>
                        <tr>
                            <td colspan="3">Total</td>
                            <th>{{$salary->sum('salary')+$salary->sum('activity')+$salary->sum('shopping')+$salary->sum('other')}}</th>
                        </tr>

                    </tbody>
                </table>




                    @else
                    No salary Details Available
                    @endif
            </div>
            @if ($user->salaries()->count()!=0)
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Salary</th>
                        <th scope="col">Activity</th>
                        <th scope="col">Shopping</th>
                        <th scope="col">Other</th>
                        <th scope="col">Date</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($user->salaries->take(10) as $salary)
                            <tr>

                                <td>{{$salary->salary}}</td>
                                <td>{{$salary->activity}}</td>
                                <td>{{$salary->shopping}}</td>
                                <td>{{$salary->other}}</td>
                                <td>{{$salary->created_at->diffForHumans()}}</td>

                            </tr>
                         @endforeach
                        <tr>

                            <th>{{$salary->sum('salary')}}</th>
                            <th>{{$salary->sum('activity')}}</th>
                            <th>{{$salary->sum('shopping')}}</th>
                            <th>{{$salary->sum('other')}}</th>

                        </tr>
                        <tr>
                            <td colspan="3">Total</td>
                            <th>{{$salary->sum('salary')+$salary->sum('activity')+$salary->sum('shopping')+$salary->sum('other')}}</th>
                        </tr>

                    </tbody>
                </table>

                    @foreach ($user->salaries as $salary)
                    <canvas id="myChart"></canvas>
                    @endforeach


            @else
               No salary Details Available
            @endif
      </div>
      <div class="col-md-6">
        <div id="main_place">
        </div>
        <div id='calendar' class="mb-5"></div>
    </div>
  </div>





@endsection


@section('script')
    {{-- Calender Script --}}
    <script>

        document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
          plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
          header: {
            left: 'prev,next',
            center: 'title',
            right: 'dayGridMonth,listMonth'
          },
          defaultDate:new Date(),
          navLinks: true, // can click day/week names to navigate views
          businessHours: true, // display business hours
          editable: true,
          aspectRatio: 1,
          events:{!! $bookings1 !!},
        });

        calendar.render();
      });



    </script>

    {{--OPTION--}}
    <script>
        function show(param_div_id) {
          document.getElementById('main_place').innerHTML = document.getElementById(param_div_id).innerHTML;
        }
      </script>


    {{-- CHART Script --}}
        @if ($user->salaries()->count()!=0)
        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
                var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'bar',//line,bar,horizontalBar,radar,doughnut,pie

                // The data for our dataset
                data: {
                labels: ['Salary ','Activity','Shopping','Other' ],
                datasets: [{
                label: 'Salary summeryt',
                backgroundColor: ['rgba(0,0,255)',
                                'rgba(0,255,0)',
                                'rgba(74, 35, 90)',
                                'rgba(255,215,0)'],
                borderColor: 'rgb(255, 99, 132)',
                data: [{{$salary->sum('salary')}},{{$salary->sum('activity')}},{{$salary->sum('shopping')}},{{$salary->sum('other')}}]
                }]
                },

                // Configuration options go here
                options: {
                    legend: { display: false },

                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }

                }
                });
        </script>
        @endif
@endsection
