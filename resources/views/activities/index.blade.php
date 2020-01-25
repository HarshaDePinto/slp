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

    <h2 class="text-primary text-center">{{$tour->title}} Control Panel</h2>
        {{--Activities--}}
        <div class="card mb-5">
            <div class="card-header">
               <h3 class="text-primary">Activities</h3>
            </div>
            <div class="card-body">
                <h5 class="card-title text-center">Activities</h5>
                @if ($tour->activities()->count()!=0)
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Activity</th>
                            <th scope="col">Provider</th>
                            <th scope="col">From Client</th>
                            <th scope="col">To Provider</th>
                            <th scope="col">Commission</th>
                            <th scope="col">Created By</th>
                        </tr>
                        </thead>
                        <tbody>

                                @foreach ($tour->activities as $activity)
                                <tr>
                                    <td >{{$activity->name}}</td>
                                    <td>
                                        {{$activity->provider}}
                                    </td>
                                    <td>
                                        {{$activity->f_client}}
                                    </td>
                                    <td>
                                        {{$activity->t_provider}}
                                    </td>
                                    <td>
                                        {{$activity->commission}}
                                    </td>
                                    <td>
                                        {{$activity->author}}
                                    <br> {{$activity->created_at->diffForHumans()}}
                                    </td>
                                    </tr>
                                @endforeach


                        </tbody>
                    </table>
                    @else
                    No Activity
                    @endif





            </div>
        </div>

@endsection

@section('script')

@endsection



