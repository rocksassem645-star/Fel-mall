<form method="POST" action="{{ route('profile.update') }}">
    @csrf
    @method('patch')

    {{-- Name --}}
    <div class="mb-3">
        <label class="form-label fw-bold text-muted">{{ __('language.Name') }}</label>
        <input type="text" name="name" class="form-control rounded-3 border-0 shadow-sm"
            value="{{ old('name', $user->name) }}" style="padding:12px;" required>
        @error('name')
            <div class="alert alert-warning mt-2 py-2 rounded-3">{{ $message }}</div>
        @enderror
    </div>

    {{-- Email --}}
    <div class="mb-3">
        <label class="form-label fw-bold text-muted">{{ __('language.Email') }}</label>
        <input type="email" name="email" class="form-control rounded-3 border-0 shadow-sm"
            value="{{ old('email', $user->email) }}" style="padding:12px;" required>
        @error('email')
            <div class="alert alert-warning mt-2 py-2 rounded-3">{{ $message }}</div>
        @enderror
    </div>

    {{-- Email Verification --}}
    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
        <div class="alert alert-warning rounded-3 mb-3">
            {{ __('language.email_unverified') }}
            <form id="send-verification" method="POST" action="{{ route('verification.send') }}" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-link p-0 text-warning fw-bold">
                    {{ __('language.resend_verification') }}
                </button>
            </form>
        </div>
        @if (session('status') === 'verification-link-sent')
            <div class="alert alert-success rounded-3 mb-3">
                {{ __('language.verification_sent') }}
            </div>
        @endif
    @endif

    {{-- Save Button --}}
    <div class="d-flex align-items-center gap-3">
        <button type="submit" class="btn py-2 px-4 fw-bold text-white rounded-3"
            style="background: linear-gradient(135deg, #2e7d32, #1b5e20);">
            <i class="fa-solid fa-floppy-disk me-2"></i>{{ __('language.Save') }}
        </button>
        @if (session('status') === 'profile-updated')
            <span class="text-success fw-bold">
                <i class="fa-solid fa-check me-1"></i>{{ __('language.Saved') }}
            </span>
        @endif
    </div>

</form>