<nav class="navbar navbar-expand-sm  navbar-light" style="background-color:#f87171;">
    <div class="container">



        <a class="navbar-brand" href="{{ route('company.home') }}">MyWedding </a>
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

            @if (Auth::guard('company')->check())
                <h1>company</h1>
                <div class="d-flex">

                    <form method="POST" action="{{ route('company.logout') }}" class="nav-item">
                        @csrf
                        <ul class="navbar-nav">
                            <button type="submit" class="btn text-light ">Logout
                                ({{ Auth::guard('company')->user()->name }})</button>
                        </ul>
                    </form>

                    <a href="{{ route('index-favorites') }}" class="btn"> <span><i class="fa fa-heart"
                                aria-hidden="true"></i></span> isteklerim </a>


                </div>
            @else
                <ul class="navbar-nav ">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('company.login') }}">company-login</a>
                    </li>

                    <li class="nav-item">

                        <a class="nav-link" href="{{ route('company.create') }}"> Kayıt Ol </a>
                    </li>
                </ul>
            @endif





        </div>


    </div>
</nav>
