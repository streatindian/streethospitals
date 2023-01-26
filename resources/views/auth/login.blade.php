@extends('layouts.admin.app')
@section('content')
    <div class="row">
        <div class="col-xl-4 col-md-12 col-md-12 d-block mx-auto">
            <div class="card mb-0">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Login') }}</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label class="form-label text-dark">Email address</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label text-dark">Password</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="custom-control custom-checkbox">
                                @if (Route::has('password.request'))
                                    <a class="float-right small text-dark mt-1" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </label>
                        </div>
                        <div class="form-footer mt-2">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Login') }}
                            </button>

                        </div>
                        <div class="text-center  mt-3 text-dark">
                            Don't have account yet? <a href="{{ route('register') }}">SignUp</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
