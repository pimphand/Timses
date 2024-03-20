<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>Log In | Powerx - Bootstrap 5 Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    {{--    if auth redirect to dashboard--}}
    @if(auth()->user())
        <script>window.location.href = "{{ route('dashboard') }}";</script>
    @endif
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets')}}/images/favicon.ico">

    <!-- Theme Config Js -->
    <script src="{{asset('assets')}}/js/config.js"></script>

    <!-- App css -->
    <link href="{{asset('assets')}}/css/app.min.css" rel="stylesheet" type="text/css" id="app-style"/>

    <!-- Icons css -->
    <link href="{{asset('assets')}}/css/icons.min.css" rel="stylesheet" type="text/css"/>
</head>

<body class="authentication-bg position-relative">
<div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-6 col-lg-5">
                <div class="position-relative rounded-3 overflow-hidden"
                     style="background-image: url({{asset('assets')}}/images/flowers/img-3.png); background-position: top right; background-repeat: no-repeat;">
                    <div class="card bg-transparent mb-0">
                        <!-- Logo-->
                        <div class="auth-brand">
                            <a href="index.html" class="logo-light">
                                <img src="{{asset('assets')}}/images/logo.png" alt="logo" height="22">
                            </a>
                            <a href="index.html" class="logo-dark">
                                <img src="{{asset('assets')}}/images/logo-dark.png" alt="dark logo" height="22">
                            </a>
                        </div>

                        <div class="card-body p-4">
                            <div class="w-50">
                                <h4 class="pb-0 fw-bold">Sign In</h4>
                                <p class="fw-semibold mb-4">Enter your email address and password to access admin
                                    panel.</p>
                            </div>

                            <form action="#">

                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Email address</label>
                                    <input class="form-control" type="email" id="emailaddress" required=""
                                           placeholder="Enter your email">
                                </div>

                                <div class="mb-3">
                                    <a href="auth-recoverpw.html" class="float-end fs-12">Forgot your password?</a>
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control"
                                               placeholder="Enter your password">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="checkbox-signin"
                                               checked>
                                        <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                    </div>
                                </div>

                                <div class="mb-3 mb-0 text-center">
                                    <button class="btn btn-primary w-100" type="submit"> Log In</button>
                                </div>

                            </form>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->
                </div>

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-muted bg-body">Don't have an account? <a href="auth-register.html"
                                                                                class="text-muted ms-1 link-offset-3 text-decoration-underline"><b>Sign
                                    Up</b></a>
                        </p>
                    </div> <!-- end col -->
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
            </script> © Powerx - Coderthemes.com
        </span>
</footer>
<!-- Vendor js -->
<script src="{{asset('assets')}}/js/vendor.min.js"></script>

<!-- App js -->
<script src="{{asset('assets')}}/js/app.min.js"></script>
<script>
    //form submit
    document.querySelector('form').addEventListener('submit', function (e) {
        e.preventDefault();
        let email = document.getElementById('emailaddress').value;
        let password = document.getElementById('password').value;
        let data = {
            _token: "{{ csrf_token() }}",
            email: email,
            password: password
        };
        formAjax(data, "{{ route('login') }}", 'post').then(function (response) {
            window.location.href = "{{ route('dashboard') }}";
        }).catch(function (error) {
            console.log(error);
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
