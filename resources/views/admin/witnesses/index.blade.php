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
                <h4 class="page-title">Saksi</h4>
            </div>
        </div>
    </div>
    <div class="row g-4">
        <div class="col-12">
            <div class="mb-4">
                <div class="row">
                    <div class="mb-2 col-md-8">
                        <div class="input-group">
                            <select class="form-control subdistrict">
                                <option value="" disabled>Pilih Kecamatan</option>
                            </select>
                            <select class="form-control village">
                                <option value="" disabled>Pilih Kecamatan</option>
                            </select>
                            <button class="btn btn-info" id="export">Export</button>
                        </div>
                    </div>
                    <div class="col-md-4 text-right">
                        <button class="btn btn-primary" id="create" data-bs-toggle="modal">
                            Generate Saksi
                        </button>
                    </div>
                </div>
                <table id="datatable" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>TPS</th>
                        <th>No HP</th>
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
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div> <!-- end modal header -->
                <form action="{{route('generateWitness')}}" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="mb-2 col-md-12">
                                <label for="inputPassword4" class="form-label">Kecamatan</label>
                                <select type="text" class="form-control subdistrict" id="subdistrict"
                                        name="district_id">
                                    <option value="" disabled>Pilih Kecamatan</option>
                                </select>
                            </div>
                            {{-- <div class="mb-2 col-md-6">--}}
                            {{-- <label for="inputPassword4" class="form-label">Username</label>--}}
                            {{-- <input type="text" class="form-control" id="username" name="username" --}} {{--
                                required--}} {{-- placeholder="Masukkan Username">--}}
                            {{-- </div>--}}
                            {{-- <div class="mb-2 col-md-6">--}}
                            {{-- <label for="inputPassword4" class="form-label">email</label>--}}
                            {{-- <input type="email" class="form-control" id="email" name="email" --}} {{-- required--}}
                            {{-- placeholder="Masukkan Username">--}}
                            {{-- </div>--}}
                            {{-- <div class="mb-2 col-md-6">--}}
                            {{-- <label for="inputPassword4" class="form-label">No Hp</label>--}}
                            {{-- <input type="text" class="form-control" id="phone" name="phone" --}} {{-- required--}}
                            {{-- placeholder="Masukkan Nomor Hp">--}}
                            {{-- </div>--}}
                            {{-- <div class="mb-2 col-md-6">--}}
                            {{-- <label for="inputPassword4" class="form-label">TPS</label>--}}
                            {{-- <select class="form-control" id="tps_id" name="tps_id" --}} {{--
                                placeholder="Masukkan Nomor Hp">--}}
                            {{-- <option value="">Pilih TPS</option>--}}
                            {{-- </select>--}}
                            {{-- </div>--}}
                            {{-- <div class="mb-2 col-md-6">--}}
                            {{-- <label for="inputPassword4" class="form-label">Password</label>--}}
                            {{-- <input type="text" class="form-control" id="password" name="password" --}} {{--
                                placeholder="Masukkan Password">--}}
                            {{-- </div>--}}

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

    <div class="modal fade" id="edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div> <!-- end modal header -->
                <form action="{{route('volunteers.store')}}" enctype="multipart/form-data" id="edit-form">
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
                                <label for="inputPassword4" class="form-label">TPS</label>
                                <input type="text" class="form-control" id="tps" name="tps" readonly
                                       placeholder="masukan TPS">
                            </div>
                            <div class="mb-2 col-md-6">
                                <label for="inputPassword4" class="form-label">Nomor HP</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                       placeholder="masukan nomor telepon">
                            </div>
                            <div class="mb-2 col-md-6">
                                <label for="inputPassword4" class="form-label">Provinsi</label>
                                <input type="text" class="form-control" id="province" name="province" readonly
                                       placeholder="TPS" value="Jawa Barat">
                            </div>
                            <div class="mb-2 col-md-6">
                                <label for="inputPassword4" class="form-label">Kota/Kabupaten</label>
                                <input type="text" class="form-control" id="city" name="city" readonly
                                       placeholder="TPS" value="Kabupaten Sukabumi">
                            </div>
                            <div class="mb-2 col-md-6">
                                <label for="inputPassword4" class="form-label">Kecamatan</label>
                                <select type="text" class="form-control" id="subdistrict" name="subdistrict">
                                    <option value="" disabled>Pilih Kecamatan</option>
                                </select>
                            </div>
                            <div class="mb-2 col-md-6">
                                <label for="inputPassword4" class="form-label">Kelurahan/Desa</label>
                                <select type="text" class="form-control" id="village" name="village_id">
                                    <option value="" disabled>Pilih Kelurahan/Desa</option>
                                </select>
                            </div>
                            <div class="mb-2 col-md-12">
                                <label for="inputPassword4" class="form-label">KTP</label>
                                <input type="file" class="form-control" id="identity_card" name="identity_card"
                                       placeholder="TPS" value="Kabupaten Sukabumi">
                            </div>
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

