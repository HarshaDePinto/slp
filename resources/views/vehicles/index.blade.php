@extends('layouts.admin')

@section('option')
    {{--Links--}}
        <a href="{{route('vehicles.create')}}" class="btn btn-primary btn-block dropdown">
        <i class="fas fa-plus"></i> Add Vehicale</a>


        <button style="background-color:#D35400;" class="btn btn-block  text-white" onclick="show('operation1')">On Duty</button>
        <button style="background-color:#E67E22;" class="btn btn-block  text-white" onclick="show('operation2')">Available</button>
        <button style="background-color:#F39C12;" class="btn btn-block  text-white" onclick="show('operation3')">Unavailable</button>

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

                    <td><a href="{{route('vehicles.show',$vehicle->id)}}">
                        @if ($vehicle->image)
                        <img class="rounded-circle mr-2" width="50" src="{{ asset('images/'.$vehicle->image->path) }}" alt="No Image">
                        @else
                        <img class="rounded-circle mr-2" width="50" src="{{ asset('images/vehicle.jpg') }}" alt="No Image">
                        @endif

                        {{$vehicle->number}}
                    </a></td>
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

                        <td><a href="{{route('vehicles.show',$vehicle->id)}}">
                            @if ($vehicle->image)
                            <img class="rounded-circle mr-2" width="50" src="{{ asset('images/'.$vehicle->image->path) }}" alt="No Image">
                            @else
                            <img class="rounded-circle mr-2" width="50" src="{{ asset('images/vehicle.jpg') }}" alt="No Image">
                            @endif

                            {{$vehicle->number}}
                        </a></td>
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

                    <td><a href="{{route('vehicles.show',$vehicle->id)}}">
                        @if ($vehicle->image)
                        <img class="rounded-circle mr-2" width="50" src="{{ asset('images/'.$vehicle->image->path) }}" alt="No Image">
                        @else
                        <img class="rounded-circle mr-2" width="50" src="{{ asset('images/vehicle.jpg') }}" alt="No Image">
                        @endif

                        {{$vehicle->number}}
                    </a></td>
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

                <td><a href="{{route('vehicles.show',$vehicle->id)}}">
                    @if ($vehicle->image)
                    <img class="rounded-circle mr-2" width="50" src="{{ asset('images/'.$vehicle->image->path) }}" alt="No Image">
                    @else
                    <img class="rounded-circle mr-2" width="50" src="{{ asset('images/vehicle.jpg') }}" alt="No Image">
                    @endif

                    {{$vehicle->number}}
                </a></td>
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
