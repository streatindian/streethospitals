@extends('layouts.admin.default')

@section('content')
    <div class="app-content  my-3 my-md-5">
        <div class="side-app">
            <div class="page-header">
                <h4 class="page-title">Role</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Role</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Role</li>
                </ol>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4>{{ str_replace('_', ' ', ucfirst($role->name)) }} Role</h4>
                            <div class="container mt-4">

                                <h6>Assigned permissions</h6>

                                <table class="table table-striped">
                                    <thead>
                                        <th scope="col" width="20%">Name</th>
                                        <th scope="col" width="1%">Guard</th>
                                    </thead>

                                    @foreach ($rolePermissions as $permission)
                                        <tr>
                                            <td>{{ $permission->name }}</td>
                                            <td>{{ $permission->guard_name }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>

                        </div>
                        <div class="mt-4">
                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-info">Edit</a>
                            <a href="{{ route('roles.index') }}" class="btn btn-default">Back</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
