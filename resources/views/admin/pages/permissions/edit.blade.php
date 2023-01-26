@extends('layouts.admin.default')

@section('content')
    <div class="app-content  my-3 my-md-5">
        <div class="side-app">
            <div class="page-header">
                <h4 class="page-title">Permission</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permission</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Permission</li>
                </ol>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="container mt-4">

                                <form method="POST" action="{{ route('permissions.update', $permission->id) }}">
                                    @method('patch')
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input value="{{ $permission->name }}" type="text" class="form-control"
                                            name="name" placeholder="Name" required>

                                        @if ($errors->has('name'))
                                            <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>

                                    <button type="submit" class="btn btn-primary">Save permission</button>
                                    <a href="{{ route('permissions.index') }}" class="btn btn-default">Back</a>
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
