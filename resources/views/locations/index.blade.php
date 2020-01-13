@extends('layouts.admin')

@section('css')
@endsection


@section('option')
    <a href="{{route('tours.index')}}" class="btn btn-success btn-block">
        <i class="far fa-map"></i> Tours</a>

    <a href="{{route('tours.show',$tour->id)}}" class="btn btn-primary btn-block  text-white" ><i class="fas fa-backward"></i> {{$tour->number}}</a>

    <a href="{{route('tours.edit',$tour->id)}}" class="btn btn-info btn-block  text-white" >
        <i class="fas fa-edit"></i>Edit Tour</a>

    <a href="{{route('tour.manage',$tour->id)}}" style="background-color:#FF851B;" class="btn   btn-block  text-white" > Instructions </a>

    <a href="{{route('tour.locations',$tour->id)}}" style="background-color:#FF851B;" class="btn   btn-block  text-white" > Locations </a>
    <a href="{{route('tour.fuels',$tour->id)}}" style="background-color:#FF851B;" class="btn   btn-block  text-white" > Fuel Info </a>

    <a href="{{route('tour.maintenances',$tour->id)}}" style="background-color:#FF851B;" class="btn   btn-block  text-white" > Maintenances</a>

    <a href="{{route('tour.activities',$tour->id)}}" style="background-color:#FF851B;" class="btn   btn-block  text-white" > Activities</a>




@endsection

@section('content')

    <h2 class="text-primary text-center">{{$tour->title}} Control Panel</h2>
        {{--Locations--}}
        <div class="card mb-5">
            <div class="card-header">
               <h3 class="text-primary">Locations</h3>
            </div>
            <div class="card-body">
                <h5 class="card-title text-center">Locations</h5>
                @if ($tour->locations()->count()!=0)
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Location</th>
                            <th scope="col">Km</th>
                            <th scope="col">Created By</th>
                        </tr>
                        </thead>
                        <tbody>

                                @foreach ($tour->locations as $location)
                                <tr>
                                    <td >{{$location->location}}</td>
                                    <td>
                                        {{$location->c_meter-$location->s_meter}}
                                    </td>
                                    <td>
                                        {{$location->author}}
                                    <br> {{$location->created_at->diffForHumans()}}
                                    </td>
                                    </tr>
                                @endforeach


                        </tbody>
                    </table>
                    @else
                    No Location
                    @endif





            </div>
        </div>

@endsection

@section('script')

@endsection



