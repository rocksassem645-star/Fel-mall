@extends('layouts.app')

@section('content')
<div class="auth-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">

                {{-- Logo / Branding --}}
                <div class="text-center mb-4 animate-on-load">
                    <h2 style="font-weight:800; background: linear-gradient(135deg, #2e7d32, #f57c00); background-clip:text; -webkit-background-clip:text; color:transparent;">
                        {{ __('language.Welcome Back') }}
                    </h2>
                    <p class="text-muted">{{ __('language.Sign in to your account') }}</p>
                </div>

                {{-- Auth Card --}}
                <div class="card auth-card animate-on-load">
                    <div class="card-header">
                        <h4><i class="fa-solid fa-key me-2"></i> {{ __('language.Login') }}</h4>
                    </div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert-custom alert-danger">
                                <i class="fa-solid fa-circle-exclamation me-2"></i>
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            {{-- Email Field --}}
                            <div class="auth-input-group">
                                <label for="email">{{ __('language.Email Address') }}</label>
                                <div class="input-icon-wrapper">
                                    <i class="fa-solid fa-envelope"></i>
                                    <input id="email" type="email" 
                                           name="email" value="{{ old('email') }}" 
                                           required autofocus
                                           placeholder="{{ __('language.example@email.com') }}">
                                </div>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Password Field --}}
                            <div class="auth-input-group">
                                <label for="password">{{ __('language.Password') }}</label>
                                <div class="input-icon-wrapper">
                                    <i class="fa-solid fa-lock"></i>
                                    <input id="password" type="password" 
                                           name="password" required
                                           placeholder="{{ __('language.········') }}">
                                </div>
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Remember Me & Forgot --}}
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" 
                                           name="remember" id="remember">
                                    <label class="form-check-label" for="remember">
                                        {{ __('language.Remember Me') }}
                                    </label>
                                </div>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        {{ __('language.Forgot Password?') }}
                                    </a>
                                @endif
                            </div>

                            {{-- Submit Button --}}
                            <button type="submit" class="auth-btn">
                                <i class="fa-solid fa-arrow-right-to-bracket me-2"></i>
                                {{ __('language.Login') }}
                            </button>

                            {{-- Register Link --}}
                            @if (Route::has('register'))
                                <div class="auth-links">
                                    {{ __("language.Don't have an account?") }}
                                    <a href="{{ route('register') }}">
                                        {{ __('language.Register') }}
                                    </a>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection