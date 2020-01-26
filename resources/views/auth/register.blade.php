@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="background:transparent url({{asset('images/image7.jpg')}}) no-repeat center center /cover">
        <div class="col-md-8">
            <div class="card" style="opacity: 0.9;">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role_id" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                            <div class="col-md-6">

                                <select id="role_id"  name="role_id" class="form-control  " required>
                                    <option  >--Please Select--</option>
                                    <option value= 3 >Driver</option>
                                    <option value= 2 >Staff</option>
                                    <option value= 4 >Cliant</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>




                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<h2 class="text-center text-dark mt-4">City Tours</h2>
    <h5 class="text-center text-secondary mb-4">Travel with Sri Lankan Personal Drivers</h5>
<div class="container">
    <div class="row no-gutters">


            <div class="container1">
                <img src="{{ asset('images/col.gif') }}" alt="Avatar" class="image1">
                <div class="top-right"><p> City Tours </p></div>
                <div class="overlay1">
                    <div class="text">

                    <h2><a class="text-white mt-4"  href="http://www.srilankanpersonaldrivers.com/colombo.html">Colombo</a></h2>
                    <p>Colombo, the capital of Sri Lanka, has a long history as a port on ancient east-west trade routes, ruled successively by the Portuguese, Dutch and British.</p>
                    </div>
                </div>
                <div class="overlay"><h2 ><a class="text-white" href="http://www.srilankanpersonaldrivers.com/colombo.html">Colombo</a></h2></div>
                </div>




            <div class="container1">
                <img src="{{ asset('images/Negombo.gif') }}" alt="Avatar" class="image1">
                <div class="top-right"><p> City Tours </p></div>
                <div class="overlay1">
                    <div class="text">

                    <h2><a class="text-white mt-4" href="http://www.srilankanpersonaldrivers.com/negombo.html">Negombo</a></h2>
                    <p>Negombo is a city on the west coast of Sri Lanka, north of the capital, Colombo. Near the waterfront, the remains of the 17th-century Dutch Fort now house a prison. </p>
                    </div>
                </div>
                <div class="overlay"> <h2><a class="text-white mt-4" href="http://www.srilankanpersonaldrivers.com/negombo.html">Negombo</a></h2></div>
                </div>

                <div class="container1">
                    <img src="{{ asset('images/galle.gif') }}" alt="Avatar" class="image1">
                    <div class="top-right"><p> City Tours </p></div>
                    <div class="overlay1">
                        <div class="text">
                        <h2><a class="text-white mt-4" href="http://www.srilankanpersonaldrivers.com/galle.html">Galle</a></h2>

                        <p >Galle is a city on the southwest coast of Sri Lanka. It’s known for Galle Fort, the fortified old city founded by Portuguese colonists in the 16th century.</p>
                        </div>
                    </div>
                    <div class="overlay"> <h2><a class="text-white mt-4" href="http://www.srilankanpersonaldrivers.com/galle.html">Galle</a></h2></div>
                    </div>

                <div class="container1">
                        <img src="{{ asset('images/kandy.gif') }}" alt="Avatar" class="image1">
                        <div class="top-right"><p> City Tours </p></div>
                        <div class="overlay1">
                            <div class="text">
                            <h2><a class="text-white mt-4" href="http://www.srilankanpersonaldrivers.com/kandy.html">Kandy</a></h2>

                            <p>The MaldivesKandy is a large city in central Sri Lanka. It's set on a plateau surrounded by mountains, which are home to tea plantations and biodiverse rainforest.</p>
                            </div>
                        </div>
                        <div class="overlay"> <h2><a class="text-white mt-4" href="http://www.srilankanpersonaldrivers.com/kandy.html">Kandy</a></h2></div>
                        </div>

    </div>


    <div class="row no-gutters">


        <div class="container1">
            <img src="{{ asset('images/anu.gif') }}" alt="Avatar" class="image1">
            <div class="top-right"><p> City Tours </p></div>
            <div class="overlay1">
                <div class="text">

                <h2><a class="text-white mt-4"  href="http://www.srilankanpersonaldrivers.com/anuradhapura.html">Anuradhapura</a></h2>
                <p class="hidden-md">Anuradhapura is a major city in Sri Lanka. It is the capital city of North Central Province, Sri Lanka and the capital of Anuradhapura District.</p>
                </div>
            </div>
            <div class="overlay"><h2><a class="text-white mt-4"  href="http://www.srilankanpersonaldrivers.com/anuradhapura.html">Anuradhapura</a></h2></div>
            </div>




        <div class="container1">
            <img src="{{ asset('images/jaffna.gif') }}" alt="Avatar" class="image1">
            <div class="top-right"><p> City Tours </p></div>
            <div class="overlay1">
                <div class="text">

                <h2><a class="text-white mt-4" href="http://www.srilankanpersonaldrivers.com/jaffna.html">Jaffna</a></h2>
                <p >Jaffna is a city on the northern tip of Sri Lanka. Nallur Kandaswamy is a huge Hindu temple with golden arches and an ornate gopuram tower. </p>
                </div>
            </div>
            <div class="overlay"> <h2><a class="text-white mt-4" href="http://www.srilankanpersonaldrivers.com/jaffna.html">Jaffna</a></h2></div>
            </div>

            <div class="container1">
                <img src="{{ asset('images/mirissa.gif') }}" alt="Avatar" class="image1">
                <div class="top-right"><p> City Tours </p></div>
                <div class="overlay1">
                    <div class="text">

                    <h2><a class="text-white mt-4" href="http://www.srilankanpersonaldrivers.com/Mirissa.html">Mirissa</a></h2>

                    <p>Mirissa is a small town on the south coast of Sri Lanka, located in the Matara District of the Southern Province. It is approximately 150 kilometres south of Colombo and is situated at an elevation of 4 metres above sea level.</p>
                    </div>
                </div>
                <div class="overlay"> <h2><a class="text-white mt-4" href="http://www.srilankanpersonaldrivers.com/Mirissa.html">Mirissa</a></h2></div>
                </div>

            <div class="container1">
                    <img src="{{ asset('images/1.gif') }}" alt="Avatar" class="image1">
                    <div class="top-right"><p> City Tours </p></div>
                    <div class="overlay1">
                        <div class="text">

                        <h2><a class="text-white mt-4" href="http://www.srilankanpersonaldrivers.com/sigiriya.html">Sigiriya</a></h2>

                        <p>Sigiriya or Sinhagiri is an ancient rock fortress located in the northern Matale District near the town of Dambulla in the Central Province, Sri Lanka.</p>
                        </div>
                    </div>
                    <div class="overlay"> <h2><a class="text-white mt-4" href="http://www.srilankanpersonaldrivers.com/sigiriya.html">Sigiriya</a></h2></div>
                    </div>

