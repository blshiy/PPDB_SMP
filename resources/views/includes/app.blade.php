<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>PPDB. - @yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    @include('includes.style')


</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"> <img src="{{asset('assets/dashboard/assets/images/logo-ppdb.png')}}" class="img-fluid" alt=""> </a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            @include('includes.navbar')

        </div>
    </header><!-- End Header -->

    @yield('hero')

    <main id="main">

        @yield('content')

    </main><!-- End #main -->

    @include('includes.footer')

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    @include('includes.scripts')


</body>

</html>
