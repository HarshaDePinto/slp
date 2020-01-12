@extends('layouts.admin')

@section('option')
    {{--Links--}}
        <a href="{{route('tours.index')}}" class="btn btn-success btn-block"><i class="far fa-map"></i> Tours</a>

        <a href="{{route('tours.create')}}" class="btn btn-primary btn-block"><i class="fas fa-plus"></i> Add Tour</a>

        <button style="background-color:#4A235A;" class="btn btn-block  text-white" onclick="show('operation1')">On Going</button>
        <button style="background-color:#5B2C6F;" class="btn btn-block  text-white" onclick="show('operation2')">Confirm</button>
        <button style="background-color:#6C3483;" class="btn btn-block  text-white" onclick="show('operation3')">Pending</button>
        <button style="background-color:#7D3C98;" class="btn btn-block  text-white" onclick="show('operation4')">Complete</button>
        <button style="background-color:#8E44AD;" class="btn btn-block  text-white" onclick="show('operation5')">Cancelled</button>


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
                                        {{-- Select Tour Agreement Date --}}
                                            @foreach ($agreements as $agreement)
                                                @if ($agreement->id==$tour->agreement_id)
                                                    @if ($agreement->end)
                                                        {{$agreement->end->diffForHumans()}}
                                                    @else
                                                        {{$tour->end}}
                                                    @endif
                                                @endif
                                            @endforeach
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
                                        @foreach ($agreements as $agreement)
                                            @if ($agreement->id==$tour->agreement_id)
                                                @if ($agreement->start)
                                                    <h5>{{$agreement->start->diffForHumans()}}</h5>
                                                @else
                                                    {{$tour->start}}
                                                @endif
                                            @endif
                                        @endforeach


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
                                        @foreach ($agreements as $agreement)
                                            @if ($agreement->id==$tour->agreement_id)
                                                @if ($agreement->start)
                                                    <h5>{{$agreement->start->diffForHumans()}}</h5>
                                                @else
                                                    {{$tour->start}}
                                                @endif
                                            @endif
                                        @endforeach


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
                        <th >Will Start</th>
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
                                        @foreach ($agreements as $agreement)
                                            @if ($agreement->id==$tour->agreement_id)
                                                @if ($agreement->end)
                                                    <h5>{{$agreement->end->diffForHumans()}}</h5>
                                                @else
                                                    {{$tour->end}}
                                                @endif
                                            @endif
                                        @endforeach


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
                                    @foreach ($agreements as $agreement)
                                        @if ($agreement->id==$tour->agreement_id)
                                            @if ($agreement->start)
                                                <h5>{{$agreement->start->diffForHumans()}}</h5>
                                            @else
                                                {{$tour->start}}
                                            @endif
                                        @endif
                                    @endforeach
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
