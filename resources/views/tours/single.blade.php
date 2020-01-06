@extends('layouts.admin')

@section('option')
<a href="{{route('tours.edit',$tour->id)}}" class="btn btn-info btn-block  text-white" >
    <i class="fas fa-edit"></i>Edit Tour</a>

<a style="color:{{$tour->color}};" href="{{route('agreement.edit',$tour->agreement_id)}}" class="btn btn-info  btn-block  text-white" >
        <i class="fas fa-edit"></i>Agreement</a>

@endsection

@section('content')

<div class="media">


  <div class="media-body">
  <h2 class="mt-0" style="color:{{$tour->color}};">

    {{$tour->title}}



</h2>
<h5 class="mt-0 "><span class="text-info">Driver:</span> {{$driver->name}}</h5>

  <h5 class="mt-0 "><span class="text-info">Vehicle: </span>{{$vehicle->name}} </h5>

  <h5 class="mt-0 "><span class="text-info">Users Licence: </span> </h5>




  </div>
</div>


@endsection
