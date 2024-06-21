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
        <form action="{{route('settings.store')}}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row">
                <h4>Data 1 (Jargon dan Foto)</h4>
                <div class="col-7">
                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Slogan/Jargon 1</label>
                        <input type="text" id="jargon" name="jargon[]" value="" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Slogan/Jargon 2</label>
                        <input type="text" id="jargon1" name="jargon[]" value="" class="form-control">
                    </div>
                </div>
                <div class="col-5">
                    <img src="{{asset('theme/iori/imgs/admin/banner_1.png')}}" width="80%">
                </div>
            </div>
            <div class="row">
                <h4>Data 2</h4>
                <div class="col-xl-7">
                    <div class="mb-4">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button fw-medium collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#photo_homepage" aria-expanded="false"
                                        aria-controls="photo_homepage">
                                        Foto Home Page
                                    </button>
                                </h2>
                                <div id="photo_homepage" class="accordion-collapse collapse"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                    <div class="accordion-body">
                                        <div class="row" id="photo_home_page">

                                        </div>
                                        <div class="col-12">
                                            <div class="dropzone" id="dropzone">
                                                <input type="file" id="fileInput" multiple>
                                                <p>Seret dan lepas file di sini atau klik untuk memilih file</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- end card-->
                    </div>

                </div>
                <div class="col-xl-5">
                    <img src="{{asset('theme/iori/imgs/admin/photo_homepage.png')}}" width="100%">
                </div>
            </div>
            <div class="row">
                <h4>Data 3 (Visi dan Misi)</h4>
                <div class="col-7">
                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Visi</label>
                        <input type="text" id="visi" name="data3[visi]" value="" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Misi</label>
                        <div class="input-group">
                            <input class="form-control" id="inputGroupSelect04" placeholder="Masukan Misi"
                                name="data3[misi][]" aria-label="Example with button addon">
                            <button class="btn btn-outline-secondary" type="button" id="_add_misi">
                                +
                            </button>
                        </div>
                        <div id="_input_misi"></div>
                    </div>
                </div>
                <div class="col-5">
                    <img src="{{asset('images/frontend/visimisi.png')}}" width="100%">
                </div>
            </div>

            <div class="row">
                <h4>Data 4 (Paslon)</h4>
                <div class="col-xl-7">
                    <div class="mb-4">
                        <div class="accordion" id="paslon">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button fw-medium collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#bupati" aria-expanded="false"
                                        aria-controls="bupati">
                                        Calon Bupati
                                    </button>
                                </h2>
                                <div id="bupati" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                    data-bs-parent="#paslon" style="">
                                    <div class="accordion-body">
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Nama</label>
                                            <input type="text" id="bupati_nama" name="bupati[nama]" value=""
                                                class="form-control">
                                        </div>
                                        <div>
                                            <img src="" alt="" id="bupati_foto_show" width="30%">
                                        </div>
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Foto</label>
                                            <input type="file" id="bupati_foto" name="bupati[foto]" value=""
                                                class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Deskripsi Singkat</label>
                                            <textarea type="file" id="bupati_description" name="bupati[description]"
                                                style="height: 136px;" value="" class="form-control"></textarea>
                                        </div>
                                        <hr>
                                        <h6>Pencapaian atau Prestasi</h6>
                                        <div class="mb-3">
                                            <div class="input-group" id="idbupati">
                                                <input class="form-control" placeholder="Masukan Misi"
                                                    name="bupati[prestasi][]" aria-label="Example with button addon">
                                                <button class="btn btn-outline-secondary" type="button"
                                                    id="_add_prestasi">
                                                    +
                                                </button>
                                            </div>
                                            <div class="" id="bupati_prestasi">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button fw-medium collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#wakilbupati" aria-expanded="false"
                                        aria-controls="wakilbupati">
                                        Calon Wakil Bupati
                                    </button>
                                </h2>
                                <div id="wakilbupati" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                    data-bs-parent="#paslon" style="">
                                    <div class="accordion-body">
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Nama</label>
                                            <input type="text" id="wakilbupati_nama" name="wakilbupati[nama]" value=""
                                                class="form-control">
                                        </div>
                                        <div>
                                            <img src="" alt="" id="wakilbupati_foto_show" width="30%">
                                        </div>
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Foto</label>
                                            <input type="file" id="wakilbupati_foto" name="wakilbupati[foto]" value=""
                                                class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Deskripsi Singkat</label>
                                            <textarea type="file" id="wakilbupati_description"
                                                name="wakilbupati[description]" style="height: 136px;" value=""
                                                class="form-control"></textarea>
                                        </div>
                                        <hr>
                                        <h6>Pencapaian atau Prestasi</h6>
                                        <div class="mb-3">
                                            <div class="input-group" id="idwakilbupati">
                                                <input class="form-control" placeholder="Masukan Misi"
                                                    name="wakilbupati[prestasi][]"
                                                    aria-label="Example with button addon">
                                                <button class="btn btn-outline-secondary" type="button"
                                                    id="_add_wakil_prestasi">
                                                    +
                                                </button>
                                            </div>
                                            <div class="" id="_show_wakil_prestasi">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end card-->
                    </div>

                </div>
                <div class="col-xl-5">
                    <img src="{{asset('theme/iori/imgs/admin/bupati.png')}}" width="100%">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

    </div> <!-- end card-->
