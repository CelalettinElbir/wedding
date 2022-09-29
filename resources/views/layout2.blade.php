<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <title>Wedding </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Saira:wght@500;600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('back2') }}/lib/animate/animate.min.css" rel="stylesheet">
    <link href="{{ asset('back2') }}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('back2') }}/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('back2') }}/css/style.css" rel="stylesheet">
    <link href="{{ asset('css') }}/app.css" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
@stack('head')
</head>

<body>
    @include('partials.flash')

    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->
    {{-- navbar !! --}}


    @yield('content')






    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    @yield('scripts')

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('back2') }}/lib/wow/wow.min.js"></script>
    <script src="{{ asset('back2') }}/lib/easing/easing.min.js"></script>
    <script src="{{ asset('back2') }}/lib/waypoints/waypoints.min.js"></script>
    <script src="{{ asset('back2') }}/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="{{ asset('back2') }}/lib/parallax/parallax.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('back2') }}/js/main.js"></script>
</body>

</html>
