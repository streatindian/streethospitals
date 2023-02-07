@extends('layouts.admin.default')

@section('content')
    <div class="app-content  my-3 my-md-5">
        <div class="side-app">
            <div class="page-header">
                <h4 class="page-title">Provider</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Provider</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Provider</li>
                </ol>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Provider</div>
                        </div>
                        <div class="card-body">

                            <div class="    rounded">
                                <div class="mt-2">
                                    {{-- @include('layouts.partials.messages') --}}
                                </div>
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
        datatableInit("myTable", "{{ route('admin.provider.listing.list') }}", ['name', 'phone', 'profile_pic',
            'status', 'action'
        ], filter);
        $(document).ready(function() {
            $(".status").click(function() {
                alert('in');
                swal({
                    title: "Alert",
                    text: "Are you really want to exit",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: 'Exit',
                    cancelButtonText: 'Stay on the page'
                });
            });
        });
    </script>
@endsection
