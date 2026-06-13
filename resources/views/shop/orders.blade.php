@extends('layouts.guest')

@section('title', 'My Orders')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4">My Orders</h1>

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
                            <th>Order #</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
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
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>
                                <td>{{ $order->created_at->format('M d, Y') }}</td>
                                <td class="d-flex gap-2">
                                    <a href="{{ route('user.order.show', $order->id) }}" class="btn btn-sm btn-info">View</a>

                                    @if ($order->status === 'pending')
                                        <form action="{{ route('order.cancel', $order->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to cancel this order?')">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-warning">Cancel</button>
                                        </form>
                                    @endif

                                    <form action="{{ route('deleteUserOrder', $order->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this order?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            {{ $orders->links() }}
        @else
            <div class="alert alert-info">You haven't placed any orders yet.</div>
            <a href="{{ route('shop') }}" class="btn btn-success">Start Shopping</a>
        @endif
    </div>
@endsection
