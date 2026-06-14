@extends('layouts.app')

@section('content')
<div class="container mt-5">

    {{-- Page Title --}}
    <div class="mb-4">
        <h2 style="font-weight:800; background: linear-gradient(135deg, #2e7d32, #4caf50); background-clip:text; -webkit-background-clip:text; color:transparent;">
            Admin Dashboard
        </h2>
        <p class="text-muted">Manage your store from one place</p>
    </div>

    <div class="row">

        {{-- Users Card --}}
        <div class="col-md-6 mb-4">
            <div class="card border-0 rounded-4 shadow-lg overflow-hidden">

                <div class="card-header py-3 text-white"
                    style="background: linear-gradient(135deg, #2e7d32, #1b5e20);">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="fw-bold fs-5">
                            <i class="fa-solid fa-users me-2"></i>
                            {{ __('language.Users') }}
                            <span class="badge bg-white text-success ms-2">
                                {{ $users->count() }}
                            </span>
                        </div>
                        <a href="{{ route('users.create') }}"
                            class="btn btn-sm fw-600"
                            style="background:#f57c00; color:white; border-radius:8px;">
                            <i class="fa-solid fa-plus me-1"></i>
                            {{ __('language.Create new ?') }}
                        </a>
                    </div>
                </div>

                <div class="card-body p-0">
                    @if (session('user_message'))
                        <div class="alert alert-success m-3">{{ session('user_message') }}</div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-hover align-middle text-center mb-0">
                            <thead style="background:#f5f7fa;">
                                <tr>
                                    <th class="py-3 text-muted fw-600">{{ __('language.ID') }}</th>
                                    <th class="py-3 text-muted fw-600">{{ __('language.Name') }}</th>
                                    <th class="py-3 text-muted fw-600">{{ __('language.Email') }}</th>
                                    <th class="py-3 text-muted fw-600">{{ __('language.Operation') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                    <tr>
                                        <td class="fw-bold text-success">{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            <a href="{{ route('users.show', $item->id) }}" class="btn btn-sm me-1" style="background:#2e7d32; color:white; border-radius:6px;">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <a href="{{ route('users.edit', $item->id) }}" class="btn btn-sm me-1" style="background:#f57c00; color:white; border-radius:6px;">
                                                <i class="fa-solid fa-file-pen"></i>
                                            </a>
                                            <a href="{{ route('users.delete', $item->id) }}" class="btn btn-sm" style="background:#dc3545; color:white; border-radius:6px;">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

        {{-- Categories Card --}}
        <div class="col-md-6 mb-4">
            <div class="card border-0 rounded-4 shadow-lg overflow-hidden">

                <div class="card-header py-3 text-white"
                    style="background: linear-gradient(135deg, #f57c00, #e65100);">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="fw-bold fs-5">
                            <i class="fa-solid fa-table-cells-large me-2"></i>
                            {{ __('language.Categories') }}
                            <span class="badge bg-white text-warning ms-2" style="color:#f57c00 !important;">
                                {{ $category->count() }}
                            </span>
                        </div>
                        <a href="{{ route('categories.create') }}"
                            class="btn btn-sm fw-600"
                            style="background:#2e7d32; color:white; border-radius:8px;">
                            <i class="fa-solid fa-plus me-1"></i>
                            {{ __('language.Create new ?') }}
                        </a>
                    </div>
                </div>

                <div class="card-body p-0">
                    @if (session('message'))
                        <div class="alert alert-success m-3">{{ session('message') }}</div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-hover align-middle text-center mb-0">
                            <thead style="background:#f5f7fa;">
                                <tr>
                                    <th class="py-3 text-muted fw-600">{{ __('language.ID') }}</th>
                                    <th class="py-3 text-muted fw-600">{{ __('language.Image') }}</th>
                                    <th class="py-3 text-muted fw-600">{{ __('language.Title') }}</th>
                                    <th class="py-3 text-muted fw-600">{{ __('language.Description') }}</th>
                                    <th class="py-3 text-muted fw-600">{{ __('language.Operation') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $item)
                                    <tr>
                                        <td class="fw-bold" style="color:#f57c00;">{{ $item->id }}</td>
                                        <td>
                                            <img src="{{ asset('/img/Category/' . $item->cate_img) }}"
                                                style="width:55px; height:55px; object-fit:cover; border-radius:8px;">
                                        </td>
                                        <td>{{ $item->banga }}</td>
                                        <td>{{ $item->dodo }}</td>
                                        <td>
                                            <a href="{{ route('categories.show', $item->id) }}" class="btn btn-sm me-1" style="background:#2e7d32; color:white; border-radius:6px;">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <a href="{{ route('categories.edit', $item->id) }}" class="btn btn-sm me-1" style="background:#f57c00; color:white; border-radius:6px;">
                                                <i class="fa-solid fa-file-pen"></i>
                                            </a>
                                            <a href="{{ route('categories.delete', $item->id) }}" class="btn btn-sm" style="background:#dc3545; color:white; border-radius:6px;">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

        {{-- Products Card --}}
        <div class="col-md-6 mb-4">
            <div class="card border-0 rounded-4 shadow-lg overflow-hidden">

                <div class="card-header py-3 text-white"
                    style="background: linear-gradient(135deg, #2e7d32, #1b5e20);">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="fw-bold fs-5">
                            <i class="fa-solid fa-box me-2"></i>
                            {{ __('language.Products') }}
                            <span class="badge bg-white text-success ms-2">
                                {{ $products->count() }}
                            </span>
                        </div>
                        <a href="{{ route('products.create') }}"
                            class="btn btn-sm fw-600"
                            style="background:#f57c00; color:white; border-radius:8px;">
                            <i class="fa-solid fa-plus me-1"></i>
                            {{ __('language.Create new ?') }}
                        </a>
                    </div>
                </div>

                <div class="card-body p-0">
                    @if (session('message'))
                        <div class="alert alert-success m-3">{{ session('message') }}</div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-hover align-middle text-center mb-0">
                            <thead style="background:#f5f7fa;">
                                <tr>
                                    <th class="py-3 text-muted fw-600">{{ __('language.ID') }}</th>
                                    <th class="py-3 text-muted fw-600">{{ __('language.Image') }}</th>
                                    <th class="py-3 text-muted fw-600">{{ __('language.Title') }}</th>
                                    <th class="py-3 text-muted fw-600">{{ __('language.Description') }}</th>
                                    <th class="py-3 text-muted fw-600">{{ __('language.Price') }}</th>
                                    <th class="py-3 text-muted fw-600">{{ __('language.Operation') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $item)
                                    <tr>
                                        <td class="fw-bold text-success">{{ $item->id }}</td>
                                        <td>
                                            <img src="{{ asset('/img/Product/' . $item->prod_img) }}"
                                                style="width:55px; height:55px; object-fit:cover; border-radius:8px;">
                                        </td>
                                        <td>{{ $item->title_en }}</td>
                                        <td>{{ $item->description_en }}</td>
                                        <td class="fw-bold" style="color:#2e7d32;">${{ $item->price }}</td>
                                        <td>
                                            <a href="{{ route('products.show', $item->id) }}" class="btn btn-sm me-1" style="background:#2e7d32; color:white; border-radius:6px;">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <a href="{{ route('products.edit', $item->id) }}" class="btn btn-sm me-1" style="background:#f57c00; color:white; border-radius:6px;">
                                                <i class="fa-solid fa-file-pen"></i>
                                            </a>
                                            <a href="{{ route('products.delete', $item->id) }}" class="btn btn-sm" style="background:#dc3545; color:white; border-radius:6px;">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

        {{-- Orders Card --}}
        <div class="col-md-6 mb-4">
            <div class="card border-0 rounded-4 shadow-lg overflow-hidden">

                <div class="card-header py-3 text-white"
                    style="background: linear-gradient(135deg, #f57c00, #e65100);">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="fw-bold fs-5">
                            <i class="fa-solid fa-bag-shopping me-2"></i>
                            {{ __('language.Orders') }}
                            <span class="badge bg-white ms-2" style="color:#f57c00 !important;">
                                {{ $orders->count() }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="card-body p-0">
                    @if (session('order_message'))
                        <div class="alert alert-success m-3">{{ session('order_message') }}</div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-hover align-middle text-center mb-0">
                            <thead style="background:#f5f7fa;">
                                <tr>
                                    <th class="py-3 text-muted fw-600">{{ __('language.ID') }}</th>
                                    <th class="py-3 text-muted fw-600">{{ __('language.User') }}</th>
                                    <th class="py-3 text-muted fw-600">{{ __('language.Product') }}</th>
                                    <th class="py-3 text-muted fw-600">{{ __('language.Quantity') }}</th>
                                    <th class="py-3 text-muted fw-600">{{ __('language.Total Price') }}</th>
                                    <th class="py-3 text-muted fw-600">{{ __('language.Status') }}</th>
                                    <th class="py-3 text-muted fw-600">{{ __('language.Operation') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $item)
                                    <tr>
                                        <td class="fw-bold" style="color:#f57c00;">{{ $item->id }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->product->title_en }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td class="fw-bold" style="color:#2e7d32;">${{ $item->total_price }}</td>
                                        <td>
                                            <span class="badge rounded-pill
                                                @if($item->status == 'pending') bg-warning
                                                @elseif($item->status == 'confirmed') bg-primary
                                                @elseif($item->status == 'delivered') bg-success
                                                @elseif($item->status == 'cancelled') bg-danger
                                                @endif">
                                                {{ $item->status }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('orders.show', $item->id) }}" class="btn btn-sm me-1" style="background:#2e7d32; color:white; border-radius:6px;">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <a href="{{ route('orders.delete', $item->id) }}" class="btn btn-sm" style="background:#dc3545; color:white; border-radius:6px;">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection