<section class="space-y-6">
    <header>
        <h3 class="text-lg font-semibold text-slate-900">{{ __('Update Password') }}</h3>
        <p class="mt-1 text-sm text-slate-500">{{ __('Ensure your account is using a long, random password to stay secure.') }}</p>
    </header>

    @if (session('status') === 'password-updated')
        <p class="text-sm text-green-600 font-medium">{{ __('Saved.') }}</p>
    @endif

    <form method="post" action="{{ route('password.update') }}" class="space-y-4">
        @csrf
        @method('put')

        <div>
            <label for="update_password_current_password" class="input-label">{{ __('Current Password') }}</label>
            <input id="update_password_current_password" name="current_password" type="password"
                   class="input @error('current_password', 'updatePassword') border-red-500 @enderror"
                   autocomplete="current-password"/>
            @error('current_password', 'updatePassword')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="update_password_password" class="input-label">{{ __('New Password') }}</label>
            <input id="update_password_password" name="password" type="password"
                   class="input @error('password', 'updatePassword') border-red-500 @enderror"
                   autocomplete="new-password"/>
            @error('password', 'updatePassword')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="update_password_password_confirmation" class="input-label">{{ __('Confirm Password') }}</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password"
                   class="input @error('password_confirmation', 'updatePassword') border-red-500 @enderror"
                   autocomplete="new-password"/>
            @error('password_confirmation', 'updatePassword')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
        </div>

        <div class="flex items-center gap-3">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
        </div>
    </form>
</section>