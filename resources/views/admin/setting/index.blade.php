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
            <h4 class="page-title">Data Website</h4>
        </div>
    </div>
</div>
<div class="row g-4">
    <div class="mb-4">
        <form action="{{route('settings.store')}}" enctype="multipart/form-data">
            <div class="row">
                <h4>Data 1</h4>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Slogan/Jargon</label>
                        <input type="text" id="jargon" name="data1[jargon]" value="" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Program Kerja</label>
                        <div class="input-group">
                            <input class="form-control" id="inputGroupSelect04" placeholder="Masukan Program Kerja"
                                name="data1[program_kerja][]" aria-label="Example with button addon">
                            <button class="btn btn-outline-secondary _add_program_kerja" type="button"
                                id="_add_program_kerja">+
                            </button>
                        </div>
                        <div id="_input_program_kerja"></div>
                    </div>
                </div>
                <div class="col-6">
                    <img src="{{asset('images/frontend/banner.png')}}" width="100%">
                </div>
            </div>
            <div class="row">
                <h4>Data 2</h4>
                <div class="col-xl-6">
                    <div class="mb-4">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button fw-medium collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false"
                                        aria-controls="collapseOne">
                                        Calon Bupati
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                    data-bs-parent="#accordionExample" style="">
                                    <div class="accordion-body">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Nama Lengkap</label>
                                                <input type="text" id="jargon" name="data2[nama]" value=""
                                                    class="form-control">
                                            </div>

                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Biodata</label>
                                                <textarea type="text" id="jargon" name="data2[biodata]"
                                                    class="form-control"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Foto</label>
                                                <input type="file" id="photo_1" name="data2[photo_1]" value=""
                                                    class="form-control">
                                            </div>
                                            <div id="show_foto_1"></div>

                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Prestasi/Jabatan</label>
                                                <div class="input-group">
                                                    <input class="form-control" id="inputGroupSelect04"
                                                        placeholder="Masukan Program Kerja" name="data2[prestasi][]"
                                                        aria-label="Example with button addon">
                                                    <button class="btn btn-outline-secondary" type="button"
                                                        id="_add_prestasi">+
                                                    </button>
                                                </div>
                                                <div id="_input_prestasi"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button fw-medium collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                            aria-expanded="false" aria-controls="collapseTwo">
                                            Calon Wakil Bupati
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="simpleinput" class="form-label">Nama Lengkap</label>
                                                    <input type="text" id="jargon" name="data2[wakil_nama]" value=""
                                                        class="form-control">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="simpleinput" class="form-label">Biodata</label>
                                                    <textarea type="text" id="jargon" name="data2[wakil_biodata]"
                                                        class="form-control"></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="simpleinput" class="form-label">Foto</label>
                                                    <input type="file" id="photo_2" name="data2[photo_2]" value=""
                                                        class="form-control">
                                                </div>
                                                <div id="show_foto_2"></div>

                                                <div class="mb-3">
                                                    <label for="simpleinput" class="form-label">Prestasi/Jabatan</label>
                                                    <div class="input-group">
                                                        <input class="form-control" id="inputGroupSelect04"
                                                            placeholder="Masukan Program Kerja"
                                                            name="data2[wakil_prestasi][]"
                                                            aria-label="Example with button addon">
                                                        <button class="btn btn-outline-secondary" type="button"
                                                            id="_add_wakil_prestasi">+
                                                        </button>
                                                    </div>
                                                    <div id="_input_wakil_prestasi"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- end card-->
                    </div>

                </div>
                <div class="col-6">
                    <img src="{{asset('images/frontend/calon.png')}}" width="100%">
                </div>
            </div>
            <div class="row">
                <h4>Data 3</h4>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Visi</label>
                        <input type="text" id="jargon" name="data3[visi]" value="" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Misi</label>
                        <div class="input-group">
                            <input class="form-control" id="inputGroupSelect04" placeholder="Masukan Misi"
                                name="data3[misi][]" aria-label="Example with button addon">
                            <button class="btn btn-outline-secondary" type="button" id="_add_misi">+
                            </button>
                        </div>
                        <div id="_input_misi"></div>
                    </div>
                </div>
                <div class="col-6">
                    <img src="{{asset('images/frontend/visimisi.png')}}" width="100%">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

    </div> <!-- end card-->
