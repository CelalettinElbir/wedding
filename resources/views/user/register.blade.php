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
                <h2 class="text-center">Kaydol </h2>
            </div>
            <form class="card-body container justify-content-center" method="POST" action="/user/register">
                @csrf
                <div class="form-group">
                    <label for="email">Email adresi</label>
                    <input type="text" class="form-control" id="email" placeholder="Email giriniz" name="email">
                </div>
                <div class="form-group">
                    <label for="name">Ad</label>
                    <input class="form-control" id="name" placeholder="Adınızı giriniz" name="name">
                    {{-- @error('name')
                        <p>{{ $massage }}</p>
                    @enderror --}}
                </div>
                <div class="form-group">
                    <label for="password">şifre </label>
                    <input class="form-control" type="password" id="password" placeholder="şifre giriniz"
                        name="password">
                    {{-- @error('password')
                        <p>{{ $massage }}</p>
                    @enderror --}}
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm password </label>
                    <input type="password" class="form-control" id="password_confirmation"
                        placeholder="sifreyi yeniden giriniz" name="password_confirmation">
                    {{-- @error('password_confirmation')
                        <p>{{ $massage }}</p>
                    @enderror --}}
                </div>

                <div class="mt-2 d-flex justify-content-between">
                    <a href="/user/login" class="btn btn-outline-primary">zaten bir hesabınız var mı? </a>
                    <button type="submit" class="btn btn-primary float-center ">Kaydol</button>

                </div>
            </form>

        </div>


    </div>
@endsection
