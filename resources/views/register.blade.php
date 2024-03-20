@extends('layouts.app')
@section('content')

    <!-- Blog Start -->
    <section class="contactPage mt-5">
        <div class="SecLayerimg move_anim">
            <img src="assets/images/bg/s34.png" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="conFormWrapper">
                        <div class="row">
                            <div class="col-md-7">
                                <h2>Daftar Menjadi Relawan</h2>
                                <div class="contact_form">
                                    <form action="{{route('register')}}" method="post" class="row">
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" name="name" id="name"
                                                   placeholder="Name">
                                            <span class="text-danger " id="error-name"></span>
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" name="nik" id="nik"
                                                   oninput="validateNumber(this)" pattern="\d{1,16}"
                                                   placeholder="Masukan Nomor Induk KTP">
                                            <div class="text-danger" id="error-nik"></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <select type="number" name="subdistrict" class="form-control"
                                                    placeholder="Phone"
                                                    id="subdistrict">
                                            </select>
                                            <div class="text-danger" id="error-subdistrict"></div>

                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <select type="number" name="village_id" class="form-control"
                                                    placeholder="Phone" disabled
                                                    id="village_id">
                                                <option value="" disabled selected>Pilih Kelurahan/Desa</option>
                                            </select>
                                            <div class="text-danger" id="error-village_id"></div>

                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <input class="required" type="text" name="phone" id="phone"
                                                   oninput="validateNumber(this)" pattern="\d{1,16}"
                                                   placeholder="Masukan Nomor HP">
                                            <div class="text-danger" id="error-phone"></div>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <input class="required" type="file" name="identity_card" id="identity_card"
                                                   accept="image/*"
                                                   placeholder="Name">
                                            <div class="text-danger" id="error-identity_card"></div>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <img src="" id="show_identity_card" width="100%">
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <button type="submit" class="dgBtn">Kirim</button>
                                            <div class="con_message"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="contactInfo">
                                    <img src="{{asset('frontend')}}/images/c1.png" alt=""/>
                                    <h4>Phone</h4>
                                    <p>
                                        Call : +8801682648101<br>
                                        Fax : 02 9292162
                                    </p>
                                </div>
                                <div class="contactInfo">
                                    <img src="{{asset('frontend')}}/images/c2.png" alt=""/>
                                    <h4>Address</h4>
                                    <p>
                                        Boat House, 2/21 City Road
                                        Hoxton, N1 6NG, UK
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog End -->
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function validateNumber(input) {
            input.value = input.value.replace(/\D/g, '');
            if (input.value.length > 16) {
                input.value = input.value.slice(0, 16);
            }
        }

        formAjax({}, "{{route('get.district')}}?city_id=3202", 'get',).then(function (response) {
            let option = '<option value="" disabled selected>Pilih Kecamatan/Kota</option>';
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

        $('form').submit(function (e) {
            e.preventDefault();
            let formData = new FormData(this);
            let url = $(this).attr('action');
            formAjax(formData, url, 'post',).then(function (response) {
                //reset form
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
            }).catch(function (error) {
                $.each(error.responseJSON.errors, function (name, message) {
                    //remove previous feedback
                    $('.invalid-feedback').remove();
                    //add invalid class
                    $(`#${name}`).addClass('is-invalid');
                    //show error message
                    $(`#error-${name}`).text(message);
                });
            });
        });

        $(document).on('change', `#identity_card`, function () {
            let reader = new FileReader();
            reader.onload = function (e) {
                $(`#show_identity_card`).attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    </script>
@endpush
