@extends('layouts.app')
@section('content')

    <!-- Hero Banner Start -->
    <section class="heroBanner03" id="home">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 animated pnl">
                    <div class="bLayer move_anim">
                        <img src="{{asset('frontend')}}/images/home3/layer.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="bannerContent02">
                        <div class="sub-title animated">Digital solutions</div>
                        <h2 class="animated">We Care About Your Business Using <span>Diabs</span></h2>
                        <ul class="animated">
                            <li><i class="dgita-check"></i>Research your niche and competitors.</li>
                            <li><i class="dgita-check"></i>Create content that gets your business found.</li>
                        </ul>
                        <a class="dgBtn animated" href="service.html">Our Services</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Banner End -->

    <!-- Progress Start -->
    <section class="progressSection03" id="profile">
        <div class="SecLayerimg move_anim">
            <img src="{{asset('frontend')}}/images/bg/s20.png" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="subTitle">company@gmail.com</div>
                    <h2 class="secTitle">We Develop & Create Digital Future</h2>
                    <p class="secDesc">
                        There are many variations of passages of Lorem Ipsum available but the majority have suffered
                        alteration in some form
                    </p>
                    <div class="single_skill" data-parcent="92">
                        <p>Design</p>
                        <div class="ss_parent">
                            <div class="ss_child"></div>
                            <span>92%</span></div>
                    </div>
                    <div class="single_skill" data-parcent="98">
                        <p>Web Development</p>
                        <div class="ss_parent">
                            <div class="ss_child"></div>
                            <span>98%</span></div>
                    </div>
                    <div class="single_skill" data-parcent="87">
                        <p>Optimization</p>
                        <div class="ss_parent">
                            <div class="ss_child"></div>
                            <span>87%</span></div>
                    </div>
                </div>
                <div class="col-xl-5 offset-xl-1 col-lg-6">
                    <div class="tw-stretch-element-inside-column">
                        <div class="abImg">
                            <img src="{{asset('frontend')}}/images/home3/3.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Progress End -->

    <!-- Work Process Start -->
    <section class="wordProcessSection02" id="visimisi">
        <div class="SecLayerimg move_anim">
            <img src="{{asset('frontend')}}/images/bg/s21.png" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="subTitle">Working Process</div>
                    <h2 class="secTitle">Our Working Process</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="iconbox02 clearfix">
                        <div class="ibbox">
                            <img src="{{asset('frontend')}}/images/process/1.png" alt=""/>
                        </div>
                        <h3>Discovery</h3>
                        <p>
                            Consectetur adipiscing elit, sed do
                            eiusmod tempor incididunt ut labore
                            et dolore magna aliqua.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="iconbox02 clearfix">
                        <div class="ibbox">
                            <img src="{{asset('frontend')}}/images/process/2.png" alt=""/>
                        </div>
                        <h3>Planning</h3>
                        <p>
                            Consectetur adipiscing elit, sed do
                            eiusmod tempor incididunt ut labore
                            et dolore magna aliqua.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="iconbox02 clearfix">
                        <div class="ibbox">
                            <img src="{{asset('frontend')}}/images/process/4.png" alt=""/>
                        </div>
                        <h3>Delivery</h3>
                        <p>
                            Consectetur adipiscing elit, sed do
                            eiusmod tempor incididunt ut labore
                            et dolore magna aliqua.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="proBorder">
                        <img src="{{asset('frontend')}}/images/home3/4.png" alt=""/>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Work Process End -->
    <!-- Folio Start -->
    <section class="folioSection02" id="agenda">
        <div class="SecLayerimg move_anim2">
            <img src="{{asset('frontend')}}/images/bg/s22.png" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="subTitle">Case Studies</div>
                    <h2 class="secTitle">Our Latest Case Studies and<br> Success Stories</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="folioItem02">
                        <img src="{{asset('frontend')}}/images/folio/4.jpg" alt="">
                        <div class="folioCon">
                            <h3><a href="single-folio.html">Championing Autism Awareness Week</a></h3>
                            <p class="cate"><a href="folio1.html">Creative Design</a></p>
                            <p>
                                We’re consultants, guides, and partners for brands on digital transformation
                            </p>
                            <div class="flmore">
                                <a href="single-folio.html">Explore Learning <i class="dgita-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="folioItem02">
                        <img src="{{asset('frontend')}}/images/folio/5.jpg" alt="">
                        <div class="folioCon">
                            <h3><a href="single-folio.html">Mastering the art of virtual collaboration</a></h3>
                            <p class="cate"><a href="folio1.html">Marketing</a></p>
                            <p>
                                We’re consultants, guides, and partners for brands on digital transformation
                            </p>
                            <div class="flmore">
                                <a href="single-folio.html">Explore Learning <i class="dgita-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="folioItem02">
                        <img src="{{asset('frontend')}}/images/folio/6.jpg" alt="">
                        <div class="folioCon">
                            <h3><a href="single-folio.html">Jamuna Company Creative Design</a></h3>
                            <p class="cate"><a href="folio1.html">Development</a></p>
                            <p>
                                We’re consultants, guides, and partners for brands on digital transformation
                            </p>
                            <div class="flmore">
                                <a href="single-folio.html">Explore Learning <i class="dgita-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <a class="dgBtn_two" href="folio1.html"><span>Semua Berita</span></a>
                </div>
            </div>
        </div>
    </section>
    <!-- Folio End -->
@endsection
