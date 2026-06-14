@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card border-0 rounded-4 shadow-lg overflow-hidden">

                {{-- Fancy Header --}}
                <div class="card-header py-4 text-white"
                    style="background: linear-gradient(135deg, #f57c00, #e65100);">
                    <div class="d-flex align-items-center gap-3">
                        <div style="background:rgba(255,255,255,0.2); width:45px; height:45px; border-radius:12px; display:flex; align-items:center; justify-content:center;">
                            <i class="fa-solid fa-user-plus fa-lg"></i>
                        </div>
                        <div>
                            <h5 class="mb-0 fw-bold">Add New User</h5>
                            <small style="opacity:0.85;">Fill in the details below</small>
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

                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf

                        {{-- Name --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold text-muted">Name</label>
                            <input type="text" name="name" class="form-control rounded-3 border-0 shadow-sm"
                                value="{{ old('name') }}" style="padding:12px;">
                            @error('name')
                                <div class="alert alert-warning mt-2 py-2 rounded-3">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold text-muted">Email</label>
                            <input type="email" name="email" class="form-control rounded-3 border-0 shadow-sm"
                                value="{{ old('email') }}" style="padding:12px;">
                            @error('email')
                                <div class="alert alert-warning mt-2 py-2 rounded-3">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold text-muted">Password</label>
                            <input type="password" name="password" class="form-control rounded-3 border-0 shadow-sm"
                                style="padding:12px;">
                            @error('password')
                                <div class="alert alert-warning mt-2 py-2 rounded-3">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Role --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold text-muted">Role</label>
                            <input type="text" name="role" class="form-control rounded-3 border-0 shadow-sm"
                                value="{{ old('role') }}" style="padding:12px;">
                            @error('role')
                                <div class="alert alert-warning mt-2 py-2 rounded-3">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Status --}}
                        <div class="mb-4">
                            <label class="form-label fw-bold text-muted">Status</label>
                            <input type="text" name="status" class="form-control rounded-3 border-0 shadow-sm"
                                value="{{ old('status') }}" style="padding:12px;">
                            @error('status')
                                <div class="alert alert-warning mt-2 py-2 rounded-3">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Submit --}}
                        <div class="d-grid">
                            <button type="submit" class="btn py-3 fw-bold text-white rounded-3"
                                style="background: linear-gradient(135deg, #2e7d32, #1b5e20); font-size:1rem;">
                                <i class="fa-solid fa-user-plus me-2"></i> Add User
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection