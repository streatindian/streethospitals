@extends('layouts.provider.default')
@section('head')
    <link href="{{ asset('assets/plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.css" />
    <style>
        .categoryTab {
            border-radius: 5px;
            color: black;
            box-shadow: 0px 0px 5px -2px grey;
        }

        .categoryTab:hover {
            box-shadow: 0px 0px 18px -2px grey;
        }

        .tag {
            margin-bottom: 0px !important;
        }

        .bootstrap-tagsinput {

            display: block;
            width: 100%;
            padding: .375rem .75rem;
            font-size: .9375rem;
            line-height: 1.6;
            color: #29334c;
            height: 41px;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #e4e6f1;
            border-radius: 2px;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;

        }
    </style>
    <link href="{{ asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="app-content  my-3 my-md-5">
        <div class="side-app">
            <div class="page-header">
                <h1 class="page-title"><img src="{{ asset('uploads/category/' . $category->thumbnail) }}" height="25"
                        width="25"> {{ $category->name }}</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Listing</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Form</li>
                </ol>
            </div>

            <div class="row ">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row item-all-cat">
                                @foreach ($category_list as $c)
                                    <div class="col-xl-3 col-md-6">
                                        <a href="{{ url('provider/listing/form?category=' . encrypt($c->id)) }}">
                                            <div class="item-all-card text-center categoryTab"
                                                style="{{ $category->id == $c->id ? 'border: 4px solid blue;' : '' }}">
                                                <div class="iteam-all-icon">
                                                    <img src="{{ asset('uploads/category/' . $c->thumbnail) }}"
                                                        alt="{{ $c->name }}" class="w-30">
                                                </div>
                                                <div class="item-all-text mt-3">
                                                    {{-- <p>Total Emails</p> --}}
                                                    <h5 class="mb-0 text-dark">{{ $c->name }}</h5>
                                                </div>
                                            </div>
                                        </a>

                                    </div>
                                @endforeach

                            </div>
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="post-content {{ strtolower($category->name) == 'hospitals' || strtolower($category->name) == 'hospital' ? 'active' : '' }}"
                                        id="hopitals">
                                        @if ($errors->any())
                                            {{ implode('', $errors->all('<div>:message</div>')) }}
                                        @endif
                                        <form action="{{ route('provider.listing.save') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="type" value="hospital">
                                            <input type="hidden" name="category_id" value="{{ $category->id }}">
                                            <input type="hidden" name="id"
                                                value="{{ $listing ? $listing->id : '' }}">
                                            <div class="form-group">
                                                <label class="form-label text-dark">Name of Hospital</label>
                                                <input type="text"
                                                    class="form-control  required @error('name') is-invalid @enderror"
                                                    name="name" placeholder="Enter Name"
                                                    value="{{ $listing ? $listing->name : old('name') }}">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label text-dark">Establishment Year</label>
                                                <select name="year"
                                                    class="form-control custom-select select2 @error('year') is-invalid @enderror">
                                                    <option value="">Year</option>
                                                    @for ($i = 1897; $i < date('Y'); $i++)
                                                        <option value="{{ $i }}"
                                                            {{ $i == old('year') || @$listing->year == $i ? 'selected' : '' }}>
                                                            {{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                                @error('year')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label text-dark">Management Type</label>
                                                <select name="management"
                                                    class="form-control custom-select select2 @error('management') is-invalid @enderror">
                                                    <option value="">Select</option>
                                                    <option value="government"
                                                        {{ old('management') == 'government' || @$listing->management == 'government' ? 'selected' : '' }}>
                                                        Government</option>
                                                    <option value="private"
                                                        {{ old('management') == 'private' || @$listing->management == 'private' ? 'selected' : '' }}>
                                                        Private</option>
                                                    <option value="trust"
                                                        {{ old('management') == 'trust' || @$listing->management == 'trust' ? 'selected' : '' }}>
                                                        Trust</option>
                                                </select>
                                                @error('management')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label text-dark">Service</label>
                                                <select name="service" multiple
                                                    class="form-control custom-select select2 @error('service') is-invalid @enderror">
                                                    @foreach ($service as $s)
                                                        <option value="{{ $s->id }}"
                                                            {{ $s->id == @$listing->service || $s->id == old('service') ? 'selected' : '' }}>
                                                            {{ $s->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('service')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label text-dark">Address</label>
                                                <textarea class="form-control  required @error('address') is-invalid @enderror" name="address" rows="3"
                                                    placeholder="address..">{{ $listing ? $listing->address : old('address') }}</textarea>
                                                @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group ">
                                                <label class="form-label text-dark">Country
                                                </label>
                                                <select class="form-control country  @error('country') is-invalid @enderror"
                                                    name="country">
                                                    <option value="">Select Country</option>
                                                    @foreach ($country as $c)
                                                        <option value="{{ $c->id }}"
                                                            {{ $c->id == @$listing->country || $c->id == old('country') ? 'selected' : '' }}>
                                                            {{ $c->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('country')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group ">
                                                <label class="form-label text-dark">State
                                                </label>
                                                <select class="form-control state @error('state') is-invalid @enderror"
                                                    name="state">
                                                    <option value="">Select State</option>
                                                </select>
                                                @error('state')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group ">
                                                <label class="form-label text-dark">City
                                                </label>
                                                <select class="form-control city  @error('city') is-invalid @enderror"
                                                    name="city">
                                                    <option value="">Select City</option>
                                                </select>
                                                @error('city')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label text-dark">Phone Number</label>
                                                <input type="number"
                                                    class="form-control  required @error('phone') is-invalid @enderror"
                                                    name="phone" placeholder="Enter Phone Number"
                                                    value="{{ $listing ? $listing->phone : old('phone') }}">
                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label text-dark">Phone Number 2</label>
                                                <input type="number"
                                                    class="form-control  required @error('phone2') is-invalid @enderror"
                                                    name="phone2" placeholder="Enter Phone Number 2"
                                                    value="{{ $listing ? $listing->phone2 : old('phone2') }}">
                                                @error('phone2')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label text-dark">Email Address </label>
                                                <input type="email"
                                                    class="form-control  required @error('email') is-invalid @enderror"
                                                    name="email" placeholder="Enter Email"
                                                    value="{{ $listing ? $listing->email : old('email') }}">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label text-dark">Email Address 2</label>
                                                <input type="email"
                                                    class="form-control  required @error('email2') is-invalid @enderror"
                                                    name="email2" placeholder="Enter Email 2"
                                                    value="{{ $listing ? $listing->email2 : old('email2') }}">
                                                @error('email2')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label text-dark">Web Site</label>
                                                <input type="text"
                                                    class="form-control  required @error('website') is-invalid @enderror"
                                                    name="website" placeholder="Enter Website"
                                                    value="{{ $listing ? $listing->website : old('website') }}">
                                                @error('website')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label text-dark">Name of Director</label>
                                                <input type="text"
                                                    class="form-control  required @error('director_name') is-invalid @enderror"
                                                    name="director_name" placeholder="Enter Director Name"
                                                    value="{{ $listing ? $listing->director_name : old('director_name') }}">
                                                @error('director_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label text-dark">Director Phone Number</label>
                                                <input type="text"
                                                    class="form-control  required @error('director_phone') is-invalid @enderror"
                                                    name="director_phone" placeholder="Enter Director Phone"
                                                    value="{{ $listing ? $listing->director_phone : old('director_phone') }}">
                                                @error('director_phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>


                                            <div class="form-group">
                                                <label class="form-label text-dark">Name of Manager</label>
                                                <input type="text"
                                                    class="form-control  required @error('manager_name') is-invalid @enderror"
                                                    name="manager_name" placeholder="Enter Manager Name"
                                                    value="{{ $listing ? $listing->manager_name : old('manager_name') }}">
                                                @error('manager_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label text-dark">Manager Phone Number </label>
                                                <input type="text"
                                                    class="form-control  required @error('manager_phone') is-invalid @enderror"
                                                    name="manager_phone" placeholder="Enter Manager Phone"
                                                    value="{{ $listing ? $listing->manager_phone : old('manager_phone') }}">
                                                @error('manager_phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label text-dark">OT Service</label>
                                                <input name="ot_service" type="radio"
                                                    {{ $listing ? ($listing->ot_service == 'major_minor' || old('ot_service') == 'major_minor' ? 'selected' : '') : '' }}
                                                    value="major_minor" @checked(true)>Major &amp; Minor
                                                OT&nbsp;&nbsp;
                                                <input name="ot_service" type="radio" value="minor"
                                                    {{ $listing ? ($listing->ot_service == 'minor' || old('ot_service') == 'minor' ? 'selected' : '') : '' }}>Minor
                                                OT&nbsp;&nbsp; <input name="ot_service" type="radio" value=""
                                                    {{ $listing ? ($listing->ot_service == 'major' || old('ot_service') == 'major' ? 'selected' : '') : '' }}>Not
                                                Available
                                                @error('ot_service')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label text-dark">Intensive Care Services</label>
                                                <div class="custom-controls-stacked d-flex">
                                                    @foreach (['icu', 'iccu', 'nicu', 'picu', 'micu', 'sicu', 'n/a'] as $ics)
                                                        <label class="custom-control custom-checkbox">
                                                            @php
                                                                $intensiveCareService = old('intensive_care_services') ? old('intensive_care_services') : explode(',', @$listing->intensive_care_services);
                                                            @endphp
                                                            <input type="checkbox" class="custom-control-input"
                                                                name="intensive_care_services[{{ $ics }}]"
                                                                value="{{ $ics }}" @checked(in_array($ics, $intensiveCareService))>
                                                            <span class="custom-control-label">{{ ucwords($ics) }}</span>
                                                        </label>&nbsp;
                                                    @endforeach
                                                </div>

                                                @error('intensive_care_services')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label text-dark">Ambulance Service:</label>
                                                <div class="custom-controls-stacked d-flex">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                            name="ambulance" value="1"
                                                            {{ @$listing->ambulance == 1 ? 'checked' : '' }} />
                                                        <span class="custom-control-label">Available</span>
                                                    </label>&nbsp;&nbsp;
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                            name="ambulance" value="0"
                                                            {{ @$listing->ambulance == 0 ? 'checked' : '' }}>
                                                        <span class="custom-control-label">Not Available</span>
                                                    </label>
                                                </div>
                                                @error('ambulance')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label text-dark">Pathology Services</label>
                                                <div class="custom-controls-stacked d-flex">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                            name="pathology" value="1"
                                                            {{ @$listing->pathology == 1 ? 'checked' : '' }}>
                                                        <span class="custom-control-label">Available</span>
                                                    </label>&nbsp;&nbsp;
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                            name="pathology" value="0"
                                                            {{ @$listing->pathology == 0 ? 'checked' : '' }}>
                                                        <span class="custom-control-label">Not Available</span>
                                                    </label>
                                                </div>
                                                @error('pathology')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label text-dark">Radiodiagnosis Services</label>
                                                <div class="custom-controls-stacked d-flex">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                            name="is_radiodiagnosis" value="1"
                                                            {{ @$listing->is_radiodiagnosis == 1 ? 'checked' : '' }}>
                                                        <span class="custom-control-label">Available</span>
                                                    </label>&nbsp;&nbsp;
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                            name="is_radiodiagnosis" value="0"
                                                            {{ @$listing->is_radiodiagnosis == 0 ? 'checked' : '' }}>
                                                        <span class="custom-control-label">Not Available</span>
                                                    </label>
                                                </div>
                                                @error('is_radiodiagnosis')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label text-dark">Radiodiagnosis Services</label>
                                                <div class="custom-controls-stacked d-flex">
                                                    @php
                                                        $radiodiagnosis = old('radiodiagnosis') ? old('radiodiagnosis') : explode(',', @$listing->radiodiagnosis);
                                                    @endphp
                                                    @foreach (['xray' => 'X-ray', 'usg' => 'USG', 'ct_scan' => 'CT Scan', 'mri' => 'MRI', 'color_doppler' => 'Color Doppler', 'n/a' => 'N/A'] as $ics => $icsValue)
                                                        <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                name="radiodiagnosis[{{ $ics }}]"
                                                                value="{{ $ics }}" @checked(in_array($ics, $radiodiagnosis))>
                                                            <span class="custom-control-label">{{ $icsValue }}</span>
                                                        </label>&nbsp;
                                                    @endforeach
                                                </div>

                                                @error('radiodiagnosis')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label text-dark">Write more about hospital</label>
                                                <textarea class="form-control @error('about') is-invalid @enderror" name="about">{{ old('about') ? old('about') : @$listing->about }}</textarea>
                                                @error('about')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label text-dark">Set Timings</label>
                                                <select
                                                    class="form-control custom-select nice-select  required @error('timing') is-invalid @enderror"
                                                    name="timing">
                                                    @foreach (['9Am - 5Pm', '8Am - 4Pm', '10Am - 6Pm', '10Am - 7Pm', '9Am - 10Pm', '11Am - 9Pm', 'Other'] as $key => $time)
                                                        <option {{ $key == 0 ? 'selected' : '' }}>{{ $time }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('timing')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label text-dark">Set Days</label>
                                                <select
                                                    class="form-control custom-select nice-select  required @error('days') is-invalid @enderror"
                                                    name="days">
                                                    <option selected="selected"> Mon - Fri </option>
                                                    <option> Mon- Sat </option>
                                                    <option> Mon- Sun </option>
                                                    <option> Mon, Tues, Wed</option>
                                                    <option>Thurs, Fri, Sat</option>
                                                    <option> Tues, Fri, Sun</option>
                                                    <option> Other </option>
                                                </select>
                                                @error('days')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="input-group file-browser">
                                                <label class="form-label text-dark">Profile Image</label>
                                                <input type="file"
                                                    class="dropify   @error('profile_pic') is-invalid @enderror"
                                                    data-height="180" name="profile_pic" />
                                                @error('profile_pic')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                @if ($listing)
                                                    <img src="{{ asset('uploads/listing/' . $listing->profile_pic) }}"
                                                        height="180" width="180" class="mt-4">
                                                @endif
                                            </div>
                                            <div class="input-group mt-4">
                                                <button class="btn btn-primary" type="submit">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="post-content {{ strtolower($category->name) == 'doctors' || strtolower($category->name) == 'doctor' ? 'active' : '' }}"
                                        id="doctors">
                                        {{-- Doctor --}}
                                        @if ($errors->any())
                                            {{ implode('', $errors->all('<div>:message</div>')) }}
                                        @endif
                                        <form action="{{ route('provider.listing.save') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="type" value="doctor">
                                            <input type="hidden" name="category_id" value="{{ $category->id }}">
                                            <input type="hidden" name="id"
                                                value="{{ $listing ? $listing->id : '' }}">
                                            <div class="form-group">
                                                <label class="form-label text-dark">Name</label>
                                                <input type="text"
                                                    class="form-control  required @error('name') is-invalid @enderror"
                                                    name="name" placeholder="Enter Name"
                                                    value="{{ $listing ? $listing->name : old('name') }}">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label text-dark">Gender</label>
                                                <select name="gender"
                                                    class="form-control custom-select select2 @error('gender') is-invalid @enderror">
                                                    <option value="">Select Gender</option>
                                                    <option value="male"
                                                        {{ old('gender') == 'male' || @$listing->gender == 'male' ? 'selected' : '' }}>
                                                        Male</option>
                                                    <option value="private"
                                                        {{ old('gender') == 'female' || @$listing->gender == 'female' ? 'selected' : '' }}>
                                                        Female</option>
                                                </select>
                                                @error('management')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label text-dark">Degree</label>
                                                <input type="text"
                                                    class="form-control  required @error('degree') is-invalid @enderror"
                                                    name="degree" placeholder="Add Degree"
                                                    value="{{ $listing ? $listing->degree : old('degree') }}">
                                                @error('degree')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label text-dark">Area of Specialization</label>
                                                <input type="text"
                                                    class="form-control  required @error('specialization') is-invalid @enderror"
                                                    name="specialization" placeholder="Add Specialization"
                                                    value="{{ $listing ? $listing->specialization : old('specialization') }}">
                                                @error('specialization')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label text-dark">Practicing Since</label>
                                                <select name="year"
                                                    class="form-control custom-select select2 @error('year') is-invalid @enderror">
                                                    <option value="">Year</option>
                                                    @for ($i = 1897; $i < date('Y'); $i++)
                                                        <option value="{{ $i }}"
                                                            {{ $i == old('year') || @$listing->year == $i ? 'selected' : '' }}>
                                                            {{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                                @error('year')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label text-dark">Name of State Medical Council</label>
                                                <input type="text"
                                                    class="form-control  required @error('state_medical_council') is-invalid @enderror"
                                                    name="state_medical_council"
                                                    placeholder="Name of State Medical Council"
                                                    value="{{ $listing ? $listing->state_medical_council : old('state_medical_council') }}">
                                                @error('state_medical_council')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label text-dark">Registration Number</label>
                                                <input type="text"
                                                    class="form-control  required @error('registration_number') is-invalid @enderror"
                                                    name="registration_number" placeholder="Registration Number"
                                                    value="{{ $listing ? $listing->registration_number : old('registration_number') }}">
                                                @error('registration_number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label text-dark">Area of Specialization</label>
                                                <input type="text"
                                                    class="form-control  required @error('specialization') is-invalid @enderror"
                                                    name="specialization" placeholder="Add Specialization"
                                                    value="{{ $listing ? $listing->specialization : old('specialization') }}">
                                                @error('specialization')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="form-label text-dark">Date of Birth</label>
                                                        <select name="birth_date"
                                                            class="custom-select select2 @error('birth_date') is-invalid @enderror">
                                                            <option value="">Day</option>
                                                            @for ($i = 1; $i <= 31; $i++)
                                                                <option value="{{ $i }}"
                                                                    {{ $i == old('birth_date') || @$listing->birth_date == $i ? 'selected' : '' }}>
                                                                    {{ $i }}
                                                                </option>
                                                            @endfor
                                                        </select>
                                                        @error('birth_date')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="form-label text-dark">&nbsp;</label>
                                                        <select name="birth_month"
                                                            class="custom-select select2 @error('birth_month') is-invalid @enderror">
                                                            <option value="" selected="selected">Month</option>
                                                            <option value="1">January</option>
                                                            <option value="2">February</option>
                                                            <option value="3">March</option>
                                                            <option value="4">April</option>
                                                            <option value="5">May</option>
                                                            <option value="6">June</option>
                                                            <option value="7">July</option>
                                                            <option value="8">August</option>
                                                            <option value="9">September</option>
                                                            <option value="10">October</option>
                                                            <option value="11">November</option>
                                                            <option value="12">December</option>
                                                        </select>
                                                        @error('birth_month')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="form-label text-dark">&nbsp;</label>
                                                        <select name="birth_year"
                                                            class="custom-select select2 @error('birth_year') is-invalid @enderror">
                                                            <option value="">Year</option>
                                                            @for ($i = date('Y') - 100; $i < date('Y'); $i++)
                                                                <option value="{{ $i }}"
                                                                    {{ $i == old('birth_year') || @$listing->birth_year == $i || date('Y') - 30 == $i ? 'selected' : '' }}>
                                                                    {{ $i }}
                                                                </option>
                                                            @endfor
                                                        </select>
                                                        @error('birth_year')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-group ">
                                                <label class="form-label text-dark">Blood Group
                                                </label>
                                                <select
                                                    class="form-control blood_group  select2 @error('blood_group') is-invalid @enderror"
                                                    name="blood_group">
                                                    <option value="">Select Blood Group</option>
                                                    <option value="" selected="">Select</option>
                                                    <option value="A+">A+</option>
                                                    <option value="A-">A-</option>
                                                    <option value="AB+">AB+</option>
                                                    <option value="AB-">AB-</option>
                                                    <option value="B+">B+</option>
                                                    <option value="B-">B-</option>
                                                    <option value="O+">O+</option>
                                                    <option value="O-">O-</option>

                                                </select>
                                                @error('blood_group')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label text-dark">Clinic / Hospital Name:</label>
                                                <input type="text"
                                                    class="form-control  required @error('clinic_hospital_name') is-invalid @enderror"
                                                    name="clinic_hospital_name" placeholder="Clinic / Hospital Name"
                                                    value="{{ $listing ? $listing->clinic_hospital_name : old('clinic_hospital_name') }}">
                                                @error('clinic_hospital_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label text-dark">Address</label>
                                                <textarea class="form-control  required @error('address') is-invalid @enderror" name="address" rows="3"
                                                    placeholder="address..">{{ $listing ? $listing->address : old('address') }}</textarea>
                                                @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group ">
                                                <label class="form-label text-dark">Country
                                                </label>
                                                <select
                                                    class="form-control country  @error('country') is-invalid @enderror"
                                                    name="country">
                                                    <option value="">Select Country</option>
                                                    @foreach ($country as $c)
                                                        <option value="{{ $c->id }}"
                                                            {{ $c->id == @$listing->country || $c->id == old('country') ? 'selected' : '' }}>
                                                            {{ $c->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('country')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group ">
                                                <label class="form-label text-dark">State
                                                </label>
                                                <select class="form-control state @error('state') is-invalid @enderror"
                                                    name="state">
                                                    <option value="">Select State</option>
                                                </select>
                                                @error('state')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group ">
                                                <label class="form-label text-dark">City
                                                </label>
                                                <select class="form-control  city @error('city') is-invalid @enderror"
                                                    name="city">
                                                    <option value="">Select City</option>
                                                </select>
                                                @error('city')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label text-dark">Phone Number</label>
                                                <input type="number"
                                                    class="form-control  required @error('phone') is-invalid @enderror"
                                                    name="phone" placeholder="Enter Phone Number"
                                                    value="{{ $listing ? $listing->phone : old('phone') }}">
                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label text-dark">Phone Number 2</label>
                                                <input type="number"
                                                    class="form-control  required @error('phone2') is-invalid @enderror"
                                                    name="phone2" placeholder="Enter Phone Number 2"
                                                    value="{{ $listing ? $listing->phone2 : old('phone2') }}">
                                                @error('phone2')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label text-dark">Email Address </label>
                                                <input type="email"
                                                    class="form-control  required @error('email') is-invalid @enderror"
                                                    name="email" placeholder="Enter Email"
                                                    value="{{ $listing ? $listing->email : old('email') }}">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label text-dark">Email Address 2</label>
                                                <input type="email"
                                                    class="form-control  required @error('email2') is-invalid @enderror"
                                                    name="email2" placeholder="Enter Email 2"
                                                    value="{{ $listing ? $listing->email2 : old('email2') }}">
                                                @error('email2')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label text-dark">Education Detail</label>
                                                <div class="row mb-2" id="educationRow">
                                                    <div class="col-md-3">
                                                        {{-- <label class="form-label text-dark">Education Detail</label> --}}
                                                       <input name="course[]" value="" class="form-control" placeholder="Course Name">
                                                        @error('course[0]')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-3">
                                                        {{-- <label class="form-label text-dark">&nbsp;</label> --}}
                                                       <input name="passout_year[]" value="" class="form-control" placeholder="Passout Year">
                                                        @error('course[0]')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-3">
                                                        {{-- <label class="form-label text-dark">&nbsp;</label> --}}
                                                       <input name="college[]" value="" class="form-control" placeholder="College Name">
                                                        @error('college[0]')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-3">
                                                        {{-- <label class="form-label text-dark">&nbsp;</label> --}}
                                                        <button id="addEducation" type="button" class="btn btn-outline-primary btn-pill"><i class="fa fa-plus"></i></button>
                                                    </div>
                                                </div>
                                                <div id="educationAppendSection"></div>

                                            </div>

                                            <div class="form-group">
                                                <label class="form-label text-dark">Please write few words about
                                                    yourself</label>
                                                <textarea class="form-control @error('about') is-invalid @enderror" name="about">{{ old('about') ? old('about') : @$listing->about }}</textarea>
                                                @error('about')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>


                                            <div class="form-group">
                                                <label class="form-label text-dark">Please write few words about
                                                    yourself</label>
                                                <textarea class="form-control @error('about') is-invalid @enderror" name="about">{{ old('about') ? old('about') : @$listing->about }}</textarea>
                                                @error('about')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>



                                            <div class="input-group file-browser">
                                                <label class="form-label text-dark">Profile Image</label>
                                                <input type="file"
                                                    class="dropify   @error('profile_pic') is-invalid @enderror"
                                                    data-height="180" name="profile_pic" />
                                                @error('profile_pic')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                @if ($listing)
                                                    <img src="{{ asset('uploads/listing/' . $listing->profile_pic) }}"
                                                        height="180" width="180" class="mt-4">
                                                @endif
                                            </div>
                                            <div class="input-group mt-4">
                                                <button class="btn btn-primary" type="submit">Submit</button>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="post-content {{ strtolower($category->name) == 'fitness' ? 'active' : '' }}"
                                        id="fitness">
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
                                            <input type="text" class="form-control border-right-0 browse-file"
                                                placeholder="Upload Images" readonly>
                                            <label class="input-group-btn">
                                                <span class="btn btn-primary">
                                                    Browse <input type="file" style="display: none;" multiple>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="p-2 border">
                                            <div class="upload-images d-flex">
                                                <div>
                                                    <img src="{{ asset('assets/images/media/0-11.jpg') }}"
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
                                    <div class="post-content  {{ strtolower($category->name) == 'pharmacy' ? 'active' : '' }}"
                                        id="pharmacy">
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
                                                <label class="form-label text-dark">Profile Image</label>
                                                <input type="file" class="dropify" data-height="180" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post-content  {{ strtolower($category->name) == 'massage parlours' || strtolower($category->name) == 'massage parlour' ? 'active' : '' }}"
                                        id="pharmacy">
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
                                                <label class="form-label text-dark">Profile Image</label>
                                                <input type="file" class="dropify" data-height="180" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post-content {{ strtolower($category->name) == 'clinic' || strtolower($category->name) == 'clinics' ? 'active' : '' }}"
                                        id="clinic">
                                        @if ($errors->any())
                                            {{ implode('', $errors->all('<div>:message</div>')) }}
                                        @endif
                                        <form action="{{ route('provider.listing.save') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="type" value="clinic">
                                            <input type="hidden" name="category_id" value="{{ $category->id }}">
                                            <input type="hidden" name="id"
                                                value="{{ $listing ? $listing->id : '' }}">
                                            <div class="form-group">
                                                <label class="form-label text-dark">Name of Hospital</label>
                                                <input type="text"
                                                    class="form-control  required @error('name') is-invalid @enderror"
                                                    name="name" placeholder="Enter Name"
                                                    value="{{ $listing ? $listing->name : old('name') }}">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label text-dark">Establishment Year</label>
                                                <select name="year"
                                                    class="form-control custom-select select2 @error('year') is-invalid @enderror">
                                                    <option value="">Year</option>
                                                    @for ($i = 1897; $i < date('Y'); $i++)
                                                        <option value="{{ $i }}"
                                                            {{ $i == old('year') || @$listing->year == $i ? 'selected' : '' }}>
                                                            {{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                                @error('year')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label text-dark">Management Type</label>
                                                <select name="management"
                                                    class="form-control custom-select select2 @error('management') is-invalid @enderror">
                                                    <option value="">Select</option>
                                                    <option value="government"
                                                        {{ old('management') == 'government' || @$listing->management == 'government' ? 'selected' : '' }}>
                                                        Government</option>
                                                    <option value="private"
                                                        {{ old('management') == 'private' || @$listing->management == 'private' ? 'selected' : '' }}>
                                                        Private</option>
                                                    <option value="trust"
                                                        {{ old('management') == 'trust' || @$listing->management == 'trust' ? 'selected' : '' }}>
                                                        Trust</option>
                                                </select>
                                                @error('management')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label text-dark">Service</label>
                                                <select name="service" multiple
                                                    class="form-control custom-select select2 @error('service') is-invalid @enderror">
                                                    @foreach ($service as $s)
                                                        <option value="{{ $s->id }}"
                                                            {{ $s->id == @$listing->service || $s->id == old('service') ? 'selected' : '' }}>
                                                            {{ $s->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('service')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label text-dark">Address</label>
                                                <textarea class="form-control  required @error('address') is-invalid @enderror" name="address" rows="3"
                                                    placeholder="address..">{{ $listing ? $listing->address : old('address') }}</textarea>
                                                @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group ">
                                                <label class="form-label text-dark">Country
                                                </label>
                                                <select
                                                    class="form-control country  @error('country') is-invalid @enderror"
                                                    name="country">
                                                    <option value="">Select Country</option>
                                                    @foreach ($country as $c)
                                                        <option value="{{ $c->id }}"
                                                            {{ $c->id == @$listing->country || $c->id == old('country') ? 'selected' : '' }}>
                                                            {{ $c->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('country')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group ">
                                                <label class="form-label text-dark">State
                                                </label>
                                                <select class="form-control state @error('state') is-invalid @enderror"
                                                    name="state">
                                                    <option value="">Select State</option>
                                                </select>
                                                @error('state')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group ">
                                                <label class="form-label text-dark">City
                                                </label>
                                                <select class="form-control  city @error('city') is-invalid @enderror"
                                                    name="city">
                                                    <option value="">Select City</option>
                                                </select>
                                                @error('city')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label text-dark">Phone Number</label>
                                                <input type="number"
                                                    class="form-control  required @error('phone') is-invalid @enderror"
                                                    name="phone" placeholder="Enter Phone Number"
                                                    value="{{ $listing ? $listing->phone : old('phone') }}">
                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label text-dark">Phone Number 2</label>
                                                <input type="number"
                                                    class="form-control  required @error('phone2') is-invalid @enderror"
                                                    name="phone2" placeholder="Enter Phone Number 2"
                                                    value="{{ $listing ? $listing->phone2 : old('phone2') }}">
                                                @error('phone2')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label text-dark">Email Address </label>
                                                <input type="email"
                                                    class="form-control  required @error('email') is-invalid @enderror"
                                                    name="email" placeholder="Enter Email"
                                                    value="{{ $listing ? $listing->email : old('email') }}">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label text-dark">Email Address 2</label>
                                                <input type="email"
                                                    class="form-control  required @error('email2') is-invalid @enderror"
                                                    name="email2" placeholder="Enter Email 2"
                                                    value="{{ $listing ? $listing->email2 : old('email2') }}">
                                                @error('email2')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label text-dark">Web Site</label>
                                                <input type="text"
                                                    class="form-control  required @error('website') is-invalid @enderror"
                                                    name="website" placeholder="Enter Website"
                                                    value="{{ $listing ? $listing->website : old('website') }}">
                                                @error('website')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label text-dark">Name of Director</label>
                                                <input type="text"
                                                    class="form-control  required @error('director_name') is-invalid @enderror"
                                                    name="director_name" placeholder="Enter Director Name"
                                                    value="{{ $listing ? $listing->director_name : old('director_name') }}">
                                                @error('director_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label text-dark">Director Phone Number</label>
                                                <input type="text"
                                                    class="form-control  required @error('director_phone') is-invalid @enderror"
                                                    name="director_phone" placeholder="Enter Director Phone"
                                                    value="{{ $listing ? $listing->director_phone : old('director_phone') }}">
                                                @error('director_phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>


                                            <div class="form-group">
                                                <label class="form-label text-dark">Name of Manager</label>
                                                <input type="text"
                                                    class="form-control  required @error('manager_name') is-invalid @enderror"
                                                    name="manager_name" placeholder="Enter Manager Name"
                                                    value="{{ $listing ? $listing->manager_name : old('manager_name') }}">
                                                @error('manager_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label text-dark">Manager Phone Number </label>
                                                <input type="text"
                                                    class="form-control  required @error('manager_phone') is-invalid @enderror"
                                                    name="manager_phone" placeholder="Enter Manager Phone"
                                                    value="{{ $listing ? $listing->manager_phone : old('manager_phone') }}">
                                                @error('manager_phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label text-dark">OT Service</label>
                                                <input name="ot_service" type="radio"
                                                    {{ $listing ? ($listing->ot_service == 'major_minor' || old('ot_service') == 'major_minor' ? 'selected' : '') : '' }}
                                                    value="major_minor" @checked(true)>Major &amp; Minor
                                                OT&nbsp;&nbsp;
                                                <input name="ot_service" type="radio" value="minor"
                                                    {{ $listing ? ($listing->ot_service == 'minor' || old('ot_service') == 'minor' ? 'selected' : '') : '' }}>Minor
                                                OT&nbsp;&nbsp; <input name="ot_service" type="radio" value=""
                                                    {{ $listing ? ($listing->ot_service == 'major' || old('ot_service') == 'major' ? 'selected' : '') : '' }}>Not
                                                Available
                                                @error('ot_service')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label text-dark">Intensive Care Services</label>
                                                <div class="custom-controls-stacked d-flex">
                                                    @foreach (['icu', 'iccu', 'nicu', 'picu', 'micu', 'sicu', 'n/a'] as $ics)
                                                        <label class="custom-control custom-checkbox">
                                                            @php
                                                                $intensiveCareService = old('intensive_care_services') ? old('intensive_care_services') : explode(',', @$listing->intensive_care_services);
                                                            @endphp
                                                            <input type="checkbox" class="custom-control-input"
                                                                name="intensive_care_services[{{ $ics }}]"
                                                                value="{{ $ics }}" @checked(in_array($ics, $intensiveCareService))>
                                                            <span class="custom-control-label">{{ ucwords($ics) }}</span>
                                                        </label>&nbsp;
                                                    @endforeach
                                                </div>

                                                @error('intensive_care_services')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label text-dark">Ambulance Service:</label>
                                                <div class="custom-controls-stacked d-flex">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                            name="ambulance" value="1"
                                                            {{ @$listing->ambulance == 1 ? 'checked' : '' }} />
                                                        <span class="custom-control-label">Available</span>
                                                    </label>&nbsp;&nbsp;
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                            name="ambulance" value="0"
                                                            {{ @$listing->ambulance == 0 ? 'checked' : '' }}>
                                                        <span class="custom-control-label">Not Available</span>
                                                    </label>
                                                </div>
                                                @error('ambulance')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label text-dark">Pathology Services</label>
                                                <div class="custom-controls-stacked d-flex">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                            name="pathology" value="1"
                                                            {{ @$listing->pathology == 1 ? 'checked' : '' }}>
                                                        <span class="custom-control-label">Available</span>
                                                    </label>&nbsp;&nbsp;
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                            name="pathology" value="0"
                                                            {{ @$listing->pathology == 0 ? 'checked' : '' }}>
                                                        <span class="custom-control-label">Not Available</span>
                                                    </label>
                                                </div>
                                                @error('pathology')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label text-dark">Radiodiagnosis Services</label>
                                                <div class="custom-controls-stacked d-flex">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                            name="is_radiodiagnosis" value="1"
                                                            {{ @$listing->is_radiodiagnosis == 1 ? 'checked' : '' }}>
                                                        <span class="custom-control-label">Available</span>
                                                    </label>&nbsp;&nbsp;
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                            name="is_radiodiagnosis" value="0"
                                                            {{ @$listing->is_radiodiagnosis == 0 ? 'checked' : '' }}>
                                                        <span class="custom-control-label">Not Available</span>
                                                    </label>
                                                </div>
                                                @error('is_radiodiagnosis')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label text-dark">Radiodiagnosis Services</label>
                                                <div class="custom-controls-stacked d-flex">
                                                    @php
                                                        $radiodiagnosis = old('radiodiagnosis') ? old('radiodiagnosis') : explode(',', @$listing->radiodiagnosis);
                                                    @endphp
                                                    @foreach (['xray' => 'X-ray', 'usg' => 'USG', 'ct_scan' => 'CT Scan', 'mri' => 'MRI', 'color_doppler' => 'Color Doppler', 'n/a' => 'N/A'] as $ics => $icsValue)
                                                        <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                name="radiodiagnosis[{{ $ics }}]"
                                                                value="{{ $ics }}" @checked(in_array($ics, $radiodiagnosis))>
                                                            <span class="custom-control-label">{{ $icsValue }}</span>
                                                        </label>&nbsp;
                                                    @endforeach
                                                </div>

                                                @error('radiodiagnosis')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label text-dark">Write more about hospital</label>
                                                <textarea class="form-control @error('about') is-invalid @enderror" name="about">{{ old('about') ? old('about') : @$listing->about }}</textarea>
                                                @error('about')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label text-dark">Set Timings</label>
                                                <select
                                                    class="form-control custom-select nice-select  required @error('timing') is-invalid @enderror"
                                                    name="timing">
                                                    @foreach (['9Am - 5Pm', '8Am - 4Pm', '10Am - 6Pm', '10Am - 7Pm', '9Am - 10Pm', '11Am - 9Pm', 'Other'] as $key => $time)
                                                        <option {{ $key == 0 ? 'selected' : '' }}>{{ $time }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('timing')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label text-dark">Set Days</label>
                                                <select
                                                    class="form-control custom-select nice-select  required @error('days') is-invalid @enderror"
                                                    name="days">
                                                    <option selected="selected"> Mon - Fri </option>
                                                    <option> Mon- Sat </option>
                                                    <option> Mon- Sun </option>
                                                    <option> Mon, Tues, Wed</option>
                                                    <option>Thurs, Fri, Sat</option>
                                                    <option> Tues, Fri, Sun</option>
                                                    <option> Other </option>
                                                </select>
                                                @error('days')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="input-group file-browser">
                                                <label class="form-label text-dark">Profile Image</label>
                                                <input type="file"
                                                    class="dropify   @error('profile_pic') is-invalid @enderror"
                                                    data-height="180" name="profile_pic" />
                                                @error('profile_pic')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                @if ($listing)
                                                    <img src="{{ asset('uploads/listing/' . $listing->profile_pic) }}"
                                                        height="180" width="180" class="mt-4">
                                                @endif
                                            </div>
                                            <div class="input-group mt-4">
                                                <button class="btn btn-primary" type="submit">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="post-content  {{ strtolower($category->name) == 'bloodbank' ? 'active' : '' }}"
                                        id="bloodbank">
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
                                            <input type="text" class="form-control border-right-0 browse-file"
                                                placeholder="Upload Images" readonly>
                                            <label class="input-group-btn">
                                                <span class="btn btn-primary">
                                                    Browse <input type="file" style="display: none;" multiple>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="p-2 border">
                                            <div class="upload-images d-flex">
                                                <div>
                                                    <img src="{{ asset('assets/images/media/0-3.jpg') }}" alt="img"
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @php
        $country = @$listing->country ? @$listing->country : old('country');
        $state = @$listing->state ? @$listing->state : old('state');
        $city = @$listing->city ? @$listing->city : old('city');
    @endphp
@endsection
@section('js')
    <script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-nice-select/js/nice-select.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-wizard/jquery.bootstrap.wizard.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ asset('assets/js/formelements.js') }}"></script>
    <script src="{{ asset('assets/js/myCustom.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.min.js"></script>
    @if ($country)
        <script>
            hitOnCountryChange('{{ $country }}', '{{ $state }}', '{{ $city }}');
        </script>
    @endif

    <script>
        $(document).ready(function() {

            $('input[name="degree"]').tagsinput({
                trimValue: true,
                confirmKeys: [13, 44, 32],
                focusClass: 'my-focus-class'
            });

            $('.bootstrap-tagsinput input').on('focus', function() {
                $(this).closest('.bootstrap-tagsinput').addClass('has-focus');
            }).on('blur', function() {
                $(this).closest('.bootstrap-tagsinput').removeClass('has-focus');
            });

        });

        $("#addEducation").on('click',function(){
            var education = $("#educationRow").clone();
             education.find('.col-md-3').last().remove();
             education.append(`<div class="col-md-3">
                                <button  onclick="$(this).parent().parent().remove()"type="button" class="btn btn-outline-danger btn-pill"><i class="fa fa-trash"></i></button>
                              </div>`);
            $('#educationAppendSection').append(education);
        });
    </script>
@endsection
