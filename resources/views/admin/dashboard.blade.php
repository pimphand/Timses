@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="bg-flower">
                <img src="{{asset('assets')}}/images/flowers/img-3.png">
            </div>

            <div class="bg-flower-2">
                <img src="{{asset('assets')}}/images/flowers/img-1.png">
            </div>

            <div class="page-title-box">
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>

        <div class="col-sm-3 col-xxl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="text-muted fw-normal mt-0 text-truncate" title="Campaign Sent">Relawan</h5>
                            <h3 class="my-1 py-1"><span id="_relawan">100</span> Orang</h3>
                        </div>
                        <div class="col-6">
                            <h5 class="text-muted fw-normal mt-0 text-truncate" title="Campaign Sent">Saksi</h5>
                            <h3 class="my-1 py-1"><span id="_saksi">100</span> Orang</h3>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->

    </div>
    <div class="row">
        <div class="col-sm-6 col-xxl-6">
            <div class="card">
                <div class="card-body">
                    <div dir="ltr">
                        <div id="_all_kecamatan" class="apex-charts" data-colors="#fa5c7c"></div>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
        <div class="col-sm-6 col-xxl-6">
            <div class="card">
                <div class="card-body">
                    <div dir="ltr">
                        <div id="_all_kelurahan" class="apex-charts" data-colors="#fa5c7c"></div>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->

        <div class="col-sm-4 col-xxl-4">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <select type="text" class="form-control mb-2" disabled>
                                <option value="" disabled selected>Kab. SUKABUMI</option>
                            </select>
                            <div class="mb-4">
                                <h4 class="fs-16">Kota</h4>
                                <div dir="ltr">
                                    <div id="chart" class="apex-charts" data-colors="#fa5c7c"></div>
                                </div>
                            </div>
                        </div>

                    </div> <!-- end row-->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div>
        <div class="col-sm-4 col-xxl-4">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <select type="text" class="form-control mb-2" id="subdistrict" name="subdistrict">
                                <option value="" disabled selected>Pilih Kecamatan</option>
                            </select>
                            <div class="mb-4">
                                <h4 class="fs-16">Kecamatan <span id="_kecamatan_name"></span></h4>
                                <div dir="ltr">
                                    <div id="kecamatan_chart" class="apex-charts" data-colors="#fa5c7c"></div>
                                </div>
                            </div>
                        </div>

                    </div> <!-- end row-->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div>
        <div class="col-sm-4 col-xxl-4">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <select type="text" class="form-control mb-2" id="village" name="village_id">
                                <option value="" disabled selected>Pilih Kelurahan/Desa</option>
                            </select>
                            <div class="mb-4">
                                <h4 class="fs-16">Pemilih dan Rewalan <span id="_kelurahan_name"></span></h4>
                                <div dir="ltr">
                                    <div id="_chart_kelurahan" class="apex-charts" data-colors="#fa5c7c"></div>
                                </div>
                            </div>
                        </div>

                    </div> <!-- end row-->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div>

        {{--        chart all kecamatan--}}
        {{--        <div class="col-sm-4 col-xxl-4">--}}
        {{--            <div class="card">--}}
        {{--                <div class="card-body">--}}
        {{--                    <div class="row align-items-center">--}}
        {{--                        <div class="col-12">--}}
        {{--                            <select type="text" class="form-control mb-2" disabled>--}}
        {{--                                <option value="" disabled selected>Kecamatan Sesukabumi</option>--}}
        {{--                            </select>--}}
        {{--                            <div class="mb-4">--}}
        {{--                                <h4 class="fs-16">Kota</h4>--}}
        {{--                                <div dir="ltr">--}}
        {{--                                    <div id="chart_all_district" class="apex-charts" data-colors="#fa5c7c"></div>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}

        {{--                    </div> <!-- end row-->--}}
        {{--                </div> <!-- end card-body -->--}}
        {{--            </div> <!-- end card -->--}}
        {{--        </div>--}}
    </div>

@endsection

@push('js')
    <script src="{{asset('assets')}}/vendor/apexcharts/apexcharts.min.js"></script>

    <!-- Apex Chart Column Demo js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.0/dayjs.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.0/plugin/quarterOfYear.min.js"></script>
    <script>
        formAjax({}, "{{route('dashboard.data')}}", 'get',).then(function (response) {
            var options = {
                series: [{
                    name: 'Relawan',
                    data: [response.vote_kota]
                }, {
                    name: 'Pemilih',
                    data: [response.hasil_kota]
                },],
                chart: {
                    type: 'bar',
                    height: 300,
                    stacked: true,
                    stackType: '100%'
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        legend: {
                            position: 'bottom',
                            offsetX: -10,
                            offsetY: 0
                        }
                    }
                }],
                xaxis: {
                    categories: ['Kab Sukabumi'],
                },
                fill: {
                    opacity: 1
                },
                legend: {
                    position: 'right',
                    offsetX: 0,
                    offsetY: 50
                },
            };

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
            kecamatan(response.series_kecamatan);
            kelurahan(response.series_kelurahan)
            $('#_relawan').text(response.vote_kota)
            $('#_saksi').text(response.saksi)
        }).catch(function (error) {
            // Handle errors if any
            console.error('Error fetching data:', error);
        });

        formAjax({}, "{{route('get.district')}}?city_id=3202", 'get',).then(function (response) {
            $('#subdistrict').html('');
            //option select district
            let option = '<option value="" disabled selected>Pilih Kecamatan</option>';
            response.forEach(function (data) {
                option += `<option value="${data.id}">${data.name}</option>`;
            });
            $('#subdistrict').append(option);
        }).catch(function (error) {
            // Handle errors if any
            console.error('Error fetching data:', error);
        });

        $('#subdistrict').change(function () {
            let district_id = $(this).val();
            //_kecamatan_name
            $('#_kecamatan_name').text($('#subdistrict option:selected').text());
            $('#village').html('');
            formAjax({}, "{{route('get.village')}}?district_id=" + district_id, 'get',).then(function (response) {
                let option = '<option value="" disabled selected>Pilih Kelurahan/Desa</option>';
                response.forEach(function (data) {
                    option += `<option value="${data.id}">${data.name}</option>`;
                });
                $('#village').append(option);
            }).catch(function (error) {
                // Handle errors if any
                console.error('Error fetching data:', error);
            });
            //get data suara Kota
            formAjax({}, "{{route('dashboard.data')}}?getKecamatan=" + district_id, 'get',).then(function (response) {
                $('#_data_kecamatan').text(response.data);
                $('#show_kecamatan').show();

                var options = {
                    series: [{
                        name: 'Relawan',
                        data: [response.vote_kecamatan]
                    }, {
                        name: 'Pemilih',
                        data: [response.hasil_kecamatan]
                    },],
                    chart: {
                        type: 'bar',
                        height: 300,
                        stacked: true,
                        stackType: '100%'
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            legend: {
                                position: 'bottom',
                                offsetX: -10,
                                offsetY: 0
                            }
                        }
                    }],
                    xaxis: {
                        categories: [$('#subdistrict option:selected').text()],
                    },
                    fill: {
                        opacity: 1
                    },
                    legend: {
                        position: 'right',
                        offsetX: 0,
                        offsetY: 50
                    },
                };

                $('#kecamatan_chart').html('');
                var chart = new ApexCharts(document.querySelector("#kecamatan_chart"), options);
                chart.render();
            }).catch(function (error) {
                // Handle errors if any
                console.error('Error fetching data:', error);
            });
        });

        $('#village').change(function () {
            let village_id = $(this).val();
            formAjax({}, "{{route('dashboard.data')}}?getKelurahan=" + village_id, 'get',).then(function (response) {
                $('#_kelurahan_name').text($('#village option:selected').text());
                $('#show_kelurahan').show();

                var options = {
                    series: [{
                        name: 'Relawan',
                        data: [response.vote_kelurahan]
                    }, {
                        name: 'Pemilih',
                        data: [response.hasil_kelurahan]
                    },],
                    chart: {
                        type: 'bar',
                        height: 300,
                        stacked: true,
                        stackType: '100%'
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            legend: {
                                position: 'bottom',
                                offsetX: -10,
                                offsetY: 0
                            }
                        }
                    }],
                    xaxis: {
                        categories: [$('#village option:selected').text()],
                    },
                    fill: {
                        opacity: 1
                    },
                    legend: {
                        position: 'right',
                        offsetX: 0,
                        offsetY: 50
                    },
                };

                $('#_chart_kelurahan').html('');
                var chart = new ApexCharts(document.querySelector("#_chart_kelurahan"), options);
                chart.render();
            }).catch(function (error) {
                // Handle errors if any
                console.error('Error fetching data:', error);
            });
        });

        //chart all kecamatan
        function kecamatan(response) {
            var options = {
                series: response.series,
                chart: {
                    width: 600,
                    type: 'pie',
                },
                labels: response.labels,
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 500
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            var chart = new ApexCharts(document.querySelector("#_all_kecamatan"), options);
            chart.render();
        }

        //chart all kecamatan
        function kelurahan(response) {
            var options = {
                series: response.series,
                chart: {
                    width: 600,
                    type: 'pie',
                },
                labels: response.labels,
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 500
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            var chart = new ApexCharts(document.querySelector("#_all_kelurahan"), options);
            chart.render();
        }
    </script>
@endpush
