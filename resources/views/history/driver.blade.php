@extends('layouts.admin')
    {{--CSS--}}
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        @section('css')

        @endsection
@section('option')

@endsection

@section('content')
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

                            <th>{{$user->salaries->sum('salary')}}</th>
                            <th>{{$user->salaries->sum('activity')}}</th>
                            <th>{{$user->salaries->sum('shopping')}}</th>
                            <th>{{$user->salaries->sum('other')}}</th>

                        </tr>
                        <tr>
                            <td colspan="3">Total</td>
                            <th>{{$user->salaries->sum('salary')+$user->salaries->sum('activity')+$user->salaries->sum('shopping')+$user->salaries->sum('other')}}</th>
                        </tr>

                    </tbody>
                    </table>




                    @else
                    No salary Details Available
                    @endif
            </div>

            {{--First Five--}}
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
                        @foreach ($user->salaries->take(5) as $salary)
                            <tr>

                                <td>{{$salary->salary}}</td>
                                <td>{{$salary->activity}}</td>
                                <td>{{$salary->shopping}}</td>
                                <td>{{$salary->other}}</td>
                                <td>{{$salary->created_at->diffForHumans()}}</td>

                            </tr>
                         @endforeach
                        <tr>

                            <th>{{$user->salaries->sum('salary')}}</th>
                            <th>{{$user->salaries->sum('activity')}}</th>
                            <th>{{$user->salaries->sum('shopping')}}</th>
                            <th>{{$user->salaries->sum('other')}}</th>

                        </tr>
                        <tr>
                            <td colspan="3">Total</td>
                            <th>{{$user->salaries->sum('salary')+$user->salaries->sum('activity')+$user->salaries->sum('shopping')+$user->salaries->sum('other')}}</th>
                        </tr>

                    </tbody>
                    </table>

                    @foreach ($user->salaries as $salary)

                    @endforeach


            @else
               No salary Details Available
            @endif


            </div>
        <div class="col-md-6">


            {{--Search--}}
            <h4 class="text-primary">Salary Report</h4>

                    <form action="{{route('history.driver_search',$user->id)}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="font-weight-bold" for="start"> Start Date</label>
                            <input type="text" class="form-control" id="start" name="start">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold" for="end">End Date</label>
                            <input type="text" class="form-control" id="end"  name="end">
                        </div>
                        <button type="submit" class="btn btn-primary "><i class="fas fa-money-bill-wave"></i> Repoart</button>
                    </form>
                    <div id="main_place">
                    </div>
                    <canvas id="myChart"></canvas>
                </div>
            </div>



@endsection


@section('script')

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
                data: [{{$user->salaries->sum('salary')}},{{$user->salaries->sum('activity')}},{{$user->salaries->sum('shopping')}},{{$user->salaries->sum('other')}}]
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

        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    {{--Flat Picker--}}
        <script>
            flatpickr('#start',{
            enableTime:false
            });
            flatpickr('#end',{
            enableTime:false
            });
        </script>

@endsection
