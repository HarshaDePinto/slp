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



    <a href="{{route('tour.summary',$tour->id)}}" style="background-color:#F30D3E;" class="btn   btn-block  text-white" ><i class="fas fa-chart-bar"></i> Summary</a>




@endsection

@section('content')

    <h2 class="text-primary text-center">{{$tour->title}} Control Panel</h2>
        {{--Instruction Controller--}}
        <div class="card mb-5">
            <div class="card-header">
               <h3 class="text-primary">Instruction Controller</h3>
            </div>
            <div class="card-body">
                <h5 class="card-title">Instructions</h5>
                @if ($tour->instructions()->count()!=0)
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Instruction</th>
                            <th scope="col">Status</th>
                            <th scope="col">Created</th>
                            <th scope="col">Updated</th>
                        </tr>
                        </thead>
                        <tbody>





                                @foreach ($tour->instructions as $intruction)
                                <tr>
                                    <td >{{$intruction->name}}</td>
                                    <td>
                                        @if ($intruction->status==0)
                                            <h5 class="text-primary">Pending</h5>
                                        @else
                                            <h4 class="text-success"><i class="fas fa-check-circle"></i></h4>
                                        @endif
                                    </td>
                                    <td>
                                        {{$intruction->author_c}}
                                    <br> {{$intruction->created_at->diffForHumans()}}
                                    </td>
                                    <td>{{$intruction->author_u}}
                                        <br> {{$intruction->updated_at->diffForHumans()}}</td>
                                    </tr>
                                @endforeach


                        </tbody>
                    </table>
                    @else
                    No Ins
                    @endif




                        <form action="{{route('instructions.store')}}" method="POST" enctype="multipart/            form-data"class="mb-5">
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
                            <label class="font-weight-bold" for="name">Instruction</label>
                                <input type="text" class="form-control" name="name" >
                            </div>



                            <div class="form-group">
                                <input type="text" class="form-control" name="author_c" value="{{ Auth::user()->name}}" hidden >
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary float-right" name="submit" value="Add">
                            </div>



                        </form>


            </div>
        </div>

@endsection

@section('script')

@endsection



