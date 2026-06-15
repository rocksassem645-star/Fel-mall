@extends('layouts.app')

@section('content')
<div class="auth-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">

                <div class="text-center mb-4 animate-on-load">
                    <h2 style="font-weight:800; background: linear-gradient(135deg, #f57c00, #2e7d32); background-clip:text; -webkit-background-clip:text; color:transparent;">
                        {{ __('language.Create Account') }}
                    </h2>
                    <p class="text-muted">{{ __('language.Join Fel Mall today') }}</p>
                </div>

                <div class="card auth-card animate-on-load">
                    <div class="card-header">
                        <h4><i class="fa-solid fa-user-plus me-2"></i> {{ __('language.Register') }}</h4>
                    </div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert-custom alert-danger">
                                <i class="fa-solid fa-circle-exclamation me-2"></i>
                                {{ __('language.Please fix the errors below') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            {{-- Name --}}
                            <div class="auth-input-group">
                                <label for="name">{{ __('language.Name') }}</label>
                                <div class="input-icon-wrapper">
                                    <i class="fa-solid fa-user"></i>
                                    <input id="name" type="text" 
                                           name="name" value="{{ old('name') }}" 
                                           required autofocus
                                           placeholder="{{ __('language.John Doe') }}">
                                </div>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div class="auth-input-group">
                                <label for="email">{{ __('language.Email Address') }}</label>
                                <div class="input-icon-wrapper">
                                    <i class="fa-solid fa-envelope"></i>
                                    <input id="email" type="email" 
                                           name="email" value="{{ old('email') }}" 
                                           required
                                           placeholder="{{ __('language.example@email.com') }}">
                                </div>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Password --}}
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

                            {{-- Confirm Password --}}
                            <div class="auth-input-group">
                                <label for="password-confirm">{{ __('language.Confirm Password') }}</label>
                                <div class="input-icon-wrapper">
                                    <i class="fa-solid fa-lock"></i>
                                    <input id="password-confirm" type="password" 
                                           name="password_confirmation" required
                                           placeholder="{{ __('language.········') }}">
                                </div>
                            </div>

                            {{-- Submit Button --}}
                            <button type="submit" class="auth-btn">
                                <i class="fa-solid fa-user-check me-2"></i>
                                {{ __('language.Register') }}
                            </button>

                            {{-- Login Link --}}
                            <div class="auth-links">
                                {{ __('language.Already have an account?') }}
                                <a href="{{ route('login') }}">
                                    {{ __('language.Login') }}
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection