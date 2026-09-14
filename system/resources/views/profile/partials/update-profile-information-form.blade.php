<section class="space-y-6">
    <header>
        <h3 class="text-lg font-semibold text-slate-900">{{ __('Profile Information') }}</h3>
        <p class="mt-1 text-sm text-slate-500">{{ __("Update your account's profile information and email address.") }}</p>
    </header>

    @if (session('status') === 'profile-updated')
        <p class="text-sm text-green-600 font-medium">{{ __('Saved.') }}</p>
    @endif

    <form method="post" action="{{ route('profile.update') }}" class="space-y-4">
        @csrf
        @method('patch')

        <div>
            <label for="name" class="input-label">{{ __('Name') }}</label>
            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}"
                   class="input @error('name') border-red-500 @enderror"
                   required autofocus autocomplete="name"/>
            @error('name')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="email" class="input-label">{{ __('Email') }}</label>
            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}"
                   class="input @error('email') border-red-500 @enderror"
                   required autocomplete="username"/>
            @error('email')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
        </div>

        <div class="flex items-center gap-3">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
        </div>
    </form>
</section>