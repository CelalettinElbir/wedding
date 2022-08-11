@extends('layout')

@section('content')
    <div class="company-container ">


        @foreach ($data as $item)
            <div class="col-md-6 mx-auto m-4 border border-primary d-flex p-1">
                <div class="company-img m-3">
                    <img src="{{ asset('/' . $item->takeimages()->first()->url) }}" style=" width:200px" class="'mg" />

                </div>
                <div class="company-body">
                    <h3>{{ $item->company_name }}</h3>



                    @if (strlen($item->description) > 300)
                        <p>{{ substr($item->description, 0, 150) }} ...read more</p>
                    @else
                        <p>{{ $item->description }}</p>
                    @endif

                    {{-- <p>{{ $item->description }}</p> --}}

                    <div class="company-footer d-flex justify-content-between">

                        <div class="d-flex">
                            <p class="m-3">{{ $item->price }}</p>
                            <p class="m-3">{{ $item->capasity }}</p>
                            <p class="m-3">{{ $item->telno }}</p>

                        </div>

                        <div>

                            <a class="btn btn-primary m-2 float-right" href="company/{{ $item->id }}">detaylar</a>

                        </div>

                    </div>
                </div>


            </div>
        @endforeach
    </div>
@endsection
