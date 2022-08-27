@extends('layout2')
@include('partials.lastnavbarindex')
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

                    <button class="btn btn-primary " type="submit">filtrele</button>
                </form>

            </div>

            <div class="col-md-9">

                @foreach ($data as $item)
                    <div class="card  m-2" style="max-width: 720px;">
                        <div class="row g-0">
                            <div class="col-md-4">

                                @if ($item->takeimages()->isEmpty())
                                    <img src="{{ asset('/img/no-image.jpg') }}" class="img-fluid rounded-start" style="border: 2px solid #FF6F0F" alt="...">
                                @else
                                    <img src="{{ asset('/images/resource/' . $item->takeimages()->first()->url) }}"
                                        class="img-fluid rounded-start" alt="...">
                                @endif

                            </div>
                            <div class="col-md-8">
                                <div class="card-body mt-4">
                                    <h3 class="card-title">{{ $item->company_name }}</h3>

                                    <p class="card-text">


                                        @if (strlen($item->description) > 150)
                                            {{ strip_tags(substr($item->description, 0, 150)) }} ...read more
                                        @else
                                            {{ strip_tags($item->description) }}
                                        @endif



                                    </p>



                                    <div class="text-end ">
                                        <a href="{{ route('company.detail', [$item->id]) }}"
                                            class="btn   btn-primary m-1 mr-auto">detaylar </a>

                                    </div>


                                </div>


                            </div>


                        </div>
                    </div>
                @endforeach



            </div>
        </div>




    </div>


    <div class="d-flex justify-content-around">

        @if ($data->hasPages())
            <div class="pagination-wrapper">
                {{ $data->links() }}
            </div>
        @endif
    </div>
@endsection
