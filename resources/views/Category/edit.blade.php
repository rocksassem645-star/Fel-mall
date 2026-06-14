@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card border-0 rounded-4 shadow-lg overflow-hidden">

                {{-- Fancy Header --}}
                <div class="card-header py-4 text-white"
                    style="background: linear-gradient(135deg, #2e7d32, #1b5e20);">
                    <div class="d-flex align-items-center gap-3">
                        <div style="background:rgba(255,255,255,0.2); width:45px; height:45px; border-radius:12px; display:flex; align-items:center; justify-content:center;">
                            <i class="fa-solid fa-pen-to-square fa-lg"></i>
                        </div>
                        <div>
                            <h5 class="mb-0 fw-bold">Edit Category</h5>
                            <small style="opacity:0.85;">Update the details below</small>
                        </div>
                    </div>
                </div>

                <div class="card-body p-4" style="background:#f5f7fa;">

                    @if ($errors->any())
                        <div class="alert alert-danger rounded-3">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('categories.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="old_id" value="{{ $result->id }}">

                        {{-- ID --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold text-muted">ID</label>
                            <input type="text" name="id" class="form-control rounded-3 border-0 shadow-sm"
                                value="{{ $result->id }}" style="padding:12px;">
                            @error('id')
                                <div class="alert alert-warning mt-2 py-2 rounded-3">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Image --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold text-muted">Image</label>
                            <input type="file" name="cate_img" class="form-control rounded-3 border-0 shadow-sm"
                                style="padding:12px;">
                            @error('cate_img')
                                <div class="alert alert-warning mt-2 py-2 rounded-3">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Title EN --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold text-muted">Title (English)</label>
                            <input type="text" name="title_en" class="form-control rounded-3 border-0 shadow-sm"
                                value="{{ $result->title_en }}" style="padding:12px;">
                            @error('title_en')
                                <div class="alert alert-warning mt-2 py-2 rounded-3">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Title AR --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold text-muted">Title (Arabic)</label>
                            <input type="text" name="title_ar" class="form-control rounded-3 border-0 shadow-sm"
                                value="{{ $result->title_ar }}" style="padding:12px;" dir="rtl">
                            @error('title_ar')
                                <div class="alert alert-warning mt-2 py-2 rounded-3">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Title RU --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold text-muted">Title (Russian)</label>
                            <input type="text" name="title_ru" class="form-control rounded-3 border-0 shadow-sm"
                                value="{{ $result->title_ru }}" style="padding:12px;">
                            @error('title_ru')
                                <div class="alert alert-warning mt-2 py-2 rounded-3">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Description EN --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold text-muted">Description (English)</label>
                            <input type="text" name="description_en" class="form-control rounded-3 border-0 shadow-sm"
                                value="{{ $result->description_en }}" style="padding:12px;">
                            @error('description_en')
                                <div class="alert alert-warning mt-2 py-2 rounded-3">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Description AR --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold text-muted">Description (Arabic)</label>
                            <input type="text" name="description_ar" class="form-control rounded-3 border-0 shadow-sm"
                                value="{{ $result->description_ar }}" style="padding:12px;" dir="rtl">
                            @error('description_ar')
                                <div class="alert alert-warning mt-2 py-2 rounded-3">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Description RU --}}
                        <div class="mb-4">
                            <label class="form-label fw-bold text-muted">Description (Russian)</label>
                            <input type="text" name="description_ru" class="form-control rounded-3 border-0 shadow-sm"
                                value="{{ $result->description_ru }}" style="padding:12px;">
                            @error('description_ru')
                                <div class="alert alert-warning mt-2 py-2 rounded-3">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Submit --}}
                        <div class="d-grid">
                            <button type="submit" class="btn py-3 fw-bold text-white rounded-3"
                                style="background: linear-gradient(135deg, #2e7d32, #1b5e20); font-size:1rem;">
                                <i class="fa-solid fa-pen-to-square me-2"></i> Update Category
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection