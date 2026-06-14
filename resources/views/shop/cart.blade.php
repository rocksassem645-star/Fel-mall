@extends('layouts.guest')

@section('title', 'My Cart')

@section('content')
    <div class="container py-5">
        {{-- Back Button --}}
        <a href="{{ route('my.account') }}" class="btn mb-4"
            style="background: linear-gradient(135deg, #2e7d32, #1b5e20); color:white; border-radius:8px;">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <h1 class="mb-4">{{ __('language.Shopping Cart') }}</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (empty($products))
            <div class="alert alert-info">{{ __('language.Your cart is empty') }}</div>
            <a href="{{ route('shop') }}" class="btn btn-success">{{ __('language.Continue Shopping') }}</a>
        @else
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>{{ __('language.Product') }}</th>
                            <th>{{ __('language.Price') }}</th>
                            <th>{{ __('language.Quantity') }}</th>
                            <th>{{ __('language.Subtotal') }}</th>
                            <th>{{ __('language.Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                            <tr>
                                <td>{{ $item['product']->title_en }}</td>
                                <td>${{ number_format($item['product']->price, 2) }}</td>
                                <td>
                                    <form action="{{ route('cart.update', $item['product']->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        <input type="number" name="quantity" value="{{ $item['quantity'] }}"
                                            min="1" style="width: 60px;">
                                        <button type="submit"
                                            class="btn btn-sm btn-secondary">{{ __('language.Update') }}</button>
                                    </form>
                                </td>
                                <td>${{ number_format($item['subtotal'], 2) }}</td>
                                <td>
                                    <form action="{{ route('cart.remove', $item['product']->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-sm btn-danger">{{ __('language.Remove') }}</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3" class="text-end">{{ __('language.Total') }}:</th>
                            <th>${{ number_format($total, 2) }}</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('shop') }}" class="btn btn-secondary">{{ __('language.Continue Shopping') }}</a>
                <a href="{{ route('checkout') }}"
                    class="btn btn-success btn-lg">{{ __('language.Proceed to Checkout') }}</a>
            </div>
        @endif
    </div>
@endsection
