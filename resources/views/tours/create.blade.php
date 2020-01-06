@extends('layouts.admin')

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


@endsection

@section('option')


@endsection

@section('content')

<form action="{{isset($tour)?route('tours.update',$tour->id):route('tours.store')}}" method="POST" enctype="multipart/form-data" class="mb-5">
    @csrf
    @if (isset($tour))
        @method('PUT')
    @endif

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

<div class="mb-4"><h2>{{isset($tour)?$tour->title:'Please Enter Tour Information'}}</h2></div>


      <div class="form-group">
      <label class="font-weight-bold" for="title">Tour Title</label>
        <input type="text" class="form-control" name="title" value="{{isset($tour)?$tour->title:''}}">
      </div>


      <div class="form-group">
      <label class="font-weight-bold" for="number">Agreement Number</label>
        <input type="text" class="form-control" name="number" value="{{isset($tour)?$tour->number:''}}">
      </div>
        @if (!isset($tour))
        <input type="hidden" class="form-control" name="type" value="1">
        <input type="hidden" class="form-control" name="agreement_id" value="0">
        <input type="hidden" class="form-control" name="finance_id" value="0">
        @endif



        <div class="form-group">
            <label class="font-weight-bold" for="start"> Start Date And Time</label>
            <input type="text" class="form-control" id="start" name="start" value="{{isset($tour)?$tour->start:''}}">
          </div>

          <div class="form-group">
            <label class="font-weight-bold" for="end">End Date And Time</label>
            <input type="text" class="form-control" id="end"  name="end" value="{{isset($tour)?$tour->end:''}}">
          </div>
      <div class="form-group">
      <label class="font-weight-bold" for="client">Client Name</label>
        <input type="text" class="form-control" name="client" value="{{isset($tour)?$tour->client:''}}">
      </div>

      <div class="form-group">
      <label class="font-weight-bold" for="client_email">Client Email</label>
        <input type="text" class="form-control" name="client_email" value="{{isset($tour)?$tour->client_email:''}}">
      </div>


      <div class="form-group">
        <label class="font-weight-bold" for="price">Agreed Price</label>
        <input type="text" class="form-control" name="price" placeholder="Dollers" value="{{isset($tour)?$tour->price:''}}">
      </div>

      <div class="form-group">
        <label class="font-weight-bold" for="advanced">Advanced</label>
        <input type="text" class="form-control" name="advanced" placeholder="Dollers" value="{{isset($tour)?$tour->advanced:''}}">
      </div>

      <div class="form-group">
        <label class="font-weight-bold" for="dollar">Doller Rate</label>
        <input type="text" class="form-control" name="dollar" placeholder="" value="{{isset($tour)?$tour->dollar:''}}">
      </div>

      <div class="form-group">
        <label class="font-weight-bold" for="user_id">Driver</label>
        <select name="user_id" id="user_id" class="form-control ">
            @foreach ($drivers as $driver)
            @if ($driver->role_id==3 && $driver->status==1 )
        <option value="{{$driver->id}}"
            @if (isset($tour->user_id))
                selected
            @endif

            >{{$driver->name}}</option>
            @endif
            @endforeach



        </select>
      </div>

      <div class="form-group">
        <label class="font-weight-bold" for="vehicle_id">Vehicle</label>
        <select name="vehicle_id" id="vehicle_id" class="form-control">
            @foreach ($vehicles as $vehicle)
            @if ($vehicle->status==1)
        <option value="{{$vehicle->id}}"
            @if (isset($tour->vehicle_id))
                selected
            @endif


            >{{$vehicle->number}}</option>
            @endif
            @endforeach


        </select>
      </div>
      <div class="form-group">
        <label class="font-weight-bold" for="color">Select Color</label>
        <input type="color" class="form-control" name="color" value="{{isset($tour)?$tour->color:'#3352FF'}}">
      </div>

      <div class="form-group">
        <label class="font-weight-bold" for="author">Created By</label>
      <input type="text" class="form-control" name="author" value="{{ Auth::user()->name}}" readonly >
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-primary" name="submit" value="{{isset($tour)?'Update Tour':'Add Tour'}}">
      </div>



    </form>


@endsection

@section('script')

 <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
flatpickr('#start',{
    enableTime:true
});
flatpickr('#end',{
    enableTime:true
});

</script>



@endsection
