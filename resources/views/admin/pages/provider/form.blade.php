@extends('layouts.admin.default')
@section('head')
    <link href="{{ asset('assets/plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.css" />
    <link href="{{ asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <style>
        .categoryTab {
            border-radius: 5px;
            color: black;
            box-shadow: 0px 0px 5px -2px grey;
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

        .ff_fileupload_wrap {
            width: 100%;
        }

        .ff_fileupload_start_upload {
            display: none;
        }

        #overlay {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 2;
            cursor: pointer;
            pointer-events: none;
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
                                        {{-- <form action="{{ route('provider.listing.save') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf --}}
                                        <input readonly  disabled="true"type="hidden" name="type" value="hospital">
                                        <input readonly  disabled="true"type="hidden" name="category_id" value="{{ $category->id }}">
                                        <input readonly  disabled="true"type="hidden" name="id"
                                            value="{{ $listing ? $listing->id : '' }}">
                                        <div class="form-group">
                                            <label class="form-label text-dark">Name of Hospital</label>
                                            <input readonly  disabled="true"type="text"
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
                                            <select readonly disabled="true" name="year"
                                                class="form-control custom-select select2 @error('year') is-invalid @enderror">
                                                <option>{{ (int) @$listing->year }}</option>
                                            </select>
                                            @error('year')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label text-dark">Management Type</label>
                                            <select readonly disabled="true" name="management"
                                                class="form-control custom-select select2 @error('management') is-invalid @enderror">
                                                <option>{{ @$listing->management }}</option>
                                            </select>
                                            @error('management')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label text-dark">Service</label>
                                            <select readonly disabled="true" name="service" multiple
                                                class="form-control custom-select select2 @error('service') is-invalid @enderror">
                                                <option>{{ @$listing->service }} </option>
                                            </select>
                                            @error('service')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label text-dark">Address</label>
                                            <textarea readonly class="form-control  required @error('address') is-invalid @enderror" name="address" rows="3"
                                                placeholder="address..">{{ $listing ? $listing->address : old('address') }}</textarea>
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label text-dark">Latitude</label>
                                            <input readonly  disabled="true"type="text"
                                                class="form-control  required @error('latitude') is-invalid @enderror"
                                                name="latitude" placeholder="Latitude"
                                                value="{{ $listing ? $listing->latitude : old('latitude') }}">
                                            @error('latitude')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label text-dark">Longitude </label>
                                            <input readonly  disabled="true"type="text"
                                                class="form-control  required @error('longitude') is-invalid @enderror"
                                                name="longitude" placeholder="Longitude"
                                                value="{{ $listing ? $listing->longitude : old('longitude') }}">
                                            @error('longitude')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group ">
                                            <label class="form-label text-dark">Country
                                            </label>
                                            <select readonly disabled="true"
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
                                            <select readonly disabled="true"
                                                class="form-control state @error('state') is-invalid @enderror"
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
                                            <select readonly disabled="true" class="form-control city  @error('city') is-invalid @enderror"
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
                                            <input readonly  disabled="true"type="number"
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
                                            <input readonly  disabled="true"type="number"
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
                                            <input readonly  disabled="true"type="email"
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
                                            <input readonly  disabled="true"type="email"
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
                                            <input readonly  disabled="true"type="url"
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
                                            <input readonly  disabled="true"type="text"
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
                                            <input readonly  disabled="true"type="text"
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
                                            <input readonly  disabled="true"type="text"
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
                                            <input readonly  disabled="true"type="text"
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
                                            <input readonly  disabled="true"name="ot_service" type="radio"
                                                {{ $listing ? ($listing->ot_service == 'major_minor' || old('ot_service') == 'major_minor' ? 'selected' : '') : '' }}
                                                value="major_minor" @checked(true)>Major &amp; Minor
                                            OT&nbsp;&nbsp;
                                            <input readonly  disabled="true"name="ot_service" type="radio" value="minor"
                                                {{ $listing ? ($listing->ot_service == 'minor' || old('ot_service') == 'minor' ? 'selected' : '') : '' }}>Minor
                                            OT&nbsp;&nbsp; <input readonly  disabled="true"name="ot_service" type="radio"
                                                value=""
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
                                                        <input readonly  disabled="true"type="checkbox" class="custom-control-input"
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
                                                    <input readonly  disabled="true"type="radio" class="custom-control-input"
                                                        name="ambulance" value="1"
                                                        {{ @$listing->ambulance == 1 ? 'checked' : '' }} />
                                                    <span class="custom-control-label">Available</span>
                                                </label>&nbsp;&nbsp;
                                                <label class="custom-control custom-radio">
                                                    <input readonly  disabled="true"type="radio" class="custom-control-input"
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
                                                    <input readonly  disabled="true"type="radio" class="custom-control-input"
                                                        name="pathology" value="1"
                                                        {{ @$listing->pathology == 1 ? 'checked' : '' }}>
                                                    <span class="custom-control-label">Available</span>
                                                </label>&nbsp;&nbsp;
                                                <label class="custom-control custom-radio">
                                                    <input readonly  disabled="true"type="radio" class="custom-control-input"
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
                                                    <input readonly  disabled="true"type="radio" class="custom-control-input"
                                                        name="is_radiodiagnosis" value="1"
                                                        {{ @$listing->is_radiodiagnosis == 1 ? 'checked' : '' }}>
                                                    <span class="custom-control-label">Available</span>
                                                </label>&nbsp;&nbsp;
                                                <label class="custom-control custom-radio">
                                                    <input readonly  disabled="true"type="radio" class="custom-control-input"
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
                                                        <input readonly  disabled="true"type="checkbox" class="custom-control-input"
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
                                            <textarea readonly class="form-control @error('about') is-invalid @enderror" name="about">{{ old('about') ? old('about') : @$listing->about }}</textarea>
                                            @error('about')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label text-dark">Set Timings</label>
                                            <select readonly disabled="true"
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
                                            <select readonly disabled="true"
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
                                            {{-- <input readonly  disabled="true"  type="file"
                                                    class="dropify   @error('profile_pic') is-invalid @enderror"
                                                    data-height="180" name="profile_pic" /> --}}
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
                                        {{-- <div class="input-group mt-4">
                                                <button class="btn btn-primary" type="submit">Submit</button>
                                            </div> --}}
                                        {{-- </form> --}}
                                    </div>
                                    <div class="post-content {{ strtolower($category->name) == 'doctors' || strtolower($category->name) == 'doctor' ? 'active' : '' }}"
                                        id="doctors">
                                        {{-- Doctor --}}
                                        @if ($errors->any())
                                            {{ implode('', $errors->all('<div>:message</div>')) }}
                                        @endif
                                        {{-- <form action="{{ route('provider.listing.save') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf --}}
                                        <input readonly  disabled="true"type="hidden" name="type" value="doctor">
                                        <input readonly  disabled="true"type="hidden" name="category_id" value="{{ $category->id }}">
                                        <input readonly  disabled="true"type="hidden" name="id"
                                            value="{{ $listing ? $listing->id : '' }}">
                                        <div class="form-group">
                                            <label class="form-label text-dark">Name</label>
                                            <input readonly  disabled="true"type="text"
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
                                            <select readonly disabled="true" name="gender"
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
                                            <input readonly  disabled="true"type="text"
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
                                            <input readonly  disabled="true"type="text"
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
                                            <select readonly disabled="true" name="year"
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
                                            <input readonly  disabled="true"type="text"
                                                class="form-control  required @error('state_medical_council') is-invalid @enderror"
                                                name="state_medical_council" placeholder="Name of State Medical Council"
                                                value="{{ $listing ? $listing->state_medical_council : old('state_medical_council') }}">
                                            @error('state_medical_council')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label text-dark">Registration Number</label>
                                            <input readonly  disabled="true"type="text"
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
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="form-label text-dark">Date of Birth</label>
                                                    <select readonly disabled="true" name="birth_date"
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
                                                    <select readonly disabled="true" name="birth_month"
                                                        class="custom-select select2 @error('birth_month') is-invalid @enderror">
                                                        @php
                                                            $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                                                        @endphp

                                                        <option value="" selected="selected">Month</option>
                                                        @foreach ($months as $key => $m)
                                                            <option value="{{ $key + 1 }}"
                                                                {{ old('birth_month') == $key + 1 || @$listing->birth_month == $key + 1 ? 'selected' : '' }}>
                                                                {{ $m }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('birth_month')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label text-dark">&nbsp;</label>
                                                    <select readonly disabled="true" name="birth_year"
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
                                            <select readonly disabled="true"
                                                class="form-control blood_group  select2 @error('blood_group') is-invalid @enderror"
                                                name="blood_group">
                                                <option value="">Select Blood Group</option>
                                                <option value="A+"
                                                    {{ @$listing->blood_group == 'A+' || old('blood_group') == 'A+' ? 'selected' : '' }}>
                                                    A+</option>
                                                <option value="A-"
                                                    {{ @$listing->blood_group == 'A-' || old('blood_group') == 'A-' ? 'selected' : '' }}>
                                                    A-</option>
                                                <option value="AB+"
                                                    {{ @$listing->blood_group == 'AB+' || old('blood_group') == 'AB+' ? 'selected' : '' }}>
                                                    AB+</option>
                                                <option value="AB-"
                                                    {{ @$listing->blood_group == 'AB-' || old('blood_group') == 'AB-' ? 'selected' : '' }}>
                                                    AB-</option>
                                                <option value="B+"
                                                    {{ @$listing->blood_group == 'B+' || old('blood_group') == 'B+' ? 'selected' : '' }}>
                                                    B+</option>
                                                <option value="B-"
                                                    {{ @$listing->blood_group == 'B-' || old('blood_group') == 'B-' ? 'selected' : '' }}>
                                                    B-</option>
                                                <option value="O+"
                                                    {{ @$listing->blood_group == 'O+' || old('blood_group') == 'O+' ? 'selected' : '' }}>
                                                    O+</option>
                                                <option value="O-"
                                                    {{ @$listing->blood_group == 'O-' || old('blood_group') == 'O-' ? 'selected' : '' }}>
                                                    O-</option>
                                            </select>
                                            @error('blood_group')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label text-dark">Clinic / Hospital Name:</label>
                                            <input readonly  disabled="true"type="text"
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
                                            <textarea readonly class="form-control  required @error('address') is-invalid @enderror" name="address" rows="3"
                                                placeholder="address..">{{ $listing ? $listing->address : old('address') }}</textarea>
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label text-dark">Latitude</label>
                                            <input readonly  disabled="true"type="number"
                                                class="form-control  required @error('latitude') is-invalid @enderror"
                                                name="latitude" placeholder="Latitude"
                                                value="{{ $listing ? $listing->latitude : old('latitude') }}">
                                            @error('latitude')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label text-dark">Longitude </label>
                                            <input readonly  disabled="true"type="number"
                                                class="form-control  required @error('longitude') is-invalid @enderror"
                                                name="longitude" placeholder="Longitude"
                                                value="{{ $listing ? $listing->longitude : old('longitude') }}">
                                            @error('longitude')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group ">
                                            <label class="form-label text-dark">Country
                                            </label>
                                            <select readonly disabled="true"
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
                                            <select readonly disabled="true"
                                                class="form-control state @error('state') is-invalid @enderror"
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
                                            <select readonly disabled="true"
                                                class="form-control  city @error('city') is-invalid @enderror"
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
                                            <input readonly  disabled="true"type="number"
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
                                            <input readonly  disabled="true"type="number"
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
                                            <input readonly  disabled="true"type="email"
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
                                            <input readonly  disabled="true"type="email"
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
                                            <label class="form-label text-dark">Education Detail </label>
                                            <div id="educationAppendSection"></div>
                                            @if (@$listing->course)
                                                @foreach (@$listing->course as $c)
                                                    <div class="row mb-2">
                                                        <div class="col-md-3">
                                                            {{-- <label class="form-label text-dark">Education Detail</label> --}}
                                                            <input readonly  disabled="true"name="course[]" value="{{ $c->course }}"
                                                                class="form-control" placeholder="Course Name">
                                                            @error('course[0]')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-3">
                                                            {{-- <label class="form-label text-dark">&nbsp;</label> --}}
                                                            <input readonly  disabled="true"name="passout_year[]"
                                                                value="{{ $c->passout_year }}" class="form-control"
                                                                placeholder="Passout Year">
                                                            @error('course[0]')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-3">
                                                            {{-- <label class="form-label text-dark">&nbsp;</label> --}}
                                                            <input readonly  disabled="true"name="college[]" value="{{ $c->college }}"
                                                                class="form-control" placeholder="College Name">
                                                            @error('college[0]')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-3">
                                                            {{-- <label class="form-label text-dark">&nbsp;</label> --}}
                                                            <button
                                                                onclick="$(this).parent().parent().remove()"type="button"
                                                                class="btn btn-outline-danger btn-pill"><i
                                                                    class="fa fa-trash"></i></button>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                            <div class="row mb-2" id="educationRow">
                                                <div class="col-md-3">
                                                    {{-- <label class="form-label text-dark">Education Detail</label> --}}
                                                    <input readonly  disabled="true"name="course[]" value="" class="form-control"
                                                        placeholder="Course Name">
                                                    @error('course[0]')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-3">
                                                    {{-- <label class="form-label text-dark">&nbsp;</label> --}}
                                                    <input readonly  disabled="true"name="passout_year[]" value=""
                                                        class="form-control" placeholder="Passout Year">
                                                    @error('course[0]')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-3">
                                                    {{-- <label class="form-label text-dark">&nbsp;</label> --}}
                                                    <input readonly  disabled="true"name="college[]" value="" class="form-control"
                                                        placeholder="College Name">
                                                    @error('college[0]')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-3">
                                                    {{-- <label class="form-label text-dark">&nbsp;</label> --}}
                                                    <button id="addEducation" type="button"
                                                        class="btn btn-outline-primary btn-pill"><i
                                                            class="fa fa-plus"></i></button>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="form-group">
                                            <label class="form-label text-dark">Medical Associations Membership
                                                Details:</label>
                                            <div id="associationAppendSection"></div>
                                            @if (@$listing->associations)
                                                @foreach (@$listing->associations as $a)
                                                    <div class="row mb-2">
                                                        <div class="col-md-3">
                                                            {{-- <label class="form-label text-dark">Education Detail</label> --}}
                                                            <input readonly  disabled="true"name="associations[]"
                                                                value="{{ $a->association }}" class="form-control"
                                                                placeholder="Association Name">
                                                            @error('associations[0]')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-3">
                                                            {{-- <label class="form-label text-dark">&nbsp;</label> --}}
                                                            <input readonly  disabled="true"name="branch_name[]"
                                                                value="{{ $a->branch }}" class="form-control"
                                                                placeholder="Branch Name">
                                                            @error('branch_name[0]')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-3">
                                                            {{-- <label class="form-label text-dark">&nbsp;</label> --}}
                                                            <input readonly  disabled="true"name="member[]"
                                                                value="{{ $a->member_type }}" class="form-control"
                                                                placeholder="Member type Life / Normal">
                                                            @error('member[0]')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-3">
                                                            <button
                                                                onclick="$(this).parent().parent().remove()"type="button"
                                                                class="btn btn-outline-danger btn-pill"><i
                                                                    class="fa fa-trash"></i></button>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                            <div class="row mb-2" id="associationRow">
                                                <div class="col-md-3">
                                                    {{-- <label class="form-label text-dark">Education Detail</label> --}}
                                                    <input readonly  disabled="true"name="associations[]" value=""
                                                        class="form-control" placeholder="Association Name">
                                                    @error('associations[0]')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-3">
                                                    {{-- <label class="form-label text-dark">&nbsp;</label> --}}
                                                    <input readonly  disabled="true"name="branch_name[]" value=""
                                                        class="form-control" placeholder="Branch Name">
                                                    @error('branch_name[0]')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-3">
                                                    {{-- <label class="form-label text-dark">&nbsp;</label> --}}
                                                    <input readonly  disabled="true"name="member[]" value="" class="form-control"
                                                        placeholder="Member type Life / Normal">
                                                    @error('member[0]')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-3">
                                                    {{-- <label class="form-label text-dark">&nbsp;</label> --}}
                                                    <button id="addAssociation" type="button"
                                                        class="btn btn-outline-primary btn-pill"><i
                                                            class="fa fa-plus"></i></button>
                                                </div>
                                            </div>


                                        </div>


                                        <div class="form-group">
                                            <label class="form-label text-dark">Please write few words about
                                                yourself</label>
                                            <textarea readonly class="form-control @error('about') is-invalid @enderror" name="about">{{ old('about') ? old('about') : @$listing->about }}</textarea>
                                            @error('about')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>



                                        <div class="input-group file-browser">
                                            <label class="form-label text-dark">Profile Image</label>
                                            {{-- <input readonly  disabled="true"  type="file"
                                                    class="dropify   @error('profile_pic') is-invalid @enderror"
                                                    data-height="180" name="profile_pic" /> --}}
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
                                        {{-- <div class="input-group mt-4">
                                                <button class="btn btn-primary" type="submit">Submit</button>
                                            </div> --}}
                                        {{-- </form> --}}
                                    </div>

                                    <div class="post-content {{ strtolower($category->name) == 'fitness' ? 'active' : '' }}"
                                        id="fitness">
                                        <div class="form-group">
                                            <label class="form-label text-dark">Name</label>
                                            <input readonly  disabled="true"type="text" class="form-control  required"
                                                placeholder="Enter Name">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label text-dark">Address</label>
                                            <textarea readonly class="form-control  required" name="example-textarea-input" rows="3" placeholder="text here.."></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label text-dark">Set Timings</label>
                                            <select readonly disabled="true" class="form-control custom-select nice-select  required">
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
                                            <select readonly disabled="true" class="form-control custom-select nice-select  required">
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
                                            <input readonly  disabled="true"type="number" class="form-control  required"
                                                placeholder="Enter Number">
                                        </div>
                                        <div class="input-group file-browser">
                                            <input readonly  disabled="true"type="text" class="form-control border-right-0 browse-file"
                                                placeholder="Upload Images" readonly>
                                            <label class="input-group-btn">
                                                <span class="btn btn-primary">
                                                    Browse <input readonly  disabled="true"type="file" style="display: none;" multiple>
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
                                                <input readonly  disabled="true"type="text" class="form-control  required"
                                                    placeholder="Enter Name">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label text-dark">Phone Number</label>
                                                <input readonly  disabled="true"type="number" class="form-control  required"
                                                    placeholder="Enter Number">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label text-dark">Address</label>
                                                <textarea readonly class="form-control  required" name="example-textarea-input" rows="3" placeholder="text here.."></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label text-dark">Set Timings</label>
                                                <select readonly disabled="true" class="form-control custom-select nice-select  required">
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
                                                <select readonly disabled="true" class="form-control custom-select nice-select  required">
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
                                                <input readonly  disabled="true"type="file" class="dropify" data-height="180" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post-content  {{ strtolower($category->name) == 'massage parlours' || strtolower($category->name) == 'massage parlour' ? 'active' : '' }}"
                                        id="massage_parlours">
                                        @if ($errors->any())
                                            {{ implode('', $errors->all('<div>:message</div>')) }}
                                        @endif
                                        {{-- <form action="{{ route('provider.listing.save') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf --}}
                                        <input readonly  disabled="true"type="hidden" name="type" value="massage_parlour">
                                        <input readonly  disabled="true"type="hidden" name="category_id" value="{{ $category->id }}">
                                        <input readonly  disabled="true"type="hidden" name="id"
                                            value="{{ $listing ? $listing->id : '' }}">

                                        <div class="form-group">
                                            <div class="form-group">
                                                <label class="form-label text-dark">Business/Outlet Name</label>
                                                <input readonly  disabled="true"type="text" class="form-control  required"
                                                    name="name"
                                                    value="{{ @$listing->name ? @$listing->name : old('name') }}"
                                                    placeholder="Enter Name">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label text-dark">Email Address </label>
                                                <input readonly  disabled="true"type="email"
                                                    class="form-control  required @error('email') is-invalid @enderror"
                                                    name="email" placeholder="Enter Email"
                                                    value="{{ $listing ? $listing->email : old('email') }}">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group ">
                                                <label class="form-label text-dark">Country
                                                </label>
                                                <select readonly disabled="true"
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
                                                <select readonly disabled="true"
                                                    class="form-control state @error('state') is-invalid @enderror"
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
                                                <select readonly disabled="true"
                                                    class="form-control  city @error('city') is-invalid @enderror"
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
                                                <label class="form-label text-dark">Pin Code</label>
                                                <input readonly  disabled="true"type="number" class="form-control  required"
                                                    name="pincode"
                                                    value="{{ old('pincode') ? old('pincode') : @$listing->pincode }}"
                                                    placeholder="Enter Pin Code">
                                                @error('pincode')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label text-dark">Address</label>
                                                <textarea readonly class="form-control  required" name="address" rows="3" placeholder="Enter Address"> {{ old('address') ? old('address') : @$listing->address }}</textarea>
                                                @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label text-dark">Latitude</label>
                                                <input readonly  disabled="true"type="text"
                                                    class="form-control  required @error('latitude') is-invalid @enderror"
                                                    name="latitude" placeholder="Latitude"
                                                    value="{{ $listing ? $listing->latitude : old('latitude') }}">
                                                @error('latitude')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label text-dark">Longitude </label>
                                                <input readonly  disabled="true"type="text"
                                                    class="form-control  required @error('longitude') is-invalid @enderror"
                                                    name="longitude" placeholder="Longitude"
                                                    value="{{ $listing ? $listing->longitude : old('longitude') }}">
                                                @error('longitude')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label text-dark">Web Site</label>
                                                <input readonly  disabled="true"type="url"
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
                                                <label class="form-label text-dark">Phone Number</label>
                                                <input readonly  disabled="true"type="number" class="form-control  required"
                                                    name="phone"
                                                    value="{{ old('phone') ? old('phone') : @$listing->phone }}"
                                                    placeholder="Enter Number">
                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label text-dark">Phone Number 2</label>
                                                <input readonly  disabled="true"type="number" class="form-control  required"
                                                    name="phone2"
                                                    value="{{ old('phone2') ? old('phone2') : @$listing->phone2 }}"
                                                    placeholder="Enter Number 2">
                                                @error('phone2')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label text-dark">Massage Therapy</label>
                                                <select readonly disabled="true" class="form-control massage required"
                                                    name="massage_types[]" multiple="multiple"
                                                    {{ old('massage_types[0]') ? old('massage_types[0]') : @$listing->massage_types }}
                                                    placeholder="Enter Number 2">

                                                    @php
                                                        $massageTypes = [
                                                            'Acupressure Massage',
                                                            'Acupuncture',
                                                            'Adult Massage',
                                                            'Aqua Massage',
                                                            'Aromatherapy',
                                                            'Ashiatsu Massage',
                                                            'Ayurveda',
                                                            'Baby Massage',
                                                            'Back Massage',
                                                            'Balinese Massage',
                                                            'Bleaching',
                                                            'Body to Body Massage',
                                                            'Bowen Therapy',
                                                            'Breema Massage',
                                                            'Chair Massage',
                                                            'Chinese Massage',
                                                            'Chocolate Massage',
                                                            'Corporate Massage',
                                                            'Couples Massage',
                                                            'CranioSacral Therapy',
                                                            'Deep Tissue',
                                                            'Dirty Soapy Massage',
                                                            'Erotic Massage',
                                                            'Face Massage',
                                                            'Facial',
                                                            'Fish Massage',
                                                            'Foot Massage',
                                                            'Four Hands Massage',
                                                            'Full Body Massage',
                                                            'Geriatric Massage',
                                                            'GFE Massage',
                                                            'Group Massage',
                                                            'Happy Ending Massage',
                                                            'Head and Shoulder',
                                                            'Healing Touch',
                                                            'Hot Stone Massage',
                                                            'Integrative Acupressure',
                                                            'Integrative Positional Therapy',
                                                            'Japanese Massage',
                                                            'Kerala Ayurvedic',
                                                            'Korean Massage',
                                                            'Liberating Massage',
                                                            'Lingam Massage',
                                                            'Lomi Lomi Massage',
                                                            'Lymphatic Breast Massage',
                                                            'Medical Massage',
                                                            'Nuru Massage',
                                                            'Perineal Massage',
                                                            'Poultice Massage',
                                                            'Pregnancy Massage(Prenatal)',
                                                            'Prostate Massage',
                                                            'Reflexology',
                                                            'Reiki Massage',
                                                            'Russian Massage',
                                                            'Sandwich Massage',
                                                            'Sensual Massage',
                                                            'Shiatsu',
                                                            'Slimming Massage',
                                                            'Sports Massage',
                                                            'Steam Bath',
                                                            'Steam Wrap',
                                                            'Swedish Massage',
                                                            'Tai Chi',
                                                            'Tandem Massage',
                                                            'Tantric Massage(Tantra)',
                                                            'Thai Massage',
                                                            'Thai Yoga Bodywork',
                                                            'Therapeutic Bodywork',
                                                            'Therapeutic Massage',
                                                            'Trigger Point Therapy',
                                                            'Turkish Massage',
                                                            'Yoga Massage',
                                                            'Yoni Massage',
                                                            'Zen Shiatsu',
                                                            'Other',
                                                        ];
                                                    @endphp
                                                    @php
                                                        $massage_types = old('massage_types') ? old('massage_types') : explode(',', @$listing->massage_types);
                                                    @endphp
                                                    @foreach ($massageTypes as $mt)
                                                        <option @selected(in_array($mt, $massage_types))>{{ $mt }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('massage_types')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label text-dark">Business Description</label>
                                                <textarea readonly class="form-control @error('about') is-invalid @enderror" name="about">{{ old('about') ? old('about') : @$listing->about }}</textarea>
                                                @error('about')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>


                                            <div class="form-group">
                                                <label class="form-label text-dark">Service Type</label>
                                                <div class="custom-controls-stacked d-flex">
                                                    @foreach (['Male to Female', 'Female to Male', 'Male to Male', 'Female to Female'] as $ics)
                                                        <label class="custom-control custom-checkbox">
                                                            @php
                                                                $intensiveCareService = old('service_type') ? old('service_type') : explode(',', @$listing->service_type);
                                                            @endphp
                                                            <input readonly  disabled="true"type="checkbox" class="custom-control-input"
                                                                name="service_type[{{ $ics }}]"
                                                                value="{{ $ics }}" @checked(in_array($ics, $intensiveCareService))>
                                                            <span class="custom-control-label">{{ ucwords($ics) }}</span>
                                                        </label>&nbsp;
                                                    @endforeach
                                                </div>

                                                @error('service_type')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>


                                            <div class="form-group">
                                                <label class="form-label text-dark">Set Timings</label>
                                                <select readonly disabled="true"
                                                    class="form-control custom-select nice-select  required @error('timing') is-invalid @enderror"
                                                    name="timing">
                                                    @foreach (['9Am - 5Pm', '8Am - 4Pm', '10Am - 6Pm', '10Am - 7Pm', '9Am - 10Pm', '11Am - 9Pm', 'Other'] as $key => $time)
                                                        <option {{ $key == 0 ? 'selected' : '' }}>
                                                            {{ $time }}
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
                                                <select readonly disabled="true"
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
                                                {{-- <input readonly  disabled="true"  type="file"
                                                        class="dropify   @error('profile_pic') is-invalid @enderror"
                                                        data-height="180" name="profile_pic" multiple /> --}}
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

                                            <div class="input-group file-browser">
                                                <label class="form-label text-dark">Galary Image</label>
                                                {{-- <input readonly  disabled="true"  class="upload  @error('galary') is-invalid @enderror"
                                                        type="file" name="galary" accept=".jpg, .png" multiple> --}}

                                                @error('galary')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                @if ($listing)
                                                    <img src="{{ asset('uploads/listing/' . $listing->profile_pic) }}"
                                                        height="180" width="180" class="mt-4">
                                                @endif
                                            </div>


                                            {{-- <div class="input-group mt-4">
                                                    <button class="btn btn-primary" type="submit">Submit</button>
                                                </div> --}}
                                        </div>
                                        {{-- </form> --}}
                                    </div>
                                    <div class="post-content {{ strtolower($category->name) == 'clinic' || strtolower($category->name) == 'clinics' ? 'active' : '' }}"
                                        id="clinic">
                                        @if ($errors->any())
                                            {{ implode('', $errors->all('<div>:message</div>')) }}
                                        @endif
                                        {{-- <form action="{{ route('provider.listing.save') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf --}}
                                        <input readonly  disabled="true"type="hidden" name="type" value="clinic">
                                        <input readonly  disabled="true"type="hidden" name="category_id" value="{{ $category->id }}">
                                        <input readonly  disabled="true"type="hidden" name="id"
                                            value="{{ $listing ? $listing->id : '' }}">
                                        <div class="form-group">
                                            <label class="form-label text-dark">Name of Hospital</label>
                                            <input readonly  disabled="true"type="text"
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
                                            <select readonly disabled="true" name="year"
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
                                            <select readonly disabled="true" name="management"
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
                                            <select readonly disabled="true" name="service" multiple
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
                                            <textarea readonly class="form-control  required @error('address') is-invalid @enderror" name="address" rows="3"
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
                                            <select readonly disabled="true"
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
                                            <select readonly disabled="true"
                                                class="form-control state @error('state') is-invalid @enderror"
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
                                            <select readonly disabled="true"
                                                class="form-control  city @error('city') is-invalid @enderror"
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
                                            <label class="form-label text-dark">Latitude</label>
                                            <input readonly  disabled="true"type="number"
                                                class="form-control  required @error('latitude') is-invalid @enderror"
                                                name="latitude" placeholder="Latitude"
                                                value="{{ $listing ? $listing->latitude : old('latitude') }}">
                                            @error('latitude')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label text-dark">Longitude </label>
                                            <input readonly  disabled="true"type="number"
                                                class="form-control  required @error('longitude') is-invalid @enderror"
                                                name="longitude" placeholder="Longitude"
                                                value="{{ $listing ? $listing->longitude : old('longitude') }}">
                                            @error('longitude')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label text-dark">Phone Number</label>
                                            <input readonly  disabled="true"type="number"
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
                                            <input readonly  disabled="true"type="number"
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
                                            <input readonly  disabled="true"type="email"
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
                                            <input readonly  disabled="true"type="email"
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
                                            <input readonly  disabled="true"type="url"
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
                                            <input readonly  disabled="true"type="text"
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
                                            <input readonly  disabled="true"type="text"
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
                                            <input readonly  disabled="true"type="text"
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
                                            <input readonly  disabled="true"type="text"
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
                                            <input readonly  disabled="true"name="ot_service" type="radio"
                                                {{ $listing ? ($listing->ot_service == 'major_minor' || old('ot_service') == 'major_minor' ? 'selected' : '') : '' }}
                                                value="major_minor" @checked(true)>Major &amp; Minor
                                            OT&nbsp;&nbsp;
                                            <input readonly  disabled="true"name="ot_service" type="radio" value="minor"
                                                {{ $listing ? ($listing->ot_service == 'minor' || old('ot_service') == 'minor' ? 'selected' : '') : '' }}>Minor
                                            OT&nbsp;&nbsp; <input readonly  disabled="true"name="ot_service" type="radio"
                                                value=""
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
                                                        <input readonly  disabled="true"type="checkbox" class="custom-control-input"
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
                                                    <input readonly  disabled="true"type="radio" class="custom-control-input"
                                                        name="ambulance" value="1"
                                                        {{ @$listing->ambulance == 1 ? 'checked' : '' }} />
                                                    <span class="custom-control-label">Available</span>
                                                </label>&nbsp;&nbsp;
                                                <label class="custom-control custom-radio">
                                                    <input readonly  disabled="true"type="radio" class="custom-control-input"
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
                                                    <input readonly  disabled="true"type="radio" class="custom-control-input"
                                                        name="pathology" value="1"
                                                        {{ @$listing->pathology == 1 ? 'checked' : '' }}>
                                                    <span class="custom-control-label">Available</span>
                                                </label>&nbsp;&nbsp;
                                                <label class="custom-control custom-radio">
                                                    <input readonly  disabled="true"type="radio" class="custom-control-input"
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
                                                    <input readonly  disabled="true"type="radio" class="custom-control-input"
                                                        name="is_radiodiagnosis" value="1"
                                                        {{ @$listing->is_radiodiagnosis == 1 ? 'checked' : '' }}>
                                                    <span class="custom-control-label">Available</span>
                                                </label>&nbsp;&nbsp;
                                                <label class="custom-control custom-radio">
                                                    <input readonly  disabled="true"type="radio" class="custom-control-input"
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
                                                        <input readonly  disabled="true"type="checkbox" class="custom-control-input"
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
                                            <textarea readonly class="form-control @error('about') is-invalid @enderror" name="about">{{ old('about') ? old('about') : @$listing->about }}</textarea>
                                            @error('about')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label text-dark">Set Timings</label>
                                            <select readonly disabled="true"
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
                                            <select readonly disabled="true"
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
                                            {{-- <input readonly  disabled="true"  type="file"
                                                    class="dropify   @error('profile_pic') is-invalid @enderror"
                                                    data-height="180" name="profile_pic" /> --}}
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
                                        {{-- <div class="input-group mt-4">
                                                <button class="btn btn-primary" type="submit">Submit</button>
                                            </div> --}}
                                        {{-- </form> --}}
                                    </div>
                                    <div class="post-content  {{ strtolower($category->name) == 'bloodbank' ? 'active' : '' }}"
                                        id="bloodbank">
                                        <div class="form-group">
                                            <label class="form-label text-dark">Name</label>
                                            <input readonly  disabled="true"type="text" class="form-control  required"
                                                placeholder="Enter Name">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label text-dark">Set Timings</label>
                                            <select readonly disabled="true" class="form-control custom-select nice-select  required">
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
                                            <select readonly disabled="true" class="form-control custom-select nice-select  required">
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
                                            <input readonly  disabled="true"type="number" class="form-control  required"
                                                placeholder="Enter Number">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label text-dark">Address</label>
                                            <textarea readonly class="form-control  required" name="example-textarea-input" rows="3" placeholder="text here.."></textarea>
                                        </div>
                                        <div class="input-group file-browser">
                                            <input readonly  disabled="true"type="text"
                                                class="form-control border-right-0 browse-file"
                                                placeholder="Upload Images" readonly>
                                            <label class="input-group-btn">
                                                <span class="btn btn-primary">
                                                    Browse <input readonly  disabled="true"type="file" style="display: none;"
                                                        multiple>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="p-2 border">
                                            <div class="upload-images d-flex">
                                                <div>
                                                    <img src="{{ asset('assets/images/media/0-3.jpg') }}"
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

    <script src="{{ asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>

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


            $(".massage").select2({
                closeOnSelect: false,
                placeholder: "Massage Therapy",
                allowHtml: true,
                allowClear: true,
                tags: true,
                scrollAfterSelect: false,

            });

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

        $("#addEducation").on('click', function() {
            var education = $("#educationRow").clone();
            education.find('.col-md-3').last().remove();
            education.append(`<div class="col-md-3">
                                <button  onclick="$(this).parent().parent().remove()"type="button" class="btn btn-outline-danger btn-pill"><i class="fa fa-trash"></i></button>
                              </div>`);
            $('#educationAppendSection').append(education);
        });
        $("#addAssociation").on('click', function() {
            var association = $("#associationRow").clone();
            association.find('.col-md-3').last().remove();
            association.append(`<div class="col-md-3">
                                <button  onclick="$(this).parent().parent().remove()"type="button" class="btn btn-outline-danger btn-pill"><i class="fa fa-trash"></i></button>
                              </div>`);
            $('#associationAppendSection').append(association);
        });
    </script>
@endsection
