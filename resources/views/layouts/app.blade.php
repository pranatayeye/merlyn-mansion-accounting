<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Merlyn Villa Accounting | @yield('pageTitle')</title>
    <link href="{{ asset('assets/bootstrap-5.0.2-dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template from StartBootstrap -->
        <link href="{{ asset('assets/StartBootstrap/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="{{ asset('assets/StartBootstrap/css/sb-admin-2.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/StartBootstrap/vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <!-- End Template from StartBootstrap -->

    <!-- Custom CSS -->
        <link href="{{ asset('assets/custom/cssfile.css') }}" rel="stylesheet">
    <!-- End Custom CSS -->
</head>
<body id="page-top" class="bg-gradient-success">

    @yield('content')
    
    <script src="{{ asset('assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Template from StartBootstrap-->
        <script src="{{ asset('assets/StartBootstrap/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/StartBootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- Core plugin JavaScript-->
        <script src="{{ asset('assets/StartBootstrap/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
        <!-- Custom scripts for all pages-->
        <script src="{{ asset('assets/StartBootstrap/js/sb-admin-2.min.js') }}"></script>
        <!-- Page level plugins -->
        <script src="{{ asset('assets/StartBootstrap/vendor/chart.js/Chart.min.js') }}"></script>
        <!-- Page level custom scripts -->
        <script src="{{ asset('assets/StartBootstrap/js/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('assets/StartBootstrap/js/demo/chart-pie-demo.js') }}"></script>
        <!-- Page level plugins -->
        <script src="{{ asset('assets/StartBootstrap/vendor/datatables/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('assets/StartBootstrap/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ asset('assets/StartBootstrap/js/demo/datatables-demo.js') }}"></script>
    <!-- End Template from StartBootstrap-->

    @yield('script')
</body>
</html>