</div> <!-- end col -->
@endsection

@push('js')
<script>
    //add program kerja
        $(document).on('click', '#_add_program_kerja', function () {
            let input = `<div class="input-group mt-2">
                            <input class="form-control" id="inputGroupSelect04" placeholder="Masukan Program Kerja" name="data1[program_kerja][]"
                                   aria-label="Example with button addon">
                            <button class="btn btn-outline-danger" type="button" id="_remove_program_kerja"> - </button>
                         </div>`;
            $('#_input_program_kerja').append(input);
        });
        //remove program kerja
        $(document).on('click', '#_remove_program_kerja', function () {
            $(this).parent().remove();
        });

        //add program kerja
        $(document).on('click', '#_add_prestasi', function () {
            let input = `<div class="input-group mt-2">
                            <input class="form-control" id="inputGroupSelect04" placeholder="Masukan Program Kerja" name="data2[prestasi][]"
                                   aria-label="Example with button addon">
                            <button class="btn btn-outline-danger" type="button" id="_remove_prestasi"> - </button>
                         </div>`;
            $('#_input_prestasi').append(input);
        });
        //add program kerja
        $(document).on('click', '#_add_wakil_prestasi', function () {
            let input = `<div class="input-group mt-2">
                            <input class="form-control" id="inputGroupSelect04" placeholder="Masukan Program Kerja" name="data2[wakil_prestasi][]"
                                   aria-label="Example with button addon">
                            <button class="btn btn-outline-danger" type="button" id="_remove_wakil_prestasi"> - </button>
                         </div>`;
            $('#_input_wakil_prestasi').append(input);
        });
        //remove program kerja
        $(document).on('click', '#_remove_prestasi', function () {
            $(this).parent().remove();
        });//remove program kerja
        $(document).on('click', '#_remove_wakil_prestasi', function () {
            $(this).parent().remove();
        });

        //add Misi
        $(document).on('click', '#_add_misi', function () {
            let input = `<div class="input-group mt-2">
                            <input class="form-control" id="inputGroupSelect04" placeholder="Masukan Program Kerja" name="data3[misi][]"
                                   aria-label="Example with button addon">
                            <button class="btn btn-outline-danger" type="button" id="_remove_misi"> - </button>
                         </div>`;
            $('#_input_misi').append(input);
        });
        //remove program kerja
        $(document).on('click', '#_remove_misi', function () {
            $(this).parent().remove();
        });//remove program kerja

        $('form').submit(function (e) {
            e.preventDefault();
            $('input').removeClass('is-invalid');
            $('.text-danger').html('');
            let url = $(this).attr('action');
            let formData = new FormData(this);
            formAjax(formData, url, method = 'post',).then(function (response) {
                window.location.href = '{{route('settings.index')}}';
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

        formAjax({}, "{{route('settings.index')}}", 'get',).then(function (response) {
            //data1
            $('#jargon').val(response.data_1.jargon);
            Object.keys(response.data_1.program_kerja).forEach(function (key) {
                // Retrieve the value corresponding to the current key
                var item = response.data_1.program_kerja[key];

                // Check if the key is 1 (assuming you want to handle the first key differently)
                if (key === '1') {
                    // Set the value of the input element with the name data1[program_kerja][]
                    $('input[name="data1[program_kerja][]"]').val(item);
                } else {
                    // Create a new input element and append it to the designated container
                    let input = `<div class="input-group mt-2">
                                    <input class="form-control" id="inputGroupSelect04" placeholder="Masukan Program Kerja" name="data1[program_kerja][]"
                                        aria-label="Example with button addon" value="${item}">
                                    <button class="btn btn-outline-danger" type="button" id="_remove_program_kerja"> - </button>
                                </div>`;
                    $('#_input_program_kerja').append(input);
                }
            });
            //data2
            $('input[name="data2[nama]"]').val(response.data_2.nama);
            $('textarea[name="data2[biodata]"]').val(response.data_2.biodata);
            Object.keys(response.data_2.prestasi).forEach(function (key) {
                // Retrieve the value corresponding to the current key
                var item = response.data_2.prestasi[key];

                // Check if the key is 1 (assuming you want to handle the first key differently)
                if (key === '1') {
                    // Set the value of the input element with the name data1[program_kerja][]
                    $('input[name="data2[prestasi][]"]').val(item);
                } else {
                    // Create a new input element and append it to the designated container
                    let input = `<div class="input-group mt-2">
                                    <input class="form-control" id="inputGroupSelect04" placeholder="Masukan Program Kerja" name="data2[prestasi][]"
                                        aria-label="Example with button addon" value="${item}">
                                    <button class="btn btn-outline-danger" type="button" id="_remove_prestasi"> - </button>
                                </div>`;
                    $('#_input_prestasi').append(input);
                }
            });
            $('input[name="data2[wakil_nama]"]').val(response.data_2.wakil_nama);
            $('textarea[name="data2[wakil_biodata]"]').val(response.data_2.wakil_biodata);
            Object.keys(response.data_2.wakil_prestasi).forEach(function (key) {
                // Retrieve the value corresponding to the current key
                var item = response.data_2.wakil_prestasi[key];

                // Check if the key is 1 (assuming you want to handle the first key differently)
                if (key === '1') {
                    // Set the value of the input element with the name data1[program_kerja][]
                    $('input[name="data2[wakil_prestasi][]"]').val(item);
                } else {
                    // Create a new input element and append it to the designated container
                    let input = `<div class="input-group mt-2">
                                    <input class="form-control" id="inputGroupSelect04" placeholder="Masukan Program Kerja" name="data2[wakil_prestasi][]"
                                        aria-label="Example with button addon" value="${item}">
                                    <button class="btn btn-outline-danger" type="button" id="_remove_wakil_prestasi"> - </button>
                                </div>`;
                    $('#_input_wakil_prestasi').append(input);
                }
            });
            //data3
            $('input[name="data3[visi]"]').val(response.data_3.visi);
            Object.keys(response.data_3.misi).forEach(function (key) {
                // Retrieve the value corresponding to the current key
                var item = response.data_3.misi[key];

                // Check if the key is 1 (assuming you want to handle the first key differently)
                if (key === '1') {
                    // Set the value of the input element with the name data1[program_kerja][]
                    $('input[name="data3[misi][]"]').val(item);
                } else {
                    // Create a new input element and append it to the designated container
                    let input = `<div class="input-group mt-2">
                                    <input class="form-control" id="inputGroupSelect04" placeholder="Masukan Program Kerja" name="data3[misi][]"
                                        aria-label="Example with button addon" value="${item}">
                                    <button class="btn btn-outline-danger" type="button" id="_remove_misi"> - </button>
                                </div>`;
                    $('#_input_misi').append(input);
                }
            });
            //show image
            $('#show_foto_1').html(`<img src="{{asset('')}}${response.data_2.photo_1}" width="100%">
            <input type="hidden" name="data2[old_photo_1]" value="${response.data_2.photo_1}">`);
            $('#show_foto_2').html(`<img src="{{asset('')}}${response.data_2.photo_2}" width="100%">
            <input type="hidden" name="data2[old_photo_2]" value="${response.data_2.photo_2}">
            `);
        }).catch(function (error) {

        });

        //show image after select image
        $(document).on('change', `#photo_1`, function () {
            let reader = new FileReader();
            reader.onload = function (e) {
                $(`#show_foto_1`).html(`<img src="${e.target.result}" width="100%">`);
            }
            reader.readAsDataURL(this.files[0]);
        });
        $(document).on('change', `#photo_2`, function () {
            let reader = new FileReader();
            reader.onload = function (e) {
                $(`#show_foto_2`).html(`<img src="${e.target.result}" width="100%">`);
            }
            reader.readAsDataURL(this.files[0]);
        });
</script>
@endpush