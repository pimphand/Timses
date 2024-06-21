@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="row g-4">
        <div class="col-12">
            <div class="mb-4">
                <div class="d-flex justify-content-between mb-3">
                    <h4 class="card-title
                        ">Relawan</h4>
                    <button class="btn btn-primary" id="create" data-bs-toggle="modal">
                        Tambah Relawan
                    </button>
                </div>
                <div class="row">
                    <div class="mb-2 col-md-8">
                        <div class="input-group">
                            <button class="btn btn-danger reset">Reset</button>
                            <select class="form-control subdistrict">
                                <option value="" disabled>Pilih Kecamatan</option>
                            </select>
                            <select class="form-control village">
                                <option value="" disabled>Pilih Kecamatan</option>
                            </select>
                            <button class="btn btn-info" id="export">Export PDF</button>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-radio">
                            <input type="radio" class="form-check-input" value="semua" name="type" id="customCheck1">
                            <label class="form-check-label" for="customCheck1">Export Semua</label>
                        </div>
                        <div class="form-radio">
                            <input type="radio" class="form-check-input" value="kecamatan" name="type"
                                id="kecamtan_radio">
                            <label class="form-check-label" for="kecamtan_radio">Export Kecamatan</label>
                        </div>
                        <div class="form-radio mt-3">
                            <input type="checkbox" class="form-check-input" value="1" name="downline" id="downline">
                            <label class="form-check-label" for="downline">Filter Downline</label>
                        </div>
                    </div>
                </div>
                <table id="datatable" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama</th>
                            <th>Nik</th>
                            <th>Kecamatan</th>
                            <th>Kelurahan/Desa</th>
                            <th>No HP</th>
                            <th>KTP</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>

            </div> <!-- end card -->
        </div><!-- end col-->
    </div> <!-- end row-->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div> <!-- end modal header -->
                <form action="{{route('volunteers.store')}}" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="mb-2 col-md-6">
                                <label for="inputEmail4" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Masukan nama lengkap" required>
                            </div>
                            <div class="mb-2 col-md-6">
                                <label for="inputPassword4" class="form-label">NIK</label>
                                <input type="text" class="form-control" id="nik" name="nik"
                                    oninput="validateNumber(this)" pattern="\d{1,16}" required
                                    placeholder="Masukkan NIK">
                            </div>
                            <div class="mb-2 col-md-6">
                                <label for="inputPassword4" class="form-label">Nomor HP</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    placeholder="masukan nomor telepon">
                            </div>
                            <div class="mb-2 col-md-6">
                                <label for="inputPassword4" class="form-label">Provinsi</label>
                                <input type="text" class="form-control" id="province" name="province" readonly
                                    value="Jawa Barat">
                            </div>
                            <div class="mb-2 col-md-6">
                                <label for="inputPassword4" class="form-label">Kota/Kabupaten</label>
                                <input type="text" class="form-control" id="city" name="city" readonly placeholder="TPS"
                                    value="Kabupaten Sukabumi">
                            </div>
                            <div class="mb-2 col-md-6">
                                <label for="inputPassword4" class="form-label">Kecamatan</label>
                                <select type="text" class="form-control subdistrict" id="subdistrict"
                                    name="subdistrict">
                                    <option value="" disabled>Pilih Kecamatan</option>
                                </select>
                            </div>
                            <div class="mb-2 col-md-6">
                                <label for="inputPassword4" class="form-label">Kelurahan/Desa</label>
                                <select type="text" class="form-control village" id="village" name="village_id">
                                    <option value="" disabled>Pilih Kelurahan/Desa</option>
                                </select>
                            </div>
                            <div class="mb-2 col-md-12">
                                <label for="inputPassword4" class="form-label">KTP</label>
                                <input type="file" class="form-control" id="identity_card" name="identity_card"
                                    placeholder="TPS" value="Kabupaten Sukabumi">
                            </div>
                            <div id="_ktp"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" id="save">Simpan</button>
                    </div> <!-- end modal footer -->
                </form>
            </div> <!-- end modal content-->
        </div> <!-- end modal dialog-->
    </div>
    <div class="modal fade" id="showQrcode" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div> <!-- end modal header -->
                <img src="" id="qr_code" class="img-thumbnail" width="100%">

                <div class="modal-footer">
                    <a type="button" class="btn btn-secondary" id="download" target="_blank">downlod</a>
                </div> <!-- end modal footer -->
            </div> <!-- end modal content-->
        </div> <!-- end modal dialog-->
    </div>
