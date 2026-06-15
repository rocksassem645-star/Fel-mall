@extends('layouts.guest')

@section('title', $product->title_en . ' - FEL MALL')

@section('content')

    <div class="container py-5">


      
        {{-- Breadcrumb Navigation --}}
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('language.Home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('shop') }}">{{ __('language.Shop') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $product->title_en }}</li>
            </ol>
        </nav>

        <div class="row g-4">

            {{-- Product Image --}}
            <div class="col-md-6">
                <div class="card shadow-sm border-0 rounded-4">
                    <img src="{{ asset('img/Product/' . $product->prod_img) }}" class="card-img-top rounded-4"
                        alt="{{ $product->title_en }}" style="width: 100%; object-fit: cover;">
                </div>
            </div>

            {{-- Product Details --}}
            <div class="col-md-6">
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body p-4">

                        {{-- Category Badge --}}
                        @if ($product->category)
                            <span class="badge bg-success mb-3">
                                <i class="fa-solid fa-tag me-1"></i>
                                {{ $product->category->name_en ?? $product->category->name }}
                            </span>
                        @endif

                        {{-- Title --}}
                        <h1 class="fw-bold mb-3">{{ $product->title_en }}</h1>

                        {{-- Price --}}
                        <h2 class="text-success fw-bold mb-3">${{ number_format($product->price, 2) }}</h2>

                        {{-- Stock Status --}}
                        <div class="mb-3">
                            @if ($product->quantity > 0)
                                <span class="text-success">
                                    <i class="fa-solid fa-check-circle me-1"></i>
                                    {{ __('language.In Stock') }} ({{ $product->quantity }}
                                    {{ __('language.available') }})
                                </span>
                            @else
                                <span class="text-danger">
                                    <i class="fa-solid fa-times-circle me-1"></i>
                                    {{ __('language.Out of Stock') }}
                                </span>
                            @endif
                        </div>

                        {{-- Description --}}
                        <div class="mb-4">
                            <h5 class="fw-bold">
                                <i class="fa-solid fa-align-left me-2 text-success"></i>
                                {{ __('language.Description') }}
                            </h5>
                            <p class="text-muted">{{ $product->description_en }}</p>
                        </div>

                        {{-- Add to Cart Form --}}
                        @if ($product->quantity > 0)

                            {{-- Success Message --}}
                            @if (session('cart_success'))
                                <div class="alert border-0 rounded-3 mb-3 d-flex align-items-center justify-content-between"
                                    style="background:#e8f5e9;">
                                    <span class="text-success fw-bold">
                                        <i class="fa-solid fa-check-circle me-2"></i>
                                        {{ __('language.Added to cart successfully') }}
                                    </span>
                                    <a href="{{ route('shop') }}" class="btn btn-sm fw-bold"
                                        style="background: linear-gradient(135deg, #f57c00, #e65100); color:white; border-radius:8px;">
                                        <i class="fa-solid fa-arrow-left me-1"></i>
                                        {{ __('language.Back to Shop') }}
                                    </a>
                                </div>
                            @endif

                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                @csrf
                                <div class="row g-3 align-items-end">
                                    <div class="col-auto">
                                        <label for="quantity"
                                            class="form-label fw-bold">{{ __('language.Quantity') }}</label>
                                        <input type="number" name="quantity" id="quantity" class="form-control"
                                            value="1" min="1" max="{{ $product->quantity }}"
                                            style="width: 100px;">
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-lg w-100 fw-bold text-white"
                                            style="background: linear-gradient(135deg, #2e7d32, #1b5e20); border-radius:10px;">
                                            <i class="fa-solid fa-cart-shopping me-2"></i>
                                            {{ __('language.Add to Cart') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        @else
                            <button class="btn btn-secondary btn-lg w-100" disabled>
                                <i class="fa-solid fa-ban me-2"></i>
                                {{ __('language.Currently Unavailable') }}
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- Related Products Section --}}
        @if (isset($relatedProducts) && $relatedProducts->count() > 0)
            <div class="mt-5">
                <h3 class="fw-bold mb-4">
                    <i class="fa-solid fa-heart me-2 text-success"></i>
                    {{ __('language.You May Also Like') }}
                </h3>
                <div class="row g-4">
                    @foreach ($relatedProducts as $related)
                        <div class="col-md-6 col-lg-3">
                            <div class="card shadow-sm border-0 rounded-4 h-100">
                                <img src="{{ asset('img/Product/' . $related->prod_img) }}"
                                    class="card-img-top rounded-top-4" alt="{{ $related->title_en }}"
                                    style="height: 150px; object-fit: cover;">
                                <div class="card-body text-center">
                                    <h6 class="fw-bold">{{ $related->title_en }}</h6>
                                    <p class="text-success fw-bold">${{ number_format($related->price, 2) }}</p>
                                    <a href="{{ route('product.show', $related->id) }}"
                                        class="btn btn-sm btn-outline-success">
                                        {{ __('language.View Product') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </div>

@endsection
