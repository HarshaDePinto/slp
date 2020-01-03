@extends('layouts.admin')

@section('content')

<div class="media">
    @if ($user->image)
    <img class="mr-3" width="200" src="{{ asset('images/'.$user->image->path) }}" alt="Generic placeholder image">
    @else
    {{'No Image'}}
    @endif


  <div class="media-body">
  <h2 class="mt-0 text-primary">

    {{$user->name}}

    <a href="{{route('users.edit',$user->id)}}" class="btn btn-info btn-sm text-white">Edit</a>

    <a href="{{route('users.changePassword',$user->id)}}" class="btn btn-info btn-sm text-white">Change Login</a>


</h2>
  <h5 class="mt-0 "><span class="text-info">Email: </span>{{$user->email}}</h5>
  <h5 class="mt-0 "><span class="text-info">ID: </span>{{$user->nic}}</h5>
  <h5 class="mt-0 "><span class="text-info">Users Licence: </span>{{$user->dln}}</h5>

  <h5 class="mt-0 "><span class="text-info">Contact Details: </span></h5><h5>{!!$user->tel!!}</h5>

  <h5 class="mt-0 "><span class="text-info">Bank Details: </span></h5><h5 class="mt-0 ">{!!$user->bank!!}</h5>

  <h5 class="mt-0 "><span class="text-info">Complain: </span></h5><h5 class="mt-0 ">{!!$user->complain!!}</h5>

  <h5 class="mt-0 "><span class="text-info">Note: </span></h5><h5 class="mt-0 ">{!!$user->note!!}</h5>

  <h5 class="mt-0 "><span class="text-info">Emergency: </span></h5><h5 class="mt-0 ">{!!$user->emergency!!}</h5>
  <h5 class="mt-0 "><span class="text-info">Address: </span></h5><h5 class="mt-0 ">{!!$user->address!!}</h5>




  </div>
</div>


@endsection