</div> <!-- end col -->
@endsection

@push('css')
<style>
    .image-container {
        position: relative;
        overflow: hidden;
        text-align: center;
        /* Menengahkan teks di dalam container */
    }

    .image-container img {
        width: 100%;
        height: auto;
        display: block;
    }

    .close-button {
        position: absolute;
        top: 50%;
        /* Posisi teks ke tengah vertikal */
        left: 50%;
        /* Posisi teks ke tengah horizontal */
        transform: translate(-50%, -50%);
        /* Menyesuaikan posisi teks ke tengah */
        font-size: 24px;
        /* Ukuran teks */
        color: white;
        background-color: rgba(0, 0, 0, 0.5);
        padding: 8px 12px;
        border-radius: 50%;
        cursor: pointer;
        transition: opacity 0.3s ease-in-out;
        opacity: 0;
    }

    .image-container:hover .close-button {
        opacity: 1;
    }

    #dropzone {
        width: 100%;
        max-width: 600px;
        padding: 20px;
        border: 2px dashed #007bff;
        border-radius: 5px;
        text-align: center;
        cursor: pointer;
        transition: background-color 0.3s;
        margin: 20px auto;
    }

    #dropzone:hover {
        background-color: #f1f1f1;
    }

    #dropzone p {
        margin: 0;
        font-size: 16px;
        color: #007bff;
    }

    #fileInput {
        display: none;
    }

    #fileList {
        margin-top: 20px;
    }

    .file-item {
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        padding: 10px;
        margin-bottom: 5px;
        border-radius: 3px;
        font-size: 14px;
    }
</style>
@endpush
<!-- Plugin -->
@push('js')

