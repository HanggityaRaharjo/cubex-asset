<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>

    <!-- css -->
    @include('backend.templates.css')
    @include('backend.templates.style')

    {{--  --}}
    <link rel="stylesheet" href="{{ asset('assets/global/layouts/backend/pages/css/cubex.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cubex2.css') }}">
    {{-- Font Poppin --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <style>
        :root {
            color-scheme: dark;
        }

        * {
            font-family: 'Poppins', sans-serif;
        }

        .cubex-bg {
            background-position: bottom;
            background-size: cover;
        }

        #table-services tbody tr:hover,
        #table-routes tbody tr:hover {
            color: white
        }


        table tbody tr:nth-child(odd) {
            background: transparent;
        }

        table tbody tr:nth-child(even) {
            background: #262a2c;
        }

        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_processing,
        .dataTables_wrapper .dataTables_paginate {
            color: #A8B6BA
        }

        .dataTables_wrapper .dataTables_filter input {
            background: black;
            border: none;
            border-radius: 8px;
            color: #A8B6BA
        }

        #table-routes_length select,
        #table-services_length select {
            background: #1F2324;
            color: #A8B6BA
        }

        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu a::after {
            transform: rotate(-90deg);
            position: absolute;
            right: 6px;
            top: .8em;
        }

        .dropdown-submenu .dropdown-menu {
            top: 0;
            left: 100%;
            margin-left: .1rem;
            margin-right: .1rem;
        }

        .scheduler_default_corner {
            background: #3A4042 !important;
        }

        .scheduler_default_timeheadergroup.scheduler_default_timeheader_cell {
            background: #905923 !important;
        }

        .scheduler_default_timeheadercol.scheduler_default_timeheader_cell {
            background: #676F76 !important;
            color: white !important;
        }

        #appended-list-cf div:nth-child(odd) div.scheduler_default_rowheader {
            background: #1f2324 !important;
            color: white;
        }

        #appended-list-cf div:nth-child(even) div.scheduler_default_rowheader {
            background: #262a2c !important;
            color: white;
        }

        .scheduler_default_matrix div:nth-child(odd) div.scheduler_default_cell {
            background: #1f2324 !important;
        }

        .scheduler_default_cell {
            background: #262a2c;

        }

        .scheduler_default_cell.scheduler_default_cell_business {
            background: #262a2c;
        }

        #list-organization * {
            border: none !important;
        }

        #content-organization * {
            border: none !important;
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <!-- Header -->
    @include('backend.templates.navbar')

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <!-- Sidebar -->
            @include('backend.templates.sidebar')
        </div>
        <div id="layoutSidenav_content" class="cubex-bg"
            style="background-image:url({{ asset('assets/images/cubex-bg.svg') }})">
            <main>
                <div class="cubex-container-fluid" style="padding:10px 47px 0px 47px;">
                    @yield('breadcrumb')
                    @yield('main-content')
                </div>
            </main>
            <!-- Footer -->
            @include('backend.templates.footer')
        </div>
    </div>
    @include('backend.templates.js')
    @stack('scripts-libraries')
    <script>
        const APP_URL = {!! json_encode(url('/')) !!};
        $('.dropdown-submenu > a').on("click", function(e) {
            var submenu = $(this);
            $('.dropdown-submenu .dropdown-menu').removeClass('show');
            submenu.next('.dropdown-menu').addClass('show');
            e.stopPropagation();
        });

        $('.dropdown').on("hidden.bs.dropdown", function() {
            // hide any open menus when parent closes
            $('.dropdown-menu.show').removeClass('show');
        });
    </script>
    @if (App::environment() == 'local')
        <script>
            const APP_URL_API_CRM = 'http://localhost:8000/myaccount/api/v1/';
        </script>
    @else
        <script>
            const APP_URL_API_CRM = config('app.crm_apis_url');
        </script>
    @endif
    @yield('javascript')



</body>

</html>
