@extends('theme.iori.app')

@section('content')

<section class="section banner-8">
    <div class="asset-1 shape-1"></div>
    <div class="asset-2 shape-2"></div>
    <div class="asset-3 shape-3"></div>
    <div class="asset-4 shape-1"></div>
    <div class="asset-5 shape-2"></div>
    <div class="box-banner-home8">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-10 m-auto">
                    <div class="text-center">
                        <h1 class="color-brand-1 mb-25 mt-10 wow animate__animated animate__fadeInUp"
                            data-wow-delay=".2s">{{ $data['jargon'][0] }}</h1>
                        <p class="font-md color-grey-500 mb-25 wow animate__animated animate__fadeInUp"
                            data-wow-delay=".4s">{{ $data['jargon'][1] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-80 wow animate__animated animate__fadeIn">
        <div class="box-swiper">
            <div class="swiper-container swiper-group-7-center">
                <div class="swiper-wrapper">
                    @foreach ($data['images'] as $image)
                    <div class="swiper-slide">
                        <div class="card-member-2 mb-30">
                            <div class="card-image"><img src="{{ asset($image->path) }}" alt="iori">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="box-button-slider-bottom">
                    <div class="swiper-button-prev swiper-button-prev-group-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                    </div>
                    <div class="swiper-button-next swiper-button-next-group-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section pt-0 pb-50 bg-core-value bg-7 mb-40 mt-100">
    <div class="container">
        <div class="row box-list-core-value">
            <div class="col-lg-4 mb-70">
                <div class="box-core-value pl-0">
                    <h1 class="color-brand-1 mb-15 wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                        Visi & Misi</h1>
                    <p class="font-md color-grey-400 wow animate__animated animate__fadeIn" data-wow-delay=".2s">{{
                        $data['visiMisi']['visi'] }}</p>
                    <div class="mt-30 wow animate__animated animate__fadeIn" data-wow-delay=".4s"><a
                            class="btn btn-white-circle font-sm-bold border-brand" href="#">DAFTAR RELAWAN</a></div>
                </div>
            </div>
            <div class="col-lg-4">
                <ul class="list-core-value list-core-value-white">
                    <li class="wow animate__animated animate__fadeIn" data-wow-delay=".0s"><span class="ticked"></span>
                        <h5 class="color-brand-1 mb-5">Customers First</h5>
                        <div class="box-border-dashed">
                            <p class="font-md color-grey-500 mb-20">Our company exists to help merchants sell
                                more. We make every decision and measure every outcome based on how well it
                                serves our customers.</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-lg-4">
                <ul class="list-core-value list-core-value-white">
                    <li class="wow animate__animated animate__fadeIn" data-wow-delay=".0s"><span class="ticked"></span>
                        <h5 class="color-brand-1 mb-5">Think Big</h5>
                        <div class="box-border-dashed">
                            <p class="font-md color-grey-500 mb-20">Being the world's leading commerce platform
                                requires unrivaled vision, innovation and execution. We never settle. We
                                challenge our ideas of what’s possible in order to better meet the needs of our
                                customers.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="section mt-50 mb-30">
    <div class="container">
        <div class="text-center mb-70">
            <h2 class="color-brand-1 mb-20 wow animate__animated animate__fadeInUp" data-wow-delay=".0s">Calon Bupati
                @if (isset($data['calon_bupati']))
                Dan Calon Wakil Bupati
                @endif Sukabumi</h2>
        </div>
        <div class="row mt-50 mb-100">
            <div class="col-xl-7 col-lg-6">
                <div class="box-images-project">
                    <div class="box-images mt-50">
                        <img class="img-main-2" src="{{ asset('') }}/{{ $data['bupati']['foto'] }}" alt="iori"
                            width="60%">
                        <div class="image-2 shape-3">
                            <img src="{{ asset('theme/iori') }}/imgs/page/homepage1/finger.png" alt="iori">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-6">
                <h3 class=" wow animate__animated animate__fadeInUp" data-wow-delay=".0s">
                    {{ $data['bupati']['nama'] }}
                </h3>
                <p class="font-md color-grey-400 wow animate__animated animate__fadeInUp text-end mb-2"
                    data-wow-delay=".2s">
                    {{ $data['bupati']['description'] }}</p>
                <div class="mt-20 wow animate__animated animate__fadeInUp" data-wow-delay=".0s">
                    <ul class="list-ticks text-end">
                        @foreach ($data['bupati']['prestasi'] as $bu_prestasi)
                        <li class="mr-2">
                            <svg class="w-6 h-6 icon-16" fill="none" stroke="currentColor" viewbox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>{{ $bu_prestasi }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @if (isset($data['wakilbupati']))
        <div class="row mb-100 mt-50 project-revert">
            <div class="col-xl-5 col-lg-6">
                <h3 class=" wow animate__animated animate__fadeInUp" data-wow-delay=".0s">
                    {{ $data['wakilbupati']['nama'] }}
                </h3>
                <p class="font-md color-grey-400 wow animate__animated animate__fadeInUp text-end mb-2"
                    data-wow-delay=".2s">
                    {{ $data['wakilbupati']['description'] }}</p>
                <div class="mt-20 wow animate__animated animate__fadeInUp" data-wow-delay=".0s">
                    <ul class="list-ticks">
                        @foreach ($data['wakilbupati']['prestasi'] as $buw_prestasi)
                        <li class="mr-2">
                            <svg class="w-6 h-6 icon-16" fill="none" stroke="currentColor" viewbox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>{{ $buw_prestasi }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-xl-7 col-lg-6">
                <div class="box-images-project">
                    <div class="box-images mt-50">
                        <img class="img-main-2 text-item-end" src="{{ asset('') }}/{{ $data['wakilbupati']['foto'] }}"
                            alt="iori" width="60%">
                        <div class="image-2 shape-3"><img src="{{ asset('theme/iori') }}/imgs/page/homepage1/Union.png"
                                alt="iori"></div>
                        <div class="image-3 shape-1"><img src="{{ asset('theme/iori') }}/imgs/page/homepage1/eye.png"
                                alt="iori"></div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    <div class="border-bottom"></div>
</section>
<section class="section mt-50">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-8 col-md-8">
                <h2 class="color-brand-1 mb-20 wow animate__animated animate__fadeInUp" data-wow-delay=".0s">
                    Berita Terbaru
                </h2>
            </div>
            <div class="col-lg-4 col-md-4 text-md-end text-start wow animate__animated animate__fadeInUp"
                data-wow-delay=".4s"><a href="{{ route('all-news') }}" class="btn btn-default font-sm-bold pl-0">Semua
                    Berita
                    <svg class="w-6 h-6 icon-16 ml-5" fill="none" stroke="currentColor" viewbox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3">
                        </path>
                    </svg>
                </a>
            </div>
        </div>
        <div class="row mt-55">

            @foreach ($data['news'] as $news)
            <div class="col-xl-3 col-lg-6 col-md-6 wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                <div class="card-blog-grid card-blog-grid-2 hover-up">
                    <div class="card-image img-reveal">
                        <a href="{{ route('news-detail', $news->slug) }}">
                            <img src="{{ asset($news->image) }}" alt="{{ $news->slug }}">
                        </a>
                    </div>
                    <div class="card-info">
                        <a href="{{ route('news-detail', $news->slug) }}">
                            <h6 class="color-brand-1">{{ $news->title }}</h6>
                        </a>
                        <p class="font-sm color-grey-500 mt-20">
                            {!! Str::limit($news->description, 45, '...') !!}
                        </p>
                        <div class="mt-20 d-flex align-items-center border-top pt-20">
                            <a class="btn btn-border-brand-1 mr-15" href="{{ route('news-detail', $news->slug) }}"></a>
                            <span class="date-post font-xs color-grey-300 mr-15">
                                <svg class="w-6 h-6 icon-16" fill="none" stroke="currentColor" viewbox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>{{ $news->publish_date }}</span><span class="time-read font-xs color-grey-300">
                                <svg class="w-6 h-6 icon-16" fill="none" stroke="currentColor" viewbox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                3 mins read
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>

</section>

@endsection