@extends('layouts.admin')

@section('css')
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
                    @if ($tour->locations)
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









                @if ($finance)
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Instruction</th>
                            <th scope="col">Status</th>
                            <th scope="col">Created</th>
                            <th scope="col">Updated</th>
                        </tr>
                        </thead>
                        <tbody>
                            <td><a href="{{action('TourController@downloadPDF', $tour->id)}}">Download PDF</a></td>


                        </tbody>
                    </table>
                    @else
                    No Ins
                    @endif






            </div>
        </div>

@endsection

@section('script')

@endsection
