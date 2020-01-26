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

        <a href="{{route('tour.manage',$tour->id)}}" style="background-color:#A52A2A;" class="btn   btn-block  text-white" ><i class="fas fa-map-signs"></i> Instructions </a>

        <a href="{{route('tour.salary',$tour->id)}}" style="background-color:#E99D04;" class="btn   btn-block  text-white" ><i class="fas fa-money-bill-wave"></i> Finance</a>

        <a href="{{route('tour.locations',$tour->id)}}" style="background-color:#A0522D;" class="btn   btn-block  text-white" ><i class="fas fa-map-marker"></i> Locations </a>

        <a href="{{route('tour.fuels',$tour->id)}}" style="background-color:#8B4513;" class="btn   btn-block  text-white" ><i class="fas fa-gas-pump"></i> Fuel Info </a>

        <a href="{{route('tour.maintenances',$tour->id)}}" style="background-color:#D2691E;" class="btn   btn-block  text-white" ><i class="fas fa-wrench"></i> Maintenances</a>

        <a href="{{route('tour.activities',$tour->id)}}" style="background-color:#CD853F;" class="btn   btn-block  text-white" ><i class="fab fa-grunt"></i> Activities</a>

        <a href="{{route('tour.shops',$tour->id)}}" style="background-color:#DAA520;" class="btn   btn-block  text-white" ><i class="fas fa-cart-plus"></i> Shopping</a>

        <a href="{{route('tour.other',$tour->id)}}" style="background-color:#CD5C5C;" class="btn   btn-block  text-white" ><i class="fas fa-parking"></i> Other Expenses</a>



        <a href="{{route('tour.summary',$tour->id)}}" style="background-color:#F30D3E;" class="btn   btn-block  text-white" ><i class="fas fa-chart-bar"></i> Summary</a>





@endsection

@section('content')
        {{--Tour Summary--}}
        <a class="btn btn-primary float-right" href="{{action('TourController@downloadPDF', $tour->id)}}">Download PDF</a>
        <div class="card mb-5">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-4 ">
                        @if (isset($driver))
                    <h5>
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
                    <div class="col-md-4 ">
                        <h3 class="text-primary">{{$tour->title}}</h3>
                    </div>
                    <div class="col-md-4 ">

                        @if (isset($vehicle))
                    <h5 class="mt-0 "><a href="{{route('vehicles.show',$vehicle->id)}}">
                        @if ($vehicle->image)
                        <img class="rounded mr-2" width="50" src="{{ asset('images/'.$vehicle->image->path) }}" alt="No Image">
                        @else
                        <img class="mr-3 rounded" width="50" src="{{ asset('images/vehicle.jpg') }}" alt="Generic placeholder image">
                        @endif

                        {{$vehicle->number}}


                    </a>

                </h5>


                    @endif
                    </div>

                </div>

            </div>
            <div class="card-body">
                <h5 class="mb-3"><strong>Date:</strong> {{Carbon\Carbon::now()->format('Y-M-d')}}</h5>
                <h5 class="mb-3"><strong>Tour Number:</strong> {{$tour->number}}</h5>
                <h5 class="mb-3"><strong>Driver Name:</strong> {{$driver->name}}</h5>
                <h5 class="mb-3"><strong>Contact Number:</strong> {!!$driver->tel!!}</h5>
                <h5 class="mb-3"><strong>Vehicle Number:</strong> {{$vehicle->number}}</h5>

                <h5 class=""><strong>Duration:{{date('d',strtotime($tour->end)-strtotime($tour->start))}} days</strong></h5>
                <h5>From {{date('g:ia \o\n l jS F Y',strtotime($tour->start))}} </h5><h5> To {{date('g:ia \o\n l jS F Y',strtotime($tour->end))}} </h5>

                <h5 class="mt-3"><strong>Locations:</strong></h5>
                    @if ($tour->locations->count()!=0)
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Location</th>
                            <th scope="col">Meter Reading</th>
                            <th scope="col">Date</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($tour->locations as $location)
                             <tr>
                                <td>{{$location->location}}</td>
                                <td>{{$location->c_meter}}</td>
                                <td>{{$location->created_at->format('Y-M-d')}}</td>
                             </tr>
                            @endforeach
                            <tr>
                                <th>Total Journey</th>
                                <th>{{$location->c_meter-$location->s_meter}} Km</th>

                             </tr>


                        </tbody>
                    </table>
                    @else
                    No Locations
                    @endif

                <h5 class="mt-3"><strong>Fuel:</strong></h5>
                @if (isset($vehicle))
                @if ($vehicle->fuels()->count()!=0)
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Location</th>
                        <th scope="col">Meter</th>
                        <th scope="col">Amount</th>

                    </tr>
                    </thead>
                    <tbody>

                            @foreach ($vehicle->fuels as $fuel)
                            @if ($fuel->tour==$tour->id)
                            <tr>
                                <td >{{$fuel->location}}</td>
                                <td>
                                    {{$fuel->meter}}
                                </td>

                                <td>
                                    {{$fuel->amount}}
                                </td>
                                </tr>
                            @endif
                            @endforeach
                                <tr>
                                    <th colspan="2">Total Amount</th>
                                <th>@if ($fuel->where('tour', '=' ,$tour->id)->sum('amount')==$finance->to_fuel)
                                    <span class="text-success">{{$finance->to_fuel}}</span>
                                    @else
                                    {{$finance->to_fuel}}(
                                    <span class="text-danger">There are {{$finance->to_fuel-$fuel->where('tour', '=' ,$tour->id)->sum('amount')}}  different</span>)
                                    @endif

                                </tr>

                    </tbody>
                </table>
                @else
                No Fuel
                @endif
                @endif



                <h5 class="mt-3"><strong>Maintenances:</strong></h5>
                @if (isset($vehicle))
                @if ($vehicle->maintenances()->count()!=0)
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Details</th>
                        <th scope="col">Location</th>
                        <th scope="col">Meter</th>
                        <th scope="col">Amount</th>

                    </tr>
                    </thead>
                    <tbody>

                        @foreach ($vehicle->maintenances as $maintenance)
                        @if ($maintenance->tour==$tour->id)
                        <tr>
                            <td >{{$maintenance->details}}</td>
                            <td >{{$maintenance->location}}</td>

                            <td>
                                {{$maintenance->meter}}
                            </td>

                            <td>
                                {{$maintenance->amount}}
                            </td>


                            </tr>
                        @endif

                        @endforeach
                                <tr>
                                    <th colspan="2">Total Amount</th>
                                <th>
                                    @if ($maintenance->where('tour', '=' ,$tour->id)->sum('amount')==$finance->to_maintenance)
                                    <span class="text-success">{{$finance->to_maintenance}}</span>
                                    @else
                                    {{$finance->to_maintenance}}(
                                    <span class="text-danger">There are {{$finance->to_maintenance-$maintenance->where('tour', '=' ,$tour->id)->sum('amount')}}  different</span>)
                                    @endif
                                    </th>
                                </tr>

                    </tbody>
                </table>
                @else
                No Maintenances
                @endif
                @endif


                <h5 class="mt-3"><strong>Other Expenses:</strong></h5>
                @if ($tour->expenses->count()!=0)
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Details</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Date</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($tour->expenses as $expense)
                         <tr>
                            <td>{{$expense->name}}</td>
                            <td>{{$expense->amount}}</td>
                            <td>{{$expense->created_at->format('Y-M-d')}}</td>
                         </tr>
                        @endforeach
                        <tr>
                            <th colspan="2">Total Expenses</th>
                            <th>@if ($expense->where('tour', '=' ,$tour->id)->sum('amount')==$finance->to_other)
                                <span class="text-success">{{$finance->to_other}}</span>
                                @else
                                {{$finance->to_other}}(
                                <span class="text-danger">There are {{$finance->to_other-$expense->where('tour', '=' ,$tour->id)->sum('amount')}}  different</span>)
                                @endif</th>

                         </tr>


                    </tbody>
                </table>
                @else
                No Other Expenses
                @endif


                <h5 class="mt-3"><strong>Driver Income:</strong></h5>
                @if ($driver->salaries->count()!=0)
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Salary</th>
                        <th scope="col">Activities</th>
                        <th scope="col">Shopping</th>
                        <th scope="col">Other</th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($driver->salaries as $salary)
                        @if ($salary->tour==$tour->id)
                        <tr>
                            <td>{{$salary->created_at->format('Y-M-d')}}</td>
                            <td>{{$salary->salary}}</td>
                            <td>{{$salary->activity}}</td>
                            <td>{{$salary->shopping}}</td>


                         </tr>
                        @endif

                        @endforeach
                        <tr>
                            <th >Total</th>
                            <th>@if ($salary->where('tour', '=' ,$tour->id)->sum('salary')==$finance->to_driver)
                                <span class="text-success">{{$finance->to_driver}}</span>
                                @else
                                {{$finance->to_driver}}(
                                <span class="text-danger">There are {{$finance->to_driver-$salary->where('tour', '=' ,$tour->id)->sum('salary')}}  different</span>)
                                @endif</th>
                            <th>@if ($salary->where('tour', '=' ,$tour->id)->sum('activity')==$finance->from_activities)
                                    <span class="text-success">{{$finance->from_activities}}</span>
                                    @else
                                    {{$finance->from_activities}}(
                                    <span class="text-danger">There are {{$finance->from_activities-$salary->where('tour', '=' ,$tour->id)->sum('activity')}}  different</span>)
                                @endif</th>

                            <th>@if ($salary->where('tour', '=' ,$tour->id)->sum('shopping')==$finance->from_shops)
                                    <span class="text-success">{{$finance->from_shops}}</span>
                                    @else
                                    {{$finance->from_shops}}(
                                    <span class="text-danger">There are {{$finance->from_shops-$salary->where('tour', '=' ,$tour->id)->sum('shopping')}}  different</span>)
                                    @endif</th>



                         </tr>


                    </tbody>
                </table>
                @else
                No Salary Deatails
                @endif


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
