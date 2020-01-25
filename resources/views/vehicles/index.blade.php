@extends('layouts.admin')

@section('option')
    {{--Links--}}
        <a href="{{route('vehicles.index')}}" style="background-color:#FF851B;" class="btn text-white  btn-block">
        <i class="fas fa-car"></i> Vehicles</a>
        <a href="{{route('vehicles.create')}}" class="btn btn-primary btn-block dropdown">
        <i class="fas fa-plus"></i> Add Vehicale</a>


        <button style="background-color:#2874A6;" class="btn btn-block  text-white" onclick="show('operation1')"><i class="fas fa-road"></i> On Duty</button>
        <button style="background-color:#196F3D;" class="btn btn-block  text-white" onclick="show('operation2')"><i class="far fa-check-circle"></i> Available</button>
        <button style="background-color:#D4AC0D;" class="btn btn-block  text-white" onclick="show('operation3')"><i class="far fa-times-circle"></i> Unavailable</button>
        <button style="background-color:#CD6155;" class="btn btn-block  text-white" onclick="show('operation4')"><i class="fas fa-trash-alt"></i> Trashed</button>

    {{--OPTIONS--}}
        <div id="operation1" style="display:none">
        <table class="table table-hover">
            <thead>
              <tr>
                <th class="text-center" >Vehicle</th>
                <th >Loction</th>
                <th >Status</th>
                <th >Updated At</th>

              </tr>
            </thead>
            <tbody>
                @if ($vehicles)
                @foreach ($vehicles as $vehicle)

                @foreach ($duties as $duty)

                @if ($duty->start<=date('Y-m-d H:i:s') && $duty->end>=date('Y-m-d H:i:s'))
                @if ($duty->vehicle_id==$vehicle->id)
                <tr>

                    <td>
                        <div class="row">
                            <div class="col-md-8 ">
                                <a href="{{route('vehicles.show',$vehicle->id)}}">
                                    @if ($vehicle->image)
                                    <img class="rounded-circle mr-2" width="50" src="{{ asset('images/'.$vehicle->image->path) }}" alt="No Image">
                                    @else
                                    <img class="rounded-circle mr-2" width="50" src="{{ asset('images/vehicle.jpg') }}" alt="No Image">
                                    @endif

                                    {{$vehicle->number}}
                                </a>
                            </div>
                            <div class="col-md-4 ">
                                <form action="{{route('vehicles.destroy',$vehicle->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger "><i class="far fa-window-close"></i></button>
                                </form>
                            </div>
                        </div>
                        </td>
                    <td>{{$vehicle->location}}</td>
                    <td>
                        {{$duty->title}}
                    </td>
                    <td>{{$vehicle->updated_at->diffForHumans()}}<br> {{$vehicle->author}}</td>

                  </tr>

                @endif

                @endif

                @endforeach





                @endforeach

                @endif


            </tbody>
          </table>

    </div>

        {{-- End Of Onduty --}}
        <div id="operation2" style="display:none">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th class="text-center" >Vehicle</th>
                    <th >Loction</th>
                    <th >Status</th>
                    <th >Updated At</th>

                </tr>
                </thead>
                <tbody>
                    @if ($vehicles)
                    @foreach ($vehicles as $vehicle)

                    @if ($vehicle->status==1)
                    <tr>

                        <td><div class="row">
                            <div class="col-md-8 ">
                                <a href="{{route('vehicles.show',$vehicle->id)}}">
                                    @if ($vehicle->image)
                                    <img class="rounded-circle mr-2" width="50" src="{{ asset('images/'.$vehicle->image->path) }}" alt="No Image">
                                    @else
                                    <img class="rounded-circle mr-2" width="50" src="{{ asset('images/vehicle.jpg') }}" alt="No Image">
                                    @endif

                                    {{$vehicle->number}}
                                </a>
                            </div>
                            <div class="col-md-4 ">
                                <form action="{{route('vehicles.destroy',$vehicle->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger "><i class="far fa-window-close"></i></button>
                                </form>
                            </div>
                        </div></td>
                        <td>{{$vehicle->location}}</td>
                        <td>

                            @if ($vehicle->status!=2)

                            @if ($vehicle->status==1)

                            <form class="form-inline" action="{{route('vehicles.makeUnavailable',$vehicle->id)}}" method="POST">
                                @csrf
                                <label class="text-primary mr-2" >Available</label>
                                <button type="submit" class="btn btn-danger btn-sm">Make Unavailable</button>

                                </form>

                            @else
                            <form class="form-inline" action="{{route('vehicles.makeAvailable',$vehicle->id)}}" method="POST">
                                @csrf
                                <label class="text-danger mr-2" >Unavailable</label>
                                <button type="submit" class="btn btn-primary btn-sm">Make Available</button>

                                </form>


                            @endif


                            @else
                            <h6 class="text-danger">{{'On Duty'}}</h6>

                            @endif




                        </td>
                        <td>{{$vehicle->updated_at->diffForHumans()}}<br> {{$vehicle->author}}</td>

                    </tr>
                    @endif

                    @endforeach

                    @endif


                </tbody>
            </table>

            </div>

        {{-- End Of Available --}}
        <div id="operation3" style="display:none">
            <table class="table table-hover">
            <thead>
            <tr>
                <th class="text-center" >Vehicle</th>
                <th >Loction</th>
                <th >Status</th>
                <th >Updated At</th>

            </tr>
            </thead>
            <tbody>
                @if ($vehicles)
                @foreach ($vehicles as $vehicle)

                @if ($vehicle->status==0)
                <tr>

                    <td><div class="row">
                        <div class="col-md-8 ">
                            <a href="{{route('vehicles.show',$vehicle->id)}}">
                                @if ($vehicle->image)
                                <img class="rounded-circle mr-2" width="50" src="{{ asset('images/'.$vehicle->image->path) }}" alt="No Image">
                                @else
                                <img class="rounded-circle mr-2" width="50" src="{{ asset('images/vehicle.jpg') }}" alt="No Image">
                                @endif

                                {{$vehicle->number}}
                            </a>
                        </div>
                        <div class="col-md-4 ">
                            <form action="{{route('vehicles.destroy',$vehicle->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger "><i class="far fa-window-close"></i></button>
                            </form>
                        </div>
                    </div></td>
                    <td>{{$vehicle->location}}</td>
                    <td>

                        @if ($vehicle->status!=2)

                        @if ($vehicle->status==1)

                        <form class="form-inline" action="{{route('vehicles.makeUnavailable',$vehicle->id)}}" method="POST">
                            @csrf
                            <label class="text-primary mr-2" >Available</label>
                            <button type="submit" class="btn btn-danger btn-sm">Make Unavailable</button>

                            </form>

                        @else
                        <form class="form-inline" action="{{route('vehicles.makeAvailable',$vehicle->id)}}" method="POST">
                            @csrf
                            <label class="text-danger mr-2" >Unavailable</label>
                            <button type="submit" class="btn btn-primary btn-sm">Make Available</button>

                            </form>


                        @endif


                        @else
                        <h6 class="text-danger">{{'On Duty'}}</h6>

                        @endif




                    </td>
                    <td>{{$vehicle->updated_at->diffForHumans()}}<br> {{$vehicle->author}}</td>

                </tr>
                @endif

                @endforeach

                @endif


            </tbody>
            </table>

        </div>

        {{-- End Of Unvailable --}}
        <div id="operation4" style="display:none">
            <table class="table table-hover">
            <thead>
            <tr>
                <th class="text-center" >Vehicle</th>
                <th >Restore</th>
                <th >Delete</th>
                <th >Deleted At</th>

            </tr>
            </thead>
            <tbody>
                @if ($trashed)
                @foreach ($trashed as $trash)


                <tr>

                    <td>

                                @if ($trash->image)
                                <img class="rounded-circle mr-2" width="50" src="{{ asset('images/'.$trash->image->path) }}" alt="No Image">
                                @else
                                <img class="rounded-circle mr-2" width="50" src="{{ asset('images/vehicle.jpg') }}" alt="No Image">
                                @endif

                                {{$trash->number}}


                          </td>
                    <td><form action="{{route('vehicle.restore',$trash->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success ">RESTORE</button>
                    </form></td>
                    <td><form action="{{route('vehicles.destroy',$trash->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger ">DELETE</button>
                    </form></td>
                    <td>{{$trash->deleted_at->diffForHumans()}}</td>

                </tr>


                @endforeach

                @endif


            </tbody>
            </table>

        </div>

@endsection


@section('content')
<div id="main_place">

    <table class="table table-hover">
        <thead>
          <tr>
            <th class="text-center" >Vehicle</th>
            <th >Loction</th>
            <th >Status</th>
            <th >Updated At</th>

          </tr>
        </thead>
        <tbody>
            @if ($vehicles)
            @foreach ($vehicles as $vehicle)
            <tr>

                <td><div class="row">
                    <div class="col-md-8 ">
                        <a href="{{route('vehicles.show',$vehicle->id)}}">
                            @if ($vehicle->image)
                            <img class="rounded-circle mr-2" width="50" src="{{ asset('images/'.$vehicle->image->path) }}" alt="No Image">
                            @else
                            <img class="rounded-circle mr-2" width="50" src="{{ asset('images/vehicle.jpg') }}" alt="No Image">
                            @endif

                            {{$vehicle->number}}
                        </a>
                    </div>
                    <div class="col-md-4 ">
                        <form action="{{route('vehicles.destroy',$vehicle->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger "><i class="far fa-window-close"></i></button>
                        </form>
                    </div>
                </div></td>
                <td>{{$vehicle->location}}</td>
                <td>

                    @if ($vehicle->status!=2)

                    @if ($vehicle->status==1)

                    <form class="form-inline" action="{{route('vehicles.makeUnavailable',$vehicle->id)}}" method="POST">
                        @csrf
                        <label class="text-primary mr-2" >Available</label>
                        <button type="submit" class="btn btn-danger btn-sm">Make Unavailable</button>

                        </form>

                    @else
                    <form class="form-inline" action="{{route('vehicles.makeAvailable',$vehicle->id)}}" method="POST">
                        @csrf
                        <label class="text-danger mr-2" >Unavailable</label>
                        <button type="submit" class="btn btn-primary btn-sm">Make Available</button>

                        </form>


                    @endif


                    @else
                    <h6 class="text-danger">{{'On Duty'}}</h6>

                    @endif




                </td>
                <td>{{$vehicle->updated_at->diffForHumans()}}<br> {{$vehicle->author}}</td>

              </tr>
            @endforeach

            @endif


        </tbody>
      </table>

    </div>



@endsection


@section('script')
<script>
    function show(param_div_id) {
      document.getElementById('main_place').innerHTML = document.getElementById(param_div_id).innerHTML;
    }
  </script>
@endsection
