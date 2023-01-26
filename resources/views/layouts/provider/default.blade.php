<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Medz - Medical Directory HTML Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="appointments, booking, bootstrap list template,  directory listing html template,  directory website template, doctor directory, doctor search, health template, healthcare directory, hospital,  html css templates, html directory listing, listing, medical bootstrap template, medical directory, medical html template , medical template,  medical web templates, medical website templates, pharma website templates, responsive html template,template html css, online directory website,  html5 template, themeforest html,  online directory, simple html templates ">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/images/brand/favicon.ico') }}" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/brand/favicon.ico') }}" />

    <!-- Title -->
    <title>Dashboard</title>


    <!-- Sidemenu Css -->
    <link href="{{ asset('assets/css/sidemenu.css') }}" rel="stylesheet" />


    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Style Css -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/admin-custom.css') }}" rel="stylesheet" />

    <!-- p-scroll bar css-->
    <link href="{{ asset('assets/plugins/pscrollbar/pscrollbar.css') }}" rel="stylesheet" />

    <!---Font icons-->
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" />

    <!--Color-Skin Css -->
    <link href="{{ asset('assets/color-skins/color10.css') }}" id="theme" media="all" rel="stylesheet">

    <link href="{{ asset('assets/plugins/sweet-alert/sweetalert.css') }}" rel="stylesheet" />

    @yield('head')
    <style>
        select.form-control:not([size]):not([multiple]) {
            height: 29px;
            margin: 0px 5px;
        }

        .dataTables_length label {
            display: inline-flex;
        }

        .dataTables_length input,
        select {
            height: 35px;
        }

        #myTable_filter {
            text-align: end;
        }

        .dataTables_paginate {
            float: right;
            margin-bottom: 10px;
        }
    </style>
</head>

<body class="app sidebar-mini">
    <script type="text/javascript">
        var base_url = '{{ url('/') }}';
        var csrf_token = '{{ csrf_token() }}';
    </script>

    <!--Loader-->
    <div id="global-loader">
        <img alt="" class="loader-img" src="{{ asset('assets/images/loader.svg') }}">
    </div>
    <!--/Loader-->

    <div class="page">
        <div class="page-main h-100">
            @include('provider.includes.header')
            <!-- Sidebar menu-->
            @include('provider.includes.sidebar')
            @yield('content')
        </div>

        <!--footer-->
        @include('provider.includes.footer')
        <!-- End Footer-->
    </div>
    <!-- Back to top -->
    <a href="#top" id="back-to-top"><i class="fa fa-rocket"></i></a>


    <!-- Dashboard Core -->
    <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.sparkline.min.js') }}"></script>
    <script src=""></script>
    <script src="{{ asset('assets/js/jquery.tablesorter.min.js') }}"></script>
    <script src="{{ asset('assets/js/circle-progress.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/rating/jquery.rating-stars.js') }}"></script>

    <!-- Fullside-menu Js-->
    <script src="{{ asset('assets/plugins/sidemenu/sidemenu.js') }}"></script>


    <!-- ECharts Plugin -->
    {{-- <script src="{{ asset('assets/plugins/echarts/echarts.js') }}"></script> --}}

    <!-- Input Mask Plugin -->
    <script src="{{ asset('assets/plugins/input-mask/jquery.mask.min.js') }}"></script>

    <!--Counters -->
    <script src="{{ asset('assets/plugins/counters/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/counters/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/counters/numeric-counter.js') }}"></script>

    <!-- p-scroll bar Js-->
    <script src="{{ asset('assets/plugins/pscrollbar/pscrollbar.js') }}"></script>
    <script src="{{ asset('assets/plugins/pscrollbar/pscroll.js') }}"></script>

    <!-- Index Scripts -->
    <script src="{{ asset('assets/js/index4.js') }}"></script>



    <!-- Custom Js-->
    <script src="{{ asset('assets/js/admin-custom.js') }}"></script>
    <script src="{{ asset('assets/plugins/sweet-alert/sweetalert.min.js') }}"></script>
    @if (Session::has('success'))
        <script>
            $(document).ready(function() {
                swal('Success', '{{ Session::get('success') }}', 'success');
            });
        </script>
    @endif
    @if (Session::has('error'))
        <script>
            $(document).ready(function() {
                swal('Oops', '{{ Session::get('error') }}', 'error');
            });
        </script>
    @endif
    @if (Session::has('warning'))
        <script>
            $(document).ready(function() {
                swal('Warning', '{{ Session::get('success') }}', 'warning');
            });
        </script>
    @endif
    @yield('js')
</body>

</html>
