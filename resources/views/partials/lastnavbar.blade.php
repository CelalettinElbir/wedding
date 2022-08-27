<!-- Navbar Start -->

<div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
    {{-- <div class="top-bar text-white-50 row gx-0 align-items-center d-none d-lg-flex">
        <div class="col-lg-6 px-5 text-start">
            <small><i class="fa fa-map-marker-alt me-2"></i>123 Street, New York, USA</small>
            <small class="ms-4"><i class="fa fa-envelope me-2"></i>info@example.com</small>
        </div>
        <div class="col-lg-6 px-5 text-end">
            <small>Follow us:</small>
            <a class="text-white-50 ms-3" href=""><i class="fab fa-facebook-f"></i></a>
            <a class="text-white-50 ms-3" href=""><i class="fab fa-twitter"></i></a>
            <a class="text-white-50 ms-3" href=""><i class="fab fa-linkedin-in"></i></a>
            <a class="text-white-50 ms-3" href=""><i class="fab fa-instagram"></i></a>
        </div>
    </div> --}}

    <nav class="navbar navbar-expand-lg navbar-dark py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="{{ route('company.index') }}" class="navbar-brand ms-4 ms-lg-0">
            <h1 class="fw-bold text-primary m-0">Dream<span class="text-white">wedding</span></h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                {{-- <a href="index.html" class="nav-item nav-link active">Home</a> --}}


                {{-- {{ dd(Auth::guard('company')->check()) }} --}}
                @if (Auth::guard('company')->check())
                    <a href="index.html" class="nav-item nav-link ">İsteklerim</a>



                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Çıkış Yap</a>
                        <div class="dropdown-menu m-0">

                            <form method="POST" action="{{ route('company.logout') }}" class="nav-item">
                                @csrf
                                <ul class="navbar-nav">
                                    <button type="submit"
                                        class="dropdown-item ">({{ Auth::guard('company')->user()->name }})</button>

                                </ul>
                            </form>

                        </div>
                    </div>
                @elseif(Auth::check())
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Çıkış Yap</a>
                        <div class="dropdown-menu m-0">

                            <form method="POST" action="{{ route('user.logout') }}" class="nav-item">
                                @csrf
                                <ul class="navbar-nav">
                                    <button type="submit" class="dropdown-item ">çıkış yap</button>

                                </ul>
                            </form>

                        </div>
                    </div>

                    <a href="{{ route('index-favorites') }}" class="nav-item nav-link ">favorilerim</a>
                @else
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Kayit Ol/Giriş
                            yap</a>
                        <div class="dropdown-menu m-0">
                            <a href="{{ route('user.login') }}" class="dropdown-item">Giriş yap </a>
                            <a href="{{ route('user.register') }}" class="dropdown-item">Kayıt Ol </a>

                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Şirket giriş</a>
                        <div class="dropdown-menu m-0">
                            <a href="{{ route('company.login') }}" class="dropdown-item">Giriş yap </a>
                            <a href="{{ route('company.create') }}" class="dropdown-item">Kayıt Ol </a>
                        </div>
                    </div>
                @endif






            </div>

        </div>
    </nav>
</div>
<!-- Navbar End -->
