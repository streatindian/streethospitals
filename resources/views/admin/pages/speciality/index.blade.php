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
                <h1 class="page-title">Speciality <a class="btn btn-sm btn-primary text-white"
                        href="{{ route('speciality.create') }}">Add Speciality</a></h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Speciality</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List</li>
                </ol>
            </div>
            <div class="row ">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">

                                <div class="table-responsive border-top pt-2">
                                    <table class="table card-table table-vcenter text-nowrap w-100" id="myTable">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Name</th>
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
    <script src="{{ asset('assets/js/datatableini.js') }}"></script>
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
        datatableInit("myTable", "{{ route('speciality.listing') }}", ['name', 'status', 'action'], filter);
    </script>
@endsection
