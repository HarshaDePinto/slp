@extends('layouts.admin')

@section('option')
    {{--Buttons--}}
        <a href="{{route('users.index')}}"  style="background-color:#39CCCC;" class="btn btn-block  text-white" ><i class="fas fa-users"></i> USERS</a>
        <button style="background-color:#483D8B ;" class="btn btn-block  text-white" onclick="show('operation1')"><i class="fas fa-user-tie"></i> Drivers</button>
        <button style="background-color:#6A5ACD;" class="btn btn-block  text-white" onclick="show('operation2')"><i class="fas fa-user-shield"></i> Staff</button>
        <button style="background-color:#CD6155;" class="btn btn-block  text-white" onclick="show('operation3')"><i class="fas fa-trash-alt"></i> Trashed</button>



    {{--OPTIONS--}}
            {{--Driver--}}
                <div id="operation1" style="display:none">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center" >Driver</th>
                                <th >Role</th>
                                <th >Login Status</th>
                                <th >Updated At</th>

                            </tr>
                        </thead>
                        <tbody>
                            @if ($users)
                                @foreach ($users as $user)

                                    @if ($user->role_id==3)
                                        <tr>

                                            <td><a href="{{route('users.show',$user->id)}}">
                                                @if ($user->image)
                                                    <img class="rounded-circle mr-2" width="50" src="{{ asset('images/'.$user->image->path) }}" alt="No Image">
                                                @else
                                                    <img class="rounded-circle mr-2" width="50" src="{{ asset('images/no.png') }}" alt="No Image">
                                                @endif

                                                    {{$user->name}}</a>
                                            </td>
                                            <td>{{$user->role->name}}
                                            </td>
                                            <td>

                                                @if ($user->role_id!=1)

                                                    @if ($user->is_active==1)

                                                        <form class="form-inline" action="{{route('users.makeInactive',$user->id)}}" method="POST">
                                                        @csrf
                                                        <label class="text-primary mr-2" >Active</label>
                                                        <button type="submit" class="btn btn-danger btn-sm">Make Inactive</button>

                                                        </form>

                                                    @else
                                                        <form class="form-inline" action="{{route('users.makeActive',$user->id)}}" method="POST">
                                                        @csrf
                                                        <label class="text-danger mr-2" >Inactive</label>
                                                        <button type="submit" class="btn btn-primary btn-sm">Make Active</button>

                                                        </form>


                                                    @endif


                                                @else
                                                    <h6 class="text-danger">{{'Active'}}</h6>

                                                @endif
                                            </td>
                                            <td>{{$user->updated_at->diffForHumans()}}<br> {{$user->author}}
                                            </td>

                                        </tr>

                                    @endif
                                @endforeach

                            @endif


                        </tbody>
                    </table>

                </div>

            {{--Staff--}}

                <div id="operation2" style="display:none">

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center" >Staff</th>
                                <th >Role</th>
                                <th >Login Status</th>
                                <th >Updated At</th>

                            </tr>
                        </thead>
                        <tbody>
                            @if ($users)
                                @foreach ($users as $user)

                                    @if ($user->role_id==2)
                                        <tr>

                                            <td><a href="{{route('users.show',$user->id)}}">
                                                @if ($user->image)
                                                    <img class="rounded-circle mr-2" width="50" src="{{ asset('images/'.$user->image->path) }}" alt="No Image">
                                                @else
                                                    <img class="rounded-circle mr-2" width="50" src="{{ asset('images/no.png') }}" alt="No Image">
                                                @endif

                                                    {{$user->name}}</a>
                                            </td>
                                            <td>{{$user->role->name}}
                                            </td>
                                            <td>

                                                @if ($user->role_id!=1)

                                                    @if ($user->is_active==1)

                                                        <form class="form-inline" action="{{route('users.makeInactive',$user->id)}}" method="POST">
                                                            @csrf
                                                        <label class="text-primary mr-2" >Active</label>
                                                        <button type="submit" class="btn btn-danger btn-sm">Make Inactive</button>

                                                        </form>

                                                    @else
                                                        <form class="form-inline" action="{{route('users.makeActive',$user->id)}}" method="POST">
                                                            @csrf
                                                            <label class="text-danger mr-2" >Inactive</label>
                                                            <button type="submit" class="btn btn-primary btn-sm">Make Active</button>

                                                            </form>


                                                        @endif


                                                @else
                                                        <h6 class="text-danger">{{'Active'}}</h6>

                                                @endif

                                            </td>
                                            <td>{{$user->updated_at->diffForHumans()}}<br> {{$user->author}}
                                            </td>

                                        </tr>

                                    @endif
                                @endforeach

                            @endif


                        </tbody>
                    </table>

                </div>

            {{--Trashed--}}

                <div id="operation3" style="display:none">

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center" >Name</th>
                                <th >Role</th>
                                <th >Restore</th>
                                <th>Delete</th>
                                <th >Deleted At</th>

                            </tr>
                        </thead>
                        <tbody>
                            @if ($trashed)
                                @foreach ($trashed as $trash)


                                        <tr>

                                            <td>
                                                @if ($trash->image)
                                                    <img class="rounded-circle mr-2" width="50" src="{{ asset('images/'.$trash->image->path) }}" alt="No Image">
                                                @else
                                                    <img class="rounded-circle mr-2" width="50" src="{{ asset('images/no.png') }}" alt="No Image">
                                                @endif

                                                    {{$trash->name}}
                                            </td>
                                            <td>{{$trash->role->name}}
                                            </td>
                                            <td>
                                                <form action="{{route('user.restore',$trash->id)}}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-success ">RESTORE</button>
                                                </form>

                                            </td>
                                            <td>
                                                <form action="{{route('users.destroy',$trash->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger ">DELETE</button>
                                                </form>
                                            </td>
                                            <td>{{$trash->deleted_at->diffForHumans()}}
                                            </td>

                                        </tr>


                                @endforeach

                            @endif


                        </tbody>
                    </table>

                </div>

