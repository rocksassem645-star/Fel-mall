@extends('layouts.guest')

@section('title', 'Profile Settings')

@section('content')
<div class="container py-5">

    <a href="{{ route('my.account') }}" class="btn mb-4"
        style="background: linear-gradient(135deg, #2e7d32, #1b5e20); color:white; border-radius:8px;">
        <i class="fa-solid fa-arrow-left"></i>
    </a>

    <div class="row justify-content-center">
        <div class="col-md-8">

            {{-- Update Profile Info --}}
            <div class="card border-0 rounded-4 shadow-lg overflow-hidden mb-4">
                <div class="card-header py-4 text-white"
                    style="background: linear-gradient(135deg, #2e7d32, #1b5e20);">
                    <div class="d-flex align-items-center gap-3">
                        <div style="background:rgba(255,255,255,0.2); width:45px; height:45px; border-radius:12px; display:flex; align-items:center; justify-content:center;">
                            <i class="fa-solid fa-user-pen fa-lg"></i>
                        </div>
                        <div>
                            <h5 class="mb-0 fw-bold">{{ __('language.Profile Information') }}</h5>
                            <small style="opacity:0.85;">{{ __('language.Update your name and email') }}</small>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4" style="background:#f5f7fa;">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            {{-- Update Password --}}
            <div class="card border-0 rounded-4 shadow-lg overflow-hidden mb-4">
                <div class="card-header py-4 text-white"
                    style="background: linear-gradient(135deg, #f57c00, #e65100);">
                    <div class="d-flex align-items-center gap-3">
                        <div style="background:rgba(255,255,255,0.2); width:45px; height:45px; border-radius:12px; display:flex; align-items:center; justify-content:center;">
                            <i class="fa-solid fa-lock fa-lg"></i>
                        </div>
                        <div>
                            <h5 class="mb-0 fw-bold">{{ __('language.Update Password') }}</h5>
                            <small style="opacity:0.85;">{{ __('language.Keep your account secure') }}</small>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4" style="background:#f5f7fa;">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            {{-- Delete Account --}}
            <div class="card border-0 rounded-4 shadow-lg overflow-hidden mb-4">
                <div class="card-header py-4 text-white"
                    style="background: linear-gradient(135deg, #dc3545, #b02a37);">
                    <div class="d-flex align-items-center gap-3">
                        <div style="background:rgba(255,255,255,0.2); width:45px; height:45px; border-radius:12px; display:flex; align-items:center; justify-content:center;">
                            <i class="fa-solid fa-triangle-exclamation fa-lg"></i>
                        </div>
                        <div>
                            <h5 class="mb-0 fw-bold">{{ __('language.Delete Account') }}</h5>
                            <small style="opacity:0.85;">{{ __('language.This action is permanent') }}</small>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4" style="background:#f5f7fa;">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</div>
@endsection