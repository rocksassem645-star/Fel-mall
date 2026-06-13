@extends("layouts.app")

@section("content")

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('orders.update') }}" method="post">
                @csrf

                <input type="hidden" name="old_id" value="{{ $result->id }}">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- User ID -->
                <div class="mb-3">
                    <label class="form-label">User ID:</label>
                    <input type="number" name="user_id" class="form-control" value="{{ $result->user_id }}">
                    @error('user_id')
                        <div class="alert alert-warning mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Product ID -->
                <div class="mb-3">
                    <label class="form-label">Product ID:</label>
                    <input type="number" name="product_id" class="form-control" value="{{ $result->product_id }}">
                    @error('product_id')
                        <div class="alert alert-warning mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Quantity -->
                <div class="mb-3">
                    <label class="form-label">Quantity:</label>
                    <input type="number" name="quantity" class="form-control" value="{{ $result->quantity }}">
                    @error('quantity')
                        <div class="alert alert-warning mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Total Price -->
                <div class="mb-3">
                    <label class="form-label">Total Price:</label>
                    <input type="number" step="0.01" name="total_price" class="form-control" value="{{ $result->total_price }}">
                    @error('total_price')
                        <div class="alert alert-warning mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Status -->
                <div class="mb-4">
                    <label class="form-label">Status:</label>
                    <select name="status" class="form-control">
                        <option value="pending" {{ $result->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="confirmed" {{ $result->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                        <option value="delivered" {{ $result->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                        <option value="cancelled" {{ $result->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                    @error('status')
                        <div class="alert alert-warning mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="d-grid">
                    <input type="submit" value="Edit Order" class="btn btn-success">
                </div>

            </form>
        </div>
    </div>
</div>

@endsection