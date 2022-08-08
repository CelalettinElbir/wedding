@extends('layout')

@section('content')
    <div class="hero ">

        <img src={{ asset('img/7.jpg') }} class="w-100 rounded opacity-25 " style="height:500px">

        <div class="centered">

            <a href="/company" class="btn text-light hero-title">hayalinizdeki düğün için şirketleri listeleyin </a>
        </div>

    </div>

    <div class="hero-icons d-flex justify-content-around p-4">
        <i class="fa-solid fa-clock fa-4x  gap-10"></i>
        <i class="fa-solid fa-lightbulb fa-4x"></i>
        <i class="fa-solid fa-envelope fa-4x"></i>
    </div>
@endsection
