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
            <form action="{{route('data-recap.store')}}" enctype="multipart/form-data" id="form">
                <div class="row g-2">
                    @for($i = 1; $i < 4; $i++) <div class="mb-3 col-md-4">
                        <img src="" id="show_image_{{$i}}" width="100%">
                </div>
                @endfor
                @for($i = 1; $i < 4; $i++) <div class="mb-3 col-md-4">
                    <label for="inputEmail4" class="form-label">Photo {{$i}}</label>
                    <input type="file" class="form-control" name="photo_{{$i}}" id="image_{{$i}}"
                        placeholder="Masukan total suara tidak sah">
                    <div class="text-danger" id="error_photo_{{$i}}"></div>
        </div>
        @endfor
        <div class="mb-3 col-md-12">
            <label for="inputEmail4" class="form-label">TPS</label>
            <input type="text" class="form-control"
                value="{{auth()->user()->tps->name}}  ( Kec : {{ auth()->user()->tps->district->name }} Kel : {{ auth()->user()->tps->village->name }} )"
                disabled>
        </div>
        <div class="mb-3 col-md-6">
            <label for="inputEmail4" class="form-label">Total Suara</label>
            <input type="text" class="form-control" id="data_total" name="data_total" placeholder="Masukan total suara">
            <div class="text-danger" id="error_data_total"></div>

        </div>

        <div class="mb-3 col-md-6">
            <label for="inputEmail4" class="form-label">Total Suara Tidak Sah</label>
            <input type="text" class="form-control" name="data_invalid" id="data_invalid"
                placeholder="Masukan total suara tidak sah">
            <div class="text-danger" id="error_data_invalid"></div>
        </div>

        <div class="mb-3 col-md-4">
            <label for="inputEmail4" class="form-label">Total DPT</label>
            <input type="text" class="form-control" id="attendance_total" name="attendance_total"
                placeholder="Masukan total suara">
            <div class="text-danger" id="error_attendance_total"></div>

        </div>

        <div class="mb-3 col-md-4">
            <label for="inputEmail4" class="form-label">Total DPT Hadir </label>
            <input type="text" class="form-control" name="attendance" id="attendance"
                placeholder="Masukan total dpt hadir">
            <div class="text-danger" id="error_attendance"></div>
        </div>
        <div class="mb-3 col-md-4">
            <label for="inputEmail4" class="form-label">Total DPT Tidak Hadir</label>
            <input type="text" class="form-control" name="absent" id="absent"
                placeholder="Masukan total suara tidak sah">
            <div class="text-danger" id="error_absent"></div>
        </div>
        <hr>
        <h4>Data Candidat</h4>

        @foreach($candidates as $key=> $candidate)
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <label for="inputEmail4" class="form-label">{{$candidate->name}}
                        & {{$candidate->vice_name}}</label>
                    <input type="text" class="form-control" name="candidates[]" hidden="hidden"
                        value="{{$candidate->id}}">
                    <input type="text" class="form-control" id="{{str_replace('-','_',$candidate->id)}}_vote"
                        name="votes[]" placeholder=" Masukan total suara" required>
                    <div class="text-danger" id="error_votes_{{$key}}"></div>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div>
        @endforeach
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
    let isSubmitting = false; // Variable to prevent double submission

    $('form').submit(function (e) {
        e.preventDefault();

        // Cek jika sedang dalam proses submit, hindari pengiriman ulang
        if (isSubmitting) return;

        // Ubah tombol menjadi loading state
        let submitButton = $('button[type="submit"]');
        submitButton.prop('disabled', true); // Nonaktifkan tombol
        submitButton.html('<i class="fa fa-spinner fa-spin"></i> Menyimpan...'); // Ganti teks tombol dengan ikon loading
        isSubmitting = true; // Set status sedang submit

        Swal.fire({
            title: "Konfirmasi",
            text: "Apakah Anda sudah memeriksa kembali dan memastikan data yang diisi sudah benar?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, simpan",
            cancelButtonText: "Tidak, periksa lagi"
        }).then((result) => {
            if (result.isConfirmed) {
                // Lanjutkan proses form
                $('input').removeClass('is-invalid');
                $('.text-danger').html('');
                let url = $(this).attr('action');
                let formData = new FormData(this);
                formAjax(formData, url, method = 'post').then(function (response) {
                    Swal.fire({
                        title: "Berhasil!",
                        text: "Data berhasil disimpan",
                        icon: "success"
                    }).then(function () {
                        //reload halaman
                        window.location.href = "{{route('data-recap.create')}}";
                    });
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
                }).finally(function () {
                    // Kembalikan tombol dan isSubmitting ke keadaan semula
                    submitButton.prop('disabled', false);
                    submitButton.html('Simpan');
                    isSubmitting = false;
                });
            } else {

                // Kembalikan tombol dan isSubmitting ke keadaan semula
                submitButton.prop('disabled', false);
                submitButton.html('Simpan');
                isSubmitting = false;
            }
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
    $.ajax({
        type: "get",
        url: "{{ route('data-recap.create') }}",
        success: function (response) {
            $.each(response, function (id, val) {
                if (val != null) {
                    $("#" + id).val(val);
                }
            });
            $.each(response.details, function (index, value) {
                let id_can = value.candidate_id.replace(/-/g, '_');

                // Log the element being selected
                let element = $("#" + id_can + "_vote");
                if (element.length > 0) {
                    element.val(value.vote);
                } else {
                    console.warn('Element not found for id:', id_can + "_vote");
                }
            });


            if (response.photo_1 != null) {
                $(`#show_image_1`).attr('src', `{{asset('')}}/` + response.photo_1);

            }
            if (response.photo_2 != null) {
                $(`#show_image_2`).attr('src', `{{asset('')}}/`+response.photo_2);
            }
            if (response.photo_3 != null) {
                $(`#show_image_3`).attr('src', `{{asset('')}}/`+response.photo_3);
            }

            if (response.id != null) {
                let url = "{{ route('data-recap.update', ':id') }}".replace(':id', response.id);
                $('form').attr('action', `${url}`);
                $('form').append('<input type="hidden" name="_method" value="PUT">');

            }
        }
    });
</script>
@endpush
