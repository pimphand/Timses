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
                <div class="col-7">
                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Slogan/Jargon 1</label>
                        <input type="text" id="jargon" name="banner[jargon]" value="" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Slogan/Jargon 2</label>
                        <input type="text" id="jargon" name="banner[jargon_1]" value="" class="form-control">
                    </div>
                </div>
                <div class="col-5">
                    <img src="{{asset('theme/iori/imgs/admin/banner_1.png')}}" width="50%">
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
                <h4>Data 3</h4>
                <div class="col-7">
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
                <div class="col-5">
                    <img src="{{asset('images/frontend/visimisi.png')}}" width="100%">
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