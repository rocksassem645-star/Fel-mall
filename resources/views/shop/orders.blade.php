@extends('layouts.guest')

@section('title', 'My Orders')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4">{{ __('language.My Orders') }}</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if ($orders->count() > 0)
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>{{ __('language.Order #') }}</th>
                            <th>{{ __('language.Product') }}</th>
                            <th>{{ __('language.Quantity') }}</th>
                            <th>{{ __('language.Total') }}</th>
                            <th>{{ __('language.Status') }}</th>
                            <th>{{ __('language.Date') }}</th>
                            <th>{{ __('language.Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->order_number ?? 'N/A' }}</td>
                                <td>{{ $order->product->title_en ?? 'Product' }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>${{ number_format($order->total_price, 2) }}</td>
                                <td>
                                    <span
                                        class="badge bg-{{ $order->status == 'completed' ? 'success' : ($order->status == 'cancelled' ? 'danger' : 'warning') }}">
                                        {{ __('language.' . $order->status) }}
                                    </span>
                                </td>
                                <td>{{ $order->created_at->format('M d, Y') }}</td>
                                <td class="d-flex gap-2">
                                    <a href="{{ route('user.order.show', $order->id) }}" class="btn btn-sm btn-info">{{ __('language.View') }}</a>

                                    @if ($order->status === 'pending')
                                        <form action="{{ route('order.cancel', $order->id) }}" method="POST"
                                            onsubmit="return confirm('{{ __('language.confirm_cancel') }}')">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-warning">{{ __('language.Cancel') }}</button>
                                        </form>
                                    @endif

                                    <form action="{{ route('deleteUserOrder', $order->id) }}" method="POST"
                                        onsubmit="return confirm('{{ __('language.confirm_delete') }}')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">{{ __('language.Delete') }}</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            {{ $orders->links() }}
        @else
            <div class="alert alert-info">{{ __('language.no_orders_yet') }}</div>
            <a href="{{ route('shop') }}" class="btn btn-success">{{ __('language.Start Shopping') }}</a>
        @endif
    </div>
@endsection