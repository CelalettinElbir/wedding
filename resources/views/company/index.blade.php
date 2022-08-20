@extends('layout')

@section('content')
    <div class=" container overflow-hidden">
        <div class="row ">




            <div class=" col-md-3  mt-2">
                <form action="">

                    <label for="capasity">kapasite</label>

                    <div class="input-group mb-3">
                        <input type="text" class="form-control " name="min_capasity">
                        <input type="text" class="form-control " name="max_capasity">

                    </div>

                    <label for="capasity">fiyat</label>

                    <div class="input-group mb-3">
                        <input type="text" class="form-control " name="min_price">
                        <input type="text" class="form-control " name="max_price">

                    </div>

                    <button class="btn btn-info " type="submit">filtrele</button>
                </form>

            </div>

            <div class="col-md-9">

                @foreach ($data as $item)
                    <div class="card  m-2" style="max-width: 720px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ asset('/images/resource/' . $item->takeimages()->first()->url) }}"
                                    class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h3 class="card-title">{{ $item->company_name }}</h3>

                                    <p class="card-text">


                                        @if (strlen($item->description) > 150)
                                            {{ strip_tags(substr($item->description, 0, 150)) }} ...read more
                                        @else
                                            {{ strip_tags($item->description) }}
                                        @endif
                                    </p>

                                    <p class="card-text"><small class="text-muted">{{ $item->created_at }}</small></p>

                                    <a href="{{ route('company.detail', [$item->id]) }}"
                                        class="btn btn-info m-1 mr-auto">detaylar </a>

                                </div>

                            </div>


                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
