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

    <a href="{{route('tour.shops',$tour->id)}}" style="background-color:#FF851B;" class="btn   btn-block  text-white" > Shopping</a>




@endsection

@section('content')

    <h2 class="text-primary text-center">{{$tour->title}} Control Panel</h2>
        {{--Shopping--}}
        <div class="card mb-5">
            <div class="card-header">
               <h3 class="text-primary">Shopping</h3>
            </div>
            <div class="card-body">
                <h5 class="card-title text-center">Shopping</h5>
                @if ($tour->shops()->count()!=0)
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Details</th>
                            <th scope="col">Provider</th>
                            <th scope="col">Total Bill</th>
                            <th scope="col">Commission</th>
                            <th scope="col">Created By</th>
                        </tr>
                        </thead>
                        <tbody>

                                @foreach ($tour->shops as $shop)
                                <tr>
                                    <td >{{$shop->name}}</td>
                                    <td>
                                        {{$shop->provider}}
                                    </td>
                                    <td>
                                        {{$shop->bill}}
                                    </td>

                                    <td>
                                        {{$shop->commission}}
                                    </td>
                                    <td>
                                        {{$shop->author}}
                                    <br> {{$shop->created_at->diffForHumans()}}
                                    </td>
                                    </tr>
                                @endforeach


                        </tbody>
                    </table>
                    @else
                    No Shopping
                    @endif





            </div>
        </div>

@endsection

@section('script')

@endsection





