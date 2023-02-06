@extends('layouts.admin.default')
@section('head')
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <div class="app-content  my-3 my-md-5">
        <div class="side-app">
            <div class="page-header">
                <h4 class="page-title">{{ $menu_detail ? 'Edit' : 'Add' }} Menu</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.menu.index') }}">Menu</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $menu_detail ? 'Edit' : 'Add' }} Menu
                    </li>
                </ol>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">{{ $menu_detail ? 'Edit' : 'Add' }} Menu</div>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" method="POST" enctype="multipart/form-data"
                                action="{{ route('admin.menu.store') }}">
                                @csrf

                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mt-2" id="examplenameInputname2">Name
                                                <i>(required)</i></label>
                                        </div>
                                        <div class="col-md-9">

                                            <input type="hidden" name="id"
                                                value="{{ $menu_detail ? $menu_detail->id : '' }}">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                id="examplenameInputname3" placeholder="" name="name"
                                                value="{{ $menu_detail ? $menu_detail->name : old('name') }}">
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
                                            <label class="form-label mt-2" id="examplenameInputname2">Icon
                                                <i>(optional)</i></label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control @error('icon') is-invalid @enderror"
                                                id="examplenameInputname3" placeholder="" name="icon"
                                                value="{{ $menu_detail ? $menu_detail->icon : old('icon') }}">
                                            @error('icon')
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
                                            <label class="form-label mt-2">Parent Menu</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <select name="parent_id" id="parent_id"
                                                        class=" @error('parent_id') is-invalid @enderror form-control border-right-0">
                                                        <option value="">Select Parent Menu</option>
                                                        @foreach ($menu as $c)
                                                            <option value="{{ $c->id }}"
                                                                {{ @$menu_detail->parent_id == $c->id ? 'selected' : '' }}>
                                                                {{ $c->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('parent_id')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-0 row justify-content-end">
                                    <div class="col-md-3">
                                        <button type="submit"
                                            class="btn btn-primary waves-effect waves-light">{{ $menu_detail ? 'Edit' : 'Add' }}
                                            Menu</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#parent_id").select2({});


        });

        function convertToSlug(Text) {
            console.log('in2');
            let slug = Text.toLowerCase()
                .replace(/[^\w ]+/g, '')
                .replace(/ +/g, '-');
            $("#slug").val(slug);
        }
    </script>
@endsection
