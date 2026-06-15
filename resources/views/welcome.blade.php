@extends('layouts.guest')

@section('title', 'Welcome to FEL MALL')

@section('content')
    {{-- HERO --}}
    <section class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1>{{ __('language.Welcome to') }} <span>FEL MALL</span></h1>
                    <p class="lead mb-4">{{ __('language.hero_subtitle') }}</p>
                    @auth
                        <a href="{{ route('dashboard') }}"
                            class="btn btn-success btn-lg px-5">{{ __('language.Continue Shopping') }}</a>
                    @else
                        <a href="{{ route('register') }}" class="btn btn-success btn-lg px-5"
                            style="background: #f57c00; border-color: #f57c00;">{{ __('language.Start Shopping') }} →</a>
                    @endauth
                </div>
                <div class="col-lg-6 text-center d-none d-lg-block">
                    <img src="{{ asset('img/Logo.jpg') }}" style=" width: 600px; height: 350px; object-fit: contain;">
                </div>
            </div>
        </div>
    </section>

    {{-- FEATURES --}}
    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="feature-card">
                        <i class="fas fa-truck-fast"></i>
                        <h5>{{ __('language.Fast Delivery') }}</h5>
                        <p>{{ __('language.fast_delivery_desc') }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-card">
                        <i class="fas fa-tag"></i>
                        <h5>{{ __('language.Best Prices') }}</h5>
                        <p>{{ __('language.best_prices_desc') }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-card">
                        <i class="fas fa-boxes-stacked"></i>
                        <h5>{{ __('language.Wide Selection') }}</h5>
                        <p>{{ __('language.wide_selection_desc') }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-card">
                        <i class="fas fa-shield-halved"></i>
                        <h5>{{ __('language.Secure Shopping') }}</h5>
                        <p>{{ __('language.secure_shopping_desc') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA for guests only --}}
    @guest
        <section class="cta">
            <div class="container text-center">
                <h2 class="mb-3">{{ __('language.Ready to shop?') }}</h2>
                <p class="mb-4">{{ __('language.cta_desc') }}</p>
                <a href="{{ route('register') }}" class="btn btn-light btn-lg px-5"
                    style="color: #2e7d32; font-weight: 600;">{{ __('language.Create Account') }} →</a>
            </div>
        </section>
    @endguest

    {{-- WHY CHOOSE US --}}
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 style="color: #cf901c;">{{ __('language.Why you\'ll love') }} <span style="color: #2e7d32;">FEL
                        MALL</span></h2>
                <p style="color: #090b09;">{{ __('language.why_desc') }}</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card">
                        <i class="fas fa-book-open"></i>
                        <h5>{{ __('language.Transparent Policies') }}</h5>
                        <p>{{ __('language.transparent_desc') }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <i class="fas fa-graduation-cap"></i>
                        <h5>{{ __('language.Exclusive Deals') }}</h5>
                        <p>{{ __('language.exclusive_desc') }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <i class="fas fa-cloud-arrow-up"></i>
                        <h5>{{ __('language.Instant Sync') }}</h5>
                        <p>{{ __('language.instant_sync_desc') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
