@extends('layouts.admin.default')
@section('content')
    <div class="app-content  my-3 my-md-5">
        <div class="side-app">
            <div class="page-header">
                <h4 class="page-title">{{$speciality?'Edit':'Add'}} Speciality</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('speciality.index') }}">Speciality</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$speciality?'Edit':'Add'}}  Speciality</li>
                </ol>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">{{$speciality?'Edit':'Add'}} Speciality</div>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" method="POST" enctype="multipart/form-data"
                                action="{{ route('speciality.store') }}">
                                @csrf
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mt-2" id="examplenameInputname2">Speciality Name
                                                <i>(required)</i></label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                id="examplenameInputname3" placeholder="" name="name"
                                                value="{{ old('name')?old('name'):@$speciality->name }}">
                                                <input type="hidden" name="id" value="{{$speciality?$speciality->id:0}}">
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
                                            <label class="form-label mt-2" id="examplenameInputname2">Speciality Status
                                                <i>(required)</i></label>
                                        </div>
                                        <div class="col-md-9">
                                            <select  class="form-control @error('status') is-invalid @enderror"
                                                id="examplenameInputname3"  name="status" >
                                                <option value="1"  {{ @$speciality->status == 1 || old('name') == 1  ?'select':''}}>Active</option>
                                                <option value="0"  {{ @$speciality->status == 0 || old('name') == 0  ?'select':''}} >InActive</option>
                                            </select>
                                            @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-0 row justify-content-end">
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">{{$speciality?'Edit':'Add'}} Speciality</button>
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
