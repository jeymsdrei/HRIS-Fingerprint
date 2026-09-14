<section class="space-y-6">
    <header>
        <h3 class="text-lg font-semibold text-slate-900">{{ __('Delete Account') }}</h3>
        <p class="mt-1 text-sm text-slate-500">{{ __('Once your account is deleted, all of its resources and data will be permanently deleted.') }}</p>
    </header>

    <div x-data="{ show: false }">
        <button type="button" @click="show = !show" class="btn btn-danger">{{ __('Delete Account') }}</button>

        <div x-show="show" x-cloak x-transition class="mt-4 space-y-4">
            <p class="text-sm text-slate-600">{{ __('Are you sure you want to delete your account? Enter your password to confirm.') }}</p>

            <form method="post" action="{{ route('profile.destroy') }}" class="space-y-4">
                @csrf
                @method('delete')

                <div>
                    <label for="delete_password" class="input-label">{{ __('Password') }}</label>
                    <input id="delete_password" name="password" type="password"
                           class="input @error('password', 'userDeletion') border-red-500 @enderror"
                           autocomplete="current-password"/>
                    @error('password', 'userDeletion')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                </div>

                <div class="flex items-center gap-3">
                    <button type="submit" class="btn btn-danger">{{ __('Delete Account') }}</button>
                    <button type="button" @click="show = false" class="btn btn-secondary">{{ __('Cancel') }}</button>
                </div>
            </form>
        </div>
    </div>
</section>