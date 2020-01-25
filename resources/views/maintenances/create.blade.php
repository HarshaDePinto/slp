@extends('layouts.admin')
    {{--CSS--}}
@section('css')

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

        {{-- Selecting Vehicle --}}
                @foreach ($vehicles as $vehicle)
                @if ($tour->vehicle_id==$vehicle->id)
                <h5 class="text-primary">Today You Driving:
                @if ($vehicle->image)

                <img class="rounded-circle mr-2" height="20" src="{{ asset('images/'.$vehicle->image->path) }}" alt="No Image">
                 @else
                 <img class="rounded-circle mr-2" height="20" src="{{ asset('images/vehicle.jpg') }}" alt="No Image">
                @endif
                <span class="text-danger">{{$vehicle->number}}</span></h5>


                @endif


                @endforeach
        {{-- Option Buttons --}}


                    <a href="{{ url('/home') }}" style="background-color:#8E44AD;" class="btn   btn-block  text-white">
                        <i class="fas fa-list-ul"></i> Instructions</a>
                        <a href="{{route('locations.create')}}" style="background-color:#A0522D;" class="btn   btn-block  text-white" ><i class="fas fa-map-marker"></i>  Locations </a>

                        <a href="{{route('fuels.create')}}" style="background-color:#8B4513;" class="btn   btn-block  text-white" ><i class="fas fa-gas-pump"></i> Fuel </a>
                        <a href="{{route('maintenances.create')}}" style="background-color:#D2691E;" class="btn   btn-block  text-white" ><i class="fas fa-wrench"></i> Maintenances </a>
                        <a href="{{route('activities.create')}}" style="background-color:#CD853F;" class="btn   btn-block  text-white" ><i class="fab fa-grunt"></i> Activities </a>

                        <a href="{{route('shops.create')}}" style="background-color:#DAA520;" class="btn   btn-block  text-white" ><i class="fas fa-cart-plus"></i> Shops </a>
                        <a href="{{route('expenses.create')}}" style="background-color:#CD5C5C;" class="btn   btn-block  text-white" ><i class="fas fa-parking"></i> Other Exp </a>
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
                                            @if ($vehicle->maintenances()->count()!=0)


                                                <form action="{{route('maintenances.store')}}" method="POST" enctype="multipart/            form-data"class="mb-5">
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
                                                    <label class="font-weight-bold" for="details">Details</label>
                                                        <input type="text" class="form-control" name="details" >
                                                    </div>
                                                <div class="form-group">
                                                <label class="font-weight-bold" for="provider">Provider</label>
                                                <input type="text" class="form-control" name="provider" >
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
                                                    <input type="text" class="form-control" name="author" value="{{ Auth::user()->name}}" hidden >
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-primary float-right" name="submit" value="Add">
                                                </div>
                                                </form>

                                                <table class="table table-hover">
                                                    <thead>
                                                      <tr>
                                                        <th scope="col">Details</th>
                                                        <th scope="col">Amount</th>

                                                        <th scope="col">Time</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($vehicle->maintenances as $maintenance)
                                                            <tr>
                                                            <td>{{$maintenance->details}}</td>
                                                            <td>{{$maintenance->amount}}</td>

                                                            <td>{{$maintenance->created_at->diffForHumans()}}</td>
                                                            </tr>

                                                        @endforeach

                                                        </tbody>
                                                    </table>
                                        @else

                                                <form action="{{route('maintenances.store')}}" method="POST" enctype="multipart/            form-data"class="mb-5">
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
                                                        <label class="font-weight-bold" for="details">Details</label>
                                                            <input type="text" class="form-control" name="details" >
                                                        </div>
                                                    <div class="form-group">
                                                    <label class="font-weight-bold" for="provider">Provider</label>
                                                    <input type="text" class="form-control" name="provider" >
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

                </div>
                <div class="col-md-6">

                </div>
            </div>



@endsection


@section('script')
@endsection

