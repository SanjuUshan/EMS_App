<!DOCTYPE html>
<!--
Template Name: NobleUI - HTML Bootstrap 5 Admin Dashboard Template
Author: NobleUI
Website: https://www.nobleui.com
Portfolio: https://themeforest.net/user/nobleui/portfolio
Contact: nobleui123@gmail.com
Purchase: https://1.envato.market/nobleui_admin
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords"
        content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <title>NobleUI - HTML Bootstrap 5 Admin Dashboard Template</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- End fonts -->

    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('../assets/vendors/core/core.css') }}">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('../assets/vendors/flatpickr/flatpickr.min.css') }}">
    <!-- End plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('../assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('../assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('../assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <!-- endinject -->
    <link rel="stylesheet" href="../../../assets/vendors/select2/select2.min.css">
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('../assets/css/demo2/style.css') }}">
    <!-- End layout styles -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    <link rel="shortcut icon" href="{{ asset('../assets/images/favicon.png') }}" />
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"> --}}

    {{-- <style>
        /* Hide the native calendar icon */
        input[type="date"]::-webkit-calendar-picker-indicator {
            display: none;
        }
        input[type="date"]::-webkit-inner-spin-button,
        input[type="date"]::-webkit-clear-button {
            display: none;
        }
        .date-wrapper {
            position: relative;
            display: inline-block;
        }
        input[type="date"] {
            padding: 10px;
            padding-right: 40px; /* Adjust as needed */
            border: 1px solid #172340;
            border-radius: 4px;
            background-color: transparent;
            color: white; /* Adjust text color as needed */
            width: 100%; /* Ensure input takes full width */
            box-sizing: border-box;
        }

        /* Custom calendar icon */
        .custom-calendar-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: white; /* Change this to the desired color */
            pointer-events: none;
            font-size: 1.2em; /* Adjust icon size as needed */
        }
    </style> --}}

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/livewire_helpers.js'])

    @livewireStyles
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.0/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-borderless@4/borderless.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/shopify-cartjs/1.1.0/cart.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/shopify-cartjs/1.1.0/rivets-cart.min.js"></script>


</head>

<body>
    <div class="main-wrapper">

        <!-- partial:partials/_sidebar.html -->
        {{-- @if (Auth::user() && Auth::user()->role == 'admin') --}}
        @include('layouts.sidebar')
        <div class="page-wrapper">
            {{-- @endif <!-- partial:partials/_navbar.html --> --}}
            @include('layouts.admin-navbar')
            <!-- partial -->

            <div class="page-content">
                <!-- blade rendering -->
                @yield('content')

                <!-- livewire rendering -->
                {{ $slot ?? '' }}
            </div>



            <!-- partial:partials/_footer.html -->
            @include('layouts.footer')
            <!-- partial -->




            {{-- <nav class="settings-sidebar">
            <div class="sidebar-body">
                <a href="#" class="settings-sidebar-toggler">
                    <i data-feather="settings"></i>
                </a>
                <div class="theme-wrapper">
                    <h6 class="text-muted mb-2">Light Theme:</h6>
                    <a class="theme-item" href="../demo1/dashboard.html">
                        <img src="../assets/images/screenshots/light.jpg" alt="light theme">
                    </a>
                    <h6 class="text-muted mb-2">Dark Theme:</h6>
                    <a class="theme-item active" href="../demo2/dashboard.html">
                        <img src="../assets/images/screenshots/dark.jpg" alt="light theme">
                    </a>
                </div>
            </div>
        </nav> --}}
            <!-- partial -->




        </div>
    </div>

    @stack('modals')

    @livewireScripts

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js"
        integrity="sha512-u3fPA7V8qQmhBPNT5quvaXVa1mnnLSXUep5PS1qo5NRzHwG19aHmNJnj1Q8hpA/nBWZtZD4r4AX6YOt5ynLN2g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    <!-- Custom js for this page -->
    <script src="{{ asset('../assets/js/dashboard-dark.js') }}"></script>
    <!-- End custom js for this page -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> --}}
    <script src="../../../assets/vendors/select2/select2.min.js"></script>





    <script>
        document.addEventListener('livewire:navigated', () => {
            console.log('navigated');
            feather.replace();
        })
    </script>
</body>

</html>
