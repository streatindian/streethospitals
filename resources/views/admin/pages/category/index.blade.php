@extends('layouts.admin.default')
@section('head')
    <link src="{{ asset('assets/plugins/datatable/bootstrap.css') }}" rel="stylesheet">
    <link src="{{ asset('assets/plugins/datatable/dataTables.boogstrap4.min.css') }}" rel="stylesheet">
    <link src="{{ asset('assets/plugins/datatable/jquery.dataTables.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="app-content  my-3 my-md-5">
        <div class="side-app">
            <div class="page-header">
                <h1 class="page-title text-capitalize">{{ request()->query('type') }} Category @can('category_add')
                        <a class="btn btn-sm btn-primary text-white"
                         href="{{ route('category.create', ['type' => request()->query('type')]) }}">Add Category</a>
                    @endcan
                </h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Category</a></li>
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
                                                <th>Thumbnail</th>
                                                <th>Banner</th>
                                                <th>Parent Category</th>
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
        datatableInit("myTable", "{{ route('category.listing',['type'=> request()->query('type')]) }}", ['name', 'thumbnail', 'banner_image',
            'parent_id', 'status', 'action'
        ], filter);
    </script>
@endsection
