@extends('layouts.guest')

@section('title', 'Categories - FEL MALL')

@section('content')
<div class="container py-5">
    <h1 class="mb-4 text-center">Shop by Category</h1>
    
    <div class="row g-4">
        @forelse($categories as $category)
            <div class="col-md-4 col-lg-3">
                <a href="{{ route('category.products', $category->id) }}" class="text-decoration-none">
                    <div class="card shadow-sm border-0 rounded-4 text-center h-100 hover-lift">
                        <div class="card-body">
                            @if($category->cate_img)
                                <img src="{{ asset('img/Category/' . $category->cate_img) }}" 
                                     class="rounded-circle mb-3" 
                                     style="width: 80px; height: 80px; object-fit: cover;">
                            @else
                                <i class="fa-solid fa-folder-open fa-4x text-success mb-3"></i>
                            @endif
                            <h5 class="card-title">{{ $category->title_en }}</h5>
                            <p class="text-muted small">{{ $category->products_count ?? 0 }} products</p>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">No categories found.</div>
            </div>
        @endforelse
    </div>
</div>

<style>
    .hover-lift {
        transition: transform 0.3s ease;
    }
    .hover-lift:hover {
        transform: translateY(-5px);
    }
</style>
@endsection