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




@endsection

@section('content')

    <h2 class="text-primary text-center">{{$tour->title}} Control Panel</h2>
        {{--Locations--}}
        <div class="card mb-5">
            <div class="card-header">
               <h3 class="text-primary">Fuel Information</h3>
            </div>
            <div class="card-body">
                <h5 class="card-title text-center">Details</h5>

                @if ($vehicle->fuels()->count()!=0)
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Location</th>
                            <th scope="col">Meter</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Liters</th>
                            <th scope="col">Created By</th>
                        </tr>
                        </thead>
                        <tbody>

                                @foreach ($vehicle->fuels as $fuel)
                                <tr>
                                    <td >{{$fuel->location}}</td>
                                    <td>
                                        {{$fuel->meter}}
                                    </td>

                                    <td>
                                        {{$fuel->amount}}
                                    </td>

                                    <td>
                                        {{$fuel->liters}}
                                    </td>
                                    <td>
                                        {{$fuel->author}}
                                    <br> {{$fuel->created_at->diffForHumans()}}
                                    </td>
                                    </tr>
                                @endforeach


                        </tbody>
                    </table>
                    @else
                    No Fuel
                    @endif





            </div>
        </div>

@endsection

@section('script')

@endsection




