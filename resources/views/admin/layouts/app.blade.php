<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Starter Page | Powerx - Bootstrap 5 Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets') }}/images/favicon.ico">

    <!-- Theme Config Js -->
    <script src="{{ asset('assets') }}/js/config.js"></script>

    <!-- App css -->
    <link href="{{ asset('assets') }}/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="{{ asset('assets') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
    @stack('css')
</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">


        @include('admin.layouts.header')

        @include('admin.layouts.sidebar')


        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    @yield('content')
                    <!-- end page title -->

                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Powerx - Coderthemes.com
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-end footer-links d-none d-md-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Vendor js -->
    <script src="{{ asset('assets') }}/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="{{ asset('assets') }}/js/app.min.js"></script>
    <script>
        $.ajaxSetup({
           async: true, // Set to true if you want asynchronous requests (this is the default)
           headers: {
               'X-CSRF-TOKEN': "{{ csrf_token() }}"
           }
        });

        $('.log-out').click(function (e) {
            e.preventDefault();
            formAjax('', "{{ route('logout') }}", 'post').then(function (response) {
                window.location.href = "{{ route('dashboard') }}";
            })
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
    @stack('js')
</body>

</html>