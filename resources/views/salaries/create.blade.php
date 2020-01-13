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

    <a href="{{route('tour.salary',$tour->id)}}" style="background-color:#FF851B;" class="btn   btn-block  text-white" > Salary</a>




@endsection

@section('content')

    <h2 class="text-primary text-center">{{$tour->title}} Control Panel</h2>
        {{--Instruction Controller--}}
        <div class="card mb-5">
            <div class="card-header">
               <h3 class="text-primary">Salary Controller</h3>
            </div>
            <div class="card-body">
                <h5 class="card-title">Salary</h5>
                @if ($tour->salaries()->count()!=0)
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Daily Salary</th>
                            <th scope="col">Activities</th>
                            <th scope="col">Shopping</th>
                            <th scope="col">Other</th>
                        </tr>
                        </thead>
                        <tbody>





                                @foreach ($tour->salaries as $salary)
                                <tr>
                                    <td >{{$salary->salary}}</td>
                                    <td>
                                        {{$salary->activity}}
                                    </td>

                                    <td>
                                        {{$salary->shopping}}
                                    </td>

                                    <td>
                                        {{$salary->other}}
                                    </td>

                                    <td>{{$salary->author}}
                                        <br> {{$salary->updated_at->diffForHumans()}}</td>
                                    </tr>
                                @endforeach


                        </tbody>
                    </table>
                    @else
                    No Salary Details
                    @endif




                        <form action="{{route('salaries.store')}}" method="POST" enctype="multipart/            form-data"class="mb-5">
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
                            <label class="font-weight-bold" for="salary">Day salary</label>
                                <input type="text" class="form-control" name="salary" >
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold" for="activity">Activity Income</label>
                                    <input type="text" class="form-control" name="activity" >
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold" for="shopping">Shopping Income</label>
                                    <input type="text" class="form-control" name="shopping" >
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold" for="other">Other Income</label>
                                    <input type="text" class="form-control" name="other" >
                            </div>



                            <div class="form-group">
                                <input type="text" class="form-control" name="author" value="{{ Auth::user()->name}}" hidden >
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



