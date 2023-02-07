@extends('layouts.provider.default')
@section('head')
    <link src="{{ asset('assets/plugins/datatable/bootstrap.css') }}" rel="stylesheet">
    <link src="{{ asset('assets/plugins/datatable/dataTables.boogstrap4.min.css') }}" rel="stylesheet">
    <link src="{{ asset('assets/plugins/datatable/jquery.dataTables.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    @if ($listingCount < 1)
        <style>
            .ap {
                margin: 0;
                background: #a29fa52b;
                height: 100vh;
                display: grid;
                place-items: center;
                border-radius: 3px;
            }

            .mya {
                position: relative;
                padding: 30px 60px;
                box-shadow: 0 0 10px 5px rgba(0, 0, 0, 0.4);
                color: #999;
                text-decoration: none;
                text-transform: uppercase;
                letter-spacing: 4px;
                font: 700 30px consolas;
                overflow: hidden;
            }

            .mya span:nth-child(1) {
                position: absolute;
                top: 0;
                right: 0;
                width: 100%;
                height: 3px;
                background: linear-gradient(to right, gray, #171717);
                animation: animate1 2s linear infinite;
            }

            @keyframes animate1 {
                0% {
                    transform: translateX(-100%);
                }

                100% {
                    transform: translateX(100%);
                }
            }

            .mya span:nth-child(2) {
                position: absolute;
                top: 0;
                right: 0;
                height: 100%;
                width: 3px;
                background: linear-gradient(to bottom, gray, #454645);
                animation: animate2 2s linear infinite;
                animation-delay: 1s;
            }

            @keyframes animate2 {
                0% {
                    transform: translateY(-100%);
                }

                100% {
                    transform: translateY(100%);
                }
            }

            .mya span:nth-child(3) {
                position: absolute;
                bottom: 0;
                right: 0;
                width: 100%;
                height: 3px;
                background: linear-gradient(to left, gray, #7b7e7b);
                animation: animate3 2s linear infinite;
            }

            @keyframes animate3 {
                0% {
                    transform: translateX(100%);
                }

                100% {
                    transform: translateX(-100%);
                }
            }

            .mya span:nth-child(4) {
                position: absolute;
                top: 0;
                left: 0;
                height: 100%;
                width: 3px;
                background: linear-gradient(to top, gray, #909490);
                animation: animate4 2s linear infinite;
                animation-delay: 1s;
            }

            @keyframes animate4 {
                0% {
                    transform: translateY(100%);
                }

                100% {
                    transform: translateY(-100%);
                }
            }
        </style>
        <div class="app-content  my-3 my-md-5">
            <div class="side-app">


                <div class="row" style="margin-top:5rem;">
                    <div class="col-md-12 ap">
                        <a href="{{ route('provider.listing.add') }}" class="mya">
                            <span> </span>
                            <span> </span>
                            <span> </span>
                            <span> </span>
                            <i class="fa fa-plus"></i> Add First Listing
                        </a>
                    </div>
                </div>

            </div>
        </div>
    @else
        <div class="app-content  my-3 my-md-5">
            <div class="side-app">
                <div class="page-header">
                    <h1 class="page-title">Listing <a class="btn btn-sm btn-primary text-white"
                            href="{{ route('provider.listing.add') }}">Add Listing</a></h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Listing</a></li>
                        <li class="breadcrumb-item active" aria-current="page">List</li>
                    </ol>
                </div>
                <div class="row ">
                    <div class="col-lg-12">
                        {{-- <div class="panel panel-primary">
                    <div class=" ">
                        <div class="user-tabs mb-4">
                            <!-- Tabs -->
                            <ul class="nav panel-tabs">
                                <li class=""><a href="#tab1" class="active" data-toggle="tab">All (1,737)</a>
                                </li>
                                <li><a href="#tab2" data-toggle="tab">Contributor (1,734)</a></li>
                                <li><a href="#tab3" data-toggle="tab">Register (3)</a></li>
                            </ul>
                        </div>
                    </div>
                </div> --}}

                        <div class="card">
                            <div class="card-body">
                                <div class="tab-content">

                                    <div class="table-responsive border-top pt-2">
                                        <table class="table card-table table-vcenter text-nowrap w-100" id="myTable">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Name</th>
                                                    <th>Phone</th>
                                                    <th>Profile</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
@section('js')
    <script src="{{ asset('assets/plugins/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable.js') }}"></script>
    <script src="{{ asset('assets/js/datatableini.js') }}"></script>
    {{-- <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap.min.js"></script> --}}
    <script>
        var filter = {
            start: {
                time: new Date().toISOString().slice(0, 10),
                past: 1
            },
            end: {
                time: new Date().toISOString().slice(0, 10)
            }
        }
        startDate = new Date();
        startDate.setFullYear(startDate.getFullYear() - 1);
        $("[name=startDate]").val(startDate.toISOString().slice(0, 10));
        datatableInit("myTable", "{{ route('provider.listing.list') }}", ['name', 'phone', 'profile_pic',
            'status', 'action'
        ], filter);
    </script>
@endsection
