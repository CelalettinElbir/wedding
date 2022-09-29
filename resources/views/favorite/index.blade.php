@extends('layout2')
@include('partials.lastnavbarindex')
@push('css')
    <link rel="stylesheet" href="/css/favorite.css">
@endpush

@section('content')

    @if (Auth::user()->company->isEmpty())
        <div class=" col-md-3 mx-auto ">
            <h2>
                favori şirketiniz yok
            </h2>
            <div class="justify-content-center d-flex">
                <a class="btn btn-primary" href="{{ route('company.index') }}">şirket ara</a>


            </div>
        </div>
    @else
        <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center m-3 ">

            @foreach (Auth::user()->company as $item)
                <div class="col">
                    <div class="card h-100 border">
                        @if ($item->takeimages()->isEmpty())
                            <img class="card-img-top " style="height: 300px; " src="{{ asset('/img/no-image.jpg') }}"
                                alt="Card image cap">
                        @else
                            <img class="card-img-top " style="height: 300px; "
                                src="{{ asset('/images/resource/' . $item->takeimages()->first()->url) }}"
                                alt="Card image cap">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title"
                                style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
                                {{ $item->company_name }}</h5>
                            <p class="card-text " style="font-family: Verdana, Geneva, Tahoma, sans-serif">
                                {{ $item->description }}</p>
                        </div>
                        <div class="buttons d-flex justify-content-between m-3">
                            <form method="get" action="{{ route('favorite-delete', [$item]) }}">
                                <a class="btn btn-lg " href="{{ route('company.detail', [$item->id]) }}"
                                    style="background-color:#d4d4d8">detaylar</a>


                            </form>

                            <form method="POST" action="{{ route('favorite-delete', [$item]) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-lg btn-primary ">kaldır
                                </button>

                            </form>


                        </div>
                    </div>
                </div>
            @endforeach
    @endif


    </div>
@endsection
