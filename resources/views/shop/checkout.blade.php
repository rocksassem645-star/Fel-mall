@extends('layouts.guest')

@section('title', 'Checkout')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">{{ __('language.Checkout') }}</h1>

    <div class="row">
        <div class="col-md-7">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">{{ __('language.Shipping Information') }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('checkout.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">{{ __('language.Shipping Address') }}</label>
                            <textarea name="shipping_address" class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('language.Billing Address') }}</label>
                            <textarea name="billing_address" class="form-control" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success btn-lg w-100">{{ __('language.Place Order') }}</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">{{ __('language.Order Summary') }}</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        @foreach($products as $item)
                        <tr>
                            <td>{{ $item['product']->title_en }} x{{ $item['quantity'] }}</td>
                            <td class="text-end">${{ number_format($item['subtotal'], 2) }}</td>
                        </tr>
                        @endforeach
                        <tr class="fw-bold">
                            <td>{{ __('language.Total') }}</td>
                            <td class="text-end">${{ number_format($total, 2) }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection