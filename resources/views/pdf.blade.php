<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"

      crossorigin="anonymous"
    />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  </head>
  <body>



            <div class="row">


                    <h3 class="text-primary text-center">{{$tour->title}}</h3>



            </div>


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








           <h3 class="text-primary">Income And Expence</h3>

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








    <footer id="sticky-footer" class="fixed-bottom py-2 text-50">
        <div class="text-right">
            <p class="mb-0 mr-3">Copyright
                {{date('g:ia \o\n l jS F Y')}}
            © <a href="">Harsha De Pinto</a></p>
        </div>
    </footer>


  </body>
</html>
