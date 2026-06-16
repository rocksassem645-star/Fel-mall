@extends('layouts.guest')

@section('title', 'Checkout')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">{{ __('language.Checkout') }}</h1>

    <div class="row">
        <div class="col-md-7">
            <div class="card shadow-sm mb-4">
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

                        {{-- Payment Method --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">{{ __('language.Payment Method') }}</label>

                            <div class="form-check border rounded-3 p-3 mb-2">
                                <input class="form-check-input" type="radio" name="payment_method"
                                    id="pay_visa" value="visa" checked>
                                <label class="form-check-label w-100 text-dark" for="pay_visa">
                                    <i class="fa-solid fa-credit-card me-2 text-primary"></i>
                                    {{ __('language.Pay with Visa') }}
                                </label>
                            </div>

                            <div class="form-check border rounded-3 p-3">
                                <input class="form-check-input" type="radio" name="payment_method"
                                    id="pay_cod" value="cash_on_delivery">
                                <label class="form-check-label w-100 text-dark" for="pay_cod">
                                    <i class="fa-solid fa-money-bill-wave me-2 text-success"></i>
                                    {{ __('language.Cash on Delivery') }}
                                </label>
                            </div>
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