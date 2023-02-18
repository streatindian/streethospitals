<!DOCTYPE html>
<html class="no-js" lang="en">

<head>

    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Street Hospital">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords" content="">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/images/brand/favicon.ico') }}" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/brand/favicon.ico') }}" />

    <!-- Title -->
    <title>Street Hospital</title>

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Style Css -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <!--Icons  Css -->
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">

    <!--Select2 Css -->
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet">

    <!-- Owl Theme css-->
    <link href="{{ asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet">

    <!-- Date Picker Css -->
    <link href="{{ asset('assets/plugins/date-picker/spectrum.css') }}" rel="stylesheet" />

    <!-- Custom scroll bar css-->
    <link href="{{ asset('assets/plugins/scroll-bar/jquery.mCustomScrollbar.css') }}" rel="stylesheet">

    <!--Color-Skin Css -->
    <link href="{{ asset('assets/color-skins/color10.css') }}" id="theme" media="all" rel="stylesheet">
    @yield('head')
</head>

<body>
    <script>
        var base_url = '{{ url('/') }}';
    </script>
    <!--Loader-->
    <div id="global-loader">
        <img alt="" class="loader-img" src="{{ asset('assets/images/loader.svg') }}">
    </div>
    <!--/Loader-->

    <!-- Header-main -->
    <div class="header-main">

        <!-- Top Bar -->
        @include('front.includes.top-header')
        <!--/Top Bar-->

        <!--Header Search-->
        @include('front.includes.header')
        <!--/Header Search-->

        <!-- Horizontal Header -->
        {{-- <div class="horizontal-header clearfix">
            <div class="container">
                <a class="animated-arrow" id="horizontal-navtoggle"><span></span></a>
                <a class="smllogo mobile-logo" href="{{url('/')}}"></a>111111
                <a class="callusbtn" href="tel:245-6325-3256"><i aria-hidden="true" class="fa fa-phone"></i></a>
            </div>
        </div> --}}
        <!-- /Horizontal Header -->

        <!-- Horizontal Menu -->
        @include('front.includes.menu')
        <!-- /Horizontal Menu -->

    </div>
    <!-- /Header-main -->
    @yield('content')

    <!--Footer Section-->
    @include('front.includes.footer')
    <!--Footer Section-->

    <!-- Popup Login-->
    <div class="modal" id="exampleModal">
        <div class="modal-dialog modal-lg modal-appoint" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Make an Appointment</h5><button aria-label="Close"
                        class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Your Name</label>
                                <input class="form-control" placeholder="Enter Your Name" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Your Email</label>
                                <input class="form-control" placeholder="Enter your Email" type="email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Your Number</label>
                                <input class="form-control" placeholder="Enter your Phone Number" type="number">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Select Gender</label>
                                <select class="form-control select2" name="user[hour]">
                                    <option value="">Male</option>
                                    <option value="0">Female</option>
                                    <option value="1">Others</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Select Date</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                        </div>
                                    </div><input class="form-control fc-datepicker" placeholder="MM/DD/YYYY"
                                        type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Select City</label>
                                <select class="form-control custom-select select2-show-search" name="city">
                                    <option selected value="0">Select City</option>
                                    <option value="1">Hyderabad</option>
                                    <option value="2">Mumbai</option>
                                    <option value="3">Delhi</option>
                                    <option value="4">Bangalore</option>
                                    <option value="5">Ahmedabad</option>
                                    <option value="6">Chennai</option>
                                    <option value="7">Kolkata</option>
                                    <option value="8">Lucknow</option>
                                    <option value="9">Jaipur</option>
                                    <option value="10">Bhopal</option>
                                    <option value="11">Visakhapatnam</option>
                                    <option value="12">Patna</option>
                                    <option value="13">Srinagar</option>
                                    <option value="14">Lucknow</option>
                                    <option value="15">Bhubaneswar</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Select Hospital</label>
                                <select class="form-control custom-select select2-show-search" name="Hospital">
                                    <option selected value="0">Select Hospital</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Select Specialist</label>
                                <select class="form-control custom-select select2-show-search" name="Specialist">
                                    <option selected value="0">Select Specialist</option>
                                    <option value="1">Cardiologist</option>
                                    <option value="2">Neurosurgeon</option>
                                    <option value="3">Orthopaedic Surgeon</option>
                                    <option value="4">Oncologist</option>
                                    <option value="5">Neurologist</option>
                                    <option value="6">Gastroenterologist</option>
                                    <option value="7">ENT</option>
                                    <option value="8">Dentist</option>
                                    <option value="9">Psychiatrist</option>
                                    <option value="10">Urologist</option>
                                    <option value="11">Gynecologist</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Select Slot</label>
                                <select class="form-control custom-select select2-show-search" name="Slot">
                                    <option selected value="0">Select Hospital</option>
                                    <option value="1">Moring</option>
                                    <option value="2">Afternoon</option>
                                    <option value="3">Evening</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="">
                        <a class="btn btn-orange btn-block" href="#">Book Appointment</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Popup Login-->

    <!-- Back to top -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <!-- JQuery js-->
    <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>

    <!-- Bootstrap js -->
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!--JQueryVehiclerkline Js-->
    <script src="{{ asset('assets/js/jquery.sparkline.min.js') }}"></script>

    <!-- Circle Progress Js-->
    <script src="{{ asset('assets/js/circle-progress.min.js') }}"></script>

    <!-- Star Rating Js-->
    <script src="{{ asset('assets/plugins/rating/jquery.rating-stars.js') }}"></script>

    <!--Counters -->
    <script src="{{ asset('assets/plugins/counters/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/counters/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/counters/numeric-counter.js') }}"></script>

    <!--Owl Carousel js -->
    <script src="{{ asset('assets/plugins/owl-carousel/owl.carousel.js') }}"></script>

    <!--Horizontal Menu-->
    <script src="{{ asset('assets/plugins/horizontal/horizontal.js') }}"></script>

    <!--JQuery TouchSwipe js-->
    <script src="{{ asset('assets/js/jquery.touchSwipe.min.js') }}"></script>

    <!--Select2 js -->
    <script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>

    <!-- Datepicker js -->
    <script src="{{ asset('assets/plugins/date-picker/spectrum.js') }}"></script>
    <script src="{{ asset('assets/plugins/date-picker/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/plugins/date-picker/datepicker.js') }}"></script>

    <!-- sticky Js-->
    <script src="{{ asset('assets/js/sticky.js') }}"></script>

    <!-- Cookie js -->
    <script src="{{ asset('assets/plugins/cookie/jquery.ihavecookies.js') }}"></script>
    <script src="{{ asset('assets/plugins/cookie/cookie.js') }}"></script>

    <!-- Custom scroll bar Js-->
    <script src="{{ asset('assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js') }}"></script>

    <!--Showmore Js-->
    <script src="{{ asset('assets/js/jquery.showmore.js') }}"></script>
    <script src="{{ asset('assets/js/showmore.js') }}"></script>

    <!-- Swipe Js-->
    <script src="{{ asset('assets/js/swipe.js') }}"></script>

    <!--Owl-Carousel Js-->
    <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>

    <!-- Custom Js-->
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    @yield('js')
</body>

</html>
