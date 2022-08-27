<nav class="navbar navbar-expand-sm  navbar-light" style="background-color:#94a3b8;">
    <div class="container">



        <a class="navbar-brand" href="{{ route('home') }}">MyWedding </a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
            aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-between" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#"><span class="sr-only">(current)</span></a>
                </li>


            </ul>

            @auth
                <div class="d-flex">

                    <form method="POST" action="{{ route('user.logout') }}" class="nav-item">
                        @csrf
                        <ul class="navbar-nav">
                            <button type="submit" class="btn text-light ">Logout ({{ auth()->user()->name }})</button>
                        </ul>
                    </form>

                    <a href="{{ route('index-favorites') }}" class="btn"> <span><i class="fa fa-heart"
                                aria-hidden="true"></i></span> favorilerim </a>


                </div>



            @endauth

            @guest
                <ul class="navbar-nav ">

                    <li class="nav-item">
                        <a class="nav-link" href="/user/login">Giriş Yap</a>
                    </li>

                    <li class="nav-item">

                        <a class="nav-link" href="/user/register"> Kayıt Ol </a>
                    </li>
                </ul>

            @endguest

            {{-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> --}}

        </div>


    </div>
</nav>
