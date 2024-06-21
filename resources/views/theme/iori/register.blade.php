@extends('theme.iori.app')

@section('content')
<section class="section box-page-register">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="box-steps-small">
                    {{-- <div class="item-number hover-up active wow animate__ animate__fadeInLeft animated"
                        data-wow-delay=".0s"
                        style="visibility: visible; animation-delay: 0s; animation-name: fadeInLeft;">
                        <div class="num-ele">1</div>
                        <div class="info-num">
                            <h5 class="color-brand-1 mb-15">Register</h5>
                            <p class="font-md color-grey-500">All you need is your name, email and a strong password, Or
                                use your social media accounts.</p>
                        </div>
                    </div>
                    <div class="item-number hover-up wow animate__ animate__fadeInLeft animated" data-wow-delay=".1s"
                        style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInLeft;">
                        <div class="num-ele">2</div>
                        <div class="info-num">
                            <h5 class="color-brand-1 mb-15">Activate</h5>
                            <p class="font-md color-grey-500">Use the code sent to your email to activate your account.
                            </p>
                        </div>
                    </div>
                    <div class="item-number hover-up wow animate__ animate__fadeInLeft animated" data-wow-delay=".2s"
                        style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft;">
                        <div class="num-ele">3</div>
                        <div class="info-num">
                            <h5 class="color-brand-1 mb-15">Open a trading account</h5>
                            <p class="font-md color-grey-500">Create a real or demo trading account on our platform. No
                                credit card required.</p>
                        </div>
                    </div>
                    <div class="item-number hover-up wow animate__ animate__fadeInLeft animated" data-wow-delay=".3s"
                        style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                        <div class="num-ele">4</div>
                        <div class="info-num">
                            <h5 class="color-brand-1 mb-15">Connect with investors</h5>
                            <p class="font-md color-grey-500">With a real-time analysis system you will become a
                                professional investor.</p>
                        </div>
                    </div>
                    <div class="item-number hover-up wow animate__ animate__fadeInLeft animated" data-wow-delay=".4s"
                        style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInLeft;">
                        <div class="num-ele">5</div>
                        <div class="info-num">
                            <h5 class="color-brand-1 mb-15">Almost done</h5>
                            <p class="font-md color-grey-500">Start your amazing journey on our platform.</p>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-7">
                <div class="box-register">
                    <h2 class="color-brand-1 mb-15 wow animate__ animate__fadeIn animated" data-wow-delay=".0s"
                        style="visibility: visible; animation-delay: 0s; animation-name: fadeIn;">Daftar Menjadi Relawan
                    </h2>
                    {{-- <p class="font-md color-grey-500 wow animate__ animate__fadeIn animated" data-wow-delay=".0s"
                        style="visibility: visible; animation-delay: 0s; animation-name: fadeIn;">Create an account
                        today and start using our platform</p> --}}
                    <form action="#" method="post" class="row" enctype="multipart/form-data">
                        @csrf
                        <div class="line-register mt-25 mb-50"></div>
                        <div class="row wow animate__ animate__fadeIn animated" data-wow-delay=".0s"
                            style="visibility: visible; animation-delay: 0s; animation-name: fadeIn;">

                            <div class="col-md-12 mb-3">
                                <input class="form-control" type="text" name="downline" readonly
                                    value="{{ request()->relawan }}" placeholder="">
                                <span class="text-danger " id="error-downline"></span>
                            </div>
                            <div class="col-md-6 mb-3">
                                <input class="form-control" type="text" name="fullname"
                                    placeholder="Masukan Nama lengkap">
                                <span class="text-danger " id="error-fullname"></span>
                            </div>
                            <div class="col-md-6 mb-3">
                                <input class="form-control" type="text" name="nik" id="nik"
                                    oninput="validateNumber(this)" pattern="\d{1,16}"
                                    placeholder="Masukan Nomor Induk KTP">
                                <div class="text-danger" id="error-nik"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <select type="number" name="subdistrict" class="form-control form-control"
                                    placeholder="Phone" id="subdistrict">
                                </select>
                                <div class="text-danger" id="error-subdistrict"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <select type="number" name="village_id" class="form-control form-control"
                                    placeholder="Phone" disabled id="village_id">
                                    <option value="" disabled selected>Pilih Kelurahan/Desa</option>
                                </select>
                                <div class="text-danger" id="error-village_id"></div>
                            </div>
                            <div class="col-md-12  mb-3">
                                <input class="form-control" type="text" name="name" id="name"
                                    oninput="validateNumber(this)" pattern="\d{1,16}"
                                    placeholder="Masukan nomor telepon">
                                <span class="text-danger " id="error-name"></span>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="custom-file">
                                    <input type="file" id="identity_card" class="form-control" name="identity_card">
                                    <span class="custom-file-label">Upload KTP</span>
                                </label>
                                <div class="text-danger" id="error-identity_card"></div>
                                <img id="show_identity_card" width="50%">
                            </div>

                        </div>
                        <div class="row align-items-center mt-30 wow animate__ animate__fadeIn animated"
                            data-wow-delay=".0s"
                            style="visibility: visible; animation-delay: 0s; animation-name: fadeIn;">
                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-6 col-6">
                                <div class="form-group">
                                    <button class="btn btn-brand-lg btn-full font-md-bold" type="submit">
                                        Daftar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
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
    function formAjax(data = null, url, method = 'post',) {
        return new Promise(function (resolve, reject) {
            $.ajax({
                type: method,
                url: url,
                data: data,
                contentType: false,
                processData: false,
            }).done(function (response) {
                resolve(response);
            }).fail(function (error) {
                reject(error);
            });
        });
    }
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