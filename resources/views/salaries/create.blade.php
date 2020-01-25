@extends('layouts.admin')

@section('css')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
@endsection


@section('option')
    <a href="{{route('tours.index')}}" class="btn btn-success btn-block">
        <i class="far fa-map"></i> Tours</a>

    <a href="{{route('tours.show',$tour->id)}}" class="btn btn-primary btn-block  text-white" ><i class="fas fa-backward"></i> {{$tour->number}}</a>

    <a href="{{route('tours.edit',$tour->id)}}" class="btn btn-info btn-block  text-white" >
        <i class="fas fa-edit"></i>Edit Tour</a>

    <a href="{{route('tour.manage',$tour->id)}}" style="background-color:#FF851B;" class="btn   btn-block  text-white" > Instructions </a>

    <a href="{{route('tour.locations',$tour->id)}}" style="background-color:#FF851B;" class="btn   btn-block  text-white" > Locations </a>

    <a href="{{route('tour.fuels',$tour->id)}}" style="background-color:#FF851B;" class="btn   btn-block  text-white" > Fuel Info </a>

    <a href="{{route('tour.maintenances',$tour->id)}}" style="background-color:#FF851B;" class="btn   btn-block  text-white" > Maintenances</a>

    <a href="{{route('tour.activities',$tour->id)}}" style="background-color:#FF851B;" class="btn   btn-block  text-white" > Activities</a>

    <a href="{{route('tour.shops',$tour->id)}}" style="background-color:#FF851B;" class="btn   btn-block  text-white" > Shopping</a>

    <a href="{{route('tour.salary',$tour->id)}}" style="background-color:#FF851B;" class="btn   btn-block  text-white" > Salary</a>




@endsection

@section('content')

    <h2 class="text-primary text-center">{{$tour->title}} Control Panel</h2>
        {{--Instruction Controller--}}
        <div class="card mb-5">
            <div class="card-header">

               <h3 class="text-primary">Finance Controller</h3>
            </div>
            <div class="card-body">


                        <form action="{{route('salaries.store')}}" method="POST" enctype="multipart/            form-data"class="mb-5">
                            @csrf


                            {{-- For ERRORS --}}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="alert-group">
                                        @foreach ($errors->all() as $error)
                                            <li class="alert-group-item text-danger">
                                                <h3>{{$error}}</h3>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label class="font-weight-bold" for="name">From Client</label>
                                            <input type="text" class="form-control" name="from_client" value="0" required >
                                        </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label class="font-weight-bold" for="name">Doller Rate</label>
                                            <input type="text" class="form-control" name="drate" value="0" required >
                                        </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label class="font-weight-bold" for="salary">Day salary</label>
                                            <input type="text" class="form-control" value="0" name="salary" required >
                                        </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label class="font-weight-bold" for="activity">Activity Income</label>
                                            <input type="text" class="form-control" name="activity" value="0" required >
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label class="font-weight-bold" for="shopping">Shopping Income</label>
                                            <input type="text" class="form-control" name="shopping" value="0" required>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label class="font-weight-bold" for="other">Other Income</label>
                                            <input type="text" class="form-control" value="0" name="other" required >
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label class="font-weight-bold" for="to_fuel">Fuel Expence</label>
                                            <input type="text" class="form-control" name="to_fuel" value="0" required >
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label class="font-weight-bold" for="to_maintenance">Maintenance Expence</label>
                                            <input type="text" class="form-control" name="to_maintenance" value="0" required >
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label class="font-weight-bold" for="to_other">Other Expence</label>
                                            <input type="text" class="form-control" name="to_other" value="0" required >
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="tour" value="{{ $tour->id}}" hidden >
                            </div>



                            <div class="form-group">
                                <input type="text" class="form-control" name="author" value="{{ Auth::user()->name}}" hidden >
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary float-right" name="submit" value="Add">
                            </div>
                        </form>


            </div>
        </div>


        <div class="card mb-5">
            <div class="card-header">

               <h3 class="text-primary">Income And Expence</h3>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                            <th colspan="4">Income</th>
                    </tr>
                    <tr>
                        <th scope="col">From Client</th>
                        <th scope="col">From Activities</th>
                        <th scope="col">From Shopping</th>
                        <th scope="col">Total</th>
                    </tr>
                    </thead>
                    <tbody>


                            <tr>
                                <td >{{$finance->from_client}}</td>
                                <td>
                                    {{$finance->from_activities}}
                                </td>


                                <td>
                                    {{$finance->from_shops}}
                                </td>

                                <td>
                                    {{$finance->from_shops+$finance->from_client+$finance->from_activities}}
                                </td>
                                </tr>



                    </tbody>
                </table>

                <table class="table table-hover">
                    <thead>
                    <tr>
                            <th colspan="5">Expenses</th>
                    </tr>
                    <tr>
                        <th scope="col">To Driver</th>
                        <th scope="col">To Fuel</th>
                        <th scope="col">To Maintenance</th>
                        <th scope="col">Other Expenses</th>
                        <th scope="col">Total</th>
                    </tr>
                    </thead>
                    <tbody>


                            <tr>
                                <td >{{$finance->to_driver}}</td>
                                <td>
                                    {{$finance->to_fuel}}
                                </td>


                                <td>
                                    {{$finance->to_maintenance}}
                                </td>
                                <td>
                                    {{$finance->to_other}}
                                </td>

                                <td>
                                    {{$finance->to_driver+$finance->to_fuel+$finance->to_maintenance+$finance->to_other}}
                                </td>
                                </tr>



                    </tbody>
                </table>

                <table class="table table-hover">
                    <thead>
                    <tr>
                            <th colspan="3">Profit</th>
                    </tr>
                    <tr>
                        <th colspan="3"> {{$finance->from_shops+$finance->from_client+$finance->from_activities}} - {{$finance->to_driver+$finance->to_fuel+$finance->to_maintenance+$finance->to_other}} = {{$finance->from_shops+$finance->from_client+$finance->from_activities - $finance->to_driver-$finance->to_fuel-$finance->to_maintenance-$finance->to_other}}  </th>

                    </tr>
                    </thead>
                    <tbody>



                    </tbody>
                </table>


                <canvas id="myChart"></canvas>


            </div>
        </div>

@endsection

@section('script')
@if ($finance)
        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
                var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'horizontalBar',//line,bar,horizontalBar,radar,doughnut,pie

                // The data for our dataset
                data: {
                labels: ['Client ','Activities ','Shopping','Driver','Fuel','Maintenance','Other'],
                datasets: [{
                label: 'Performance Summary',
                backgroundColor: ['rgba(0,0,255)',
                                'rgba(0,255,0)',
                                'rgba(74, 35, 90)',
                                'rgba(0,0,255)',
                                'rgba(0,255,0)',
                                'rgba(74, 35, 90)',
                                'rgba(255,215,0)'],
                borderColor: 'rgb(255, 99, 132)',
                data: [{{$finance->from_client}},{{$finance->from_activities}},{{$finance->from_shops}},-{{$finance->to_driver}},-{{$finance->to_fuel}},-{{$finance->to_maintenance}},-{{$finance->to_other}}]
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



