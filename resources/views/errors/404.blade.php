<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <title>Error 404 - Not Found</title>
    <meta charset="utf-8" />
    <meta name="description" content="SIAKAD" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="SIAKAD" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="WEB APPS" />
    <meta property="og:title" content="SIAKAD" />
    <link rel="shortcut icon" href="{{ asset('storage/images/favicon/favicon.ico') }}" />
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
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - 404 Page-->
        <div class="d-flex flex-column flex-center flex-column-fluid p-10">
            <!--begin::Illustration-->
            <img src="{{ asset('storage/images/media/illustrations/dozzy-1/18.png') }}" alt=""
                class="mw-100 mb-10 h-lg-450px" />
            <!--end::Illustration-->
            <!--begin::Message-->
            <h1 class="fw-bold mb-10" style="color: #A3A3C7">Seems there is nothing here</h1>
            <!--end::Message-->
            <!--begin::Link-->
            <a href="{{ url('dashboard') }}" class="btn btn-primary">Return Dashboard</a>
            <!--end::Link-->
        </div>
        <!--end::Authentication - 404 Page-->
    </div>
    <!--end::Main-->
    <script>
        var hostUrl = "assets/";
    </script>
    <!--begin::Javascript-->
    <!--begin::Javascript-->
    <script src="{{ mix('js/app.js') }}"></script>
    <!--end::Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
