@extends('layout')

@section('content')
    @foreach ($data as $item)
        <div class="col-md-6 mx-auto mt-4">
            <div class="card" style="border:2px solid #f5d0fe">
                <div class="card-body d-flex justify-content-between">
                    <div class="">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="card-text">{{ $item->telno }}</p>
                    </div>
                    <div>
                        <a class="btn btn-light"  href="/company/{{ $item->id }} ">paketleri göster</a>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
