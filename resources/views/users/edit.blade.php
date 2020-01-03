@extends('layouts.admin')

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css" rel="stylesheet">
@endsection
@section('content')

<form action="{{route('users.update',$user->id)}}" method="POST" enctype="multipart/form-data" class="mb-5">
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

    <div class="mb-4">

        <h2 class="text-success text-center">
            {{'Edit Profile '.$user->name}}

        </h2></div>


    <div class="form-group">
    <label class="font-weight-bold" for="name">Name</label>
    <input type="text" class="form-control" id="name"  name="name" value="{{$user->name}}">
    </div>

    <div class="form-group">
    <label class="font-weight-bold" for="email">Email</label>
    <input type="email" id="email"  class="form-control" name="email" value="{{$user->email}}">
    </div>


    <div class="form-group">
    <label class="font-weight-bold" for="tel">TEL Number</label>
    <input id="tel" type="hidden" name="tel" value="{{$user->tel}}">
    <trix-editor input="tel"></trix-editor>
    </div>

    <div class="form-group">
    <label class="font-weight-bold" for="nic">NIC Number</label>
    <input type="text" class="form-control" id="nic"  name="nic" value="{{$user->nic}}">
    </div>

    <div class="form-group">
    <label class="font-weight-bold" for="dln">Driving Licence Number</label>
    <input type="text" class="form-control" id="dln"  name="dln" value="{{$user->dln}}">
    </div>

    <div class="form-group">
    <label class="font-weight-bold" for="bank">Bank Details</label>
    <input id="bank" type="hidden" name="bank"   value="{{$user->bank}}">
    <trix-editor input="bank"></trix-editor>
    </div>

    <div class="form-group">
    <label class="font-weight-bold" for="address">Address</label>
    <input id="address" type="hidden" name="address" value="{{$user->address}}">
    <trix-editor input="address"></trix-editor>
    </div>


    <div class="form-group">
    <label class="font-weight-bold" for="emergency"> In An Emergency</label>
    <input id="emergency" type="hidden" name="emergency" value="{{$user->emergency}}">
    <trix-editor input="emergency"></trix-editor>
    </div>


    <div class="form-group">
        @if ($user->image)
                <img class="mr-3" width="200" src="{{ asset('images/'.$user->image->path) }}" alt="No Image">
                @else
                {{'No Image'}}
                @endif
    </div>



    <div class="form-group">
    <label  class="font-weight-bold" for="image_id"> Image</label>
    <input type="file" name="image_id">
    </div>

    <div class="form-group">
    <label class="font-weight-bold" for="author">Update By</label>
    <input type="text" class="form-control" name="author" value="{{ Auth::user()->name}}" readonly >
    </div>

    <div class="form-group">
    <input type="submit" class="btn btn-primary" name="submit" value="Update">
    </div>

    </form>

@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
@endsection
