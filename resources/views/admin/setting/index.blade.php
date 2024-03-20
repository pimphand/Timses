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
                <h4 class="page-title">Data TPS</h4>
            </div>
        </div>
    </div>
    <div class="row g-4">
        <div class="col-12">
            <div class="mb-4">
                <form action="{{route('data-recap.store')}}" enctype="multipart/form-data">
                    <div class="row g-2">
                        @for($i = 1; $i < 4; $i++)
                            <div class="mb-3 col-md-4">
                                <img src="" id="show_image_{{$i}}" width="100%">
                            </div>
                        @endfor
                        @for($i = 1; $i < 4; $i++)
                            <div class="mb-3 col-md-4">
                                <label for="inputEmail4" class="form-label">Photo {{$i}}</label>
                                <input type="file" class="form-control" name="photo_{{$i}}" id="image_{{$i}}"
                                       placeholder="Masukan total suara tidak sah">
                                <div class="text-danger" id="error_photo_{{$i}}"></div>
                            </div>
                        @endfor

                        <hr>
                        <h4>Data Candidat</h4>
                        <div class="mb-3 col-md-12">
                            <label for="inputEmail4" class="form-label">TPS</label>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="inputEmail4" class="form-label">Total Suara</label>
                            <input type="text" class="form-control" id="data_total" name="data_total"
                                   placeholder="Masukan total suara">
                            <div class="text-danger" id="error_data_total"></div>

                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="inputEmail4" class="form-label">Total Suara Sah</label>
                            <input type="text" class="form-control" id="data_valid" name="data_valid"
                                   placeholder="Masukan total suara sah">
                            <div class="text-danger" id="error_data_valid"></div>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="inputEmail4" class="form-label">Total Suara Tidak Sah</label>
                            <input type="text" class="form-control" name="data_invalid" id="data_invalid"
                                   placeholder="Masukan total suara tidak sah">
                            <div class="text-danger" id="error_data_invalid"></div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan
                    </button>
                </form>

            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
@endsection

@push('js')
    <script>
        $('form').submit(function (e) {
            e.preventDefault();
            $('input').removeClass('is-invalid');
            $('.text-danger').html('');
            let url = $(this).attr('action');
            let formData = new FormData(this);
            formAjax(formData, url, method = 'post',).then(function (response) {
                window.location.href = '{{route('data-recap.index')}}';
            }).catch(function (error) {
                $.each(error.responseJSON.errors, function (name, message) {
                    $(`#${name}`).addClass('is-invalid');
                    $(`#error_${name}`).text(message);
                    let names = '';
                    if (name.includes('.')) {
                        //replace . with _
                        names = name.replace('.', '_');
                        $(`#error_${names}`).text(message);
                        console.log(names);
                    }

                });
            });
        });

        for (let i = 1; i < 4; i++) {
            //show image after select image
            $(document).on('change', `#image_${i}`, function () {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $(`#show_image_${i}`).attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        }
    </script>
@endpush