</div>
@endsection

@push('js')
<script>
    getData();
    $("#downline").click(function () {
        getData();
    });
        function getData(subdistrict = '', village = '') {
            let dataTable = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                destroy: true,
                ajax: '{{ route('voters.index') }}?subdistrict=' + subdistrict + '&village=' + village + '&downline=' + $('input[name="downline"]').is(':checked'),
                columns: [
                    {
                        data: 'created_at', name: 'created_at', render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                    },
                    {
                        data: 'name', name: 'name', render: function (data,type,row) {
                            return row.downline_count >= 1 ? row.name + ` (${row.downline_count} Anggota)` :data  ;
                        }
                    },
                    {data: 'nik', name: 'nik'},
                    {data: 'village.district.name', name: 'village.district.name'},
                    {data: 'village.name', name: 'village.name'},
                    {
                        data: 'phone', name: 'phone', render: function (data) {
                            return data ?? '-';
                        }
                    },
                    {
                        data: 'identity_card',
                        identity_card: 'image',
                        orderable: false,
                        searchable: false,
                        render: function (data) {
                            return `<img src="{{route('file.show')}}?images=${data}" class="img-thumbnail" width="100" height="100">`;
                        }
                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center'},
                ],
                initComplete: function() {
                // Add event listener for the select dropdown
                $('#filterSelect').on('change', function() {
                    dataTable.ajax.reload(); // Reload the table data based on the selected filter
                    });
                },
                info: true,
                searching: true,
            });
            //delete data
            $(document).on('click', '.delete', function () {
                let id = $(this).data('id');
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        let url = "{{ route('voters.destroy', ':id') }}";
                        url = url.replace(':id', id);
                        formAjax({}, url, 'delete',).then(function (response) {
                            Swal.fire({
                                title: "Deleted!",
                                text: "Your file has been deleted.",
                                icon: "success"
                            });
                            $('#datatable').DataTable().ajax.reload();

                        }).catch(function (error) {

                        });

                    }
                });
            });

            $(document).on('click', '.QrCode', function () {
                let id = $(this).data('id');
                let url = 'https://api.qrserver.com/v1/create-qr-code/?size=400x400&data=?{{ route("register") }}?relawan='+id
                $('#qr_code').attr('src', url);
                $('#showQrcode').modal('show');
                $('#download').attr('href', url);

            })

            $('#download').on('click', function (e) {
                e.preventDefault();
                window.open($(this).attr('href'), '_blank');
            });
            //edit data
            $(document).on('click', '.edit', function () {
                //get data dataTable
                let data = dataTable.row($(this).parents('tr')).data();
                //set data to form
                $('#staticBackdropLabel').text('Edit Relawan');
                $('form').attr('action', `voters/${data.id}`);
                $('#name').val(data.name);
                $('#nik').val(data.nik);
                $('#tps').val(data.tps);
                $('#phone').val(data.phone);
                $('#subdistrict').val(data.village.district_id);
                $('#subdistrict').append(`<option value="${data.village.district.id}" selected>${data.village.district.name}</option>`);
                $('#village').append(`<option value="${data.village.id}" selected>${data.village.name}</option>`);
                $('#save').text('Update');
                $('#_ktp').html(`<img src="{{route('file.show')}}?images=${data.identity_card}" class="img-thumbnail" width="400">`);
                //add method put
                $('form').append('<input type="hidden" name="_method" value="put">');
                $('#staticBackdrop').modal('show');
                $('input').removeClass('is-invalid');
                //remove previous feedback
                $('.invalid-feedback').remove();
            });
        }

        $(document).on('click', '#create', function () {
            $('#staticBackdropLabel').text('Tambah Relawan');
            $('form').attr('action', `
                voters`);
            $('#name').val('');
            $('#nik').val('');
            $('#save').text('Simpan');
            //remove method put
            $('form').find('input[name="_method"]').remove();
            $('#staticBackdrop').modal('show');
            $('input').removeClass('is-invalid');
            //remove previous feedback
            $('.invalid-feedback').remove();
        });

        //jquery submit form
        $('form').submit(function (e) {
            e.preventDefault();
            let formData = new FormData(this); // Menggunakan FormData untuk menangani file
            let url = $(this).attr('action');
            formAjax(formData, url, method = 'post',).then(function (response) {
                //reload datatable
                $('#datatable').DataTable().ajax.reload();
                //close modal
                $('#staticBackdrop').modal('hide');
                //reset form
                $('form').trigger('reset');
                //jquery toast
                //remove invalid class
                $('input').removeClass('is-invalid');
                //remove previous feedback
                $('.invalid-feedback').remove();
            }).catch(function (error) {
                    console.log(error)
                    $.each(error.responseJSON.errors, function (name, message) {
                        $(`
                        #
                        $
                        {
                            name
                        }
                        `).addClass('is-invalid');
                        //remove previous feedback
                        $(`
                        #
                        $
                        {
                            name
                        }
                        `).closest('.col-md-6').find('.invalid-feedback').remove();
                        $(`
                        #
                        $
                        {
                            name
                        }
                        `).closest('.col-md-6').append(` < div

                class

                = "invalid-feedback" >${message} < /div>`);
                    });
                }
            )
            ;
        })
        ;
        getDistrict()

        function getDistrict() {
            // Check if data exists in local storage
            var districtData = localStorage.getItem('district');
            $('.subdistrict').html('<option value="" disabled selected>Pilih Kecamatan</option>');
            if (districtData) {
                // Data exists in local storage, parse and use it
                var district = JSON.parse(districtData);
                // Do whatever you need to do with the district data here
                let option = '';
                district.forEach(function (data) {
                    option += `<option value="${data.id}">${data.name}</option>`;
                });
                $('.subdistrict').append(option);
            } else {
                // Data doesn't exist in local storage, fetch it using AJAX
                formAjax({}, "{{route('get.district')}}?city_id=3202", 'get',).then(function (response) {
                    // Save to local storage
                    localStorage.setItem('district', JSON.stringify(response));
                    //option select district
                    let option = '<option value="" disabled selected>Pilih Kecamatan</option>';
                    response.forEach(function (data) {
                        option += `<option value="${data.id}">${data.name}</option>`;
                    });
                    $('.subdistrict').append(option);
                }).catch(function (error) {
                    // Handle errors if any
                    console.error('Error fetching data:', error);
                });
            }
        }

        $('.subdistrict').change(function () {
            let district_id = $(this).val();
            $('.village').html('<option value="" disabled>Pilih Kelurahan/Desa</option>');
            formAjax({}, "{{route('get.village')}}?district_id=" + district_id, 'get',).then(function (response) {
                getData(district_id, '');
                let option = '<option value="" disabled selected>Pilih Kelurahan/Desa</option>';
                response.forEach(function (data) {
                    option += `<option value="${data.id}">${data.name}</option>`;
                });
                $('.village').append(option);
            }).catch(function (error) {
                // Handle errors if any
                console.error('Error fetching data:', error);
            });
        });

        $('.village').change(function () {
            let subdistrict = $('.subdistrict').find('option:selected').val();
            let village = $('.village').find('option:selected').val();
            getData(subdistrict, village);
        });
        $('.reset').click(function () {
            getData();
            //reset select
            $('.subdistrict').val('');
            $('.village').val('');
            //reset radio
            $('#customCheck1').prop('checked', false);
            $('#kecamtan_radio').prop('checked', false);
        });

        $('#export').click(function () {
            let subdistrict = $('.subdistrict').find('option:selected').val();
            let village = $('.village').find('option:selected').val();
            let type = $('input[name="type"]:checked').val();

            // Check if any value is undefined and replace it with null
            if (typeof subdistrict === 'undefined') {
                subdistrict = null;
            }
            if (typeof village === 'undefined') {
                village = null;
            }
            if (typeof type === 'undefined') {
                type = null;
            }

            let url = "{{ route('voters.pdf') }}" + "?subdistrict=" + subdistrict + "&village=" + village + "&type=" + type;
            //add loading button disabled
            $('#export').attr('disabled', true);
            //add loading button
            $('#export').html('<i class="fa fa-spinner fa-spin"></i> Loading...');
            formAjax({}, url, 'post')
                .then(function (response) {
                    // Handle success
                    window.open(response.url, '_blank');
                    //remove loading button
                    $('#export').html('Export PDF');
                    //remove loading button disabled
                    $('#export').attr('disabled', false);
                })
                .catch(function (error) {
                    // Handle errors if any
                    //remove loading button
                    $('#export').html('Export PDF');
                    //remove loading button disabled
                    $('#export').attr('disabled', false);
                    //swet alert
                    Swal.fire({
                        title: "Error!",
                        text: "Data tidak ditemukan!",
                        icon: "error"
                    });
                });
        });


</script>
@endpush