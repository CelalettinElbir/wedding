@extends('layout')

@section('content')
    <div class="company-container col-md-8 mx-auto ">
        @foreach ($data as $item)
            {{-- {{dd( $item->takeimages())}} --}}
            <div class="card m-3 " style="max-width: 720px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('/images/resource/' . $item->takeimages()->first()->url) }}"
                            class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h3 class="card-title">{{ $item->company_name }}</h3>
                            <div class="card-text">{{ $item->description }}</div>
                            <p class="card-text"><small class="text-muted">{{ $item->created_at }}</small></p>
                        </div>
                        <a href="{{ route('company-detail', [$item->id]) }}" class="btn btn-primary m-2">detay</a>
                    </div>
                </div>
            </div>
        @endforeach



        
        {{-- @foreach ($data as $item)
            <div class="col-md-6 mx-auto m-4 border border-primary d-flex p-1">
                <div class="company-img m-3">
                    <img src="{{ asset('/' . $item->takeimages()->first()->url) }}" style=" width:200px" />

                </div>
                <div class="company-body">
                    <h3>{{ $item->company_name }}</h3>



                    @if (strlen($item->description) > 300)
                        <p>{{ substr($item->description, 0, 150) }} ...read more</p>
                    @else
                        <p>{{ $item->description }}</p>
                    @endif --}}

        {{-- <p>{{ $item->description }}</p> --}}

        {{-- <div class="company-footer d-flex justify-content-between">

                        <div class="d-flex">
                            <p class="m-3">{{ $item->price }}</p>
                            <p class="m-3">{{ $item->capasity }}</p>
                            <p class="m-3">{{ $item->telno }}</p>

                        </div>

                        <div>

                            <a class="btn btn-primary m-2 float-right" href="/company/{{ $item->id }}">detaylar</a>

                        </div>

                    </div>
                </div>


            </div>
        @endforeach --}}
    </div>
@endsection
