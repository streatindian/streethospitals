@extends('layouts.admin.default')
@section('head')
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
    <style>
        .footer-submit {
            position: absolute;
            bottom: 10px;
            background: #dde2ef;
            width: 100%;
            padding: 10px;
            z-index: 99999;
        }
    </style>
@endsection
@section('content')
    <div class="app-content  my-3 my-md-5">
        <div class="side-app">
            <div class="page-header">
                <h1 class="page-title text-capitalize"> Setting
                </h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Setting</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Manage</li>
                </ol>
            </div>
            <div class="row ">
                <div class="col-lg-12">
                    <div class="card">

                        <form method="post" action="{{ route('setting.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <button class="btn btn-primary pull-right" type="submit">Save</button>
                                <div class="panel panel-primary">
                                    <div class=" tab-menu-heading">
                                        <div class="tabs-menu1 ">
                                            <ul class="nav panel-tabs">
                                                <li><a href="{{ route('setting.index', ['group' => 'general']) }}"
                                                        class="{{ $active_tab == 'general' ? 'active' : '' }}">General</a>
                                                </li>
                                                <li><a href="{{ route('setting.index', ['group' => 'email']) }}"
                                                        class="{{ $active_tab == 'email' ? 'active' : '' }}">Email</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="panel-body tabs-menu-body">
                                        <div class="tab-content">
                                            <div class="tab-pane {{ $active_tab == 'general' ? 'active' : '' }}"
                                                id="general">
                                                @include('admin.pages.groups.general')
                                            </div>
                                            <div class="tab-pane {{ $active_tab == 'email' ? 'active' : '' }}"
                                                id="email">
                                                @include('admin.pages.groups.email')
                                            </div>
                                        </div>



                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>
@endsection
