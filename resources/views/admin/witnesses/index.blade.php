@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="row g-4">
            <div class="col-12">
                <div class="mb-4">

                    <div class="d-flex justify-content-between mb-3">
                        <h4 class="card-title
                        ">Saksi</h4>
                        <button class="btn btn-primary" id="create" data-bs-toggle="modal">
                            Tambah Saksi
                        </button>
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
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div> <!-- end modal header -->
                    <form action="{{route('witnesses.store')}}" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row g-2">
                                <div class="mb-2 col-md-6">
                                    <label for="inputEmail4" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                           placeholder="Masukan nama lengkap" required>
                                </div>
                                <div class="mb-2 col-md-6">
                                    <label for="inputPassword4" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username"
                                           required
                                           placeholder="Masukkan Username">
                                </div>
                                <div class="mb-2 col-md-6">
                                    <label for="inputPassword4" class="form-label">email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                           required
                                           placeholder="Masukkan Username">
                                </div>
                                <div class="mb-2 col-md-6">
                                    <label for="inputPassword4" class="form-label">No Hp</label>
                                    <input type="text" class="form-control" id="phone" name="phone"
                                           required
                                           placeholder="Masukkan Nomor Hp">
                                </div>
                                <div class="mb-2 col-md-6">
                                    <label for="inputPassword4" class="form-label">TPS</label>
                                    <select class="form-control" id="tps_id" name="tps_id"

                                            placeholder="Masukkan Nomor Hp">
                                        <option value="">Pilih TPS</option>
                                    </select>
                                </div>
                                <div class="mb-2 col-md-6">
                                    <label for="inputPassword4" class="form-label">Password</label>
                                    <input type="text" class="form-control" id="password" name="password"
                                           placeholder="Masukkan Password">
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
                $('#staticBackdropLabel').text('Edit Pemilih');
                $('form').attr('action', `witnesses/${data.id}`);
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
                $('#staticBackdrop').modal('show');
                $('input').removeClass('is-invalid');
                //remove previous feedback
                $('.invalid-feedback').remove();
            });

            $(document).on('click', '#create', function () {
                $('#staticBackdropLabel').text('Tambah Pemilih');
                $('form').attr('action', `witnesses`);
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
                    option += `<option value="${data.code}">${data.name}</option>`;
                });
                $('#subdistrict').append(option);
            } else {
                // Data doesn't exist in local storage, fetch it using AJAX
                formAjax({}, "{{route('get.district')}}?city_id=3202", 'get',).then(function (response) {
                    // Save to local storage
                    localStorage.setItem('district', JSON.stringify(response));
                    //option select district
                    let option = '';
                    response.forEach(function (data) {
                        option += `<option value="${data.code}">${data.name}</option>`;
                    });
                    $('#subdistrict').append(option);
                }).catch(function (error) {
                    // Handle errors if any
                    console.error('Error fetching data:', error);
                });
            }
        }

        $('#subdistrict').change(function () {
            let district_id = $(this).val();
            formAjax({}, "{{route('get.village')}}?district_id=" + district_id, 'get',).then(function (response) {

                let option = '';
                response.forEach(function (data) {
                    option += `<option value="${data.id}">${data.name}</option>`;
                });
                $('#village').append(option);
            }).catch(function (error) {
                // Handle errors if any
                console.error('Error fetching data:', error);
            });
        });
    </script>
@endpush
