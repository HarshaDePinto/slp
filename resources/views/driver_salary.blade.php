
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"

      crossorigin="anonymous"
    />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>
  <body>
      <div class="container">
        <img height="50" class="" src="{{asset('images/logo.png')}}" alt="">
        <h4 class="text-primary d-inline text-center">Sri Lanka Personal Drivers</h4>
        <div class="card mb-5">
            <div class="card-header">

            </div>
            <div class="card-body">
                <h4 class="text-primary">
                    @if ($user->image)
                    <img class="rounded mr-2" width="50" src="{{ asset('images/'.$user->image->path) }}" alt="No Image">
                    @else
                    <img class="rounded-circle mr-2" width="50" src="{{ asset('images/no.png') }}" alt="No Image">
                    @endif

                                                    {{$user->name}}
                </h4>

                <h4 class="text-primary d-inline">Salary Report</h4>

                <h5 class="">From <span class="text-primary">{{date('l jS F Y',strtotime($start))}}</span>  To <span class="text-primary">{{date('l jS F Y',strtotime($end))}}</span> </h5>

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

        </div>


        </div>
        <footer id="sticky-footer" class="fixed-bottom py-2 text-50">
            <div class="text-right">
                <p class="mb-0 mr-3">Copyright
                    {{date('g:ia \o\n l jS F Y')}}
                © <a href="">Harsha De Pinto</a></p>
            </div>
        </footer>
  </body>
</html>
