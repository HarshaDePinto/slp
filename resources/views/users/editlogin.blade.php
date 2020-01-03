@extends('layouts.admin')

@section('content')

<div class="media">
    @if ($user->image)
    <img class="mr-3" width="200" src="{{ asset('images/'.$user->image->path) }}" alt="Generic placeholder image">
    @else
    {{'No Image'}}
    @endif


  <div class="media-body">
  <h2 class="mt-0 text-primary"> Change Log In Info </h2>

  <form action="{{route('users.editlogin',$user->id)}}" method="POST" enctype="multipart/form-data" class="mb-5">
    @csrf
    @method('PUT')

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
        <label class="font-weight-bold" for="password">Password</label>
        <input type="password" class="form-control" id="password"  name="password">
        </div>

    <div class="form-group">
    <label class="font-weight-bold" for="author">Update By</label>
    <input type="text" class="form-control" name="author" value="{{ Auth::user()->name}}" readonly >
    </div>

    <div class="form-group">
    <input type="submit" class="btn btn-primary" name="submit" value="Update">
    </div>

    </form>


  </div>
</div>


@endsection
