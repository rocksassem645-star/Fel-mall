@extends('layouts.guest')

@section('title', 'Welcome to FEL MALL')

@section('content')
    {{-- HERO --}}
    <section class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1>Welcome to <span>FEL MALL</span></h1>
                    <p class="lead mb-4">Your one-stop shop for everything you need. Fresh products, great prices, and lightning-fast delivery.</p>
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn btn-success btn-lg px-5">Continue Shopping</a>
                    @else
                        <a href="{{ route('register') }}" class="btn btn-success btn-lg px-5" style="background: #f57c00; border-color: #f57c00;">Start Shopping →</a>
                    @endauth
                </div>
                <div class="col-lg-6 text-center d-none d-lg-block">
                    <i class="fas fa-shopping-bag" style="font-size: 12rem; opacity: 0.1; color: #2e7d32;"></i>
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
                        <h5>Fast Delivery</h5>
                        <p>Get your order delivered quickly and safely.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-card">
                        <i class="fas fa-tag"></i>
                        <h5>Best Prices</h5>
                        <p>Competitive prices on all products.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-card">
                        <i class="fas fa-boxes-stacked"></i>
                        <h5>Wide Selection</h5>
                        <p>Hundreds of products across categories.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-card">
                        <i class="fas fa-shield-halved"></i>
                        <h5>Secure Shopping</h5>
                        <p>Your data and orders are always safe.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA for guests only --}}
    @guest
        <section class="cta">
            <div class="container text-center">
                <h2 class="mb-3">Ready to shop?</h2>
                <p class="mb-4">Create a free account and start exploring thousands of products.</p>
                <a href="{{ route('register') }}" class="btn btn-light btn-lg px-5" style="color: #2e7d32; font-weight: 600;">Create Account →</a>
            </div>
        </section>
    @endguest

    {{-- WHY CHOOSE US --}}
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 style="color: #cf901c;" >Why you'll love <span style="color: #2e7d32;">FEL MALL</span></h2>
                <p style="color: #090b09;">We combine innovation, trust, and community for the best shopping experience.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card">
                        <i class="fas fa-book-open"></i>
                        <h5>Transparent Policies</h5>
                        <p>Clear return policy and dedicated support.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <i class="fas fa-graduation-cap"></i>
                        <h5>Exclusive Deals</h5>
                        <p>Early access to flash sales and guides.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <i class="fas fa-cloud-arrow-up"></i>
                        <h5>Instant Sync</h5>
                        <p>Real-time inventory and same-day dispatch.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection