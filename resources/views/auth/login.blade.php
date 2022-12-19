@extends('layouts.app')

@section('content')
<section>
    <div id="main-wrapper" class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="card border-0">
                    <div class="card-body p-0">
                        <div class="row no-gutters">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="mb-5">
                                        <h3 class="h4 font-weight-bold text-theme">{{ __('Login') }}</h3>
                                    </div>

                                    <h6 class="h5 mb-0">Welcome back!</h6>
                                    <p class="text-muted mt-2 mb-5">Please login to your account</p>

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="form-group">
                                            <label for="email">{{ __('Email Address') }}</label>
                                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                                            
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-5">
                                            <label for="password">{{ __('Password') }}</label>
                                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password" autofocus/>

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-5">
                                            <button class="btn btn-theme" type="submit">{{ __('Login') }}</button>
                                        @if (Route::has('password.request'))
                                            <a class="forgot-link text-primary" style="float: right;" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                                        </div>
                                        @endif
                                    </form>
                                    <div class="d-flex align-items-center justify-content-center pb-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 d-none d-lg-inline-block">
                                <div class="account-block rounded-right">
                                    <div class="overlay rounded-right"></div>
                                    <div class="account-testimonial">
                                        <h4 class="text-white mb-4">Timely Films Review</h4>
                                        <p class="lead text-white">"Movies the way they were meant to be."</p>
                                        <p>- Admin User</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
