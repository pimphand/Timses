@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="row g-4">
            <div class="col-12">
                <div class="mb-4">

                    <div class="d-flex justify-content-between mb-3">
                        <h4 class="card-title
                        ">TPS</h4>
                        <button class="btn btn-primary" id="create" data-bs-toggle="modal">
                            Tambah TPS
                        </button>
                    </div>
                    <table id="datatable" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama</th>
                            <th>Kecamatan</th>
                            <th>Kelurahan</th>
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
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div> <!-- end modal header -->
                    <form>
                        <div class="modal-body">
                            <div class="row g-2">
                                <div class="mb-3 col-md-6" id="name-input">
                                    <label for="inputEmail4" class="form-label">Total TPS</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                           placeholder="">
                                </div>
                                <div class="mb-2 col-md-6">
                                    <label for="inputPassword4" class="form-label">Kecamatan</label>
                                    <select type="text" class="form-control" id="subdistrict" name="district_id">
                                        <option value="" disabled selected>Pilih Kecamatan</option>
                                    </select>
                                </div>
                                <div class="mb-2 col-md-6">
                                    <label for="inputPassword4" class="form-label">Kelurahan/Desa</label>
                                    <select type="text" class="form-control" id="village" name="village_id">
                                        <option value="" disabled>Pilih Kelurahan/Desa</option>
                                    </select>
                                </div>

                                <div class="mb-3 col-md-6" id="total-input">
                                    <label for="inputEmail4" class="form-label">Total TPS</label>
                                    <input type="number" class="form-control" name="total" id="total"
                                           placeholder="Masukan total tps">
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
                ajax: '{{ route('tps.index') }}',
                columns: [
                    {
                        data: 'created_at', name: 'created_at', render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                    },
                    {data: 'name', name: 'name'},
                    {data: 'district.name', name: 'district.name'},
                    {data: 'village.name', name: 'village.name'},
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
                        let url = "{{ route('tps.destroy', ':id') }}";
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
                $('#staticBackdropLabel').text('Edit TPS');
                $('form').attr('action', `tps/${data.id}`);
                $('#name').val(data.name);
                $('#subdistrict').append(`<option value="${data.district.code}" selected>${data.district.name}</option>`);
                $('#village').append(`<option value="${data.village.id}" selected>${data.village.name}</option>`);
                $('#save').text('Update');
                //add method put
                $("#total-input").hide();
                $("#name-input").show();

                $('form').append('<input type="hidden" name="_method" value="put">');
                $('#staticBackdrop').modal('show');
                $('input').removeClass('is-invalid');
                //remove previous feedback
                $('.invalid-feedback').remove();
            });

            $(document).on('click', '#create', function () {
                $('#staticBackdropLabel').text('Tambah TPS');
                $('form').attr('action', `tps`);

                $("#total-input").show();
                $("#name-input").hide();
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

            let url = $(this).attr('action');
            let formData = new FormData(this);
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

                if (error.status === 422) {
                    $.each(error.responseJSON.errors, function (name, message) {
                        $(`#${name}`).addClass('is-invalid');
                        //remove previous feedback
                        $(`#${name}`).closest('.col-md-6').find('.invalid-feedback').remove();
                        $(`#${name}`).closest('.col-md-6').append(`<div class="invalid-feedback">${message}</div>`);
                    });
                }
            });
        });


        formAjax({}, "{{route('get.district')}}?city_id=3202", 'get',).then(function (response) {
            // Save to local storage
            $('#subdistrict').html('<option value="" disabled selected>Pilih Kecamatan</option>');
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

        $('#subdistrict').change(function () {
            let district_id = $(this).val();
            $('#village').html('');
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
