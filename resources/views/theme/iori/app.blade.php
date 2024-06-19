<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
    <meta name="description" content="Index page">
    <meta name="keywords" content="index, page">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('theme/iori') }}/imgs/template/favicon.svg">
    <link href="{{ asset('theme/iori') }}/css/style.css?v=5.0.0" rel="stylesheet">
    <title>{{ config('app.name') }}</title>
</head>

<body>
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="page-loading">
                    <div class="page-loading-inner">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-iori.header></x-iori.header>

    <main class="main">
        @yield('content')
    </main>
    <footer class="footer">

        <div class="footer-2">
            <div class="container">
                <div class="footer-bottom">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 text-center text-lg-start">
                            <ul class="menu-bottom">
                                <li><a class="font-sm color-grey-300" href="term-conditions.html">Privacy policy</a>
                                </li>
                                <li><a class="font-sm color-grey-300" href="term-conditions.html">Cookies</a></li>
                                <li><a class="font-sm color-grey-300" href="term-conditions.html">Terms of service</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6 col-md-12 text-center text-lg-end"><span
                                class="color-grey-300 font-md">©Iori Official 2023. All right reversed.</span></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('theme/iori') }}/js/vendors/modernizr-3.6.0.min.js"></script>
    <script src="{{ asset('theme/iori') }}/js/vendors/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('theme/iori') }}/js/vendors/jquery-migrate-3.3.0.min.js"></script>
    <script src="{{ asset('theme/iori') }}/js/vendors/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('theme/iori') }}/js/vendors/waypoints.js"></script>
    <script src="{{ asset('theme/iori') }}/js/vendors/wow.js"></script>
    <script src="{{ asset('theme/iori') }}/js/vendors/magnific-popup.js"></script>
    <script src="{{ asset('theme/iori') }}/js/vendors/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('theme/iori') }}/js/vendors/select2.min.js"></script>
    <script src="{{ asset('theme/iori') }}/js/vendors/isotope.js"></script>
    <script src="{{ asset('theme/iori') }}/js/vendors/scrollup.js"></script>
    <script src="{{ asset('theme/iori') }}/js/vendors/swiper-bundle.min.js"></script>
    <script src="{{ asset('theme/iori') }}/js/vendors/noUISlider.js"></script>
    <script src="{{ asset('theme/iori') }}/js/vendors/slider.js"></script>
    <!-- Count down-->
    <script src="{{ asset('theme/iori') }}/js/vendors/counterup.js"></script>
    <script src="{{ asset('theme/iori') }}/js/vendors/jquery.countdown.min.js"></script>
    <!-- Count down-->
    <script src="{{ asset('theme/iori') }}/js/vendors/jquery.elevatezoom.js"></script>
    <script src="{{ asset('theme/iori') }}/js/vendors/slick.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src="{{ asset('theme/iori') }}/js/main.js?v=5.0.0"></script>
    <script src="{{ asset('theme/iori') }}/js/ali-animation.js?v=1.0.0"></script>
</body>

</html>