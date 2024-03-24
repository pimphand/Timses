<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{env('APP_NAME')}}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">

    <!-- Start Include All CSS -->
    <link rel="stylesheet" href="{{asset('frontend')}}/css/bootstrap.css"/>
    <link rel="stylesheet" href="{{asset('frontend')}}/css/animate.css"/>
    <link rel="stylesheet" href="{{asset('frontend')}}/css/themewar-font.css"/>
    <link rel="stylesheet" href="{{asset('frontend')}}/css/dgita-icon.css"/>
    <link rel="stylesheet" href="{{asset('frontend')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/settings.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/lightslider.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/slick.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/lightcase.css">

    <link rel="stylesheet" href="{{asset('frontend')}}/css/preset.css"/>
    <link rel="stylesheet" href="{{asset('frontend')}}/css/ignore_for_wp.css"/>
    <link rel="stylesheet" href="{{asset('frontend')}}/css/theme.css"/>
    <link rel="stylesheet" href="{{asset('frontend')}}/css/responsive.css"/>
    <!-- End Include All CSS -->

    <!-- Favicon Icon -->
    <link rel="icon" type="image/png" href="{{asset('frontend')}}/images/favicon.png">
    <!-- Favicon Icon -->
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css"/>
    <style>
        #_nav_relawan {
            display: none; /* Awalnya sembunyikan */
        }

        /* Media Query untuk layar dengan lebar maksimum 600px (misalnya, layar hp) */
        @media only screen and (max-width: 600px) {
            #_nav_relawan {
                display: block; /* Tampilkan ketika layar hp */
            }
        }
    </style>
    @stack('css')
</head>
<body>
<!-- Preloading -->
<div class="preloader text-center">
    <div class="la-ball-scale-multiple la-2x">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<!-- Preloading -->

<!-- Header Start -->
<header class="header01 centerMenu isSticky">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="navBar01">
                    <div class="logo">
                        <a href="#home"><img src="{{asset('images')}}/frontend/logo.png" alt="Logo"></a>
                    </div>
                    <a href="javascript:void(0)" class="menu_btn"><i class="twi-bars2"></i></a>
                    <nav class="mainMenu">
                        <ul>
                            <li class="menu-item-has-children">
                                <a class="_to_home" href="#home">Home</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a class="_to_home" href="#profile">profile</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a class="_to_home" href="#visimisi">Visi dan Misi</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a class="_to_home" href="#agenda">Agenda</a>
                            </li>
                            <li class="menu-item-has-children" id="_nav_relawan">
                                <a href="/register">Daftar Relawan</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="accessNav">
                        <a class="dgBtn_two transparentBtn" href="{{route('register')}}"><span>Daftar Relawan</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->
@yield('content')

<!-- Footer Section -->
<footer class="footer_01 white" id="daftarrelawan">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    <p>Copyright 2024, All Right Reserved</p>
                    <ul>
                        <li><a href="{{route('register')}}">Daftar Relawan</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section -->

<!-- Bact To Top -->
<a href="javascript:void(0);" id="backtotop"><i class="twi-arrow-to-top1"></i></a>
<!-- Bact To Top -->

<!-- Start Include All JS -->
<script src="{{asset('frontend')}}/js/jquery.js"></script>
<script src="{{asset('frontend')}}/js/jquery-ui.js"></script>
<script src="{{asset('frontend')}}/js/bootstrap.min.js"></script>
<script src="{{asset('frontend')}}/js/jquery.appear.js"></script>
<script src="{{asset('frontend')}}/js/owl.carousel.min.js"></script>
<script src="{{asset('frontend')}}/js/jquery.shuffle.min.js"></script>
<script src="{{asset('frontend')}}/js/lightslider.js"></script>
<script src="{{asset('frontend')}}/js/slick.js"></script>
<script src="{{asset('frontend')}}/js/lightcase.js"></script>

<!-- Slider Revolution Main Files -->
<script src="{{asset('frontend')}}/js/jquery.themepunch.tools.min.js"></script>
<script src="{{asset('frontend')}}/js/jquery.themepunch.revolution.min.js"></script>

<!-- Slider Revolution Extension -->
<script src="{{asset('frontend')}}/js/extensions/revolution.extension.actions.min.js"></script>
<script src="{{asset('frontend')}}/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="{{asset('frontend')}}/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="{{asset('frontend')}}/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="{{asset('frontend')}}/js/extensions/revolution.extension.migration.min.js"></script>
<script src="{{asset('frontend')}}/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="{{asset('frontend')}}/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="{{asset('frontend')}}/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="{{asset('frontend')}}/js/extensions/revolution.extension.video.min.js"></script>

<script src="{{asset('frontend')}}/js/theme.js"></script>
<script>
    $.ajaxSetup({
        async: true, // Set to true if you want asynchronous requests (this is the default)
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}",
        }
    });
    $(document).ready(function () {
        $('a[href^="#"]').on('click', function (event) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                event.preventDefault(); // Mencegah tindakan default tautan
                $('html, body').stop().animate({
                    scrollTop: target.offset().top
                }, 1000);
            }
        });
    });

    function formAjax(data = null, url, method = 'post',) {
        return new Promise(function (resolve, reject) {
            $.ajax({
                type: method,
                url: url,
                data: data,
                contentType: false,
                processData: false,
            }).done(function (response) {
                resolve(response);
            }).fail(function (error) {
                reject(error);
            });
        });
    }

    $('#_nav_relawan').click(function () {
        window.location.href = '/daftar-relawan';
    });
</script>
@stack('js')
</body>
</html>
