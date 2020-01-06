@extends('layouts.admin')

@section('option')


  <button style="background-color:#39CCCC;" class="btn btn-block  text-white" onclick="show('operation1')">Drivers</button>
  <button style="background-color:#39CCCC;" class="btn btn-block  text-white" onclick="show('operation2')">Staff</button>
  <button style="background-color:#39CCCC;" class="btn btn-block  text-white" onclick="show('operation3')">Cliant</button>


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
                    {{'No Image'}}
                    @endif

                    {{$user->name}}
                </a></td>
                <td>{{$user->role->name}}</td>
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
                <td>{{$user->updated_at->diffForHumans()}}<br> {{$user->author}}</td>

              </tr>

            @endif
                        @endforeach

            @endif


        </tbody>
      </table>

  </div>



  <div id="operation2" style="display:none">

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

            @if ($user->role_id==2)
            <tr>

                <td><a href="{{route('users.show',$user->id)}}">
                    @if ($user->image)
                    <img class="rounded-circle mr-2" width="50" src="{{ asset('images/'.$user->image->path) }}" alt="No Image">
                    @else
                    {{'No Image'}}
                    @endif

                    {{$user->name}}
                </a></td>
                <td>{{$user->role->name}}</td>
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
                <td>{{$user->updated_at->diffForHumans()}}<br> {{$user->author}}</td>

              </tr>

            @endif
                        @endforeach

            @endif


        </tbody>
      </table>

  </div>

  <div id="operation3" style="display:none">
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

            @if ($user->role_id==4)
            <tr>

                <td><a href="{{route('users.show',$user->id)}}">
                    @if ($user->image)
                    <img class="rounded-circle mr-2" width="50" src="{{ asset('images/'.$user->image->path) }}" alt="No Image">
                    @else
                    {{'No Image'}}
                    @endif

                    {{$user->name}}
                </a></td>
                <td>{{$user->role->name}}</td>
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
                <td>{{$user->updated_at->diffForHumans()}}<br> {{$user->author}}</td>

              </tr>

            @endif
                        @endforeach

            @endif


        </tbody>
      </table>
  </div>







@endsection



@section('content')

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
        <tr>

            <td><a href="{{route('users.show',$user->id)}}">
                @if ($user->image)
                <img class="rounded-circle mr-2" width="50" src="{{ asset('images/'.$user->image->path) }}" alt="No Image">
                @else
                {{'No Image'}}
                @endif

                {{$user->name}}
            </a></td>
            <td>{{$user->role->name}}</td>
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
            <td>{{$user->updated_at->diffForHumans()}}<br> {{$user->author}}</td>

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
