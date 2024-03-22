@extends('layouts.app')
@section('content')
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
                            <img src="{{asset($new->image)}}" alt=""/>
                            <div class="blogContent">
                                <h3><a href="{{route('news-detail', $new->slug)}}">{{$new->title}}</a></h3>
                                {{--                                publish date--}}
                                <p>publish: {{$new->publish_date}}</p>
                                <p>{!! Str::limit($new->description, 100) !!}</p>
                                <a href="{{route('news-detail', $new->slug)}}"
                                   class="dgBtn_two"><span>Baca selengkapnya</span></a>
                            </div>
                        </div>
                    </div>

                @endforeach
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
