@extends('layouts.front-default')
@section('content')
    <style>
        .invalid-feedback {
            display: block;
        }
    </style>
    <section class="sptb mt-6">
        <div class="container customerpage">
            <div class="row">
                <div class="single-page">
                    <div class="col-lg-5 col-xl-4 col-md-6 d-block mx-auto">
                        <div class="wrapper wrapper2">
                            {{-- <div class="card-body">
                                <div class="btn-list text-center">
                                    <a href="https://www.facebook.com/" class="btn btn-icon btn-facebook">
                                        <span class="fa fa-facebook "></span>
                                    </a>
                                    <a href="https://www.google.com/gmail/" class="btn btn-icon btn-google">
                                        <span class="fa fa-google bg-google"></span>
                                    </a>
                                    <a href="https://twitter.com/" class="btn  btn-icon btn-twitter">
                                        <span class="fa fa-twitter bg-twitter"></span>
                                    </a>
                                </div>
                            </div>
                            <hr class="divider"> --}}

                            <form class="card-body" tabindex="500" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="mail">
                                    <input type="Name" name="name" class="@error('name') is-invalid @enderror" value="{{old('name')}}">
                                    <label>Name</label>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mail">
                                    <input type="email" name="email" class="@error('email') is-invalid @enderror"  value="{{old('email')}}">
                                    <label>Email Address</label>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mail">
                                    <input type="number" name="phone" class="@error('phone') is-invalid @enderror"  value="{{old('phone')}}">
                                    <label>Phone</label>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="passwd">
                                    <input type="password" name="password" class="@error('password') is-invalid @enderror">
                                    <label>Password</label>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="passwd">
                                    <input id="password-confirm" type="password"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        name="password_confirmation"  autocomplete="new-password">
                                    <label>Confirm Password</label>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="submit">
                                    <button class="btn btn-primary btn-block" type="submit">Login</button>
                                </div>
                                <p class="mb-2"><a href="forgot.html">Forgot Password</a></p>
                                <p class="text-dark mb-0">Don't have account?<a href="{{ route('user.login') }}"
                                        class="text-primary ml-1">Sign IN</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
