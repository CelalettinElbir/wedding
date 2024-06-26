<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="{{ asset('img') }}/1.jpg" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7 pt-5">
                                <h1 class="display-4 text-white mb-3 animated slideInDown">Hayalindeki Düğün için
                                    tıkla
                                </h1>
                                {{-- <p class="fs-5 text-white-50 mb-5 animated slideInDown">Aliqu diam amet diam et eos.
                                    Clita erat ipsum et lorem sed stet lorem sit clita duo justo erat amet</p> --}}
                                <a class="btn btn-primary py-2 px-3 animated slideInDown"
                                    href="{{ route('company.index') }}">
                                    Daha Fazla
                                    <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                                        <i class="fa fa-arrow-right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- Carousel End -->
