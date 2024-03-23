@extends('layouts.app')
@section('content')
<style>
    .custom-file {
        position: relative;
        display: inline-block;
        overflow: hidden;
        background-color: #f1f1f1;
        padding: 8px 12px;
        border-radius: 4px;
        cursor: pointer;
    }

    .custom-file input[type="file"] {
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
        cursor: pointer;
        width: 100%;
        height: 100%;
    }

    .custom-file-label {
        white-space: nowrap;
        text-overflow: ellipsis;
        pointer-events: none;
        /* Disable pointer events to prevent interaction */
    }
</style>


<section class="contactPage">

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="conFormWrapper">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="contactFormTitle">
                                <h2>Daftar Relawan</h2>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="contactFormTitle">
                                <img src="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="contact_form">
                                <form action="#" method="post" class="row" enctype="multipart/form-data">
                                    <div class="col-md-6">
                                        <input class="required" type="text" name="name"
                                            placeholder="Masukan Nama lengkap">
                                        <span class="text-danger " id="error-name"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <input class="required" type="text" name="nik" id="nik"
                                            oninput="validateNumber(this)" pattern="\d{1,16}"
                                            placeholder="Masukan Nomor Induk KTP">
                                        <div class="text-danger" id="error-nik"></div>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <select type="number" name="subdistrict" class="required form-control"
                                            placeholder="Phone" id="subdistrict">
                                        </select>
                                        <div class="text-danger" id="error-subdistrict"></div>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <select type="number" name="village_id" class="required form-control"
                                            placeholder="Phone" disabled id="village_id">
                                            <option value="" disabled selected>Pilih Kelurahan/Desa</option>
                                        </select>
                                        <div class="text-danger" id="error-village_id"></div>
                                    </div>
                                    <div class="col-md-12  mt-3">
                                        <input class="required" type="text" name="name" id="name"
                                            oninput="validateNumber(this)" pattern="\d{1,16}"
                                            placeholder="Masukan nomor telepon">
                                        <span class="text-danger " id="error-name"></span>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label class="custom-file">
                                            <input type="file" id="identity_card" name="identity_card">
                                            <span class="custom-file-label">Upload KTP</span>
                                        </label>
                                        <div class="text-danger" id="error-identity_card"></div>
                                        <img id="show_identity_card" width="50%">
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <button type="submit" class="dgBtn">Kirim</button>
                                        <div class="con_message"></div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function validateNumber(input) {
            input.value = input.value.replace(/\D/g, '');
            if (input.value.length > 16) {
                input.value = input.value.slice(0, 16);
            }
        }

        formAjax({}, "{{route('get.district')}}?city_id=3202", 'get',).then(function (response) {
            let option = '<option value="" disabled selected>Pilih Kecamatan</option>';
            response.forEach(function (data) {
                option += `<option value="${data.id}">${data.name}</option>`;
            });
            $('#subdistrict').append(option);
        }).catch(function (error) {
            // Handle errors if any
            console.error('Error fetching data:', error);
        });

        $('#subdistrict').change(function () {
            let district_id = $(this).val();
            $('#village_id').html('');
            formAjax({}, "{{route('get.village')}}?district_id=" + district_id, 'get',).then(function (response) {
                let option = '<option value="" disabled selected>Pilih Kecamatan/Desa</option>';
                response.forEach(function (data) {
                    option += `<option value="${data.id}">${data.name}</option>`;
                });
                $('#village_id').append(option);
                $('#village_id').prop('disabled', false);
            }).catch(function (error) {
                // Handle errors if any
                console.error('Error fetching data:', error);
            });
        });

        $('form').submit(function (e) {
            e.preventDefault();
            let formData = new FormData(this);
            let url = $(this).attr('action');
            //tambahkan loading button
            $('button').html('<i class="fa fa-spinner fa-spin"></i> Loading...');
            //add loading button disabled
            $('button').attr('disabled', true);
            //text-danger
            $('.text-danger').html('');

            $.ajax({
                type: "post",
                url: url,
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    $('form').trigger('reset');
                    //remove invalid class
                    $('input').removeClass('is-invalid');
                    //remove previous feedback
                    $('.invalid-feedback').remove();
                    $('.text-danger').html('');
                    //show_identity_card
                    $('#show_identity_card').attr('src', '');
                    //show swal
                    Swal.fire({
                    title: "Sukses!",
                    text: "Data berhasil disimpan!",
                    icon: "success"
                    });
                    //remove loading button
                    $('button').html('Kirim');
                    //remove loading button disabled
                    $('button').attr('disabled', false);
                },
                error: function (error) {
                    $.each(error.responseJSON.errors, function (name, message) {
                    //remove previous feedback
                    $('.invalid-feedback').remove();
                    //add invalid class
                    $(`#${name}`).addClass('is-invalid');
                    //show error message
                    $(`#error-${name}`).text(message);
                    });
                    $('button').html('Kirim');
                    //remove loading button disabled
                    $('button').attr('disabled', false);
                    Swal.fire({
                    title: "Error!",
                    text: "Pastikan data sudah sesuai!",
                    icon: "error"
                    });
                },
            });

        });

        $(document).on('change', `#identity_card`, function () {
            let reader = new FileReader();
            reader.onload = function (e) {
                $(`#show_identity_card`).attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });

        $("._to_home").click(function () {
            //href to /
            window.location.href = "/" + $(this).attr('href');
        });

</script>
@endpush