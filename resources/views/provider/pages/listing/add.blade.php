@extends('layouts.provider.default')
@section('head')
    <link href="{{ asset('assets/plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />
    <style>
        .categoryTab {
            border-radius: 5px;
            color: black;
            box-shadow: 0px 0px 5px -2px grey;
        }

        .categoryTab:hover {
            box-shadow: 0px 0px 18px -2px grey;
        }
    </style>
@endsection
@section('content')
    <div class="app-content  my-3 my-md-5">
        <div class="side-app">
            <div class="page-header">
                <h1 class="page-title">Select </h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">User</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List</li>
                </ol>
            </div>
            <div class="row ">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row item-all-cat">
                                @foreach ($category as $c)
                                    <div class="col-xl-3 col-md-6">
                                        <a href="{{url('provider/listing/form?category='.$c->slug)}}">
                                            <div class="item-all-card text-center categoryTab">                                            
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-nice-select/js/nice-select.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-wizard/jquery.bootstrap.wizard.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-validation/dist/jquery.validate.min.js') }}"></script>
@endsection
