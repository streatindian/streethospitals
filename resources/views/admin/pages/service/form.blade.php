@extends('layouts.admin.default')
@section('head')
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <div class="app-content  my-3 my-md-5">
        <div class="side-app">
            <div class="page-header">
                <h4 class="page-title">Add New Service</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('service.index') }}">Service</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add New Service</li>
                </ol>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Add New Service</div>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" method="POST" enctype="multipart/form-data"
                                action="{{ route('service.store') }}">
                                @csrf
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mt-2" id="examplenameInputname2">Service Name
                                                <i>(required)</i></label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                id="examplenameInputname3" placeholder="" name="name"
                                                value="{{ @$serviceDetail ? $serviceDetail->name : old('name') }}">
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
                                            <label class="form-label mt-2">Slug</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                                placeholder="" name="slug"
                                                value="{{ @$serviceDetail ? $serviceDetail->slug : old('slug') }}">
                                            @error('slug')
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
                                            <label class="form-label mt-2">Description</label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea class="form-control @error('description') is-invalid @enderror" name="description">{{ @$serviceDetail ? $serviceDetail->description : old('description') }}</textarea>
                                            @error('description')
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
                                            <label class="form-label mt-2">Icon</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <div class="input-group file-browser">
                                                    <input type="text"
                                                        class=" @error('icon') is-invalid @enderror form-control border-right-0 browse-file"
                                                        placeholder="Upload Icon" readonly>
                                                    <label class="input-group-btn">
                                                        <span class="btn btn-primary">
                                                            Browse <input type="file" style="display: none;"
                                                                name="icon">
                                                        </span>
                                                    </label>
                                                    @error('icon')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                            </div>

                                            {{-- <div class="p-2 border mb-4">
                                                <div class="upload-images d-flex">
                                                    <div>
                                                        <img src="../assets/images/users/male/25.jpg" alt="img"
                                                            class="w73 h73 border p-0">
                                                    </div>
                                                    <div class="ml-3 mt-2">
                                                        <h6 class="mb-0 mt-3 font-weight-bold">25.jpg</h6>
                                                        <small>4.5kb</small>
                                                    </div>
                                                    <div class="float-right ml-auto">
                                                        <a href="#"
                                                            class="float-right btn btn-icon btn-danger btn-sm mt-5"><i
                                                                class="fa fa-trash-o"></i></a>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </div>
                                        @if (@$serviceDetail->icon)
                                        <div class="col-md-3"></div>
                                            <div class="col-md-9">
                                                <img src="{{ asset('uploads/service/' . $serviceDetail->icon) }}"
                                                    height="50" width="50">

                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mt-2">Banner Image</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <div class="input-group file-browser">
                                                    <input type="text"
                                                        class=" @error('banner') is-invalid @enderror form-control border-right-0 browse-file"
                                                        placeholder="Upload Banner" readonly>
                                                    <label class="input-group-btn">
                                                        <span class="btn btn-primary">
                                                            Browse <input type="file" style="display: none;"
                                                                name="banner">
                                                        </span>
                                                    </label>
                                                    @error('banner')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                        @if (@$serviceDetail->banner)
                                        <div class="col-md-3"></div>
                                            <div class="col-md-9">
                                                <img src="{{ asset('uploads/service/' . $serviceDetail->banner) }}"
                                                    height="50" width="50">

                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <input type="hidden" value="{{@$serviceDetail->id}}" name="id">
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mt-2">Parent Id</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <select name="parent" id="parent_id"
                                                        class=" @error('parent') is-invalid @enderror form-control border-right-0">
                                                        <option value="">Select Parent Service</option>
                                                        @foreach ($service as $c)
                                                            <option value="{{ $c->id }}" {{@$serviceDetail->parent == $c->id?'selected':''}}>{{ $c->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('parent')
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
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Add New
                                            Service</button>
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
    </script>
@endsection
