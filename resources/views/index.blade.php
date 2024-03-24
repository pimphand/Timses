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
                        <div class="sub-title animated" id="jargon">Jargon</div>
                        <h2 class="animated">Program kerja</h2>
                        <ul class="animated" id="_program_kerja">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Hero Banner End -->
    <section class="slider_01" id="profile">
        <div class="SecLayerimg move_anim2">
            <img src="{{asset('frontend')}}/images/bg/s1.png" alt="">
        </div>
        <div class="container">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-lg-7 animated mt-5">
                                <h2 class="secTitle animated" id="nama_lengkap"></h2>
                                <p class="secDesc animated" id="biodata"></p>
                                <ul class="listItem animated" id="prestasi"></ul>
                            </div>
                            <div class="col-lg-5">
                                <div class="tw-stretch-element-inside-column">
                                    <div class="move_anim">
                                        <img src="{{asset('')}}/images/paslon/17110925561.png" id="photo_1" width="50%"
                                             alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-lg-7 animated">
                                <h2 class="secTitle" id="nama_wakil"></h2>
                                <p class="secDesc" id="biodata_wakil">
                                </p>
                                <ul class="listItem animated" id="prestasi_wakil">
                                </ul>
                            </div>
                            <div class="col-lg-5 move_anim">
                                <div class="tw-stretch-element-inside-column"
                                     style="margin-left: 0px; margin-right: -270px;">
                                    <div class="move_anim">
                                        <img src="{{asset('frontend')}}/images/home1/3.png" id="photo_2" width="50%"
                                             alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Work Process Start -->
    <section class="aboutSection01 mt-4" id="visimisi">
        <div class="SecLayerimg">
            <img src="{{asset('frontend')}}/images/bg/2.png" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="subTitle">Visi Misi</div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="secTitle" id="visi">Visi</h2>
                </div>
            </div>
            <div class="row" id="misi">

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
                    <div class="subTitle">Artikel</div>
                </div>
            </div>
            <div class="row" id="_news">

            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <a class="dgBtn_two" href="{{route('all-news')}}"><span>Semua Berita</span></a>
                </div>
            </div>
        </div>
    </section>
    <!-- Folio End -->
@endsection

@push('js')
    <script>
        formAjax({}, "{{route('data')}}", 'get',).then(function (response) {
                //news
                response.news.forEach(function (item) {
                    let url = "{{route('news-detail', ':id')}}";
                    url = url.replace(':id', item.slug);
                    $('#_news').append(`
                    <div class="col-lg-4 col-md-6">
                    <div class="folioItem02">
                        <img src="{{asset('')}}${item.image}" alt="">
                        <div class="folioCon">
                            <h3>${item.title}</h3>
                            <p style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                ${truncateText(item.description, 50)}
                            </p>
                            <div class="flmore">
                                <a href="${url}">Baca Selengkapnya <i class="dgita-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                    `)
                })
                $('#jargon').html(response.data.data_1.jargon)
                //let program_kerja = ` <li><i class="dgita-check"></i>Program kerja yang menonjol</li>`
                response.data.data_1.program_kerja.forEach(function (item) {
                    $('#_program_kerja').append(`<li><i class="dgita-check"></i>${item}</li>`)
                })

                //visi
                $('#visi').html(response.data.data_3.visi)
                response.data.data_3.misi.forEach(function (item) {
                    $('#misi').append(`<div class="col-lg-4 col-md-6 mt-2">
                        <div class="iconbox02 clearfix serviceItem01">
                            <p>
                                ${item}
                            </p>
                        </div>
                    </div>`)
                })

                //nama_lengkap
                $('#nama_lengkap').html(response.data.data_2.nama)
                $('#biodata').html(response.data.data_2.biodata)
                $('#prestasi').html('')
                //photo_1
                $('#photo_1').attr('src', `{{asset('')}}${response.data.data_2.photo_1}`)
                //width="50%" photo_1

                response.data.data_2.prestasi.forEach(function (item) {
                    $('#prestasi').append(`
                    <div class="single_skill" data-parcent="">
                       <p> <i class="dgita-check"></i> ${item}</p>
                    </div>`)
                })

                $('#nama_wakil').html(response.data.data_2.wakil_biodata)
                $('#biodata_wakil').html(response.data.data_2.wakil_biodata)
                $('#prestasi_wakil').html('')
                //photo_1
                $('#photo_2').attr('src', `{{asset('')}}${response.data.data_2.photo_2}`)
                response.data.data_2.wakil_prestasi.forEach(function (item) {
                    $('#prestasi_wakil').append(`
                    <div class="single_skill" data-parcent="">
                       <p><i class="dgita-check"></i> ${item}</p>
                    </div>`)
                })
            }
        ).catch(function (error) {

        });

        function truncateText(text, maxLength) {
            if (text.length > maxLength) {
                return text.substring(0, maxLength) + '...';
            }
            return text;
        }

        $('.carousel').carousel({
            interval: 4000
        })
    </script>
@endpush

@push('css')
    <style>
        .slider-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .slider-item {
            position: relative;
        }

        .slider-item img {
            width: 100%;
            height: auto;
            display: block;
        }

        .slider-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.7);
        }

        .secTitle {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .biodata {
            font-size: 1rem;
        }

        .prestasi .single_skill {
            /* Your styles */
        }

        /* Media Query for Mobile */
        @media (max-width: 768px) {
            .slider-content {
                width: 90%;
                max-width: 300px; /* Or adjust according to your design */
                padding: 10px;
            }

            .secTitle {
                font-size: 1.2rem;
            }

            .biodata {
                font-size: 0.9rem;
            }
        }
    </style>
@endpush
