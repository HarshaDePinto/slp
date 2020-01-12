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