@endsection

@push('js')
    <script>
        $(document).ready(function () {
            let dataTable = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('witnesses.index') }}',
                columns: [
                    {
                        data: 'created_at', name: 'created_at', render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                    },
                    {data: 'name', name: 'name'},
                    {data: 'username', name: 'username'},
                    {
                        data: 'email', name: 'email', render: function (data) {
                            return data ?? '-';
                        }
                    },
                    {
                        data: 'tps.name', name: 'tps.name', render: function (data) {
                            return data ?? '-';
                        }
                    },
                    {
                        data: 'phone', name: 'phone', render: function (data) {
                            return data ?? '-';
                        }
                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center'},
                ]
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
                        let url = "{{ route('witnesses.destroy', ':id') }}";
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

            //edit data
            $(document).on('click', '.edit', function () {
                //get data dataTable
                let data = dataTable.row($(this).parents('tr')).data();
                //set data to form
                $('#staticBackdropLabel').text('Edit Saksi');
                $('form #edit-form').attr('action', `witnesses/${data.id}`);
                let keys = Object.keys(data);
                keys.forEach(function (key) {
                    if (key === 'image') {
                        $(`#${key}`).attr('src', '{{asset('')}}' + data[key]);
                    } else {
                        $(`#${key}`).val(data[key]);
                    }
                });

                $('#save').text('Update');
                //add method put
                $('form').append('<input type="hidden" name="_method" value="put">');
                $('#edit').modal('show');
                $('input').removeClass('is-invalid');
                //remove previous feedback
                $('.invalid-feedback').remove();
            });

            $(document).on('click', '#create', function () {
                $('#staticBackdropLabel').text('Generate Saksi');
                $('form').attr('action', `generateWitness`);
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
        })
        ;

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
                //open new tab
                window.open(response, '_blank');
            }).catch(function (error) {
                console.log(error)
                $.each(error.responseJSON.errors, function (name, message) {
                    $(`#${name}`).addClass('is-invalid');
                    //remove previous feedback
                    $(`#${name}`).closest('.col-md-6').find('.invalid-feedback').remove();
                    $(`#${name}`).closest('.col-md-6').append(`<div class="invalid-feedback">${message}</div>`);
                });
            });
        });
        getDistrict()

        function getDistrict() {
            // Check if data exists in local storage
            var districtData = localStorage.getItem('district');

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
                    let option = '';
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

                let option = '';
                response.forEach(function (data) {
                    option += `<option value="${data.id}">${data.name}</option>`;
                });
                $('.village').append(option);
            }).catch(function (error) {
                // Handle errors if any
                console.error('Error fetching data:', error);
            });
        });
        $('#export').click(function (e) {
            e.preventDefault();
            let district_id = $('.subdistrict option:selected').val();
            let village_id = $('.village option:selected').val();
            console.log(district_id, village_id);
            window.open(`{{route('witnessexport')}}?district_id=${district_id}&village_id=${village_id}`, '_blank');
        });
    </script>
@endpush
