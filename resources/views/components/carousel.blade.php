{{-- eğer $image->id 1 gelmezse problem oluşur. --}}

@if (count($company->takeimages()) === 0)
    <div class="  w-100">
        <img src="{{ asset('/img/no-image.jpg') }}" class="d-block w-100 rounded" style="height:400px; " />
    </div>
@else
    <div id="carouselExampleIndicators" class="carousel slide " data-bs-ride="carousel" style="width: 800px">



        <div class="carousel-inner w-100">
            @foreach ($company->takeimages() as $image)
                @if ($company->takeimages()->first()->id == $image->id)
                    <div class="carousel-item active w-100">
                        <img src="{{ asset('/images/resource/' . $image->url) }}" class="d-block w-100 rounded"
                            style="height:400px; " />
                    </div>
                @else
                    <div class="carousel-item w-100 ">
                        <img src="{{ asset('/images/resource/' . $image->url) }}" class="d-block w-100 rounded"
                            style="height:400px ;" />
                    </div>
                @endif
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
@endif
