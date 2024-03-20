@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="row g-4">
            <div class="col-12">
                <div class="mb-4">

                    <div class="d-flex justify-content-between mb-3">
                        <h4 class="card-title
                        ">Berita</h4>
                        <button class="btn btn-primary" id="create" data-bs-toggle="modal">
                            Tambah Berita
                        </button>
                    </div>
                    <table id="datatable" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Judul</th>
                            <th>Tanggal Publish</th>
                            <th>Tanggal Kegiatan</th>
                            <th>Gambar</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>

                </div> <!-- end card -->
            </div><!-- end col-->
        </div> <!-- end row-->
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
             aria-labelledby="staticBackdropLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div> <!-- end modal header -->
                    <form action="{{route('news.store')}}">
                        <div class="modal-body">
                            <div class="row g-2">
                                <div class="mb-3 col-md-6">
                                    <label for="inputEmail4" class="form-label">Judul</label>
                                    <input type="text" class="form-control" name="title" id="title"
                                           placeholder="Masukan judul">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="inputEmail4" class="form-label">Tanggal Publish</label>
                                    <input type="date" class="form-control" name="publish_date" id="publish_date"
                                           value="{{now()}}"
                                    >
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="inputEmail4" class="form-label">Tanggal Kegiatan</label>
                                    <input type="date" class="form-control" name="date" id="date"
                                           value="{{now()}}"
                                    >
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="inputEmail4" class="form-label">Gambar</label>
                                    <input type="file" class="form-control" name="image" id="image">
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="inputEmail4" class="form-label">description</label>
                                    <textarea type="text" class="form-control" name="description"
                                              id="description"></textarea>

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
    <!-- Place the first <script> tag in your HTML's <head> -->
    <script src="https://cdn.tiny.cloud/1/wwx0cl8afxdfv85dxbyv3dy0qaovbhaggsxpfqigxlxw8pjx/tinymce/6/tinymce.min.js"
            referrerpolicy="origin"></script>

    <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>

    <script>
        let urlPage = 'news';
        $(document).ready(function () {
            let dataTable = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('news.index') }}',
                columns: [
                    {
                        data: 'created_at', name: 'created_at', render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                    },
                    {data: 'title', name: 'title'},
                    {data: 'publish_date', name: 'publish_date'},
                    {data: 'date', name: 'date'},
                    {
                        data: 'image', name: 'image', render: function (data) {
                            return `<img src="{{asset('')}}${data}" class="img-fluid" style="max-width: 100px">`;
                        }
                    },
                    // {
                    //     data: 'description', name: 'description', render: function (data) {
                    //         //parse string to html
                    //         let parser = new DOMParser();
                    //         let html = parser.parseFromString(data, 'text/html');
                    //         return html.body.innerText.substring(0, 100) + '...';
                    //     },
                    // },
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
                        let url = "{{ route('news.destroy', ':id') }}";
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

            function decodeHTML(html) {
                var txt = document.createElement("textarea");
                txt.innerHTML = html;
                return txt.value;
            }

            //edit data
            $(document).on('click', '.edit', function () {
                //get data dataTable
                let data = dataTable.row($(this).parents('tr')).data();
                //cara mengambil key dari object javascript
                let keys = Object.keys(data);
                keys.forEach(function (key) {
                    if (key === 'image') {
                        $(`#${key}`).attr('src', '{{asset('')}}' + data[key]);
                    } else {
                        $(`#${key}`).val(data[key]);
                    }
                });
                //description textarea string to html
                tinymce.get('description').setContent(decodeHTML(data.description));
                $('#staticBackdropLabel').text('Edit Berita');

                $('form').attr('action', urlPage + `/${data.id}`);

                $('#save').text('Update');
                //add method put
                $('form').append('<input type="hidden" name="_method" value="put">');
                $('#staticBackdrop').modal('show');
                $('input').removeClass('is-invalid');
                //remove previous feedback
                $('.invalid-feedback').remove();
            });

            $(document).on('click', '#create', function () {
                $('#staticBackdropLabel').text('Tambah Berita');
                $('form').attr('action', urlPage);

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
            $(this).find('input').removeClass('is-invalid');
            //get data form description
            let description = tinymce.get('description').getContent();
            let formData = new FormData(this);
            formData.set('description', description);
            let url = $(this).attr('action');
            formAjax(formData, url, 'post',).then(function (response) {
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
                $.each(error.responseJSON.errors, function (name, message) {
                    $(`#${name}`).addClass('is-invalid');
                    //remove previous feedback
                    $(`#${name}`).closest('.col-md-6').find('.invalid-feedback').remove();
                    $(`#${name}`).closest('.col-md-6').append(`<div class="invalid-feedback">${message}</div>`);
                });
            });
        });

    </script>
@endpush
