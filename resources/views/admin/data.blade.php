@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="mb-4">
            <!-- Tabs Navigation -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="table-tab" data-bs-toggle="tab" href="#table" role="tab"
                        aria-controls="table" aria-selected="true">Table</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="grafik-tab" data-bs-toggle="tab" href="#grafik" role="tab"
                        aria-controls="grafik" aria-selected="false">Grafik</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="peta-tab" data-bs-toggle="tab" href="#peta" role="tab" aria-controls="peta"
                        aria-selected="false">Peta</a>
                </li>
            </ul>

            <!-- Tabs Content -->
            <div class="tab-content mt-3" id="myTabContent">
                <!-- Table Tab -->
                <div class="tab-pane fade show active" id="table" role="tabpanel" aria-labelledby="table-tab">
                    <table id="datatable" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr id="tableHead">
                            </tr>
                        </thead>
                        <tbody id="dataTable">
                        </tbody>
                    </table>
                </div>

                <!-- Grafik Tab -->
                <div class="tab-pane fade" id="grafik" role="tabpanel" aria-labelledby="grafik-tab">
                    <div class="filter-settings row g-3">
                        <div class="col-12 col-md-4">
                            <label for="chartType" class="form-label">Style of Chart:</label>
                            <select id="chartType" class="form-select">
                                <option value="bar">Bar Chart</option>
                                <option value="line">Line Chart</option>
                            </select>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="axisA" class="form-label">Axis A:</label>
                            <select id="axisA" class="form-select">
                                <!-- Options will be dynamically populated from metadata -->
                            </select>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="axisB" class="form-label">Axis B:</label>
                            <select id="axisB" class="form-select">
                                <!-- Options will be dynamically populated from metadata -->
                            </select>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="groupColumn" class="form-label">Group Column:</label>
                            <select id="groupColumn" class="form-select">
                                <!-- Options will be dynamically populated from metadata -->
                            </select>
                        </div>

                        <div class="col-12 col-md-4 d-flex align-items-end">
                            <button class="btn btn-primary w-100" onclick="updateChart()">Preview</button>
                        </div>
                    </div>

                    <div class="mt-4">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>

                <!-- Peta Tab -->
                <div class="tab-pane fade active" id="peta" role="tabpanel" aria-labelledby="peta-tab">
                    <div id="map"></div>
                </div>
            </div>

        </div> <!-- end card -->
    </div><!-- end col-->
</div>
@endsection

@push('css')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<style>
    #map {
        height: 600px;
        width: 100%;
    }

    #barChart {
        width: 100% !important;
        height: auto !important;
    }
</style>
@endpush

@push('js')
<script src="https://leafletjs.com/examples/map-panes/eu-countries.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

<script>
    // Fetch and display table data
    $('#table-tab').click();

    $.ajax({
        type: "get",
        url: 'https://opendata.sukabumikab.go.id/api/bigdata/dinas_kependudukan_dan_pencatatan_sipil/jmlh_kpmlkn_krt_tnd_pnddk_lktrnk__ktp_d_kbptn_skbm?sort=id:asc&page=1&per_page=100',
        success: function (response) {
            let data = response.data;

            // Filter the keys to only include the desired columns
            let filteredKeys = ['bps_nama_kabupaten_kota', 'bps_nama_kecamatan', 'jumlah', 'satuan'];
            let tableHeadHtml = filteredKeys.map((key) => `<th>${key}</th>`).join('');

            // Map the data to only include the values for the filtered keys
            let tableDataHtml = data.map((item) => {
                let row = filteredKeys.map((key) => `<td>${item[key]}</td>`).join('');
                return `<tr>${row}</tr>`;
            }).join('');

            $('#tableHead').html(tableHeadHtml);
            $('#dataTable').html(tableDataHtml);
            $('#datatable').DataTable();
        }
    });


    // Chart.js configuration for Grafik Tab
// Fetch data and populate metadata for filter options
async function fetchData() {
    const response = await fetch('https://opendata.sukabumikab.go.id/api/bigdata/dinas_kependudukan_dan_pencatatan_sipil/jmlh_kpmlkn_krt_tnd_pnddk_lktrnk__ktp_d_kbptn_skbm?sort=id:asc&page=1&per_page=100&where={}&where_or={}&data=');
    const data = await response.json();
    return data;
}

// Function to populate the select filters with metadata_filter
function populateFilters(metadataFilter) {
    const axisASelect = document.getElementById('axisA');
    const axisBSelect = document.getElementById('axisB');
    const groupColumnSelect = document.getElementById('groupColumn');

    // Clear previous options
    axisASelect.innerHTML = '';
    axisBSelect.innerHTML = '';
    groupColumnSelect.innerHTML = '';

    // Populate select options with metadata_filter
    metadataFilter.forEach(meta => {
        const option = `<option value="${meta.key}">${meta.key}</option>`;
        axisASelect.innerHTML += option;
        axisBSelect.innerHTML += option;
        groupColumnSelect.innerHTML += option;
    });

    // Set default values
    axisASelect.value = 'kemendagri_nama_kecamatan';
    axisBSelect.value = 'jumlah';
    groupColumnSelect.value = 'tahun';
}

// Render chart based on selected filter options
async function renderChart(chartType, axisA, axisB, groupColumn) {
    const response = await fetchData();
    const fetchedData = response.data;

    const labels = fetchedData.map(item => item[axisA]);
    const datasetData = fetchedData.map(item => item[axisB]);

    const ctx = document.getElementById('barChart').getContext('2d');
    if (window.myChart) {
        window.myChart.destroy(); // Destroy existing chart instance if exists
    }

    window.myChart = new Chart(ctx, {
        type: chartType,
        data: {
            labels: labels,
            datasets: [{
                label: groupColumn,
                data: datasetData,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                x: {
                    title: {
                        display: true,
                        text: "axis A" // Horizontal axis label
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: "axis B" // Vertical axis label
                    }
                }
            }
        }
    });
}

// Update chart on button click
function updateChart() {
    const chartType = document.getElementById('chartType').value;
    const axisA = document.getElementById('axisA').value;
    const axisB = document.getElementById('axisB').value;
    const groupColumn = document.getElementById('groupColumn').value;

    renderChart(chartType, axisA, axisB, groupColumn);
}

// Fetch data and initialize filters on page load
async function initializePage() {
    const response = await fetchData();
    const metadataFilter = response.metadata_filter; // Use metadata_filter

    // Populate filter options from metadata_filter
    populateFilters(metadataFilter);

    // Initial chart rendering with default values
    renderChart('bar', 'kemendagri_nama_kecamatan', 'jumlah', 'tahun');
}

// Initialize page and chart on load
window.onload = initializePage;
leafletJS()
// Leaflet configuration for Peta Tab
function leafletJS() {
    var map = L.map('map').setView([-6.9929803, 106.9550377], 13);

        // Load and display map tiles
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 10,
        }).addTo(map);

        // Data array
        var data = [
            {
                lat: -6.8929803,
                long: 106.8550377,
                nama: 'NENG SITI SARAH',
                nama_kecamatan: 'Cicaringin',
            },
            {
                lat: -7.627341504999323,
                long: 111.53729628999311,
                nama: 'Faisal Dwiki',
                nama_kecamatan:'Kartoharjo'
            }
        ];

        // Loop through the data array and add markers
        data.forEach(function (item) {
            var marker = L.marker([item.lat, item.long]).addTo(map);
            marker.bindPopup(
                '<b>' +
                    item.nama +
                    '</b><br>Kecamatan: ' +
                    item.nama_kecamatan
            );
        });
}



</script>
@endpush
