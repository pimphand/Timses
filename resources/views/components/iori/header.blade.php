<div>
    <header class="header sticky-bar">
        <div class="container">
            <div class="main-header">
                <div class="header-left">
                    <div class="header-logo">
                        <a class="d-flex" href="/">
                            <img alt="Ecom" src="{{ asset('theme/iori') }}/imgs/template/logo.svg">
                        </a>
                    </div>
                    <div class="header-nav">
                        <nav class="nav-main-menu d-none d-xl-block">
                            <ul class="main-menu">
                                <li class="">
                                    <a class="active" href="/">Home</a>
                                </li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </nav>
                        <div class="burger-icon burger-icon-white"><span class="burger-icon-top"></span><span
                                class="burger-icon-mid"></span><span class="burger-icon-bottom"></span></div>
                    </div>
                    <div class="header-right">
                        <div class="d-inline-block box-search-top">
                            <div class="form-search-top">
                                <form action="#">
                                    <input class="input-search" type="text" placeholder="Search...">
                                    <button class="btn btn-search">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div><span class="font-lg icon-list search-post">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg></span>
                        </div>
                        <div class="d-inline-block box-dropdown-cart"><span class="font-lg icon-list icon-account"><span
                                    class="font-lg color-grey-900 arrow-down">EN</span></span>
                            <div class="dropdown-account">
                                <ul>
                                    <li><a class="font-md" href="#"><img
                                                src="{{ asset('theme/iori') }}/imgs/template/icons/en.png" alt="iori">
                                            English</a></li>
                                    <li><a class="font-md" href="#"><img
                                                src="{{ asset('theme/iori') }}/imgs/template/icons/fr.png" alt="iori">
                                            French</a></li>
                                    <li><a class="font-md" href="#"><img
                                                src="{{ asset('theme/iori') }}/imgs/template/icons/cn.png" alt="iori">
                                            Chiness</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="d-none d-sm-inline-block"><a class="btn btn-brand-1 hover-up"
                                href="register.html">Get
                                Started</a></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-content-area">
                <div class="mobile-logo"><a class="d-flex" href="/"><img alt="IORI"
                            src="{{ asset('theme/iori') }}/imgs/template/logo.svg"></a></div>
                <div class="burger-icon"><span class="burger-icon-top"></span><span class="burger-icon-mid"></span><span
                        class="burger-icon-bottom"></span></div>
                <div class="perfect-scroll">
                    <div class="mobile-menu-wrap mobile-header-border">
                        <ul class="nav nav-tabs nav-tabs-mobile mt-25" role="tablist">
                            <li><a class="active" href="#tab-menu" data-bs-toggle="tab" role="tab"
                                    aria-controls="tab-menu" aria-selected="true">
                                    <svg class="w-6 h-6 icon-16" fill="none" stroke="currentColor" viewbox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 6h16M4 12h16M4 18h16"></path>
                                    </svg>Menu</a></li>
                            <li><a href="#tab-account" data-bs-toggle="tab" role="tab" aria-controls="tab-account"
                                    aria-selected="false">
                                    <svg class="w-6 h-6 icon-16" fill="none" stroke="currentColor" viewbox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                        </path>
                                    </svg>Account</a></li>
                            <li><a href="#tab-notification" data-bs-toggle="tab" role="tab"
                                    aria-controls="tab-notification" aria-selected="false">
                                    <svg class="w-6 h-6 icon-16" fill="none" stroke="currentColor" viewbox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                        </path>
                                    </svg>Notification</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="tab-menu" role="tabpanel"
                                aria-labelledby="tab-menu">
                                <nav class="mt-15">
                                    <ul class="mobile-menu font-heading">
                                        <li><a class="active" href="/">Home</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account">
                                <nav class="mt-15">
                                    <ul class="mobile-menu font-heading">
                                        <li><a class="active" href="login.html">My Profile</a></li>
                                        <li><a href="#">Work Preferences</a></li>
                                        <li><a href="#">My Boosted Shots</a></li>
                                        <li><a href="#">My Collections</a></li>
                                        <li><a href="#">Account Settings</a></li>
                                        <li><a href="#">Go Pro</a></li>
                                        <li><a href="register.html">Sign Out</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="tab-pane fade" id="tab-notification" role="tabpanel"
                                aria-labelledby="tab-notification">
                                <p class="font-sm-bold color-brand-1 mt-30">Today</p>
                                <div class="notifications-item">
                                    <div class="item-notify">
                                        <div class="item-image"><img
                                                src="{{ asset('theme/iori') }}/imgs/template/user1.png" alt="iori">
                                        </div>
                                        <div class="item-info">
                                            <p class="color-grey-500 font-xs"><strong class="font-xs-bold">Steven
                                                    Job</strong>like started a poll in your post “How to be a good
                                                trader in 2023”</p>
                                        </div>
                                        <div class="item-time"><span class="color-grey-500 font-xs">Just now</span>
                                        </div>
                                    </div>
                                    <div class="item-notify">
                                        <div class="item-image"><img
                                                src="{{ asset('theme/iori') }}/imgs/template/user2.png" alt="iori">
                                        </div>
                                        <div class="item-info">
                                            <p class="color-grey-500 font-xs"><strong class="font-xs-bold">Steven
                                                    Job</strong>like started a poll in your post “How to be a good
                                                trader in 2023”</p>
                                        </div>
                                        <div class="item-time"><span class="color-grey-500 font-xs">Just now</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="font-sm-bold color-brand-1 mt-30">Yesterday</p>
                                <div class="notifications-item">
                                    <div class="item-notify">
                                        <div class="item-image"><img
                                                src="{{ asset('theme/iori') }}/imgs/template/user3.png" alt="iori">
                                        </div>
                                        <div class="item-info">
                                            <p class="color-grey-500 font-xs"><strong class="font-xs-bold">Steven
                                                    Job</strong>like started a poll in your post “How to be a good
                                                trader in 2023”</p>
                                        </div>
                                        <div class="item-time"><span class="color-grey-500 font-xs">Just now</span>
                                        </div>
                                    </div>
                                    <div class="item-notify">
                                        <div class="item-image"><img
                                                src="{{ asset('theme/iori') }}/imgs/template/user4.png" alt="iori">
                                        </div>
                                        <div class="item-info">
                                            <p class="color-grey-500 font-xs"><strong class="font-xs-bold">Steven
                                                    Job</strong>like started a poll in your post “How to be a good
                                                trader in 2023”</p>
                                        </div>
                                        <div class="item-time"><span class="color-grey-500 font-xs">Just now</span>
                                        </div>
                                    </div>
                                    <div class="item-notify">
                                        <div class="item-image"><img
                                                src="{{ asset('theme/iori') }}/imgs/template/user5.png" alt="iori">
                                        </div>
                                        <div class="item-info">
                                            <p class="color-grey-500 font-xs"><strong class="font-xs-bold">Steven
                                                    Job</strong>like started a poll in your post “How to be a good
                                                trader in 2023”</p>
                                        </div>
                                        <div class="item-time"><span class="color-grey-500 font-xs">Just now</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="site-copyright color-grey-400 mt-0">
                        <div class="box-download-app">
                            <p class="font-xs color-grey-400 mb-25">Download our Apps and get extra 15% Discount on your
                                first Order…!</p>
                            <div class="mb-25"><a class="mr-10" href="#"><img
                                        src="{{ asset('theme/iori') }}/imgs/template/appstore.png" alt="iori"></a><a
                                    href="#"><img src="{{ asset('theme/iori') }}/imgs/template/google-play.png"
                                        alt="iori"></a></div>
                            <p class="font-sm color-grey-400 mt-20 mb-10">Secured Payment Gateways</p><img
                                src="{{ asset('theme/iori') }}/imgs/template/payment-method.png" alt="iori">
                        </div>
                        <div class="mb-0">Copyright 2023 &copy; IORI - Marketplace Template.<br>Designed by<a
                                href="http://alithemes.com" target="_blank">&nbsp; AliThemes</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>