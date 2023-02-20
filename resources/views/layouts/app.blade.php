<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Merlyn Mansion Accounting | @yield('pageTitle')</title>

    <!-- Favicon -->
        <link rel="apple-touch-icon-precomposed" sizes="57x57" href="{{ asset('assets/favicon/apple-touch-icon-57x57.png') }}" />
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('assets/favicon/apple-touch-icon-114x114.png') }}" />
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('assets/favicon/apple-touch-icon-72x72.png') }}" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('assets/favicon/apple-touch-icon-144x144.png') }}" />
        <link rel="apple-touch-icon-precomposed" sizes="60x60" href="{{ asset('assets/favicon/apple-touch-icon-60x60.png') }}" />
        <link rel="apple-touch-icon-precomposed" sizes="120x120" href="{{ asset('assets/favicon/apple-touch-icon-120x120.png') }}" />
        <link rel="apple-touch-icon-precomposed" sizes="76x76" href="{{ asset('assets/favicon/apple-touch-icon-76x76.png') }}" />
        <link rel="apple-touch-icon-precomposed" sizes="152x152" href="{{ asset('assets/favicon/apple-touch-icon-152x152.png') }}" />
        <link rel="icon" type="image/png" href="{{ asset('assets/favicon/favicon-196x196.png') }}" sizes="196x196" />
        <link rel="icon" type="image/png" href="{{ asset('assets/favicon/favicon-96x96.png') }}" sizes="96x96" />
        <link rel="icon" type="image/png" href="{{ asset('assets/favicon/favicon-32x32.png') }}" sizes="32x32" />
        <link rel="icon" type="image/png" href="{{ asset('assets/favicon/favicon-16x16.png') }}" sizes="16x16" />
        <link rel="icon" type="image/png" href="{{ asset('assets/favicon/favicon-128.png') }}" sizes="128x128" />
        <meta name="application-name" content="&nbsp;"/>
        <meta name="msapplication-TileColor" content="#FFFFFF" />
        <meta name="msapplication-TileImage" content="mstile-144x144.png" />
        <meta name="msapplication-square70x70logo" content="mstile-70x70.png" />
        <meta name="msapplication-square150x150logo" content="mstile-150x150.png" />
        <meta name="msapplication-wide310x150logo" content="mstile-310x150.png" />
        <meta name="msapplication-square310x310logo" content="mstile-310x310.png" />    
    <!-- End Favicon -->

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
        <script src="{{ asset('assets/StartBootstrap/vendor/datatables/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('assets/StartBootstrap/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ asset('assets/StartBootstrap/js/demo/datatables-demo.js') }}"></script>
    <!-- End Template from StartBootstrap-->

    @yield('script')
</body>
</html>
