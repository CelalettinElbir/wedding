<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Giriş</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('back/') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('back/') }}/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    @include('partials.flash')


    <div class="container">
        {{-- @if (Auth::guard('admin')->check())
            <p>{{ Auth::guard('admin')->user()->id }}</p>
        @else
            <h1>deneme</h1>
        @endif --}}
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            {{-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> --}}
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Admin Paneli</h1>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('admin.authenticate') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="email">Email adresi</label>
                                            <input type="text" class="form-control" id="email"
                                                placeholder="Enter email" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Şifre</label>
                                            <input class="form-control" type="password" id="password"
                                                placeholder="Enter your Password" name="password">
                                            @error('password')
                                                <p>{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('back/') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('back/') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('back/') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('back/') }}/js/sb-admin-2.min.js"></script>

</body>

</html>

{{-- @extends('layout2')

@include('partials.lastnavbarindex')


@section('content')


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="content mt-5">

        <div class="col-md-6 mx-auto  bg-light">

            <div class="card-header ">
                <h2 class="text-center">Giriş yap</h2>
            </div>
            <form class="card-body container justify-content-center" method="POST"
                action="{{ route('admin.authenticate') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Email adresi</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>

                <div class="form-group">
                    <label for="password">Şifre</label>
                    <input class="form-control" type="password" id="password" placeholder="Enter your Password"
                        name="password">
                    @error('password')
                        <p>{{ $massage }}</p>
                    @enderror
                </div>


                <div class="mt-2 d-flex justify-content-between">
                    <a href="/user/register" class="btn btn-outline-primary">Kayıt Ol </a>
                    <button type="submit" class="btn btn-primary ">Submit</button>

                </div>
            </form>

        </div>


    </div>
@endsection --}}
