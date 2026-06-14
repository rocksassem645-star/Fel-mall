<form method="POST" action="{{ route('password.update') }}">
    @csrf
    @method('put')

    {{-- Current Password --}}
    <div class="mb-3">
        <label class="form-label fw-bold text-muted">{{ __('language.Current Password') }}</label>
        <input type="password" name="current_password" class="form-control rounded-3 border-0 shadow-sm"
            style="padding:12px;" autocomplete="current-password">
        @if($errors->updatePassword->get('current_password'))
            <div class="alert alert-warning mt-2 py-2 rounded-3">
                {{ implode(' ', $errors->updatePassword->get('current_password')) }}
            </div>
        @endif
    </div>

    {{-- New Password --}}
    <div class="mb-3">
        <label class="form-label fw-bold text-muted">{{ __('language.New Password') }}</label>
        <input type="password" name="password" class="form-control rounded-3 border-0 shadow-sm"
            style="padding:12px;" autocomplete="new-password">
        @if($errors->updatePassword->get('password'))
            <div class="alert alert-warning mt-2 py-2 rounded-3">
                {{ implode(' ', $errors->updatePassword->get('password')) }}
            </div>
        @endif
    </div>

    {{-- Confirm Password --}}
    <div class="mb-4">
        <label class="form-label fw-bold text-muted">{{ __('language.Confirm Password') }}</label>
        <input type="password" name="password_confirmation" class="form-control rounded-3 border-0 shadow-sm"
            style="padding:12px;" autocomplete="new-password">
        @if($errors->updatePassword->get('password_confirmation'))
            <div class="alert alert-warning mt-2 py-2 rounded-3">
                {{ implode(' ', $errors->updatePassword->get('password_confirmation')) }}
            </div>
        @endif
    </div>

    {{-- Save Button --}}
    <div class="d-flex align-items-center gap-3">
        <button type="submit" class="btn py-2 px-4 fw-bold text-white rounded-3"
            style="background: linear-gradient(135deg, #f57c00, #e65100);">
            <i class="fa-solid fa-floppy-disk me-2"></i>{{ __('language.Save') }}
        </button>
        @if (session('status') === 'password-updated')
            <span class="text-success fw-bold">
                <i class="fa-solid fa-check me-1"></i>{{ __('language.Saved') }}
            </span>
        @endif
    </div>

</form>