@extends('layouts.guest')

@section('title', 'Shop - FEL MALL')

@section('content')

    <div class="container py-5">
        <div class="row">

            {{-- Sidebar Filters --}}
            <div class="col-lg-3 mb-4">
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-header bg-dark text-white rounded-top-4">
                        <h5 class="mb-0">
                            <i class="fa-solid fa-filter me-2"></i>
                            Categories
                        </h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <a href="{{ route('shop') }}" class="text-decoration-none">
                                    All Products
                                </a>
                            </li>
                            @foreach ($categories as $category)
                                <li class="mb-2">
                                    <a href="{{ route('category.products', $category->id) }}"
                                        class="text-decoration-none d-block p-2 rounded hover-bg-light">
                                        <i class="fa-solid fa-folder me-2 text-success"></i>
                                      {{ $category->title_en ?? 'Unnamed' }}
                                        <span
                                            class="badge bg-secondary float-end">{{ $category->products_count ?? ($category->products->count() ?? 0) }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Products Grid --}}
            <div class="col-lg-9">

                {{-- Page Title --}}
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="fw-bold">
                        <i class="fa-solid fa-store me-2 text-success"></i>
                        Our Products
                    </h2>
                    <p class="text-muted mb-0">{{ $products->total() }} products found</p>
                </div>

                {{-- Products Grid --}}
                <div class="row g-4">
                    @forelse($products as $product)
                        <div class="col-md-6 col-lg-4">
                            <div class="card shadow-sm border-0 rounded-4 h-100">

                                {{-- Product Image --}}
                                <img src="{{ asset('img/Product/' . $product->prod_img) }}"
                                    class="card-img-top rounded-top-4" alt="{{ $product->title_en }}"
                                    style="height: 200px; object-fit: cover;">

                                <div class="card-body">
                                    {{-- Product Title --}}
                                    <h5 class="card-title fw-bold">{{ $product->title_en }}</h5>

                                    {{-- Price --}}
                                    <h4 class="text-success fw-bold mt-2">${{ number_format($product->price, 2) }}</h4>

                                    {{-- Short Description --}}
                                    <p class="text-muted small">
                                        {{ Str::limit($product->description_en, 60) }}
                                    </p>

                                    {{-- Stock Status --}}
                                    @if ($product->quantity > 0)
                                        <span class="badge bg-success mb-3">In Stock</span>
                                    @else
                                        <span class="badge bg-danger mb-3">Out of Stock</span>
                                    @endif
                                </div>

                                {{-- Card Footer Buttons --}}
                                <div class="card-footer bg-transparent border-0 pb-4">
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('product.show', $product->id) }}"
                                            class="btn btn-outline-success flex-grow-1">
                                            <i class="fa-solid fa-eye me-1"></i> View
                                        </a>
                                        @if ($product->quantity > 0)
                                            <form action="{{ route('cart.add', $product->id) }}" method="POST"
                                                class="flex-grow-1">
                                                @csrf
                                                <button type="submit" class="btn btn-success w-100">
                                                    <i class="fa-solid fa-cart-plus me-1"></i> Add
                                                </button>
                                            </form>
                                        @else
                                            <button class="btn btn-secondary w-100" disabled>
                                                <i class="fa-solid fa-ban me-1"></i> Out
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-info text-center py-5">
                                <i class="fa-solid fa-box-open fa-2x mb-3 d-block"></i>
                                <h4>No products found</h4>
                                <p>Check back later for new products!</p>
                            </div>
                        </div>
                    @endforelse
                </div>

                {{-- Pagination --}}
                <div class="mt-5">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
