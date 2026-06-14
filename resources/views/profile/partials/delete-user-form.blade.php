<p class="text-muted mb-4">{{ __('language.delete_account_warning') }}</p>

{{-- Trigger Button --}}
<button type="button" class="btn py-2 px-4 fw-bold text-white rounded-3"
    style="background: linear-gradient(135deg, #dc3545, #b02a37);"
    data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
    <i class="fa-solid fa-trash me-2"></i>{{ __('language.Delete Account') }}
</button>

{{-- Confirmation Modal --}}
<div class="modal fade" id="deleteAccountModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow-lg">

            <div class="modal-header text-white rounded-top-4"
                style="background: linear-gradient(135deg, #dc3545, #b02a37);">
                <h5 class="modal-title fw-bold">
                    <i class="fa-solid fa-triangle-exclamation me-2"></i>
                    {{ __('language.confirm_delete_account') }}
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body p-4" style="background:#f5f7fa;">
                <p class="text-muted mb-4">{{ __('language.delete_account_confirm_desc') }}</p>

                <form method="POST" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')

                    <div class="mb-3">
                        <label class="form-label fw-bold text-muted">{{ __('language.Password') }}</label>
                        <input type="password" name="password"
                            class="form-control rounded-3 border-0 shadow-sm"
                            style="padding:12px;"
                            placeholder="{{ __('language.Password') }}">
                        @if($errors->userDeletion->get('password'))
                            <div class="alert alert-warning mt-2 py-2 rounded-3">
                                {{ implode(' ', $errors->userDeletion->get('password')) }}
                            </div>
                        @endif
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <button type="button" class="btn fw-bold rounded-3"
                            style="background:#e2e8f0; color:#1a1a1a;"
                            data-bs-dismiss="modal">
                            {{ __('language.Cancel') }}
                        </button>
                        <button type="submit" class="btn fw-bold text-white rounded-3"
                            style="background: linear-gradient(135deg, #dc3545, #b02a37);">
                            <i class="fa-solid fa-trash me-2"></i>{{ __('language.Delete Account') }}
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>