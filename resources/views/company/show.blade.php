@extends('layout2')
@include('partials.lastnavbarindex')

@php
$company_id = $company->id;
@endphp
@section('content')
    <div class="container mt-3">
        <div class="header border-bottom mb-2 mt-2 ">
            <h1 class="hero-title"> {{ $company->company_name }}</h1>
            <div class="detail d-flex justify-content-between">
                <div class="menu-left d-flex">
                    {{-- kullanıcı girş yaptımı ve --}}

                    @if (Auth::guard('web')->check())
                        {{-- {{ dd(Auth::guard('web')->user()->companyOrder->contains('id')) }} --}}
                        {{-- {{ dd(Auth::guard('web')->user()->companyOrder->contains('id', $company->id)) }} --}}

                        @if (Auth::guard('web')->user()->companyOrder->contains('id', $company->id))
                            <form method="POST" action="{{ route('order.store', [$company]) }}">
                                @csrf
                                {{-- <input type="hidden" name="deneme"> --}}
                                <button class="btn btn-primary" disabled>istek oluşturuldu</button>
                            </form>
                        @else
                            <form method="POST" action="{{ route('order.store', [$company]) }}">
                                @csrf
                                {{-- <input type="hidden" name="deneme"> --}}
                                <button class="btn btn-primary">istek oluştur</button>
                            </form>
                        @endif
                    @elseif(Auth::guard('company')->check())
                        <form method="POST" action="{{ route('order.store', [$company]) }}">
                            @csrf
                            {{-- <input type="hidden" name="deneme"> --}}
                            <button class="btn btn-primary" disabled>sirket olarak istek oluşturulamaz</button>
                        </form>
                    @else
                        <form method="POST" action="{{ route('order.store', [$company]) }}">
                            @csrf
                            {{-- <input type="hidden" name="deneme"> --}}
                            <button class="btn btn-primary">istek oluştur</button>
                        </form>
                    @endif







                    <div class="star p-2">
                        <span><i class="fa fa-star" aria-hidden="true"></i> 5.0</span>
                    </div>
                    <div class="price p-2">
                        <p>{{ $company->capasity }} kişi için {{ $company->price }} <span><i
                                    class="fa-solid fa-turkish-lira-sign"></i></span></p>
                    </div>
                </div>
                <div class="menu-left">
                    <form method="POST" class="contact" action="{{ route('add-favorite', [$company]) }}">
                        @csrf
                        <button class="btn" type="submit"><span class="m-2"><i class="fa fa-heart "
                                    aria-hidden="true"></i>favorilere ekle</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>



        <div class="row">

            <div class="col-md-8 ">
                {{-- carausell!!!!! --}}
                <x-carousel :company="$company" />

                <div class="border-bottom  mb-2">
                    <h1>About</h1>
                    <div class="">
                        {{ strip_tags($company->description) }}



                    </div>
                </div>
                <div class="contact-header">
                    <h3>
                        İletişim
                    </h3>

                </div>

                <ul class="contact-body ">
                    <div class="d-flex gap-5">
                        <li>
                            {{ $company->name }}
                        </li>

                        <p> <span class="m-1"><i class="fa-solid fa-envelope "></i></span>{{ $company->email }}
                        </p>
                        </li>
                    </div>
                    <li>
                        <p> <span class="m-1"><i class="fa fa-map-marker"
                                    aria-hidden="true"></i></i></span>{{ $company->location }}
                        </p>
                    </li>
                </ul>
            </div>


            <div class="col-md-4">
                <h3>özellikler</h3>
                <ul>


                    @foreach ($company->takeServices() as $services)
                        <li>{{ $services->feature }}</li>
                    @endforeach


                </ul>

                <label for="birthday">Birthday</label>
                <input type="date" id="birthday" class="form-control" name="birthday">

            </div>



        </div>



    </div>
@endsection
