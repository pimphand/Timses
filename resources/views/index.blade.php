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
        <div class="rev_slider_wrapper">
            <div id="rev_slider_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.1">
                <ul>
                    <li data-index="rs-3045" data-transition="random-premium" data-slotamount="default"
                        data-hideafterloop="0" data-hideslideonmobile="off" data-easein="Power3.easeInOut"
                        data-easeout="Power3.easeInOut" data-masterspeed="1000" data-thumb="" data-rotate="0"
                        data-saveperformance="off" data-title="" data-param1="" data-param2="" data-param3=""
                        data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9=""
                        data-param10="" data-description="">
                        <img src="{{asset('frontend')}}/images/slider/s1.jpg" alt="dgita"
                             data-bgposition="center center"
                             data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="0" class="rev-slidebg"
                             data-no-retina>
                        <div class="tp-caption rs-parallaxlevel-1 d-md-none d-sm-none d-xs-none d-lg-block"

                             data-frames='[{"delay":1200,"speed":1000,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"power2.out"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'

                             data-type="image"
                             data-x="center"
                             data-y="center"
                             data-hoffset="['0','0','0','0']"
                             data-voffset="['0','0','0','0']"
                             data-width="['100%']"
                             data-height="['auto']"

                             data-visibility="['on', 'on', 'off', 'off']"

                        ><img src="{{asset('frontend')}}/images/slider/layer.png" alt="Layer"></div>
                        <div class="tp-caption ws_nowrap"
                             data-x="['left', 'left', 'center', 'center']"
                             data-hoffset="['0']"

                             data-y="['middle']"

                             data-fontsize="['20','20','20','20']"
                             data-fontweight="400"
                             data-lineheight="['26','26','26','26']"
                             data-letterspacing=".62"
                             data-width="[100%]"
                             data-height="['auto']"
                             data-whitesapce="['normal']"
                             data-color="['#03030f']"

                             data-type="text"
                             data-responsive_offset="on"

                             data-frames='[{"delay":1400,"speed":400,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'

                             data-textAlign="['left', 'left', 'center', 'center']"
                             data-paddingtop="[0,0,0,0]"
                             data-paddingright="[0,0,50,20]"
                             data-paddingbottom="[0,0,0,0]"
                             data-paddingleft="[0,50,50,20]"

                        ><h2 class="secTitle" id="nama_lengkap">Nama Lengkap</h2>
                            <br>
                            <p class="biodata" id="biodata" style="width: 40%">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.Lorem ipsum dolor
                                sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                dolore magna aliqua. Ut enim ad minim veniam.
                            </p>

                            <div id="prestasi">
                                <div class="single_skill" data-parcent="">
                                    <p>Prestasi atau jabatan</p>
                                </div>
                            </div>
                        </div>
                        <div class="tp-caption headFont ws_nowrap"
                             data-x="['left', 'left', 'center', 'center']"
                             data-hoffset="['0', '0', '0', '0']"

                             data-y="['middle']"
                             data-voffset="['-12','-12','0','20']"

                             data-fontsize="['75','55','65','45']"
                             data-fontweight="700"
                             data-lineheight="['85','65','75','55']"
                             data-width="['640','550','100%','100%']"
                             data-height="['auto']"
                             data-whitesapce="['normal']"
                             data-color="['#03030f']"

                             data-type="text"
                             data-responsive_offset="off"

                             data-frames='[{"delay":1700,"speed":600,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'

                             data-textAlign="['left', 'left', 'center', 'center']"
                             data-paddingtop="[0,0,0,0]"
                             data-paddingright="[0,0,50,20]"
                             data-paddingbottom="[0,0,0,0]"
                             data-paddingleft="[0,50,50,20]"

                        >
                        </div>
                        <div class="tp-caption ws_nowrap"
                             data-x="['left', 'left', 'center', 'center']"
                             data-hoffset="['0', '0', '0', '0']"

                             data-y="['middle']"
                             data-voffset="['205','190','205','180']"

                             data-fontsize="['17']"
                             data-fontweight="500"
                             data-lineheight="['67']"
                             data-width="['100%']"
                             data-height="['auto']"
                             data-whitesapce="['normal']"
                             data-color="['#03030f']"

                             data-type="text"
                             data-responsive_offset="off"

                             data-frames='[{"delay":2100,"speed":600,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'

                             data-textAlign="['left', 'left', 'center', 'center']"
                             data-paddingtop="[0,0,0,0]"
                             data-paddingright="[0,0,50,20]"
                             data-paddingbottom="[0,0,0,0]"
                             data-paddingleft="[0,50,50,20]"

                        >
                        </div>
                        <div class="layer tp-caption rs-parallaxlevel-1 d-md-none d-sm-none d-xs-none d-lg-block"

                             data-frames='[{"delay":2500,"speed":600,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"power3.inOut"}]'

                             data-type="image"
                             data-x="right"
                             data-y="center"
                             data-hoffset="['-200','0','0','0']"
                             data-voffset="['50','0','0','0']"
                             data-width="['662','450','100','100']"
                             data-height="['auto']"

                             data-visibility="['on', 'on', 'off', 'off']"

                        ><img src="{{asset('frontend')}}/images/home1/layer.png" id="photo_1" alt="Layer"></div>
                    </li>
                    <li data-index="rs-3046" data-transition="random-premium" data-slotamount="default"
                        data-hideafterloop="0" data-hideslideonmobile="off" data-easein="Power3.easeInOut"
                        data-easeout="Power3.easeInOut" data-masterspeed="1000" data-thumb="" data-rotate="0"
                        data-saveperformance="off" data-title="" data-param1="" data-param2="" data-param3=""
                        data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9=""
                        data-param10="" data-description="">
                        <img src="{{asset('frontend')}}/images/slider/s1.jpg" alt="dgita"
                             data-bgposition="center center"
                             data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="0" class="rev-slidebg"
                             data-no-retina>
                        <div class="tp-caption rs-parallaxlevel-1 d-md-none d-sm-none d-xs-none d-lg-block"

                             data-frames='[{"delay":1200,"speed":1000,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"power2.out"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'

                             data-type="image"
                             data-x="center"
                             data-y="center"
                             data-hoffset="['0','0','0','0']"
                             data-voffset="['0','0','0','0']"
                             data-width="['100%']"
                             data-height="['auto']"

                             data-visibility="['on', 'on', 'off', 'off']"

                        ><img src="{{asset('frontend')}}/images/slider/layer.png" alt="Layer"></div>
                        <div class="tp-caption ws_nowrap"
                             data-x="['left', 'left', 'center', 'center']"
                             data-hoffset="['0']"

                             data-y="['middle']"

                             data-fontsize="['20','20','20','20']"
                             data-fontweight="400"
                             data-lineheight="['26','26','26','26']"
                             data-letterspacing=".62"
                             data-width="[100%]"
                             data-height="['auto']"
                             data-whitesapce="['normal']"
                             data-color="['#03030f']"

                             data-type="text"
                             data-responsive_offset="on"

                             data-frames='[{"delay":1400,"speed":400,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'

                             data-textAlign="['left', 'left', 'center', 'center']"
                             data-paddingtop="[0,0,0,0]"
                             data-paddingright="[0,0,50,20]"
                             data-paddingbottom="[0,0,0,0]"
                             data-paddingleft="[0,50,50,20]"

                        ><h2 class="secTitle" id="nama_wakil">Nama Lengkap 2</h2>
                            <br>
                            <p class="biodata" id="biodata_wakil" style="width: 40%">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.Lorem ipsum dolor
                                sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                dolore magna aliqua. Ut enim ad minim veniam.
                            </p>

                            <div id="prestasi_wakil">
                                <div class="single_skill" data-parcent="">
                                    <p>Prestasi atau jabatan</p>
                                </div>
                            </div>
                        </div>
                        <div class="tp-caption headFont ws_nowrap"
                             data-x="['left', 'left', 'center', 'center']"
                             data-hoffset="['0', '0', '0', '0']"

                             data-y="['middle']"

                             data-fontsize="['20','20','20','20']"
                             data-fontweight="400"
                             data-lineheight="['26','26','26','26']"
                             data-letterspacing=".62"
                             data-width="[100%]"
                             data-height="['auto']"
                             data-whitesapce="['normal']"
                             data-color="['#03030f']"

                             data-type="text"
                             data-responsive_offset="off"

                             data-frames='[{"delay":1700,"speed":600,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'

                             data-textAlign="['left', 'left', 'center', 'center']"
                             data-paddingtop="[0,0,0,0]"
                             data-paddingright="[0,0,50,20]"
                             data-paddingbottom="[0,0,0,0]"
                             data-paddingleft="[0,50,50,20]"

                        >
                        </div>
                        <div class="tp-caption ws_nowrap"
                             data-x="['left', 'left', 'center', 'center']"
                             data-hoffset="['0', '0', '0', '0']"

                             data-y="['middle']"

                             data-fontsize="['17']"
                             data-fontweight="500"
                             data-lineheight="['67']"
                             data-width="['100%']"
                             data-height="['auto']"
                             data-whitesapce="['normal']"
                             data-color="['#03030f']"

                             data-type="text"
                             data-responsive_offset="off"

                             data-frames='[{"delay":2100,"speed":600,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'

                             data-textAlign="['left', 'left', 'center', 'center']"
                             data-paddingtop="[0,0,0,0]"
                             data-paddingright="[0,0,50,20]"
                             data-paddingbottom="[0,0,0,0]"
                             data-paddingleft="[0,50,50,20]"

                        >
                        </div>
                        <div class="layer tp-caption rs-parallaxlevel-1 d-md-none d-sm-none d-xs-none d-lg-block"

                             data-frames='[{"delay":2500,"speed":600,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"power3.inOut"}]'

                             data-type="image"
                             data-x="right"
                             data-y="center"
                             data-hoffset="['-200','0','0','0']"
                             data-voffset="['50','0','0','0']"
                             data-width="['662','450','100','100']"
                             data-height="['auto']"

                             data-visibility="['on', 'on', 'off', 'off']"

                        ><img src="{{asset('frontend')}}/images/home1/layer.png" id="photo_2" alt="Layer"></div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Work Process Start -->
    <section class="wordProcessSection02" id="visimisi">
        <div class="SecLayerimg move_anim">
            <img src="{{asset('frontend')}}/images/bg/s21.png" alt="">
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
                    <div class="subTitle">Berita</div>
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
                $('#jargon').html(response.data.data_1.jargon)
                //let program_kerja = ` <li><i class="dgita-check"></i>Program kerja yang menonjol</li>`
                response.data.data_1.program_kerja.forEach(function (item) {
                    $('#_program_kerja').append(`<li><i class="dgita-check"></i>${item}</li>`)
                })

                //visi
                $('#visi').html(response.data.data_3.visi)
                response.data.data_3.misi.forEach(function (item) {
                    $('#misi').append(`<div class="col-lg-4 col-md-6 mt-2">
                        <div class="iconbox02 clearfix">
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
                response.data.data_2.prestasi.forEach(function (item) {
                    $('#prestasi').append(`
                    <div class="single_skill" data-parcent="">
                       <p>${item}</p>
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
                       <p>${item}</p>
                    </div>`)
                })
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
            }
        ).catch(function (error) {

        });

        function truncateText(text, maxLength) {
            if (text.length > maxLength) {
                return text.substring(0, maxLength) + '...';
            }
            return text;
        }
    </script>
@endpush
