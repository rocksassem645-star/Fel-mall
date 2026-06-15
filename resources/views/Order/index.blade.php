@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <div class="mb-4">
        <h2 style="font-weight:800; background: linear-gradient(135deg, #2e7d32, #4caf50); background-clip:text; -webkit-background-clip:text; color:transparent;">
            {{ __('language.Orders Management') }}
        </h2>
        <p class="text-muted">{{ __('language.View and manage all orders') }}</p>
    </div>

    <div class="card border-0 rounded-4 shadow-lg overflow-hidden">

        <div class="card-header py-3 text-white"
            style="background: linear-gradient(135deg, #f57c00, #e65100);">
            <div class="d-flex align-items-center gap-3">
                <div style="background:rgba(255,255,255,0.2); width:45px; height:45px; border-radius:12px; display:flex; align-items:center; justify-content:center;">
                    <i class="fa-solid fa-bag-shopping fa-lg"></i>
                </div>
                <div>
                    <h5 class="mb-0 fw-bold">{{ __('language.All Orders') }}</h5>
                    <small style="opacity:0.85;">{{ $result->count() }} {{ __('language.total orders') }}</small>
                </div>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle text-center mb-0">
                    <thead style="background:#f5f7fa;">
                        <tr>
                            <th class="py-3 text-muted">{{ __('language.ID') }}</th>
                            <th class="py-3 text-muted">{{ __('language.User ID') }}</th>
                            <th class="py-3 text-muted">{{ __('language.Total') }}</th>
                            <th class="py-3 text-muted">{{ __('language.Status') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($result as $order)
                            <tr>
                                <td class="fw-bold" style="color:#f57c00;">{{ $order->id }}</td>
                                <td>{{ $order->user_id }}</td>
                                <td class="fw-bold" style="color:#2e7d32;">${{ number_format($order->total_price, 2) }}</td>
                                <td>
                                    <span class="badge rounded-pill
                                        @if($order->status == 'pending') bg-warning
                                        @elseif($order->status == 'confirmed') bg-primary
                                        @elseif($order->status == 'delivered') bg-success
                                        @elseif($order->status == 'cancelled') bg-danger
                                        @endif">
                                        {{ __('language.' . $order->status) }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection