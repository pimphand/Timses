<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Log In | {{env('APP_NAME')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    {{-- if auth redirect to dashboard--}}
    @if(auth()->user())
    <script>
        window.location.href = "{{ route('dashboard') }}";
    </script>
    @endif
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets')}}/images/favicon.ico">

    <!-- Theme Config Js -->
    <script src="{{asset('assets')}}/js/config.js"></script>

    <!-- App css -->
    <link href="{{asset('assets')}}/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="{{asset('assets')}}/css/icons.min.css" rel="stylesheet" type="text/css" />
</head>

<body class="authentication-bg position-relative">
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-lg-5">
                    <div class="position-relative rounded-3 overflow-hidden" {{--
                        style="background-image: url({{asset('assets')}}/images/flowers/img-3.png); background-position: top right; background-repeat: no-repeat;"
                        --}}>
                        <div class="card bg-transparent mb-0">
                            <!-- Logo-->
                            <div class="auth-brand text-center">
                                <a href="{{route('login')}}" class="logo-light">
                                    <img src="{{asset('images')}}/frontend/logo.png?time={{ strtotime(now()) }}"
                                        alt="logo" height="80">
                                </a>
                                <a href="{{route('login')}}" class="logo-dark">
                                    <img src="{{asset('images')}}/frontend/logo.png?time={{ strtotime(now()) }}"
                                        alt="dark logo" height="80">
                                </a>
                            </div>

                            <div class="card-body p-4">
                                <form action="#">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input class="form-control" type="text" id="username" required=""
                                            placeholder="masukan username">
                                        <div class="text-danger" id="error-username"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" class="form-control"
                                                placeholder="Enter your password">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                        <div class="text-danger" id="error-password"></div>
                                    </div>
                                    <div class="mb-3 mb-0 text-center">
                                        <button class="btn btn-primary w-100" type="submit"> Log In</button>
                                    </div>

                                </form>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div>

                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <footer class="footer footer-alt fw-medium">
        <span class="bg-body">
            <script>
                document.write(new Date().getFullYear())
            </script> © {{env('APP_NAME')}}
        </span>
    </footer>
    <!-- Vendor js -->
    <script src="{{asset('assets')}}/js/vendor.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- App js -->
    <script src="{{asset('assets')}}/js/app.min.js"></script>
    <script>
        //form submit
    document.querySelector('form').addEventListener('submit', function (e) {
        e.preventDefault();
        let username = document.getElementById('username').value;
        let password = document.getElementById('password').value;
        let data = {
            _token: "{{ csrf_token() }}",
            username: username,
            password: password
        };
        formAjax(data, "{{ route('login') }}", 'post').then(function (response) {
            window.location.href = "{{ route('dashboard') }}";
        }).catch(function (error) {
            $.each(error.responseJSON.errors, function (name, message) {
                //remove previous feedback
                $('.invalid-feedback').remove();
                //add invalid class
                $(`#${name}`).addClass('is-invalid');
                //show error message
                $(`#error-${name}`).text(message);
            });
            Swal.fire({
                title: "Error!",
                text: "Pastikan data sudah sesuai!",
                icon: "error"
            });
        });
    });


    function formAjax(data = null, url, method = 'post',) {
        return new Promise(function (resolve, reject) {
            $.ajax({
                type: method,
                url: url,
                data: data,
                dataType: 'json'
            }).done(function (response) {
                resolve(response);
            }).fail(function (error) {
                reject(error);
            });
        });
    }
    </script>
</body>

</html>