@extends('layouts.admin')

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

@section('option')
    <a href="{{route('vehicles.index')}}" style="background-color:#FF851B;" class="btn text-white  btn-block">
    <i class="fas fa-car"></i> Vehicles</a>
    @if (isset($vehicle))
    <a href="{{route('vehicles.show',$vehicle->id)}}"  class="btn text-white  btn-block btn-primary">
        <i class="fas fa-fast-backward"></i> {{$vehicle->number}}</a>
    @endif


@endsection

@section('content')

        <form action="{{isset($vehicle)?route('vehicles.update',$vehicle->id):route('vehicles.store')}}" method="POST" enctype="multipart/form-data" class="mb-5">
            @csrf
        @if (isset($vehicle))

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

            <div class="mb-4"><h2>{{isset($vehicle)?'Edit The Vehicle '.$vehicle->number:'Please Enter Vehical Information'}}</h2></div>
            <h3 class="text-center">General Information</h3>


            <div class="form-group">
            <label class="font-weight-bold" for="number">Vehical Number</label>
            <input type="text" class="form-control" name="number" required  value="{{isset($vehicle)?$vehicle->number:''}}">
            </div>


            <div class="form-group">
            <label class="font-weight-bold" for="name">Name</label>
                <input type="text" class="form-control" name="name" required value="{{isset($vehicle)?$vehicle->name:''}}">
            </div>
            <div class="form-group">
            <label class="font-weight-bold" for="color">Vehicle Colour</label>
                <input type="text" class="form-control" name="color" value="{{isset($vehicle)?$vehicle->color:''}}">
            </div>
            <div class="form-group">
            <label class="font-weight-bold" for="seat">Number of Seats</label>
                <input type="text" class="form-control" name="seat" value="{{isset($vehicle)?$vehicle->seat:''}}">
            </div>

            <div class="form-group">
            <label class="font-weight-bold" for="owner">Vehical Owner</label>
                <input type="text" class="form-control" name="owner" value="{{isset($vehicle)?$vehicle->owner:''}}">
            </div>


            <div class="form-group">
                <label class="font-weight-bold" for="sMilage">Meter Reading</label>
                <input type="text" class="form-control" name="sMilage" required value="{{isset($vehicle)?$vehicle->sMilage:''}}">
            </div>

            <div class="form-group">
                <label class="font-weight-bold" for="next_service">Next Service</label>
                <input type="text" class="form-control" name="next_service" placeholder="in km " required value="{{isset($vehicle)?$vehicle->next_service:''}}">
            </div>

            <div class="form-group">
                <label class="font-weight-bold" for="engine_oil">Engine Oil Type</label>
                <input type="text" class="form-control" name="engine_oil" placeholder="" value="{{isset($vehicle)?$vehicle->engine_oil:''}}">
            </div>

            <div class="form-group">
                <label class="font-weight-bold" for="gear_oil">Gear Oil Type</label>
                <input type="text" class="form-control" name="gear_oil" placeholder="" value="{{isset($vehicle)?$vehicle->gear_oil:''}}">
            </div>

            <div class="form-group">
                <label class="font-weight-bold" for="gear_oil_change">Next Gear Oil Change</label>
                <input type="text" class="form-control" name="gear_oil_change" placeholder="km" required value="{{isset($vehicle)?$vehicle->gear_oil_change:''}}">
            </div>

            <div class="form-group">
                <label class="font-weight-bold" for="ac">AC Modal</label>
                <input type="text" class="form-control" name="ac" placeholder="" value="{{isset($vehicle)?$vehicle->ac:''}}">
            </div>

            <div class="form-group">
                <label class="font-weight-bold" for="tyre_pressure">Tyre Pressure</label>
                <input type="text" class="form-control" name="tyre_pressure" placeholder="PSI" value="{{isset($vehicle)?$vehicle->tyre_pressure:''}}">
            </div>

            <div class="form-group">
                <label class="font-weight-bold" for="tyre_size">Tyre Size</label>
                <input type="text" class="form-control" name="tyre_size" placeholder="mm" value="{{isset($vehicle)?$vehicle->tyre_size:''}}">
            </div>

            <div class="form-group">
                <label class="font-weight-bold" for="tyre_air">Tyre Air Type</label>
                <input type="text" class="form-control" name="tyre_air" placeholder="Normal or Nitrogen" value="{{isset($vehicle)?$vehicle->tyre_air:''}}">
            </div>

            <div class="form-group">
                <label class="font-weight-bold" for="break_pad">Brake Pad Modal</label>
                <input type="text" class="form-control" name="break_pad" placeholder="" value="{{isset($vehicle)?$vehicle->break_pad:''}}">
            </div>

            <div class="form-group">
                <label class="font-weight-bold" for="brak_oil">Brake Oil Type</label>
                <input type="text" class="form-control" name="brak_oil" placeholder="" value="{{isset($vehicle)?$vehicle->brak_oil:''}}">
            </div>



            <div class="form-group">
                <label class="font-weight-bold" for="fuel_type">Fuel Type</label>
                <input type="text" class="form-control" name="fuel_type" placeholder="Patrol 92/95 or Disal" value="{{isset($vehicle)?$vehicle->fuel_type:''}}">
            </div>

            <div class="form-group">
                <label class="font-weight-bold" for="engine_number">Engine Number</label>
                <input type="text" class="form-control" name="engine_number" placeholder=" " value="{{isset($vehicle)?$vehicle->engine_number:''}}">
            </div>

            <div class="form-group">
                <label class="font-weight-bold" for="chase_number">Chassis No</label>
                <input type="text" class="form-control" name="chase_number" value="{{isset($vehicle)?$vehicle->chase_number:''}}" >
            </div>


            <div class="form-group">
                <label class="font-weight-bold" for="license_exp"> License Expire Date</label>
                <input type="text" class="form-control" id="license_exp" name="license_exp" required value="{{isset($vehicle)?$vehicle->license_exp:''}}">
            </div>




            <div class="form-group">
                <label class="font-weight-bold" for="insurance_exp"> Insurance Expire Date</label>
                <input type="text" class="form-control" id="insurance_exp" name="insurance_exp" required value="{{isset($vehicle)?$vehicle->insurance_exp:''}}">
            </div>

            <div class="form-group">
               @if (isset($vehicle))
               @if ($vehicle->image)
                    <img class="rounded mr-2" width="200" src="{{ asset('images/'.$vehicle->image->path) }}" alt="No Image">
                    @else
                    <img class="rounded mr-2" width="200" src="{{ asset('images/vehicle.jpg') }}" alt="No Image">
                    @endif

               @endif
            </div>

            <div class="form-group">
                <label  class="font-weight-bold" for="image_id"> Image</label>
                <input type="file" name="image_id">
            </div>

            <div class="form-group">
            <label class="font-weight-bold" for="author">{{isset($vehicle)?'Updated By':'Created By'}}</label>
            <input type="text" class="form-control" name="author" value="{{ Auth::user()->name}}" readonly >
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="submit" value="{{isset($vehicle)?'Update vehicle':'Add Vehicle'}}">
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
