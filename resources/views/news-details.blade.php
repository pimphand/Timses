@extends('theme.iori.app')
@section('content')
<!-- Page Banner Start -->
<section class="pageBanner blog_details_banner"
    style="background-image: url({{asset('frontend')}}/images/bg/banner.png);">
    <div class="vmiddle">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="postAuthor">
                        <img src="{{asset('frontend')}}/images/blog/1.png" alt="" />
                        <p>admin</p>
                        <span>Published : {{$news->publish_date}}</span>
                    </div>
                    <h2 class="banner-title">{{$news->title}}</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Page Banner End -->

<!-- Blog Start -->
<section class="singleBlog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blogDetails">
                    <div class="blogImg text-center mb-25">
                        <img src="{{asset($news->image)}}" alt="" width="50%" />
                    </div>
                </div>
                <div class="color-grey-900 font-lg-bold mb-25">
                    {!! $news->description!!}
                </div>

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