<script>
    // _add_misi
    $(document).on('click', '#_add_misi', function() {
        // Check the current number of input fields
        var count = $('#_input_misi .input-group').length;
        // Set maximum limit to 8
        if (count < 7) {
            $('#_input_misi').append(`
                <div class="input-group mt-2">
                    <input class="form-control" placeholder="Masukan Misi" name="data3[misi][]" aria-label="Example with button addon">
                    <button class="btn btn-outline-secondary delete_misi" type="button">-</button>
                </div>
            `);
        } else {
            alert('Maksimum 8 prestasi dapat ditambahkan.');
        }
    });

    $(document).on('click', '.delete_misi', function() {
        $(this).closest('.input-group').remove();
    });

    //_add_prestasi
   $(document).on('click', '#_add_prestasi', function() {
        // Check the current number of input fields
        var count = $('#bupati_prestasi .input-group').length;
        // Set maximum limit to 8
        if (count < 7) {
            $('#bupati_prestasi').append(`
                <div class="input-group mt-2">
                    <input class="form-control" placeholder="Masukan Misi" name="bupati[prestasi][]" aria-label="Example with button addon">
                    <button class="btn btn-outline-secondary delete_bupati" type="button">-</button>
                </div>
            `);
        } else {
            alert('Maksimum 8 prestasi dapat ditambahkan.');
        }
    });

    $(document).on('click', '.delete_bupati', function() {
        $(this).closest('.input-group').remove();
    });


    $(document).on('click', '#_add_wakil_prestasi', function() {
        // Check the current number of input fields
        var count = $('#_show_wakil_prestasi .input-group').length;
        // Set maximum limit to 8
        if (count < 7) {
            $('#_show_wakil_prestasi').append(`
                <div class="input-group mt-2">
                    <input class="form-control" placeholder="Masukan Misi" name="wakilbupati[prestasi][]" aria-label="Example with button addon">
                    <button class="btn btn-outline-secondary delete_wakilbupati" type="button">-</button>
                </div>
            `);
        } else {
            alert('Maksimum 8 prestasi dapat ditambahkan.');
        }
    });

    $(document).on('click', '.delete_wakilbupati', function() {
        $(this).closest('.input-group').remove();
    });

    document.addEventListener('DOMContentLoaded', (event) => {
        const dropzone = document.getElementById('dropzone');
        const fileInput = document.getElementById('fileInput');
        const fileList = document.getElementById('fileList');

        // Open file dialog when clicking on dropzone
        dropzone.addEventListener('click', () => fileInput.click());

        // Handle file selection
        fileInput.addEventListener('change', handleFiles);

        // Handle drag and drop
        dropzone.addEventListener('dragover', (event) => {
            event.preventDefault();
            dropzone.style.backgroundColor = '#f1f1f1';
        });

        dropzone.addEventListener('dragleave', (event) => {
            event.preventDefault();
            dropzone.style.backgroundColor = 'white';
        });

        dropzone.addEventListener('drop', (event) => {
            event.preventDefault();
            dropzone.style.backgroundColor = 'white';
            const files = event.dataTransfer.files;
            handleFiles({ target: { files } });
        });

        function handleFiles(event) {
            const files = event.target.files;
            $.each(files, function(index, file) {
                uploadFile(file);
            });
        }

        function uploadFile(file) {
            const formData = new FormData();
            formData.append('image', file);
            const uploadStatus = $('#uploadStatus'); // Assuming uploadStatus is the ID of an element
            $.ajax({
                url: '{{ route("iori.store") }}', // Replace with your server endpoint
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                xhr: function() {
                    const xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener('progress', function(event) {
                        if (event.lengthComputable) {
                            const percent = (event.loaded / event.total) * 100;
                            // uploadStatus.text(`Uploading: ${percent.toFixed(2)}%`);
                        }
                    });
                    return xhr;
                },
                success: function(response) {
                //    console.log(response.data);
                    homePage(response.data);
                },
                error: function(xhr, status, error) {
                    // uploadStatus.text(`Upload failed: ${status}`);
                }
            });
        }

        $(document).on('click', '.close-button', function() {
            const id = $(this).data('id');
            $.ajax({
                url: '{{ route("iori.destroy") }}',
                type: 'DELETE',
                data: {
                    id: id
                },
                success: function(response) {
                    homePage(response.data);
                }
            });
        });
    });
    reloadData()
    function reloadData() {
        url = '{{ route("settings.index") }}';
        formAjax({}, url, 'get').then(function (response) {
            homePage(response.homepage);

            $('#jargon').val(response.jargon[0]);
            $('#jargon1').val(response.jargon[1]);

            $('#visi').val(response.visiMisi.visi);

            $.each(response.visiMisi.misi, function (i, data) {
                $('#_input_misi').append(`
                    <div class="input-group mt-2">
                        <input class="form-control" id="inputGroupSelect04" placeholder="Masukan Misi" name="data3[misi][]" value="${data}" aria-label="Example with button addon">
                        <button class="btn btn-outline-secondary" type="button" id="_add_misi">+
                        </button>
                    </div>
                `);
            });

            // bupati
            $('#bupati_nama').val(response.bupati.nama);
            $('#bupati_description').val(response.bupati.description);
            $('#bupati_foto_show').attr('src', '{{asset('')}}' + response.bupati.foto);
            if (response.bupati.prestasi.length>=8) {
                $('#idbupati').remove();
            }
            $.each(response.bupati.prestasi, function (i, prestasi) {
                $('#bupati_prestasi').append(`
                    <div class="input-group mt-2">
                        <input class="form-control" placeholder="Masukan Misi" name="bupati[prestasi][]" value="${prestasi}"
                            aria-label="Example with button addon">
                        <button class="btn btn-outline-secondary delete_bupati" type="button">-</button>
                    </div>
                `);
            });

             // wakilbupati
            $('#wakilbupati_nama').val(response.wakilbupati.nama);
            $('#wakilbupati_description').val(response.wakilbupati.description);
            $('#wakilbupati_foto_show').attr('src', '{{asset('')}}' + response.wakilbupati.foto);
            if (response.wakilbupati.prestasi.length>=8) {
                $('#idwakilbupati').remove();
            }
            $.each(response.wakilbupati.prestasi, function (i, prestasi_wakil) {
                $('#_show_wakil_prestasi').append(`
                    <div class="input-group mt-2">
                        <input class="form-control" placeholder="Masukan Misi" name="wakilbupati[prestasi][]" value="${prestasi_wakil}"
                            aria-label="Example with button addon">
                        <button class="btn btn-outline-secondary delete_wakilbupati" type="button">-</button>
                    </div>
                `);
            });
        })
    }

    function homePage(dataPhoto) {
        $('#photo_home_page').html('');
        $.each(dataPhoto, function (i, data) {
            $('#photo_home_page').append(`
                <div class="col-4">
                    <div class="image-container">
                    <img src="{{asset('')}}/${data.path}" alt="" width="100%">
                        <span class="close-button" data-id="${data.id}">Hapus</span>
                    </div>
               </div>
            `);
        });
    }
</script>
@endpush