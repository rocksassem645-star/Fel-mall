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
                            <i class="fa-solid fa-user-pen fa-lg"></i>
                        </div>
                        <div>
                            <h5 class="mb-0 fw-bold">{{ __('language.Edit User') }}</h5>
                            <small style="opacity:0.85;">{{ __('language.Update details for') }} {{ $result->name }}</small>
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

                    <form action="{{ route('users.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="old_id" value="{{ $result->id }}">

                        {{-- ID --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold text-muted">{{ __('language.ID') }}</label>
                            <input type="text" name="id" class="form-control rounded-3 border-0 shadow-sm"
                                value="{{ $result->id }}" style="padding:12px;">
                            @error('id')
                                <div class="alert alert-warning mt-2 py-2 rounded-3">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Name --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold text-muted">{{ __('language.Name') }}</label>
                            <input type="text" name="name" class="form-control rounded-3 border-0 shadow-sm"
                                value="{{ $result->name }}" style="padding:12px;">
                            @error('name')
                                <div class="alert alert-warning mt-2 py-2 rounded-3">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold text-muted">{{ __('language.Email') }}</label>
                            <input type="email" name="email" class="form-control rounded-3 border-0 shadow-sm"
                                value="{{ $result->email }}" style="padding:12px;">
                            @error('email')
                                <div class="alert alert-warning mt-2 py-2 rounded-3">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold text-muted">
                                {{ __('language.Password') }}
                                <small class="text-muted fw-normal">({{ __('language.leave blank to keep current') }})</small>
                            </label>
                            <input type="password" name="password" class="form-control rounded-3 border-0 shadow-sm"
                                style="padding:12px;">
                            @error('password')
                                <div class="alert alert-warning mt-2 py-2 rounded-3">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Role --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold text-muted">{{ __('language.Role') }}</label>
                            <input type="text" name="role" class="form-control rounded-3 border-0 shadow-sm"
                                value="{{ $result->role }}" style="padding:12px;">
                            @error('role')
                                <div class="alert alert-warning mt-2 py-2 rounded-3">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Status --}}
                        <div class="mb-4">
                            <label class="form-label fw-bold text-muted">{{ __('language.Status') }}</label>
                            <input type="text" name="status" class="form-control rounded-3 border-0 shadow-sm"
                                value="{{ $result->status }}" style="padding:12px;">
                            @error('status')
                                <div class="alert alert-warning mt-2 py-2 rounded-3">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Submit --}}
                        <div class="d-grid">
                            <button type="submit" class="btn py-3 fw-bold text-white rounded-3"
                                style="background: linear-gradient(135deg, #2e7d32, #1b5e20); font-size:1rem;">
                                <i class="fa-solid fa-user-pen me-2"></i> {{ __('language.Update User') }}
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection