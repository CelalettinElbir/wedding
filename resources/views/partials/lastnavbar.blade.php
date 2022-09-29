<!-- Navbar Start -->

<div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">


    <nav class="navbar navbar-expand-lg navbar-dark py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">

        @if (Auth::guard('admin')->check())
            <a href="{{ route('admin.panel') }}" class="navbar-brand ms-4 ms-lg-0">
                <h1 class="fw-bold text-primary m-0">Dream<span class="text-white">wedding</span></h1>
            </a>
        @elseif(Auth::guard('company')->check())
        @else
            <a href="{{ route('company.home') }}" class="navbar-brand ms-4 ms-lg-0">
                <h1 class="fw-bold text-primary m-0">Dream<span class="text-white">wedding</span></h1>
            </a>
        @endif
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
                @elseif(Auth::guard("web")->check())
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Çıkış Yap</a>
                        <div class="dropdown-menu m-0">

                            <form method="POST" action="{{ route('user.logout') }}" class="nav-item">
                                @csrf
                                <ul class="navbar-nav">
                                    <button type="submit" class="dropdown-item ">{{ Auth::guard('web')->user()->name }}</button>

                                </ul>
                            </form>

                        </div>
                    </div>
                @elseif(Auth::guard('admin')->check())
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Çıkış yap</a>
                        <div class="dropdown-menu m-0">

                            <ul class="navbar-nav">
                                <a href="{{ route('admin.logout') }}" class="dropdown-item ">admin çıkış </a>

                            </ul>

                        </div>
                    </div>
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
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Şirket
                            giriş</a>
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
