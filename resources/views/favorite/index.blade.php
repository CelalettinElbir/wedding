@extends('layout')

@push('css')
    <link rel="stylesheet" href="/css/favorite.css">
@endpush

@section('content')
    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center m-3 ">

        @foreach (Auth::user()->company as $item)
            <div class="col">
                <div class="card h-100 border">
                    <img class="card-img-top " style="height: 350px; "
                        src="{{ asset('/images/resource/' . $item->takeimages()->first()->url) }}" alt="Card image cap">

                    <div class="card-body">
                        <h5 class="card-title" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">{{ $item->company_name }}</h5>
                        <p class="card-text " style="font-family: Verdana, Geneva, Tahoma, sans-serif">{{ $item->description }}</p>
                        {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                    </div>
                    <div class="buttons d-flex justify-content-between m-3">
                        <a class="btn btn-lg " href="{{ route('company-detail',[$item->id]) }}" style="background-color:#d4d4d8">detaylar</a>
                        <button class="btn btn-lg" style="background-color:#d4d4d8">istek oluştur.</button>


                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
