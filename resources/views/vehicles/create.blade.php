@extends('layouts.admin')

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

@section('option')


@endsection

@section('content')

<form action="{{route('vehicles.store')}}" method="POST" enctype="multipart/form-data" class="mb-5">
    @csrf

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

    <div class="mb-4"><h2>Please Enter Vehical Information</h2></div>
    <h3 class="text-center">General Information</h3>


      <div class="form-group">
      <label class="font-weight-bold" for="number">Vehical Number</label>
        <input type="text" class="form-control" name="number" >
      </div>


      <div class="form-group">
      <label class="font-weight-bold" for="name">Name</label>
        <input type="text" class="form-control" name="name">
      </div>
      <div class="form-group">
      <label class="font-weight-bold" for="color">Vehicle Colour</label>
        <input type="text" class="form-control" name="color">
      </div>
      <div class="form-group">
      <label class="font-weight-bold" for="seat">Number of Seats</label>
        <input type="text" class="form-control" name="seat">
      </div>

      <div class="form-group">
      <label class="font-weight-bold" for="owner">Vehical Owner</label>
        <input type="text" class="form-control" name="owner">
      </div>


      <div class="form-group">
        <label class="font-weight-bold" for="sMilage">Meter Reading</label>
        <input type="text" class="form-control" name="sMilage">
      </div>

      <div class="form-group">
        <label class="font-weight-bold" for="next_service">Next Service</label>
        <input type="text" class="form-control" name="next_service" placeholder="in km ">
      </div>

      <div class="form-group">
        <label class="font-weight-bold" for="engine_oil">Engine Oil Type</label>
        <input type="text" class="form-control" name="engine_oil" placeholder="">
      </div>

      <div class="form-group">
        <label class="font-weight-bold" for="gear_oil">Gear Oil Type</label>
        <input type="text" class="form-control" name="gear_oil" placeholder="">
      </div>

      <div class="form-group">
        <label class="font-weight-bold" for="gear_oil_change">Next Gear Oil Change</label>
        <input type="text" class="form-control" name="gear_oil_change" placeholder="km">
      </div>

      <div class="form-group">
        <label class="font-weight-bold" for="ac">AC Modal</label>
        <input type="text" class="form-control" name="ac" placeholder="">
      </div>

      <div class="form-group">
        <label class="font-weight-bold" for="tyre_pressure">Tyre Pressure</label>
        <input type="text" class="form-control" name="tyre_pressure" placeholder="PSI">
      </div>

      <div class="form-group">
        <label class="font-weight-bold" for="tyre_size">Tyre Size</label>
        <input type="text" class="form-control" name="tyre_size" placeholder="mm">
      </div>

      <div class="form-group">
        <label class="font-weight-bold" for="tyre_air">Tyre Air Type</label>
        <input type="text" class="form-control" name="tyre_air" placeholder="Normal or Nitrogen">
      </div>

      <div class="form-group">
        <label class="font-weight-bold" for="break_pad">Brake Pad Modal</label>
        <input type="text" class="form-control" name="break_pad" placeholder="">
      </div>

      <div class="form-group">
        <label class="font-weight-bold" for="brak_oil">Brake Oil Type</label>
        <input type="text" class="form-control" name="brak_oil" placeholder="">
      </div>



      <div class="form-group">
        <label class="font-weight-bold" for="fuel_type">Fuel Type</label>
        <input type="text" class="form-control" name="fuel_type" placeholder="Patrol 92/95 or Disal">
      </div>

      <div class="form-group">
        <label class="font-weight-bold" for="engine_number">Engine Number</label>
        <input type="text" class="form-control" name="engine_number" placeholder=" ">
      </div>

      <div class="form-group">
        <label class="font-weight-bold" for="chase_number">Chassis No</label>
        <input type="text" class="form-control" name="chase_number"  >
      </div>


      <div class="form-group">
        <label class="font-weight-bold" for="license_exp"> License Expire Date</label>
        <input type="date" class="form-control" id="license_exp" name="license_exp">
      </div>




      <div class="form-group">
        <label class="font-weight-bold" for="insurance_exp"> Insurance Expire Date</label>
        <input type="date" class="form-control" id="insurance_exp" name="insurance_exp">
      </div>

      <div class="form-group">
        <label  class="font-weight-bold" for="image_id"> Image</label>
        <input type="file" name="image_id">
      </div>

      <div class="form-group">
        <label class="font-weight-bold" for="author">Created By</label>
      <input type="text" class="form-control" name="author" value="{{ Auth::user()->name}}" readonly >
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-primary" name="submit" value="Add Vehical">
      </div>



    </form>


@endsection

@section('script')
 <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
flatpickr('#license_exp');
flatpickr('#insurance_exp');
</script>



@endsection