@endsection



@section('content')

    {{--MAIN--}}
        <div id="main_place">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-center" >User</th>
                        <th >Role</th>
                        <th >Login Status</th>
                        <th >Updated At</th>

                    </tr>
                </thead>
                <tbody>
                    @if ($users)
                        @foreach ($users as $user)
                            @if ($user->role_id!=1)
                            <tr>


                                <td>
                                    <div class="row">
                                        <div class="col-md-8 ">
                                            <a href="{{route('users.show',$user->id)}}">
                                                @if ($user->image)
                                                    <img class="rounded-circle mr-2" width="50" src="{{ asset('images/'.$user->image->path) }}" alt="No Image">
                                                @else
                                                    <img class="rounded-circle mr-2" width="50" src="{{ asset('images/no.png') }}" alt="No Image">
                                                @endif

                                                    {{$user->name}}</a>
                                        </div>
                                        <div class="col-md-4 ">
                                            <form action="{{route('users.destroy',$user->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger "><i class="far fa-window-close"></i></button>
                                            </form>
                                        </div>
                                    </div>



                                </td>
                                <td>{{$user->role->name}}
                                </td>
                                <td>

                                    @if ($user->role_id!=1)

                                        @if ($user->is_active==1)

                                            <form class="form-inline" action="{{route('users.makeInactive',$user->id)}}" method="POST">
                                            @csrf
                                            <label class="text-primary mr-2" >Active</label>
                                            <button type="submit" class="btn btn-danger btn-sm">Make Inactive</button>

                                            </form>

                                        @else
                                            <form class="form-inline" action="{{route('users.makeActive',$user->id)}}" method="POST">
                                                @csrf
                                                <label class="text-danger mr-2" >Inactive</label>
                                                <button type="submit" class="btn btn-primary btn-sm">Make Active</button>

                                            </form>


                                        @endif


                                    @else
                                        <h6 class="text-danger">{{'Active'}}</h6>

                                    @endif




                                </td>
                                <td>{{$user->updated_at->diffForHumans()}}<br> {{$user->author}}
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
