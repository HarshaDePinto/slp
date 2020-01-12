@extends('layouts.admin')
    {{--CSS--}}
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
@section('option')
    {{--ADMIN AND STAFF--}}
        @if (Auth::user()->role_id==1 || Auth::user()->role_id==2 )
            hjkhkhkh
    {{--Driver--}}
        @else
            {{--GET TOUR OR DUTY--}}
                @if ($tours)
                    @foreach ($tours as $tour)
                        {{-- Selecting Tours On That Day --}}

                        @if ($tour->start<=date('Y-m-d H:i:s') && $tour->end>=date('Y-m-d H:i:s') && $tour->status==1 )
                           {{-- Selecting Tours OF THe Driver --}}
                            @if ($tour->user_id==$user->id)
                               <h5 class="text-primary">Your Duty Today:
                                <span class="text-danger">{{$tour->title}}</span></h5>
                                @foreach ($vehicles as $vehicle)
                                    @if ($tour->vehicle_id==$vehicle->id)
                                    <h5 class="text-primary">Today You Driving:
                                    @if ($vehicle->image)

                                    <img class="rounded-circle mr-2" height="20" src="{{ asset('images/'.$vehicle->image->path) }}" alt="No Image">
                                    @else
                                    {{'No Image'}}
                                    @endif
                                    <span class="text-danger">{{$vehicle->number}}</span></h5>

                                    @endif


                                @endforeach
                                <a href="{{route('locations.create')}}" style="background-color:#FF851B;" class="btn   btn-block  text-white" > Locations </a>
                                <a href="{{route('fuels.create')}}" style="background-color:#FF851B;" class="btn   btn-block  text-white" > Fuel </a>
                            @else

                            @endif

                        @endif

                    @endforeach

                    @endif
                @endif
@endsection

@section('content')


            <div class="row">
                <div class="col-md-6">
                    @if ($tours)
                        @foreach ($tours as $tour)
                            @if ($tour->start<=date('Y-m-d H:i:s') && $tour->end>=date('Y-m-d H:i:s') && $tour->status==1 )
                                @if ($tour->user_id==$user->id)

                                    @foreach ($vehicles as $vehicle)

                                        @if ($vehicle->id==$tour->vehicle_id)
                                            @if ($vehicle->fuels()->count()!=0)


                                                <form action="{{route('fuels.store')}}" method="POST" enctype="multipart/            form-data"class="mb-5">
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


                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="tour" value="{{ $tour->id}}" hidden >
                                                </div>

                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="vehicle" value="{{ $vehicle->id}}" hidden >
                                                </div>

                                                <div class="form-group">
                                                <label class="font-weight-bold" for="location">Location</label>
                                                    <input type="text" class="form-control" name="location" >
                                                </div>

                                                <div class="form-group">
                                                    <label class="font-weight-bold" for="meter">Meter Reading</label>
                                                        <input type="text" class="form-control" name="meter" >
                                                    </div>
                                                <div class="form-group">
                                                        <label class="font-weight-bold" for="amount">Amount</label>
                                                            <input type="text" class="form-control" name="amount" >
                                                        </div>
                                                    <div class="form-group">
                                                    <label class="font-weight-bold" for="liters">Liters </label>
                                                                <input type="text" class="form-control" name="liters" >
                                                            </div>


                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="author" value="{{ Auth::user()->name}}" hidden >
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-primary float-right" name="submit" value="Add">
                                                </div>
                                                </form>

                                                <table class="table table-hover">
                                                    <thead>
                                                      <tr>
                                                        <th scope="col">Location</th>
                                                        <th scope="col">Amount</th>
                                                        <th scope="col">Time</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($vehicle->fuels as $fuel)
                                                            <tr>
                                                            <td>{{$fuel->location}}</td>
                                                                <td>{{$fuel->amount}}</td>
                                                            <td>{{$fuel->created_at->diffForHumans()}}</td>
                                                            </tr>

                                                        @endforeach

                                                        </tbody>
                                                    </table>
                                            @else
                                                <form action="{{route('fuels.store')}}" method="POST" enctype="multipart/            form-data"class="mb-5">
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


                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="tour" value="{{ $tour->id}}" hidden >
                                                </div>

                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="vehicle" value="{{ $vehicle->id}}" hidden >
                                                </div>

                                                <div class="form-group">
                                                <label class="font-weight-bold" for="location">Location</label>
                                                    <input type="text" class="form-control" name="location" >
                                                </div>

                                                <div class="form-group">
                                                    <label class="font-weight-bold" for="meter">Meter Reading</label>
                                                        <input type="text" class="form-control" name="meter" >
                                                    </div>
                                                <div class="form-group">
                                                        <label class="font-weight-bold" for="amount">Amount</label>
                                                            <input type="text" class="form-control" name="amount" >
                                                        </div>
                                                    <div class="form-group">
                                                    <label class="font-weight-bold" for="liters">Liters </label>
                                                                <input type="text" class="form-control" name="liters" >
                                                            </div>


                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="author" value="{{ Auth::user()->name}}" hidden >
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-primary float-right" name="submit" value="Add">
                                                </div>
                                                </form>
                                            @endif

                                        @endif

                                    @endforeach

                                @endif

                            @endif

                        @endforeach

                    @endif









                           {{-- Selecting Tours OF THe Driver --}}

















                </div>
                <div class="col-md-6">

                </div>
            </div>



@endsection


@section('script')
@endsection
