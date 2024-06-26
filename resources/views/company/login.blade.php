@extends('layout2')


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
                <h2 class="text-center">Şirket Olarak Giriş yap</h2>
            </div>
            <form class="card-body container justify-content-center" method="POST" action="{{ route('company.auth') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Şirket adresi</label>
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
                    <a href="{{ route('company.auth') }}" class="btn btn-outline-primary">Kayıt Ol </a>
                    <button type="submit" class="btn btn-primary ">Submit</button>

                </div>
            </form>

        </div>


    </div>
@endsection
    