@extends('layouts.admin')
    {{--CSS--}}
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        @section('css')

        @endsection
@section('option')

@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h4 class="text-primary d-inline">Salary Report</h4>
            <a class="btn btn-sm btn-primary" href="{{action('HistoryController@driverPDF',[$user->id,$start,$end])}}">PDF</a>
        <h4 class="">From <span class="text-primary">{{date('l jS F Y',strtotime($start))}}</span>  To <span class="text-primary">{{date('l jS F Y',strtotime($end))}}</span> </h4>

                @if ($user->salaries()->count()!=0)
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Salary</th>
                        <th scope="col">Activity</th>
                        <th scope="col">Shopping</th>
                        <th scope="col">Other</th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($user->salaries as $salary)

                        @if ($salary->created_at->format('Y-m-d')>=$start&&$salary->created_at->format('Y-m-d')<=$end)
                        <tr>
                            <td>{{$salary->created_at->format('Y-M-d')}}</td>
                            <td>{{$salary->salary}}</td>
                            <td>{{$salary->activity}}</td>
                            <td>{{$salary->shopping}}</td>
                            <td>{{$salary->other}}</td>


                        </tr>
                        @endif

                         @endforeach


                    </tbody>
                    </table>




                    @else
                    No salary Details Available
                    @endif




            </div>
        <div class="col-md-4">

            {{--Search--}}


                </div>
            </div>



@endsection


@section('script')





@endsection

