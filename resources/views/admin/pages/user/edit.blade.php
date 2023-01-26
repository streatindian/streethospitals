@extends('layouts.admin.default')
@section('head')
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <div class="app-content  my-3 my-md-5">
        <div class="side-app">
            <div class="page-header">
                <h4 class="page-title">{{ $user ? 'Edit' : 'Add' }} User</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $user ? 'Edit' : 'Add' }} User</li>
                </ol>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            @if ($errors->any())
                                {!! implode('', $errors->all('<div>:message</div>')) !!}
                            @endif
                            <div class="card-title">{{ $user ? 'Edit' : 'Add' }} User</div>
                        </div>
                        <div class="card-body">
                            <div class="panel panel-primary">
                                <div class="tab-menu-heading">
                                    <div class="tabs-menu ">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs">
                                            <li class=""><a href="#tab1" class="active" data-toggle="tab">Personal
                                                    Detail</a>
                                            </li>
                                            {{-- <li><a href="#tab2" data-toggle="tab" class="">Permission</a></li> --}}
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body">
                                    <form class="form-horizontal" method="POST" enctype="multipart/form-data"
                                        action="{{ route('user.update', $user->id) }}">
                                        @method('PUT')
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab1">

                                                @csrf
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label class="form-label mt-2">Name
                                                                <i>(required)</i></label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input type="text"
                                                                class="form-control @error('name') is-invalid @enderror"
                                                                placeholder="" name="name"
                                                                value="{{ @$user->name ? $user->name : old('name') }}">
                                                            <input type="hidden" name="id"
                                                                value="{{ $user ? $user->id : 0 }}">
                                                            @error('name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label class="form-label mt-2">Email
                                                            </label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input type="text"
                                                                class="form-control @error('email') is-invalid @enderror"
                                                                placeholder="" name="email"
                                                                value="{{ @$user->name ? $user->email : old('email') }}">

                                                            @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label class="form-label mt-2">Phone
                                                            </label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input type="text"
                                                                class="form-control @error('phone') is-invalid @enderror"
                                                                placeholder="" name="phone"
                                                                value="{{ @$user->name ? $user->phone : old('phone') }}">

                                                            @error('phone')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label class="form-label mt-2">Password
                                                            </label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input type="text"
                                                                class="form-control @error('password') is-invalid @enderror"
                                                                placeholder="" name="password"
                                                                value="{{ @$user->name ? $user->password : old('password') }}">

                                                            @error('password')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label class="form-label mt-2">Role
                                                            </label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <select
                                                                class="form-control  @error('role') is-invalid @enderror"
                                                                name="role" id="role">
                                                                @foreach ($roles as $r)
                                                                    <option value="{{ $r->name }}"
                                                                        {{ in_array($r->name, $userRole) ? 'selected' : '' }}>
                                                                        {{ ucwords(str_replace('_', ' ', $r->name)) }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('role')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label class="form-label mt-2">Country
                                                            </label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <select
                                                                class="form-control  @error('country') is-invalid @enderror"
                                                                name="country" id="country">
                                                                @php

                                                                @endphp
                                                                @foreach ($country as $c)
                                                                    <option value="{{ $c->id }}"
                                                                        @selected($c->id == $user->country)>
                                                                        {{ $c->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('country')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label class="form-label mt-2">State
                                                            </label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <select
                                                                class="form-control  @error('status') is-invalid @enderror"
                                                                name="status" id="state">
                                                                @foreach ($state as $c)
                                                                    <option value="{{ $c->id }}"
                                                                        @selected($c->id == $user->state)>
                                                                        {{ $c->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('state')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label class="form-label mt-2">City
                                                            </label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <select
                                                                class="form-control  @error('city') is-invalid @enderror"
                                                                name="city" id="city">
                                                                @if(count($city) == 0)
                                                                    <option value="">Select City</option>
                                                                @endif
                                                                @foreach ($city as $c)
                                                                    <option value="{{ $c->id }}"
                                                                        @selected($c->id == $user->city)>
                                                                        {{ $c->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('city')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label class="form-label mt-2">Status
                                                                <i>(required)</i></label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <select
                                                                class="form-control select2 @error('status') is-invalid @enderror"
                                                                name="status">
                                                                <option value="1"
                                                                    {{ @$user->status == 1 || old('name') == 1 ? 'select' : '' }}>
                                                                    Active</option>
                                                                <option value="0"
                                                                    {{ @$user->status == 0 || old('name') == 0 ? 'select' : '' }}>
                                                                    InActive</option>
                                                            </select>
                                                            @error('status')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            {{-- <div class="tab-pane" id="tab2">
                                                <p> default model text, and a search for 'lorem ipsum' will uncover many web
                                                    sites still in their infancy. Various versions have evolved over the
                                                    years,
                                                    sometimes by accident, sometimes on purpose (injected humour and the
                                                    like
                                                </p>
                                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                                    eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
                                                    voluptua. At vero eos et</p>
                                            </div> --}}
                                        </div>
                                        <div class="form-group mb-0 row justify-content-end">
                                            <div class="col-md-3">
                                                <button type="submit"
                                                    class="btn btn-primary waves-effect waves-light">{{ $user ? 'Edit' : 'Add' }}
                                                    User</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/myCustom.js') }}"></script>
@endsection
