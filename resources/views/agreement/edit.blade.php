@extends('layouts.admin')

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

@section('option')


@endsection
@section('content')

<form action="{{route('agreement.update',$agreement->id)}}" method="POST" enctype="multipart/form-data" class="mb-5">
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
            {{'Edit Agreement '.$agreement->number}}

        </h2></div>


    <div class="form-group">
        <h3>01.Passenger's Details</h3>
    <label class="font-weight-bold" for="passenger_details">Please Enter Following Details</label>
    <input id="passenger_details" type="hidden" name="passenger_details" value="{!!$agreement->passenger_details!!}">
    <trix-editor input="passenger_details"></trix-editor>
    </div>

    <div class="form-group">
        <h3>02.First Pick-up & Last Drop off Place</h3>
    <label class="font-weight-bold" for="start">Pick Up Date</label>
    <input type="text" class="form-control" id="start" name="start">
    <label class="font-weight-bold" for="start_details">Pick Up Details</label>
    <input id="start_details" type="hidden" name="start_details" value="{!!$agreement->start_details!!}">
    <trix-editor input="start_details"></trix-editor>

    <label class="font-weight-bold" for="end">Drop Off Date</label>
    <input type="text" class="form-control" id="end" name="end">
    <label class="font-weight-bold" for="end_details">Drop Off Details</label>
    <input id="end_details" type="hidden" name="end_details" value="{!!$agreement->end_details!!}">
    <trix-editor input="end_details"></trix-editor>
    </div>

    <div class="form-group">
        <h3>03.Hotel you stay in Sri Lanka</h3>
    <label class="font-weight-bold" for="hotel_details">Please Enter Following Details</label>
    <input id="hotel_details" type="hidden" name="hotel_details" value="{!!$agreement->hotel_details!!}">
    <trix-editor input="hotel_details"></trix-editor>
    </div>

    <div class="form-group">
        <h3>04.Things You Planning To Do In Your Tour</h3>
    <label class="font-weight-bold" for="plan_details">Please Enter Following Details</label>
    <input id="plan_details" type="hidden" name="plan_details" value="{!!$agreement->plan_details!!}">
    <trix-editor input="plan_details"></trix-editor>
    </div>

    <div class="form-group">
        <h3>05.Activities You Planning To Do In Your Tour</h3>
    <label class="font-weight-bold" for="activity_details">Please Enter Following Details</label>
    <input id="activity_details" type="hidden" name="activity_details" value="{!!$agreement->activity_details!!}">
    <trix-editor input="activity_details"></trix-editor>
    </div>

    <div class="form-group">
        <h3>06.About the Total cost</h3>
    <input id="cost_details" type="hidden" name="cost_details" value="{!!$agreement->cost_details!!}">

    <trix-editor input="cost_details"></trix-editor>

    <h6><u>CARD PAYMENT:</u></h6>
    <p class="text-danger">On arrival you have to pay Total cost + Government tax 03%
        If your Card fails, You should pay the total cost by cash.
        </p>
    </div>

    <div class="form-group">
        <h3>07.Payment method:</h3>
    <label class="font-weight-bold" for="payment_method"><p class="text-danger">Please pay the cost on following dates -
        </p></label>
    <input id="payment_method" type="hidden" name="payment_method" value="{!!$agreement->payment_method!!}">
    <trix-editor input="payment_method"></trix-editor>

    <h6><u>ABOUT PAYMENT: </u></h6>
    <ul>
        <li class="text-primary">We accept only cash </li>
        <li class="text-danger">MULTI ALTERED OR DEFACED CURRENCY NOTES OR COINS ARE NOT ACCEPTED.
            (WRITE, DRAW, STAMP, CUT OR DAMAGE CURRENCY)
             </li>
    </ul>
    </div>

    <div class="form-group">
        <h3>08.Total cost include the following: </h3>
    <label class="font-weight-bold" for="includes_details">Tour  -</label>
    <input id="includes_details" type="hidden" name="includes_details" value="{!!$agreement->includes_details!!}">
    <trix-editor input="includes_details"></trix-editor>
    </div>

    <div class="form-group">
        <h3>09.About driver accommodation and service:  </h3>

    <input id="accommodation_details" type="hidden" name="accommodation_details" value="{!!$agreement->accommodation_details!!}">
    <trix-editor input="accommodation_details"></trix-editor>
    </div>

    <div class="form-group">
        <h3 class="text_danger">CONDITIONS:  </h3>

    <input id="condition" type="hidden" name="condition" value="{!!$agreement->condition!!}">
    <trix-editor input="condition"></trix-editor>
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

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
flatpickr('#start');
flatpickr('#end');
</script>
@endsection
