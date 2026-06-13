@extends('layouts.guest')

@section('title', 'My Account - FEL MALL')

@section('content')
<div class="container py-5">
    <div class="row">
        
        {{-- Sidebar --}}
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body text-center">
                    <i class="fa-solid fa-user-circle fa-3x text-success mb-3"></i>
                    <h5>{{ Auth::user()->name }}</h5>
                    <p class="text-muted small">{{ Auth::user()->email }}</p>
                    <hr>
                    <ul class="list-unstyled text-start">
                        <li class="mb-2">
                            <a href="{{ route('my.account') }}" class="text-decoration-none text-success">
                                <i class="fa-solid fa-tachometer-alt me-2"></i> Dashboard
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('user.orders') }}" class="text-decoration-none">
                                <i class="fa-solid fa-box me-2"></i> My Orders
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('cart') }}" class="text-decoration-none">
                                <i class="fa-solid fa-cart-shopping me-2"></i> My Cart
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('profile.edit') }}" class="text-decoration-none">
                                <i class="fa-solid fa-user-edit me-2"></i> Profile Settings
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-link text-danger text-decoration-none p-0">
                                    <i class="fa-solid fa-sign-out-alt me-2"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Main Content --}}
        <div class="col-md-9">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-dark text-white rounded-top-4">
                    <h4 class="mb-0">Welcome back, {{ Auth::user()->name }}!</h4>
                </div>
                <div class="card-body">
                    
                    {{-- Statistics Cards --}}
                    <div class="row g-4 mb-4">
                        <div class="col-md-6">
                            <div class="card text-center border-success">
                                <div class="card-body">
                                    <i class="fa-solid fa-shopping-bag fa-2x text-success mb-2"></i>
                                    <h3 class="fw-bold">{{ $totalOrders }}</h3>
                                    <p class="text-muted mb-0">Total Orders</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card text-center border-success">
                                <div class="card-body">
                                    <i class="fa-solid fa-dollar-sign fa-2x text-success mb-2"></i>
                                    <h3 class="fw-bold">${{ number_format($totalSpent, 2) }}</h3>
                                    <p class="text-muted mb-0">Total Spent</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Recent Orders --}}
                    <h5 class="mb-3">Recent Orders</h5>
                    @if($recentOrders->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th>Order #</th>
                                        <th>Date</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentOrders as $order)
                                        <tr>
                                            <td>{{ $order->order_number }}</td>
                                            <td>{{ $order->created_at->format('M d, Y') }}</td>
                                            <td>${{ number_format($order->total_amount, 2) }}</td>
                                            <td>
                                                <span class="badge bg-{{ $order->status == 'completed' ? 'success' : 'warning' }}">
                                                    {{ ucfirst($order->status) }}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ route('user.order.show', $order->id) }}" class="btn btn-sm btn-info">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <a href="{{ route('user.orders') }}" class="btn btn-outline-success">View All Orders →</a>
                    @else
                        <div class="alert alert-info">
                            You haven't placed any orders yet.
                            <a href="{{ route('shop') }}" class="alert-link">Start Shopping →</a>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection