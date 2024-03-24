<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>Admin | {{env('APP_NAME')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Asjap" name="description"/>
    <meta content="asjap" name="author"/>

    <!-- App favicon -->

    <!-- Theme Config Js -->
    <script src="{{ asset('assets') }}/js/config.js"></script>

    <!-- App css -->
    <link href="{{ asset('assets') }}/css/app.min.css" rel="stylesheet" type="text/css" id="app-style"/>

    <!-- Icons css -->
    <link href="{{ asset('assets') }}/css/icons.min.css" rel="stylesheet" type="text/css"/>
    <!-- Datatables css -->
    <link href="{{asset('assets')}}/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets')}}/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css"
          rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets')}}/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css"
          rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets')}}/vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css"
          rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets')}}/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets')}}/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet"
          type="text/css"/>
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
                        </script>
                        © {{env('APP_NAME')}}
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{--datatable js--}}
<!-- Datatables js -->
<script src="{{asset('assets')}}/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{asset('assets')}}/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="{{asset('assets')}}/vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('assets')}}/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
<script src="{{asset('assets')}}/vendor/datatables.net-fixedcolumns-bs5/js/fixedColumns.bootstrap5.min.js"></script>
<script src="{{asset('assets')}}/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="{{asset('assets')}}/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('assets')}}/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
<script src="{{asset('assets')}}/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('assets')}}/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="{{asset('assets')}}/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('assets')}}/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="{{asset('assets')}}/vendor/datatables.net-select/js/dataTables.select.min.js"></script>

<script>
    $.ajaxSetup({
        async: true, // Set to true if you want asynchronous requests (this is the default)
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}",
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

</script>
@stack('js')
</body>

</html>
