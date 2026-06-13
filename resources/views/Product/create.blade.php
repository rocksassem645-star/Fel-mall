@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- ID -->
                    <div class="mb-3">
                        <label class="form-label">ID:</label>
                        <input type="text" name="id" class="form-control" value="{{ old('id') }}">
                        @error('id')
                            <div class="alert alert-warning mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Category -->
                    <div class="mb-3">
                        <label class="form-label">Category:</label>
                        <select name="category_id" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title_en }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="alert alert-warning mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Image -->
                    <div class="mb-3">
                        <label class="form-label">Image:</label>
                        <input type="file" name="prod_img" class="form-control">
                        @error('prod_img')
                            <div class="alert alert-warning mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Title EN -->
                    <div class="mb-3">
                        <label class="form-label">Title EN:</label>
                        <input type="text" name="title_en" class="form-control" value="{{ old('title_en') }}">
                        @error('title_en')
                            <div class="alert alert-warning mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Title AR -->
                    <div class="mb-3">
                        <label class="form-label">Title AR:</label>
                        <input type="text" name="title_ar" class="form-control" value="{{ old('title_ar') }}">
                        @error('title_ar')
                            <div class="alert alert-warning mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Title RU -->
                    <div class="mb-3">
                        <label class="form-label">Title RU:</label>
                        <input type="text" name="title_ru" class="form-control" value="{{ old('title_ru') }}">
                        @error('title_ru')
                            <div class="alert alert-warning mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Description EN -->
                    <div class="mb-3">
                        <label class="form-label">Description EN:</label>
                        <input type="text" name="description_en" class="form-control"
                            value="{{ old('description_en') }}">
                        @error('description_en')
                            <div class="alert alert-warning mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Description AR -->
                    <div class="mb-3">
                        <label class="form-label">Description AR:</label>
                        <input type="text" name="description_ar" class="form-control"
                            value="{{ old('description_ar') }}">
                        @error('description_ar')
                            <div class="alert alert-warning mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Description RU -->
                    <div class="mb-3">
                        <label class="form-label">Description RU:</label>
                        <input type="text" name="description_ru" class="form-control"
                            value="{{ old('description_ru') }}">
                        @error('description_ru')
                            <div class="alert alert-warning mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Price -->
                    <div class="mb-3">
                        <label class="form-label">Price:</label>
                        <input type="number" step="0.01" name="price" class="form-control"
                            value="{{ old('price') }}">
                        @error('price')
                            <div class="alert alert-warning mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Quantity -->
                    <div class="mb-4">
                        <label class="form-label">Quantity:</label>
                        <input type="number" name="quantity" class="form-control" value="{{ old('quantity') }}">
                        @error('quantity')
                            <div class="alert alert-warning mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid">
                        <input type="submit" value="Add Product" class="btn btn-success">
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
