@extends('layouts.admin')

@section('option')
    {{--Links--}}
        <a href="{{route('tours.index')}}" class="btn btn-success btn-block"><i class="far fa-map"></i> Duties</a>

        <a href="{{route('tours.create')}}" class="btn btn-primary btn-block"><i class="fas fa-plus"></i> Add Tour</a>

        <button style="background-color:#4169E1;" class="btn btn-block  text-white" onclick="show('operation1')"><i class="fas fa-road"></i> On Going</button>
        <button style="background-color:#006400;" class="btn btn-block  text-white" onclick="show('operation2')"><i class="far fa-check-circle"></i> Confirm</button>
        <button style="background-color:#FF6347;" class="btn btn-block  text-white" onclick="show('operation3')"><i class="far fa-question-circle"></i> Pending</button>
        <button style="background-color:#FF8C00;" class="btn btn-block  text-white" onclick="show('operation4')"><i class="fas fa-hourglass-end"></i> Complete</button>
        <button style="background-color:#A52A2A;" class="btn btn-block  text-white" onclick="show('operation5')"><i class="far fa-times-circle"></i> Cancelled</button>


    {{-- OPTIONS DIV --}}
        {{-- On Going --}}
        <div id="operation1" style="display:none">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-center" >Title</th>
                        <th >Will End</th>
                        <th >Location</th>
                        <th >Manage</th>

                    </tr>
                </thead>
                <tbody>
                    {{-- Selecting Tours From Duties --}}
                    @if ($tours)
                        @foreach ($tours as $tour)
                            {{-- Selecting Tours On That Day --}}

                            @if ($tour->start<=date('Y-m-d H:i:s') && $tour->end>=date('Y-m-d H:i:s') && $tour->status==1 )
                                <tr>

                                    <td><a href="{{route('tours.show',$tour->id)}}"><h4>{{$tour->title}}</h4>
                                        </a>
                                    </td>
                                    <td>
                                        <h4 class="text-info">


                                            {{date('g:ia l jS M',strtotime($tour->end))}}

                                        </h4>
                                    </td>

                                    <td>
                                        @foreach ($vehicles as $vehicle)
                                            @if ($tour->vehicle_id==$vehicle->id)
                                                <h5 class="text-success">{{$vehicle->location}}</h5>

                                            @endif

                                        @endforeach
                                    </td>

                                    <td>
                                        <a href="{{route('tour.manage',$tour->id)}}"><h5 class="text-center"><i class="fas fa-angle-double-right"></i></h5></a>

                                    </td>

                                </tr>
                            @endif

                        @endforeach

                    @endif


                </tbody>
            </table>

        </div>

        {{-- Confirm Tour --}}
        <div id="operation2" style="display:none">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-center" >Title</th>
                        <th >Will Start</th>
                        <th >Status</th>
                        <th >Updated By</th>

                    </tr>
                </thead>
                <tbody>
                    @if ($tours)
                        @foreach ($tours as $tour)
                             @if ($tour->status==1 && date('Y-m-d H:i:s')<=$tour->start)

                                <tr>

                                    <td><a href="{{route('tours.show',$tour->id)}}">


                                        <h4>{{$tour->title}}</h4></a>
                                    </td>
                                    <td>
                                        <h4 class="text-info">
                                            {{date('g:ia l jS M',strtotime($tour->start))}}

                                    </h4>
                                    </td>

                                    <td>

                                        <form class="form-inline" action="{{route('tours.makePending',$tour->id)}}" method="POST">
                                            @csrf
                                            <label class="text-success mr-2" >CONFIRM</label>
                                            <button type="submit" class="btn btn-info text-white btn-sm">Make Pending</button>

                                            </form>

                                         </td>

                                    <td bgcolor="{{$tour->color}}" class="text-white">
                                        {{$tour->author}}
                                        <br> {{$tour->updated_at->diffForHumans()}}
                                    </td>

                                </tr>
                            @endif

                        @endforeach

                    @endif


                </tbody>
            </table>

        </div>

        {{-- Pending Tour --}}
        <div id="operation3" style="display:none">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-center" >Title</th>
                        <th >Will Start</th>
                        <th >Status</th>
                        <th >Updated By</th>

                    </tr>
                </thead>
                <tbody>
                    @if ($tours)
                        @foreach ($tours as $tour)
                             @if ($tour->status==0 && date('Y-m-d H:i:s')<=$tour->start)

                                <tr>

                                    <td><a href="{{route('tours.show',$tour->id)}}">


                                        <h4>{{$tour->title}}</h4></a>
                                    </td>
                                    <td>
                                        <h4 class="text-info">
                                            {{date('g:ia l jS M',strtotime($tour->start))}}

                                    </h4>
                                    </td>

                                    <td><form class="form-inline" action="{{route('tours.makeConfirm',$tour->id)}}" method="POST">
                                        @csrf
                                        <label class="text-info mr-2" >PENDING</label>
                                        <button type="submit" class="btn btn-success text-white btn-sm">Make Confirm</button>

                                        </form></td>

                                    <td bgcolor="{{$tour->color}}" class="text-white">
                                        {{$tour->author}}
                                        <br> {{$tour->updated_at->diffForHumans()}}
                                    </td>

                                </tr>
                            @endif

                        @endforeach

                    @endif


                </tbody>
            </table>

        </div>

        {{-- Complete Tour --}}
        <div id="operation4" style="display:none">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-center" >Title</th>
                        <th >Ended</th>
                        <th >Status</th>
                        <th >Updated By</th>

                    </tr>
                </thead>
                <tbody>
                    @if ($tours)
                        @foreach ($tours as $tour)
                            @if ($tour->status==1 && $tour->end<=date('Y-m-d H:i:s'))

                                <tr>

                                    <td><a href="{{route('tours.show',$tour->id)}}">


                                        <h4>{{$tour->title}}</h4></a>
                                    </td>
                                    <td>
                                        <h4 class="text-info">
                                            {{date('g:ia l jS M',strtotime($tour->end))}}

                                    </h4>
                                    </td>

                                    <td><h6 class="text-info">{{'COMPLETED'}}</h6></td>

                                    <td bgcolor="{{$tour->color}}" class="text-white">
                                        {{$tour->author}}
                                        <br> {{$tour->updated_at->diffForHumans()}}
                                    </td>

                                </tr>
                            @endif

                        @endforeach

                    @endif


                </tbody>
            </table>

        </div>

        {{-- Cancelled Tour --}}
        <div id="operation5" style="display:none">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-center" >Title</th>

                        <th >Restore</th>
                        <th >Delete</th>
                        <th >Date</th>

                    </tr>
                </thead>
                <tbody>
                    @if ($trashed)
                        @foreach ($trashed as $trash)
                                <tr>
                                    <td>
                                        <h4 class="text-info">{{$trash->title}}</h4>
                                    </td>
                                    <td>
                                        <form action="{{route('tour.restore',$trash->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-success ">RESTORE</button>
                                        </form>
                                    </td>

                                    <td><form action="{{route('tours.destroy',$trash->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger ">DELETE</button>
                                    </form></td>

                                    <td>
                                        <h4 class="text-info">{{$trash->deleted_at->diffForHumans()}}</h4>

                                    </td>

                                </tr>


                        @endforeach

                    @endif


                </tbody>
            </table>

        </div>
