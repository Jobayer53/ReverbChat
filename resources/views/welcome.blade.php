<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Disting Disting</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    </head>
    <body class="antialiased font-sans">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mt-4">
                    <h2>Disting Disting</h2>
                </div>
            </div>
            <div class="row image mt-5">
                <div class="col-md-5">
                    <div class="">

                    <div class="card shadow  ">
                        <div class="card-header text-change">Chat without an account</div>
                        <div class="card-body p-3">
                            <form action="{{ route('user.register') }}" method="POST" >
                                @csrf
                                <div class="row">
                                    <div class=" col-lg-12 mb-4 m-auto form-group form-group-typ">
                                        <input type="text" class="form-control form-control-typ @error('name') is-invalid border-bottom border-danger @enderror" name="name" placeholder=""  value="{{ old('name') }}">
                                        <label  class="form-label form-label-typ"> Name  </label>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class=" col-lg-6 mb-4 m-auto form-group form-group-typ">
                                        <select name="age" id="" class="form-control ">
                                            <option value="" hidden selected>Age</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                        </select>
                                    </div>
                                    <div class=" col-lg-6 mb-4 m-auto form-group form-group-typ">
                                        <select name="gender" id="" class="form-control ">
                                            <option value="" hidden selected>Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class=" col-lg-6  m-auto form-group form-group-typ">
                                        <select name="country" id="" class="form-control ">
                                            <option value="" hidden selected>Country</option>
                                            <option value="India">India</option>
                                            <option value="USA">USA</option>
                                            <option value="UK">UK</option>
                                            <option value="Australia">Australia</option>



                                        </select>
                                    </div>
                                    <div class=" col-lg-6 mt-5 m-auto form-group form-group-typ">
                                       <button class="float-end btn  btn-sm" style="background: #ff4b42; color:
                                       white; font-weight: 600"> Get Started</button>
                                    </div>
                                </div>
                                {{-- <div class="row mb-3">
                                    <label for="name" class="  col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div> --}}
                                {{-- <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Age') }}</label>
                                    <div class="col-md-6">
                                        <input id="Age" type="number" class="form-control @error('Age') is-invalid @enderror" name="age" value="{{ old('email') }}" required autocomplete="email">
                                        @error('Age')

                                                <strong>{{ $message }}</strong>

                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>
                                    <div class="col-md-6">
                                       <select name="gender" id="gender" class="form-control">
                                           <option value="male" >Male</option>
                                           <option value="female">Female</option>
                                       </select>
                                        @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-form-label text-md-end">{{ __('Country') }}</label>
                                    <div class="col-md-6">
                                    <select name="country" id="country" class="form-control">
                                       <option value="bangladesh">Bangladesh</option>
                                       <option value="india">India</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div> --}}
                            </form>
                        </div>
                    </div>

                </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body>
</html>
