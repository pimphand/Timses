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
                        <a href="#home"><img src="{{asset('frontend')}}/images/logo.png" alt="Dgita"></a>
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
<br>
<br>
<br>
<br>

<!-- Footer Section -->
<footer class="footer_01 white" id="daftarrelawan">
    <div class="SecLayerimg move_anim">
        <img src="{{asset('frontend')}}/images/bg/s17.png" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3 col-xl-3">
                <div class="widget">
                    <div class="aboutWidget">
                        <a href="index.html"><img src="{{asset('frontend')}}/images/logo.png" alt=""/></a>
                        <p>1864 Lancaster Court Road Poughkeepsie, CA 12601</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3 offset-xl-1 col-lg-3 ">
                <div class="widget">
                    <h3 class="widget_title">About Company</h3>
                    <ul>
                        <li><a href="about.html">About</a></li>
                        <li><a href="team.html">Team Member</a></li>
                        <li><a href="folio1.html">Our Portfolio</a></li>
                        <li><a href="blog1.html">News</a></li>
                        <li><a href="company.html">Company History</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 col-xl-2">
                <div class="widget">
                    <h3 class="widget_title">Our Services</h3>
                    <ul>

                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 col-xl-3">
                <div class="widget contact_widget">
                    <h3 class="widget_title">Contact Us</h3>
                    <div class="contact_info">
                        <p>dgita.info@gmail.com</p>
                        <p>+88 016 826 48 11</p>
                        <div class="abSocial">
                            <a href="javascript:void(0);"><i class="twi-facebook-f"></i></a>
                            <a href="javascript:void(0);"><i class="twi-linkedin-in"></i></a>
                            <a href="javascript:void(0);"><i class="twi-instagram"></i></a>
                            <a href="javascript:void(0);"><i class="twi-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    <p>Copyright 2021, All Right Reserved</p>
                    <ul>
                        <li><a href="javascript:void(0);">Privacy</a></li>
                        <li><a href="javascript:void(0);">Policy</a></li>
                        <li><a href="javascript:void(0);">Terms of Service</a></li>
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
</script>
@stack('js')
</body>
</html>
