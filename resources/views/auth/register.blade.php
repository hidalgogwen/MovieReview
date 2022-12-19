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
                                        <h3 class="h4 font-weight-bold text-theme">{{ __('Register') }}</h3>
                                    </div>

                                    <h6 class="h5 mb-0">Join us!</h6>
                                    <p class="text-muted mt-2">Please enter your details</p>

                                     <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <div class="form-group">
                                            <label for="email">{{ __('Name') }}</label>
                                            <input type="text" name="name" id="name" class="form-control @error('email') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus/>
                                            
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="email">{{ __('Email Address') }}</label>
                                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                                            
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="password">{{ __('Password') }}</label>
                                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password" autofocus/>

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-4">
                                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-theme">{{ __('Register') }}</button>
                                        </div>
                                    </form>
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