@endsection


@section('content')
    {{--Main Place--}}
        <div id="main_place">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-center" >Title</th>
                        <th >Date</th>
                        <th >Status</th>
                        <th >Updated By</th>

                    </tr>
                </thead>
                <tbody>

                    @if ($tours)
                        @foreach ($tours as $tour)
                           @if (date('Y-m-d H:i:s')<=$tour->end)
                            <tr >
                                <td><a href="{{route('tours.show',$tour->id)}}"><h4>{{$tour->title}}</h4></a>
                                </td>
                                <td>
                                    <h5 class="text-success">
                                        {{date('g:ia l jS M',strtotime($tour->start))}}
                                </h5>
                                </td>
                                <td>
                                @if ($tour->status==1)
                                    @if ($tour->start<=date('Y-m-d H:i:s') && $tour->end>=date('Y-m-d H:i:s'))
                                        <h5 >
                                        <a href="{{route('tour.manage',$tour->id)}}">On Going <i class="fas fa-angle-double-right"></i></a>
                                        </h5>

                                    @else
                                    <form class="form-inline" action="{{route('tours.makePending',$tour->id)}}" method="POST">
                                        @csrf
                                        <label class="text-success mr-2" >CONFIRM</label>
                                        <button type="submit" class="btn btn-info text-white btn-sm">Make Pending</button>

                                        </form>

                                    @endif
                                    @else

                                    <form class="form-inline" action="{{route('tours.makeConfirm',$tour->id)}}" method="POST">
                                    @csrf
                                    <label class="text-info mr-2" >PENDING</label>
                                    <button type="submit" class="btn btn-success text-white btn-sm">Make Confirm</button>

                                    </form>
                                @endif





                                </td>
                                <td bgcolor="{{$tour->color}}" class="text-white">
                                    {{$tour->author}}
                                    <br> {{$tour->updated_at->diffForHumans()}}
                                </td>

                            </tr>
                           @endif

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
