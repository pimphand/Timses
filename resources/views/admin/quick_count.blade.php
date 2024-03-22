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

                <h4 class="page-title">Rekap Data</h4>
            </div>
        </div>
    </div>
    <div class="row m-3">
        <div class="col-sm-4 col-xxl-4">
            <h5>KAB. SUKABUMI</h5>
            <div id="chart">
            </div>
        </div>
        <div class="col-sm-4 col-xxl-4" id="show_kecamatan" style="display: none;">
            <h5>Kecamatan <span id="_kecamatan_name"></span></h5>
            <div id="kecamatan_chart">
            </div>
        </div>
        <div class="col-sm-4 col-xxl-4" id="show_kelurahan" style="display: none;">
            <h5>Kelurahan <span id="_kelurahan_name"></span></h5>
            <div id="kelurahan_chart">
            </div>
        </div>
    </div>

    <div class="col-sm-12 col-xxl-12">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-4">
                        <input type="text" class="form-control" id="example-disable" disabled="" value="JAWA BARAT">
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" id="example-disable" disabled="" id="city"
                               value="KABUPATEN SUKABUMI">
                    </div>
                    <div class="col-4">
                        <select type="text" class="form-control" id="subdistrict" name="subdistrict">
                            <option value="" disabled selected>Pilih Kecamatan</option>
                        </select>
                    </div>
                    <div class="col-4 mt-3">
                        <select type="text" class="form-control" id="village" name="village_id">
                            <option value="" disabled selected>Pilih Kelurahan/Desa</option>
                        </select>
                    </div>
                    <div class="col-4 mt-3">
                        <select type="text" class="form-control" id="tps" name="tps">
                            <option value="" disabled selected>Pilih TPS</option>
                        </select>
                    </div>
                </div> <!-- end row-->
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div>
    <div class="row mb-5" id="_data-recap-show">

        <div class="col-sm-3 col-xxl-3" id="_data_tps" style="display: none;">
            <div class="card">
                <div class="card-body">
                    <dl class="row mb-0">
                        <dt class="col-sm-6">TOTAL SUARA</dt>
                        <dd class="col-sm-6" id="data_total">-</dd>
                        <dt class="col-sm-6">SUARA SAH</dt>
                        <dd class="col-sm-6" id="data_valid">-</dd>
                        <dt class="col-sm-6">SUARA TIDAK SAH</dt>
                        <dd class="col-sm-6" id="data_invalid">-</dd>
                    </dl>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div>
        <div class="col-xl-12">
            <div class="mb-4">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button fw-medium collapsed" type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                File Upload
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                             data-bs-parent="#accordionExample" style="">
                            <div class="accordion-body">
                                <div class="col-12 accordion-body">
                                    <div class="card-group" id="_data-upload"></div> <!-- end card-group-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button fw-medium collapsed" type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Perolehan Suara Paslon
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                             data-bs-parent="#accordionExample" style="">
                            <div class="col-12 accordion-body">
                                <div class="card-group" id="_data-recap"></div> <!-- end card-group-->
                            </div>
                        </div>
                    </div>

                </div>

            </div> <!-- end card-->
        </div>
    </div>
    <!-- Center modal content -->
    <div class="modal fade" id="centermodal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myCenterModalLabel"></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="" id="image" width="100%">
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@push('js')
    <script src="{{asset('assets')}}/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.0/dayjs.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.0/plugin/quarterOfYear.min.js"></script>
    <script>
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
            formAjax({}, "{{route('quickCount.data')}}?getKecamatan=" + district_id, 'get',).then(function (response) {
                $('#_data_kecamatan').text(response.data);
                $('#show_kecamatan').show();

                var seriesData = response.data.series;
                var labelsData = response.data.labels;
                var options = {
                    series: seriesData,
                    chart: {
                        width: 400,
                        type: 'pie',
                        dataLabels: {
                            offset: 0,
                            minAngleToShowLabel: 10
                        },
                    },

                    labels: labelsData,
                    legend: {
                        position: 'bottom',
                        horizontalAlign: 'left',
                    },
                };

                if (response.data.series.length > 0) {
                    $('#kecamatan_chart').html('');
                    var chart = new ApexCharts(document.querySelector("#kecamatan_chart"), options);
                    chart.render();
                } else {
                    $("#kecamatan_chart").html('<h5>Data Tidak Ditemukan</h5>');
                }
            }).catch(function (error) {
                // Handle errors if any
                console.error('Error fetching data:', error);
            });
        });

        $('#village').change(function () {
            let village_id = $(this).val();
            let district_id = $('#subdistrict option:selected').val();
            $('#tps').html('');
            formAjax({}, "{{route('tps.data')}}?getTps=1&village_id=" + village_id + "&district_id=" + district_id, 'get',).then(function (response) {

                let option = '<option value="" disabled selected>Pilih TPS</option>';
                response.forEach(function (data) {
                    option += `<option value="${data.id}">${data.name}</option>`;
                });
                $('#tps').append(option);
            }).catch(function (error) {
                // Handle errors if any
                console.error('Error fetching data:', error);
            });
            formAjax({}, "{{route('quickCount.data')}}?getKelurahan=" + village_id, 'get',).then(function (response) {
                $('#_kelurahan_name').text($('#village option:selected').text());
                $('#show_kelurahan').show();

                var seriesData = response.data.series;
                var labelsData = response.data.labels;
                var options = {
                    series: seriesData,
                    chart: {
                        width: 400,
                        type: 'pie',
                        dataLabels: {
                            offset: 0,
                            minAngleToShowLabel: 10
                        },
                    },

                    labels: labelsData,
                    legend: {
                        position: 'bottom',
                        horizontalAlign: 'left',
                    },
                };

                if (response.data.series.length > 0) {
                    $('#kelurahan_chart').html('');
                    var chart = new ApexCharts(document.querySelector("#kelurahan_chart"), options);
                    chart.render();
                } else {
                    $("#kelurahan_chart").html('<h5>Data Tidak Ditemukan</h5>');
                }
            }).catch(function (error) {
                // Handle errors if any
                console.error('Error fetching data:', error);
            });
        });

        $('#tps').change(function () {
            let tps_id = $(this).val();
            formAjax({}, "{{route('data-recap.index')}}?tps_id=" + tps_id, 'get',).then(function (response) {
                $('#_data-recap-show').show('');
                $('#_data-upload').html('');
                $('#_data-recap').html('');
                //hide
                $('#_data_tps').show();
                response.details.forEach(function (data) {
                    $('#_data-recap').append(`
                    <div class="card d-block">
                        {{--<img class="card-img-top" src="{{asset('')}}" alt="Card image cap">--}}
                    <div class="card-body">
                        <h5 class="card-title">${data.candidate.name} & ${data.candidate.vice_name}</h5>
                            <p class="card-text">Total Suara : ${data.vote}</p>
                        </div>
                    </div>
                    `)
                })

                for (let i = 1; i < 4; i++) {
                    $('#_data-upload').append(`
                        <div class="card d-block">
                            <a href="javascript:void(0)" class="photo_${i}"><img class="card-img-top"  src="{{asset('')}}${response['photo_' + i]}" alt="Card image cap"></a>
                        </div>
                    `);
                }

                $('#data_valid').text(response.data_valid);
                $('#data_invalid').text(response.data_invalid);
                $('#data_total').text(response.data_total);

            }).catch(function (error) {
                // Handle errors if any
                console.error('Error fetching data:', error);
            });
        });

        for (let i = 1; i < 4; i++) {
            $(document).on('click', `.photo_${i}`, function () {
                $('#centermodal').modal('show');
                $('#image').attr('src', "{{asset('assets')}}/images/small/small-1.jpg");
            });
        }

        //get data suara Kota
        formAjax({}, "{{route('quickCount.data')}}?getKota=1", 'get',).then(function (response) {
            var seriesData = response.data.series;
            var labelsData = response.data.labels;
            var options = {
                series: seriesData,
                chart: {
                    width: 400,
                    type: 'pie',
                    dataLabels: {
                        offset: 0,
                        minAngleToShowLabel: 10
                    },
                },

                labels: labelsData,
                legend: {
                    position: 'bottom',
                    horizontalAlign: 'left',
                },
            };

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
        }).catch(function (error) {
            console.error('Error fetching data:', error);
        });

    </script>
@endpush
