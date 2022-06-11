<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <title>SIAKAD - Sistem Informasi Akademik</title>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="SIAKAD" />
    <meta name="keywords" content="SIAKAD" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="WEB APPS" />
    <meta property="og:title" content="SIAKAD" />
    <link rel="shortcut icon" href="{{ asset('storage/images/logo/logo.ico') }}" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!-- begin::CSS -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!-- end::CSS-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="bg-body">
    @yield('content')
    <script>
        var hostUrl = "assets/";
    </script>
    <!--begin::Javascript-->
    <script src="{{ mix('js/app.js') }}"></script>
    @yield('script')
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
