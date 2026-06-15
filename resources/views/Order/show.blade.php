@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card border-0 rounded-4 shadow-lg overflow-hidden">

                {{-- Fancy Header --}}
                <div class="card-header py-4 text-white"
                    style="background: linear-gradient(135deg, #f57c00, #e65100);">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center gap-3">
                            <div style="background:rgba(255,255,255,0.2); width:45px; height:45px; border-radius:12px; display:flex; align-items:center; justify-content:center;">
                                <i class="fa-solid fa-bag-shopping fa-lg"></i>
                            </div>
                            <div>
                                <h5 class="mb-0 fw-bold">{{ __('language.Order Details') }}</h5>
                                <small style="opacity:0.85;">{{ __('language.Viewing order') }} #{{ $result->id }}</small>
                            </div>
                        </div>
                        <a href="{{ route('user.orders') }}" class="btn fw-bold"
                            style="background:rgba(255,255,255,0.2); color:white; border-radius:8px; border:1px solid rgba(255,255,255,0.4);">
                            <i class="fa-solid fa-house me-1"></i> {{ __('language.Home') }}
                        </a>
                    </div>
                </div>

                <div class="card-body p-4" style="background:#f5f7fa;">

                    {{-- Info Cards --}}
                    <div class="row g-3 mb-4">

                        <div class="col-6">
                            <div class="p-3 rounded-3 bg-white shadow-sm text-center">
                                <div class="text-muted small mb-1">{{ __('language.User ID') }}</div>
                                <div class="fw-bold fs-5" style="color:#2e7d32;">{{ $result->user_id }}</div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="p-3 rounded-3 bg-white shadow-sm text-center">
                                <div class="text-muted small mb-1">{{ __('language.Product ID') }}</div>
                                <div class="fw-bold fs-5" style="color:#2e7d32;">{{ $result->product_id }}</div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="p-3 rounded-3 bg-white shadow-sm text-center">
                                <div class="text-muted small mb-1">{{ __('language.Quantity') }}</div>
                                <div class="fw-bold fs-5" style="color:#f57c00;">{{ $result->quantity }}</div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="p-3 rounded-3 bg-white shadow-sm text-center">
                                <div class="text-muted small mb-1">{{ __('language.Total Price') }}</div>
                                <div class="fw-bold fs-5" style="color:#2e7d32;">${{ number_format($result->total_price, 2) }}</div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="p-3 rounded-3 bg-white shadow-sm text-center">
                                <div class="text-muted small mb-2">{{ __('language.Status') }}</div>
                                <span class="badge rounded-pill fs-6
                                    @if($result->status == 'pending') bg-warning
                                    @elseif($result->status == 'confirmed') bg-primary
                                    @elseif($result->status == 'delivered') bg-success
                                    @elseif($result->status == 'cancelled') bg-danger
                                    @endif">
                                    {{ __('language.' . $result->status) }}
                                </span>
                            </div>
                        </div>

                    </div>

                    <a href="{{ route('user.orders') }}" class="btn w-100 py-3 fw-bold text-white rounded-3"
                        style="background: linear-gradient(135deg, #2e7d32, #1b5e20);">
                        <i class="fa-solid fa-house me-2"></i> {{ __('language.Back to Home') }}
                    </a>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection