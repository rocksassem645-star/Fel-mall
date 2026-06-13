@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('users.update') }}" method="post" enctype="multipart/form-data">
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

                <!-- ID -->
                <div class="mb-3">
                    <label class="form-label">ID:</label>
                    <input type="text" name="id" class="form-control" value="{{ $result->id }}">
                    @error('id')
                        <div class="alert alert-warning mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Name -->
                <div class="mb-3">
                    <label class="form-label">Name:</label>
                    <input type="text" name="name" class="form-control" value="{{ $result->name }}">
                    @error('name')
                        <div class="alert alert-warning mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label class="form-label">Email:</label>
                    <input type="email" name="email" class="form-control" value="{{ $result->email }}">
                    @error('email')
                        <div class="alert alert-warning mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label class="form-label">Password: <small class="text-muted">(leave blank to keep current)</small></label>
                    <input type="password" name="password" class="form-control">
                    @error('password')
                        <div class="alert alert-warning mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Role -->
                <div class="mb-3">
                    <label class="form-label">Role:</label>
                    <input type="text" name="role" class="form-control" value="{{ $result->role }}">
                    @error('role')
                        <div class="alert alert-warning mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Status -->
                <div class="mb-4">
                    <label class="form-label">Status:</label>
                    <input type="text" name="status" class="form-control" value="{{ $result->status }}">
                    @error('status')
                        <div class="alert alert-warning mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="d-grid">
                    <input type="submit" value="Edit User" class="btn btn-success">
                </div>

            </form>
        </div>
    </div>
</div>

@endsection