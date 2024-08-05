<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords"
        content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
    <title>{{ config('app.name', 'Laravel') }}</title>
    {{-- @livewireStyles --}}

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../../../assets/vendors/select2/select2.min.css">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/livewire_helpers.js'])

    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('../assets/vendors/core/core.css') }}">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('../assets/vendors/flatpickr/flatpickr.min.css') }}">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('../assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('../assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('../assets/css/demo2/style.css') }}">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="{{ asset('../assets/images/favicon.png') }}" />

    <style>
        /* .main-wrapper, .page-wrapper, .page-content {
            display: flex;
            flex-direction: column;
            height: 100%;
            margin: 0;
            padding: 0;
        } */

        .page-wrapper {
            flex: 1;
        }

        .page-content {
            flex: 1;
            width: 100%;
            margin-left: 0;
            padding: 0;
        }
    </style>

</head>

<body>

    <div class="main-wrapper">

        <div class="page-wrapper" style="margin-left: 0;">

            <!-- partial:partials/_navbar.html -->
            @include('layouts.user-navbar')
            {{-- @include('layouts.admin-navbar') --}}
            <!-- partial -->

            <div class="page-content" style="width: 100%;left:0;">
                <!-- blade rendering -->
                @yield('content')

                <!-- livewire rendering -->
                {{ $slot ?? '' }}
            </div>



            <!-- partial:partials/_footer.html -->
            @include('layouts.footer')
            <!-- partial -->

        </div>
    </div>

    @stack('modals')


    <!-- core:js -->
    <script src="{{ asset('../assets/vendors/core/core.js') }}"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
    <script src="{{ asset('../assets/vendors/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('../assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
    <!-- End plugin js for this page -->

    <!-- inject:js -->
    <script src="{{ asset('../assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('../assets/js/template.js') }}"></script>
    <!-- endinject -->
    <script src="../../../assets/vendors/select2/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Custom js for this page -->
    <script src="{{ asset('../assets/js/dashboard-dark.js') }}"></script>
    {{-- @livewireScripts --}}
</body>

</html>
