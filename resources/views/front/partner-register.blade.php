@extends('layouts.front-default')
@section('head')
    <link href="{{ asset('assets/plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />
    
@endsection
@section('content')
    <section>
        <div class="bannerimg cover-image bg-background3" data-image-src="{{asset('assets/images/banners/banner2.jpg')}}">
            <div class="header-text mb-0">
                <div class="container">
                    <div class="text-center text-white">
                        <h1>Ad Post2</h1>
                        <ol class="breadcrumb text-center">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Partner Register</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="sptb">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Registration Form</h3>
                        </div>
                        <div class="card-body">
                            <form id="commentForm" method="get" class="form-horizontal mb-0">
                                <div id="rootwizard" class="border pt-0">
                                    <ul class="nav nav-tabs nav-justified">
                                        <li class="nav-item "><a href="#first" data-toggle="tab"
                                                class="nav-link font-bold active">Select category</a></li>
                                        <li class="nav-item"><a href="#second" data-toggle="tab"
                                                class="nav-link font-bold">Details</a></li>
                                        <li class="nav-item"><a href="#third" data-toggle="tab"
                                                class="nav-link font-bold ">Payment</a></li>
                                    </ul>
                                    <div class="tab-content card-body mt-3 mb-0 b-0">
                                        <div class="tab-pane active show fade" id="first">
                                            <label class="form-label text-dark">Select Category</label>
                                            <select class="form-control custom-select nice-select  required"
                                                id="post-categories" name="custom1">
                                                @foreach ($category as $c)
                                                <option value="{{$c->slug}}">{{$c->name}}</option>    
                                                @endforeach
                                                {{-- <option value="hosiptal">Hospitals</option>
                                                <option value="doctors">Doctors</option>
                                                <option value="fitness">Fitness Centers</option>
                                                <option value="pharmacy">Pharmacies</option>
                                                <option value="clinic">Clinics</option>
                                                <option value="bloodbank">Blood Banks</option> --}}
                                            </select>
                                        </div>
                                        <div class="tab-pane fade" id="second">
                                            <div class="">
                                                <div class="post-content" id="hosiptal">
                                                    <div class="form-group">
                                                        <label class="form-label text-dark">Name</label>
                                                        <input type="text" class="form-control  required"
                                                            placeholder="Enter Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label text-dark">Phone Number</label>
                                                        <input type="number" class="form-control  required"
                                                            placeholder="Enter Number">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label text-dark">Address</label>
                                                        <textarea class="form-control  required" name="example-textarea-input" rows="3" placeholder="text here.."></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label text-dark">Set Timings</label>
                                                        <select class="form-control custom-select nice-select  required">
                                                            <option selected="selected"> 9Am - 5Pm </option>
                                                            <option>8Am - 4Pm</option>
                                                            <option>10Am - 6Pm</option>
                                                            <option>10Am - 7Pm</option>
                                                            <option>9Am - 10Pm</option>
                                                            <option>11Am - 9Pm</option>
                                                            <option>Other</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label text-dark">Set Days</label>
                                                        <select class="form-control custom-select nice-select  required">
                                                            <option selected="selected"> Mon - Fri </option>
                                                            <option> Mon- Sat </option>
                                                            <option> Mon- Sun </option>
                                                            <option> Mon, Tues, Wed</option>
                                                            <option>Thurs, Fri, Sat</option>
                                                            <option> Tues, Fri, Sun</option>
                                                            <option> Other </option>
                                                        </select>
                                                    </div>
                                                    <div class="input-group file-browser">
                                                        <input type="text"
                                                            class="form-control border-right-0 browse-file"
                                                            placeholder="Upload Images" readonly>
                                                        <label class="input-group-btn">
                                                            <span class="btn btn-primary">
                                                                Browse <input type="file" style="display: none;"
                                                                    multiple>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <div class="p-2 border">
                                                        <div class="upload-images d-flex">
                                                            <div>
                                                                <img src="{{asset('assets/images/media/0-23.jpg')}}" alt="img"
                                                                    class="w73 h73 border p-0">
                                                            </div>
                                                            <div class="ml-3 mt-2">
                                                                <h6 class="mb-0 mt-3 font-weight-bold">img_01</h6>
                                                                <small>4.5kb</small>
                                                            </div>
                                                            <div class="float-right ml-auto">
                                                                <a href="#"
                                                                    class="float-right btn btn-icon btn-danger btn-sm mt-5"><i
                                                                        class="fa fa-trash-o"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-content" id="doctors">
                                                    <div class="form-group">
                                                        <label class="form-label text-dark">Name</label>
                                                        <input type="text" class="form-control  required"
                                                            placeholder="Enter Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label text-dark">Degree</label>
                                                        <input type="text" class="form-control  required"
                                                            placeholder="eg.,MBBS,Phd">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label text-dark">Specialties</label>
                                                        <input type="text" class="form-control  required"
                                                            placeholder="eg., Gynecologist">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label text-dark">Experience</label>
                                                        <input type="text" class="form-control  required"
                                                            placeholder="eg., 2">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label text-dark">Phone Number</label>
                                                        <input type="number" class="form-control  required"
                                                            placeholder="Enter Number">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label text-dark">Set Timings</label>
                                                        <select class="form-control custom-select nice-select  required">
                                                            <option selected="selected"> 9Am - 5Pm </option>
                                                            <option>8Am - 4Pm</option>
                                                            <option>10Am - 6Pm</option>
                                                            <option>10Am - 7Pm</option>
                                                            <option>9Am - 10Pm</option>
                                                            <option>11Am - 9Pm</option>
                                                            <option>Other</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label text-dark">Set Days</label>
                                                        <select class="form-control custom-select nice-select  required">
                                                            <option selected="selected"> Mon - Fri </option>
                                                            <option> Mon- Sat </option>
                                                            <option> Mon- Sun </option>
                                                            <option> Mon, Tues, Wed</option>
                                                            <option>Thurs, Fri, Sat</option>
                                                            <option> Tues, Fri, Sun</option>
                                                            <option> Other </option>
                                                        </select>
                                                    </div>
                                                    <div class="input-group file-browser">
                                                        <input type="text"
                                                            class="form-control border-right-0 browse-file"
                                                            placeholder="Upload Images" readonly>
                                                        <label class="input-group-btn">
                                                            <span class="btn btn-primary">
                                                                Browse <input type="file" style="display: none;"
                                                                    multiple>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <div class="p-2 border mb-4">
                                                        <div class="upload-images d-flex">
                                                            <div>
                                                                <img src="{{asset('assets/images/users/female/22.jpg')}}"
                                                                    alt="img" class="w73 h73 border p-0">
                                                            </div>
                                                            <div class="ml-3 mt-2">
                                                                <h6 class="mb-0 mt-3 font-weight-bold">img_01</h6>
                                                                <small>4.5kb</small>
                                                            </div>
                                                            <div class="float-right ml-auto">
                                                                <a href="#"
                                                                    class="float-right btn btn-icon btn-danger btn-sm mt-5"><i
                                                                        class="fa fa-trash-o"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="control-group form-group mt-4 mb-0">
                                                        <label class="form-label text-dark">Consult Fee</label>
                                                        <div class="d-md-flex ad-post-details">
                                                            <label class="custom-control custom-radio mb-2 mr-4  required">
                                                                <input type="radio" class="custom-control-input"
                                                                    name="radios1" value="option1" checked="">
                                                                <span class="custom-control-label"><a href="#"
                                                                        class="text-muted">$200</a></span>
                                                            </label>
                                                            <label
                                                                class="custom-control custom-radio  mb-2 mr-4  required">
                                                                <input type="radio" class="custom-control-input"
                                                                    name="radios1" value="option2">
                                                                <span class="custom-control-label"><a href="#"
                                                                        class="text-muted">12 days / $250</a></span>
                                                            </label>
                                                            <label
                                                                class="custom-control custom-radio  mb-2 mr-4  required">
                                                                <input type="radio" class="custom-control-input"
                                                                    name="radios1" value="option3">
                                                                <span class="custom-control-label"><a href="#"
                                                                        class="text-muted">1 month / $500</a></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-content" id="fitness">
                                                    <div class="form-group">
                                                        <label class="form-label text-dark">Name</label>
                                                        <input type="text" class="form-control  required"
                                                            placeholder="Enter Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label text-dark">Address</label>
                                                        <textarea class="form-control  required" name="example-textarea-input" rows="3" placeholder="text here.."></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label text-dark">Set Timings</label>
                                                        <select class="form-control custom-select nice-select  required">
                                                            <option selected="selected"> 9Am - 5Pm </option>
                                                            <option>8Am - 4Pm</option>
                                                            <option>10Am - 6Pm</option>
                                                            <option>10Am - 7Pm</option>
                                                            <option>9Am - 10Pm</option>
                                                            <option>11Am - 9Pm</option>
                                                            <option>Other</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label text-dark">Set Days</label>
                                                        <select class="form-control custom-select nice-select  required">
                                                            <option selected="selected"> Mon - Fri </option>
                                                            <option> Mon- Sat </option>
                                                            <option> Mon- Sun </option>
                                                            <option> Mon, Tues, Wed</option>
                                                            <option>Thurs, Fri, Sat</option>
                                                            <option> Tues, Fri, Sun</option>
                                                            <option> Other </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label text-dark">Phone Number</label>
                                                        <input type="number" class="form-control  required"
                                                            placeholder="Enter Number">
                                                    </div>
                                                    <div class="input-group file-browser">
                                                        <input type="text"
                                                            class="form-control border-right-0 browse-file"
                                                            placeholder="Upload Images" readonly>
                                                        <label class="input-group-btn">
                                                            <span class="btn btn-primary">
                                                                Browse <input type="file" style="display: none;"
                                                                    multiple>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <div class="p-2 border">
                                                        <div class="upload-images d-flex">
                                                            <div>
                                                                <img src="{{asset('assets/images/media/0-11.jpg')}}" alt="img"
                                                                    class="w73 h73 border p-0">
                                                            </div>
                                                            <div class="ml-3 mt-2">
                                                                <h6 class="mb-0 mt-3 font-weight-bold">img_01</h6>
                                                                <small>4.5kb</small>
                                                            </div>
                                                            <div class="float-right ml-auto">
                                                                <a href="#"
                                                                    class="float-right btn btn-icon btn-danger btn-sm mt-5"><i
                                                                        class="fa fa-trash-o"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-content" id="pharmacy">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label class="form-label text-dark">Name</label>
                                                            <input type="text" class="form-control  required"
                                                                placeholder="Enter Name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label text-dark">Phone Number</label>
                                                            <input type="number" class="form-control  required"
                                                                placeholder="Enter Number">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label text-dark">Address</label>
                                                            <textarea class="form-control  required" name="example-textarea-input" rows="3" placeholder="text here.."></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label text-dark">Set Timings</label>
                                                            <select
                                                                class="form-control custom-select nice-select  required">
                                                                <option selected="selected"> 9Am - 5Pm </option>
                                                                <option>8Am - 4Pm</option>
                                                                <option>10Am - 6Pm</option>
                                                                <option>10Am - 7Pm</option>
                                                                <option>9Am - 10Pm</option>
                                                                <option>11Am - 9Pm</option>
                                                                <option>Other</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label text-dark">Set Days</label>
                                                            <select
                                                                class="form-control custom-select nice-select  required">
                                                                <option selected="selected"> Mon - Fri </option>
                                                                <option> Mon- Sat </option>
                                                                <option> Mon- Sun </option>
                                                                <option> Mon, Tues, Wed</option>
                                                                <option>Thurs, Fri, Sat</option>
                                                                <option> Tues, Fri, Sun</option>
                                                                <option> Other </option>
                                                            </select>
                                                        </div>
                                                        <div class="input-group file-browser">
                                                            <input type="text"
                                                                class="form-control border-right-0 browse-file"
                                                                placeholder="Upload Images" readonly>
                                                            <label class="input-group-btn">
                                                                <span class="btn btn-primary">
                                                                    Browse <input type="file" style="display: none;"
                                                                        multiple>
                                                                </span>
                                                            </label>
                                                        </div>
                                                        <div class="p-2 border">
                                                            <div class="upload-images d-flex">
                                                                <div>
                                                                    <img src="{{asset('assets/images/media/0-18.jpg')}}"
                                                                        alt="img" class="w73 h73 border p-0">
                                                                </div>
                                                                <div class="ml-3 mt-2">
                                                                    <h6 class="mb-0 mt-3 font-weight-bold">img_01</h6>
                                                                    <small>4.5kb</small>
                                                                </div>
                                                                <div class="float-right ml-auto">
                                                                    <a href="#"
                                                                        class="float-right btn btn-icon btn-danger btn-sm mt-5"><i
                                                                            class="fa fa-trash-o"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-content" id="clinic">
                                                    <div class="form-group">
                                                        <label class="form-label text-dark">Name</label>
                                                        <input type="text" class="form-control  required"
                                                            placeholder="Enter Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label text-dark">Address</label>
                                                        <textarea class="form-control  required" name="example-textarea-input" rows="3" placeholder="text here.."></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label text-dark">Phone Number</label>
                                                        <input type="number" class="form-control  required"
                                                            placeholder="Enter Number">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label text-dark">Set Timings</label>
                                                        <select class="form-control custom-select nice-select  required">
                                                            <option selected="selected"> 9Am - 5Pm </option>
                                                            <option>8Am - 4Pm</option>
                                                            <option>10Am - 6Pm</option>
                                                            <option>10Am - 7Pm</option>
                                                            <option>9Am - 10Pm</option>
                                                            <option>11Am - 9Pm</option>
                                                            <option>Other</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label text-dark">Set Days</label>
                                                        <select class="form-control custom-select nice-select  required">
                                                            <option selected="selected"> Mon - Fri </option>
                                                            <option> Mon- Sat </option>
                                                            <option> Mon- Sun </option>
                                                            <option> Mon, Tues, Wed</option>
                                                            <option>Thurs, Fri, Sat</option>
                                                            <option> Tues, Fri, Sun</option>
                                                            <option> Other </option>
                                                        </select>
                                                    </div>
                                                    <div class="input-group file-browser">
                                                        <input type="text"
                                                            class="form-control border-right-0 browse-file"
                                                            placeholder="Upload Images" readonly>
                                                        <label class="input-group-btn">
                                                            <span class="btn btn-primary">
                                                                Browse <input type="file" style="display: none;"
                                                                    multiple>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <div class="p-2 border">
                                                        <div class="upload-images d-flex">
                                                            <div>
                                                                <img src="{{asset('assets/images/media/0-6.jpg')}}" alt="img"
                                                                    class="w73 h73 border p-0">
                                                            </div>
                                                            <div class="ml-3 mt-2">
                                                                <h6 class="mb-0 mt-3 font-weight-bold">img_01</h6>
                                                                <small>4.5kb</small>
                                                            </div>
                                                            <div class="float-right ml-auto">
                                                                <a href="#"
                                                                    class="float-right btn btn-icon btn-danger btn-sm mt-5"><i
                                                                        class="fa fa-trash-o"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-content" id="bloodbank">
                                                    <div class="form-group">
                                                        <label class="form-label text-dark">Name</label>
                                                        <input type="text" class="form-control  required"
                                                            placeholder="Enter Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label text-dark">Set Timings</label>
                                                        <select class="form-control custom-select nice-select  required">
                                                            <option selected="selected"> 9Am - 5Pm </option>
                                                            <option>8Am - 4Pm</option>
                                                            <option>10Am - 6Pm</option>
                                                            <option>10Am - 7Pm</option>
                                                            <option>9Am - 10Pm</option>
                                                            <option>11Am - 9Pm</option>
                                                            <option>Other</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label text-dark">Set Days</label>
                                                        <select class="form-control custom-select nice-select  required">
                                                            <option selected="selected"> Mon - Fri </option>
                                                            <option> Mon- Sat </option>
                                                            <option> Mon- Sun </option>
                                                            <option> Mon, Tues, Wed</option>
                                                            <option>Thurs, Fri, Sat</option>
                                                            <option> Tues, Fri, Sun</option>
                                                            <option> Other </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label text-dark">Phone Number</label>
                                                        <input type="number" class="form-control  required"
                                                            placeholder="Enter Number">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label text-dark">Address</label>
                                                        <textarea class="form-control  required" name="example-textarea-input" rows="3" placeholder="text here.."></textarea>
                                                    </div>
                                                    <div class="input-group file-browser">
                                                        <input type="text"
                                                            class="form-control border-right-0 browse-file"
                                                            placeholder="Upload Images" readonly>
                                                        <label class="input-group-btn">
                                                            <span class="btn btn-primary">
                                                                Browse <input type="file" style="display: none;"
                                                                    multiple>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <div class="p-2 border">
                                                        <div class="upload-images d-flex">
                                                            <div>
                                                                <img src="{{asset('assets/images/media/0-3.jpg')}}" alt="img"
                                                                    class="w73 h73 border p-0">
                                                            </div>
                                                            <div class="ml-3 mt-2">
                                                                <h6 class="mb-0 mt-3 font-weight-bold">img_01</h6>
                                                                <small>4.5kb</small>
                                                            </div>
                                                            <div class="float-right ml-auto">
                                                                <a href="#"
                                                                    class="float-right btn btn-icon btn-danger btn-sm mt-5"><i
                                                                        class="fa fa-trash-o"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="third">
                                            <div class="panel panel-primary">
                                                <div class=" tab-menu-heading border-0 pl-0 pr-0 pt-0">
                                                    <div class="tabs-menu1 ">
                                                        <!-- Tabs -->
                                                        <ul class="nav panel-tabs">
                                                            <li><a href="#tab5" class="active"
                                                                    data-toggle="tab">Credit/ Debit Card</a></li>
                                                            <li><a href="#tab6" data-toggle="tab">Paypal</a></li>
                                                            <li><a href="#tab7" data-toggle="tab">Net Banking</a></li>
                                                            <li><a href="#tab8" data-toggle="tab">Gift Voucher</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="panel-body tabs-menu-body pl-0 pr-0 border-0">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active " id="tab5">
                                                            <div class="form-group">
                                                                <label class="form-label">CardHolder Name</label>
                                                                <input type="text" class="form-control" id="name1"
                                                                    placeholder="First Name">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label">Card number</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Search for...">
                                                                    <span class="input-group-append">
                                                                        <button class="btn btn-info" type="button"><i
                                                                                class="fa fa-cc-visa"></i> &nbsp; <i
                                                                                class="fa fa-cc-amex"></i> &nbsp;
                                                                            <i class="fa fa-cc-mastercard"></i></button>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-8">
                                                                    <div class="form-group mb-sm-0">
                                                                        <label class="form-label">Expiration</label>
                                                                        <div class="input-group">
                                                                            <input type="number" class="form-control"
                                                                                placeholder="MM" name="expiremonth">
                                                                            <input type="number" class="form-control"
                                                                                placeholder="YY" name="expireyear">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4 ">
                                                                    <div class="form-group mb-0">
                                                                        <label class="form-label">CVV <i
                                                                                class="fa fa-question-circle"
                                                                                data-toggle="tooltip" data-placement="top"
                                                                                title="Please Enter last 3 digits"></i></label>
                                                                        <input type="number" class="form-control"
                                                                            required="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane " id="tab6">
                                                            <h6 class="font-weight-semibold">Paypal is easiest way to pay
                                                                online</h6>
                                                            <p><a href="#" class="btn btn-info"><i
                                                                        class="fa fa-paypal"></i> Log in my Paypal</a></p>
                                                            <p class="mb-0"><strong>Note:</strong> Duis aute irure
                                                                reprehenderit quia voluptas sit aspernatur aut odit aut
                                                                fugit, sed quia consequuntur magni dolores eos qui ratione
                                                                voluptatem sequi nesciunt. </p>
                                                        </div>
                                                        <div class="tab-pane " id="tab7">
                                                            <div class="control-group form-group">
                                                                <div class="form-group">
                                                                    <label class="form-label text-dark">All Banks</label>
                                                                    <select class="form-control select2">
                                                                        <option value="0">Select Bank</option>
                                                                        <option value="1">Credit Agricole Group
                                                                        </option>
                                                                        <option value="2">Bank of America</option>
                                                                        <option value="3">Mitsubishi UFJ Financial
                                                                            Group</option>
                                                                        <option value="4">BNP Paribas</option>
                                                                        <option value="5">JPMorgan Chase & Co.
                                                                        </option>
                                                                        <option value="6">HSBC Holdings</option>
                                                                        <option value="7">Bank of China</option>
                                                                        <option value="8">Agricultural Bank of China
                                                                        </option>
                                                                        <option value="9">ChinaFlats Bank Corp.
                                                                        </option>
                                                                        <option value="10">Industrial & Commercial Bank
                                                                            of China, or ICBC</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <p><a href="#" class="btn btn-info">Log in Bank</a></p>
                                                        </div>
                                                        <div class="tab-pane " id="tab8">
                                                            <div class="form-group">
                                                                <label class="form-label">Gift Voucher</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Enter Your Gv Number">
                                                                    <span class="input-group-append">
                                                                        <button class="btn btn-info" type="button">
                                                                            Apply</button>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row clearfix">
                                                <div class="col-lg-12">
                                                    <div class="checkbox checkbox-info">
                                                        <label class="custom-control mt-4 custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" />
                                                            <span class="custom-control-label text-dark pl-2">I agree with
                                                                the Terms and Conditions.</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="list-inline wizard mb-0 mt-4">
                                            <li class="previous list-inline-item"><a href="#"
                                                    class="btn btn-secondary mb-0 waves-effect waves-light">Previous</a>
                                            </li>
                                            <li class="next list-inline-item float-right"><a href="#"
                                                    class="btn btn-primary  mb-0 mr-2 waves-effect waves-light">Continue</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Terms And Conditions</h3>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled widget-spec vertical-scroll mb-0">
                                <li>
                                    <i class="fa fa-check text-success" aria-hidden="true"></i>Money Not Refundable
                                </li>
                                <li>
                                    <i class="fa fa-check text-success" aria-hidden="true"></i>You can renew your Premium
                                    ad after experted.
                                </li>
                                <li>
                                    <i class="fa fa-check text-success" aria-hidden="true"></i>Premium ads are active for
                                    depend on package.
                                </li>
                                <li>
                                    <i class="fa fa-check text-success" aria-hidden="true"></i>Money Not Refundable
                                </li>
                                <li>
                                    <i class="fa fa-check text-success" aria-hidden="true"></i>You can renew your Premium
                                    ad after experted.
                                </li>
                                <li>
                                    <i class="fa fa-check text-success" aria-hidden="true"></i>Premium ads are active for
                                    depend on package.
                                </li>
                                <li>
                                    <i class="fa fa-check text-success" aria-hidden="true"></i>Money Not Refundable
                                </li>
                                <li>
                                    <i class="fa fa-check text-success" aria-hidden="true"></i>You can renew your Premium
                                    ad after experted.
                                </li>
                                <li>
                                    <i class="fa fa-check text-success" aria-hidden="true"></i>Premium ads are active for
                                    depend on package.
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card mb-0">
                        <div class="card-header">
                            <h3 class="card-title">Benefits Of Premium Ad</h3>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled widget-spec  mb-0">
                                <li>
                                    <i class="fa fa-check text-success" aria-hidden="true"></i>Premium Ads Active
                                </li>
                                <li>
                                    <i class="fa fa-check text-success" aria-hidden="true"></i>Premium ads are displayed
                                    on top
                                </li>
                                <li>
                                    <i class="fa fa-check text-success" aria-hidden="true"></i>Premium ads will be Show in
                                    Google results
                                </li>
                                <li class="ml-5 mb-0">
                                    <a href="tips.html"> View more..</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> <!-- end row -->
        </div>
    </section>
@endsection
@section('js')
    <script src="{{asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
    <script src="{{asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-wizard/jquery.bootstrap.wizard.js')}}"></script>
    <script src="{{ asset('assets/plugins/jquery-validation/dist/jquery.validate.min.js')}}"></script>
@endsection
