@extends('layouts.guest')

@section('title', $category->title_en . ' - FEL MALL')

@section('content')
<div class="container py-5">

    <div class="text-center mb-5">
        @if($category->cate_img)
            <img src="{{ asset('img/Category/' . $category->cate_img) }}"
                 style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%;">
        @endif
        <h1 class="mt-3">{{ $category->title_en }}</h1>
        <p class="text-muted">{{ $category->description_en }}</p>
    </div>

    <div class="row g-4">
        @forelse($products as $product)
            <div class="col-md-6 col-lg-3">
                <div class="card shadow-sm border-0 rounded-4 h-100">
                    <img src="{{ asset('img/Product/' . $product->prod_img) }}"
                         class="card-img-top rounded-top-4"
                         alt="{{ $product->title_en }}"
                         style="height: 180px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $product->title_en }}</h5>
                        <h5 class="text-success fw-bold">${{ number_format($product->price, 2) }}</h5>
                        <p class="text-muted small">{{ Str::limit($product->description_en, 50) }}</p>
                    </div>
                    <div class="card-footer bg-transparent border-0 pb-3">
                        <a href="{{ route('product.show', $product->id) }}" class="btn btn-outline-success w-100">
                            {{ __('language.View Product') }}
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    {{ __('language.No products in category') }}
                </div>
            </div>
        @endforelse
    </div>

    <div class="mt-5">{{ $products->links() }}</div>
</div>
@endsection