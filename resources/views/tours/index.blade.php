@extends('layouts.admin')

@section('option')
<a href="{{route('tours.create')}}" class="btn btn-primary btn-block dropdown">
    <i class="fas fa-plus"></i> Add Tour</a>


    <button style="background-color:#FF851B;" class="btn btn-block  text-white" onclick="show('operation1')">On Going</button>
    <button style="background-color:#FF851B;" class="btn btn-block  text-white" onclick="show('operation2')">Confirm</button>
    <button style="background-color:#FF851B;" class="btn btn-block  text-white" onclick="show('operation3')">Pending</button>
    <button style="background-color:#FF851B;" class="btn btn-block  text-white" onclick="show('operation4')">Complete</button>
    <button style="background-color:#FF851B;" class="btn btn-block  text-white" onclick="show('operation5')">Cancelled</button>

    <div id="operation1" style="display:none">
        <table class="table table-hover">
            <thead>
              <tr>
                <th class="text-center" >Title</th>
                <th >Will End</th>
                <th >Location</th>
                <th >Updated At</th>

              </tr>
            </thead>
            <tbody>
                @if ($tours)
                @foreach ($tours as $tour)

                @if ($tour->start<=date('Y-m-d H:i:s') && $tour->end>=date('Y-m-d H:i:s') )
                <tr>

                    <td><a href="{{route('tours.show',$tour->id)}}">
                        {{$tour->title}}
                    </a></td>
                    <td>{{"end"}}</td>

                    <td>{{$tour->updated_at->diffForHumans()}}<br> {{$tour->author}}</td>

                  </tr>
                @endif

                @endforeach

                @endif


            </tbody>
          </table>

    </div>

{{-- End Of OnGoing --}}
<div id="operation2" style="display:none">
    <table class="table table-hover">
        <thead>
          <tr>
            <th class="text-center" >Title</th>
            <th >Will Start</th>
            <th >Status</th>
            <th >Updated At</th>

          </tr>
        </thead>
        <tbody>
            @if ($tours)
            @foreach ($tours as $tour)

            @if ($tour->status==1)
            <tr>

                <td><a href="{{route('tours.show',$tour->id)}}">


                    {{$tour->title}}
                </a></td>
                <td>{{'start'}}</td>
                <td>{{'status'}}</td>

                <td>{{$tour->updated_at->diffForHumans()}}<br> {{$tour->author}}</td>

              </tr>
            @endif

            @endforeach

            @endif


        </tbody>
      </table>

</div>

{{-- End Of Available --}}
<div id="operation3" style="display:none">

</div>

    @endsection


@section('content')
<div id="main_place">

    <table class="table table-hover">
        <thead>
          <tr>
            <th class="text-center" >Title</th>
            <th >Date</th>
            <th >Status</th>
            <th >Updated At</th>

          </tr>
        </thead>
        <tbody>
            @if ($tours)
            @foreach ($tours as $tour)
            <tr >

                <td><a href="{{route('tours.show',$tour->id)}}">

                    {{$tour->title}}
                </a></td>
                <td>{{$tour->start}}</td>
                <td>


                    {{date('Y-m-d H:i:s')}}



                </td>
                <td bgcolor="{{$tour->color}}" class="text-white">{{$tour->updated_at->diffForHumans()}}<br> {{$tour->author}}</td>

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
