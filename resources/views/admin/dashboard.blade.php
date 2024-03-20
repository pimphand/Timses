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
    </div>

    <div class="col-sm-12 col-xxl-12">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="mb-4">
                            <h4 class="fs-16">Pemilih dan Rewalan</h4>
                            <div dir="ltr">
                                <div id="chart" class="apex-charts" data-colors="#fa5c7c"></div>
                            </div>
                        </div>
                    </div>

                </div> <!-- end row-->
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
    <div class="row g-4">
        <div class="card-body pt-0">
            <div class="card-body">
                <div class="col-12">
                    <div class="row g-4">
                        <div class="col-xl-12">

                            <!-- end card -->
                        </div>
                        <!-- end col-->
                    </div>
                    <!-- end row-->
                </div>
            </div>
        </div>
    </div>
    
@endsection

@push('js')
    <script src="{{asset('assets')}}/vendor/apexcharts/apexcharts.min.js"></script>

    <!-- Apex Chart Column Demo js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.0/dayjs.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.0/plugin/quarterOfYear.min.js"></script>
    <script>
        var options = {
            series: [{
                name: 'Relawan',
                data: [44, 55, 41, 67, 22, 43, 21, 49]
            }, {
                name: 'Pemilih',
                data: [13, 23, 20, 8, 13, 27, 33, 12]
            },],
            chart: {
                type: 'bar',
                height: 350,
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
                categories: ['PALABUHANRATU', 'SIMPENAN', 'CIKAKAK', 'BANTARGADUNG', 'CISOLOK', 'CIKIDANG',
                    'JAMPANGTENGAH', 'WARUNGKIARA'
                ],
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


        formAjax({}, "{{route('dashboard.data')}}", 'get',).then(function (response) {
            // Save to local storage
            console.log(response);
        }).catch(function (error) {
            // Handle errors if any
            console.error('Error fetching data:', error);
        });
    </script>
@endpush
