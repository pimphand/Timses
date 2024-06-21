@extends('theme.iori.app')
@section('content')
{{--
<!-- Page Banner Start -->
<section class="pageBanner" style="background-image: url({{asset('frontend')}}/images/bg/banner.png);">
    <div class="vmiddle">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <h2 class="banner-title">Agenda dan Kegiatan</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Page Banner End -->

<!-- Blog Start -->
<section class="blogPage02">
    <div class="SecLayerimg move_anim">
        <img src="{{asset('frontend')}}/images/bg/s33.png" alt="">
    </div>
    <div class="container">
        <div class="row">
            @foreach($news as $new)
            <div class="col-lg-4 col-md-6">
                <div class="blogItem02">
                    <img src="{{asset($new->image)}}" alt="" />
                    <div class="blogContent">
                        <h3><a href="{{route('news-detail', $new->slug)}}">{{$new->title}}</a></h3>
                        {{-- publish date--}}
                        {{-- </p>
                        <p>{!! Str::limit($new->description, 100) !!}</p>
                        <a href="{{route('news-detail', $new->slug)}}" class="dgBtn_two"><span>Baca
                                selengkapnya</span></a>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>
</section> --}}
<section class="section mt-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center"><span class="btn btn-tag wow animate__ animate__fadeIn animated"
                    data-wow-delay=".0s" style="visibility: visible; animation-delay: 0s; animation-name: fadeIn;">The
                    Iori Blog</span>
                <h2 class="color-brand-1 mt-15 wow animate__ animate__fadeIn animated" data-wow-delay=".2s"
                    style="visibility: visible; animation-delay: 0.2s; animation-name: fadeIn;">Insight and advice
                    from<br class="d-none d-lg-block">our expert team</h2>
            </div>
        </div>

        <div class="box-list-blogs">
            <div class="row">

                @foreach ($news as $item)
                <div class="col-lg-4 col-md-6 mb-30 item-article other">
                    <div class="card-blog-grid card-blog-grid-3 hover-up">
                        <div class="card-image">
                            <a href="{{ route('news-detail', $item->slug) }}">
                                <img src="{{ asset($item->image) }}" alt="{{ $item->slug }}">
                            </a>
                        </div>
                        <div class="card-info">
                            <a href="{{ route('news-detail', $item->slug) }}">
                                <h4 class="color-brand-1">
                                    {{ $item->title }}
                                </h4>
                            </a>
                            <div class="mb-25 mt-10"><span class="font-xs color-grey-500">November 17, 2022</span><span
                                    class="font-xs color-grey-500 icon-read">4 min read</span></div>
                            <p class="font-sm color-grey-500 mt-20">
                                {!! Str::limit($item->description, 45, '...') !!}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
<script>
    $("._to_home").click(function () {
            //href to /
            window.location.href = "/" + $(this).attr('href');
        });
</script>
@endpush