<!DOCTYPE html>
<html class="no-js" lang="en" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>

		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Medz - Medical Directory HTML Template">
		<meta name="author" content="Spruko Technologies Private Limited">
		<meta name="keywords" content="appointments, booking, bootstrap list template,  directory listing html template,  directory website template, doctor directory, doctor search, health template, healthcare directory, hospital,  html css templates, html directory listing, listing, medical bootstrap template, medical directory, medical html template , medical template,  medical web templates, medical website templates, pharma website templates, responsive html template,template html css, online directory website,  html5 template, themeforest html,  online directory, simple html templates ">

		<!-- Favicon -->
		<link rel="icon" href="{{asset('assets/images/brand/favicon.ico')}}" type="image/x-icon"/>
		<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/brand/favicon.ico')}}" />

		<!-- Title -->
		<title>{{ config('app.name', 'Laravel') }}</title>

		<!-- Bootstrap Css -->
		<link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />

		<!-- Style Css -->
		<link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />
		<link href="{{asset('assets/css/admin-custom.css')}}" rel="stylesheet" />

		<!-- Sidemenu Css -->
		<link href="{{asset('assets/css/sidemenu.css')}}" rel="stylesheet" />

		<!-- p-scroll bar css-->
		<link href="{{asset('assets/plugins/pscrollbar/pscrollbar.css')}}" rel="stylesheet" />

		<!--Icons  Css -->
		<link href="{{asset('assets/css/icons.css')}}" rel="stylesheet">

		<!--Color-Skin Css -->
		<link href="{{asset('assets/color-skins/color10.css')}}" id="theme" media="all" rel="stylesheet">

	</head>

	<body class="construction-image">

		<!--Loader-->
		<div id="global-loader">
			<img alt="" class="loader-img" src="{{asset('assets/images/loader.svg')}}">
		</div>
		<!--/Loader-->

		<!--Page-->
		<div class="page page-h">
			<div class="page-content z-index-10">
				<div class="container">
                @yield('content')
				</div>
			</div>
		</div>
		<!--/Page-->

		<!-- JQuery js-->
		<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>

		<!-- Bootstrap js -->
		<script src="{{asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>
		<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

		<!--JQueryVehiclerkline Js-->
		<script src="{{asset('assets/js/jquery.sparkline.min.js')}}"></script>

		<!-- Circle Progress Js-->
		<script src="{{asset('assets/js/circle-progress.min.js')}}"></script>

		<!-- Star Rating Js-->
		<script src="{{asset('assets/plugins/rating/jquery.rating-stars.js')}}"></script>

		<!-- p-scroll bar Js-->
		<script src="{{asset('assets/plugins/pscrollbar/pscrollbar.js')}}"></script>
		<script src="{{asset('assets/plugins/pscrollbar/pscroll.js')}}"></script>

		<!-- Fullside-menu Js-->
		<script src="{{asset('assets/plugins/sidemenu/sidemenu.js')}}"></script>

		<!--Counters -->
		<script src="{{asset('assets/plugins/counters/counterup.min.js')}}"></script>
		<script src="{{asset('assets/plugins/counters/waypoints.min.js')}}"></script>
		<script src="{{asset('assets/plugins/counters/numeric-counter.js')}}"></script>

		<!-- Custom Js-->
		<script src="{{asset('assets/js/admin-custom.js')}}"></script>

	</body>
</html>

{{-- <!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js')}}'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html> --}}