</div>

</div>







<div class="container my-5">
    <h2 class="text-center text-dark mt-4">Day Tours</h2>
    <h5 class="text-center text-secondary mb-4">Travel with Sri Lankan Personal Drivers</h5>
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <img class="center" width="250" src="{{ asset('images/elephant-orp.gif') }}" />
                </div>
                <div class="col-md-6">
                    <h3 class="mt-2"><a href="http://www.srilankanpersonaldrivers.com/elephant.html"> Elephant Orphanage</a></h3>
                    <p>Pinnawala Elephant Orphanage is an orphanage, nursery and captive breeding ground for wild Asian elephants located at Pinnawala village</p>
                    <a href="http://www.srilankanpersonaldrivers.com/elephant.html" class="btn btn-primary float-right">more</a>
                </div>
            </div>

        </div>
        <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <img class="center" width="250" src="{{ asset('images/dambulla.gif') }}" />
                    </div>
                    <div class="col-md-6">
                        <h3><a href="http://www.srilankanpersonaldrivers.com/dambulla.html">Dambulla</a></h3>
                        <p>Dambulla is a town, situated in the Matale District, Central Province of Sri Lanka, situated 148 km north-east of Colombo</p>
                        <a href="http://www.srilankanpersonaldrivers.com/dambulla.html" class="btn btn-primary float-right">more</a>

                    </div>

                </div>
        </div>
    </div>

    <div class="row my-4">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <img class="center" width="250" src="{{ asset('images/galle(1).gif') }}" />
                </div>
                <div class="col-md-6">
                    <h3><a href="http://www.srilankanpersonaldrivers.com/galled.html">Galle</a></h3>
                    <p>Galle is a city on the southwest coast of Sri Lanka. It’s known for Galle Fort, the fortified old city founded by Portuguese colonists in the 16th century. </p>
                    <a href="http://www.srilankanpersonaldrivers.com/galled.html" class="btn btn-primary float-right">more</a>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <img class="center" width="250" src="{{ asset('images/kithul.gif') }}" />
                </div>
                <div class="col-md-6">
                    <h3><a href="http://www.srilankanpersonaldrivers.com/kithulgala.html">Kithulgala</a></h3>
                    <p>Kitulgala is a small town in the west of Sri Lanka. It is in the wet zone rain forest, which gets two monsoons each year,</p>
                    <a href="http://www.srilankanpersonaldrivers.com/kithulgala.html" class="btn btn-primary float-right">more</a>

                </div>

            </div>
        </div>

    </div>

    <div class="row my-4">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <img class="center" width="250" src="{{ asset('images/benthota.gif') }}" />
                </div>
                <div class="col-md-6">
                    <h3><a href="http://www.srilankanpersonaldrivers.com/bentota.html">Bentota</a></h3>
                    <p>Bentota is a resort town on Sri Lanka’s southwest coast. Its long Bentota Beach stretches north,  </p>
                    <a href="http://www.srilankanpersonaldrivers.com/bentota.html" class="btn btn-primary float-right">more</a>


                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <img class="center" width="250" src="{{ asset('images/nuwara-eliya.gif') }}" />
                </div>
                <div class="col-md-6">
                    <h3><a href="http://www.srilankanpersonaldrivers.com/nuwara.html">Nuwara Eliya</a></h3>
                    <p>Nuwara Eliya is a city in the tea country hills of central Sri Lanka. The naturally landscaped Hakgala Botanical Gardens displays roses and tree ferns</p>
                    <a href="http://www.srilankanpersonaldrivers.com/nuwara.html" class="btn btn-primary float-right">more</a>

                </div>

            </div>
        </div>
    </div>

</div>


<footer id="sticky-footer" class="fixed-bottom py-2 bg-dark text-white-50">
    <div class="text-right">
        <p class="mb-0 mr-3">Copyright
            <script>
                var CurrentYear = new Date().getFullYear()
                document.write(CurrentYear)
            </script>
        © <a href="">Harsha De Pinto</a></p>
    </div>
</footer>


@endsection
