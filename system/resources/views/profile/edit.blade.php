<x-app-layout hris>
    <x-slot name="title">Profile</x-slot>

    <div class="page-container">
        <div class="mb-8 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold text-slate-900">Profile</h1>
                <p class="mt-2 text-slate-600">Manage your account information and password</p>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    Back to Dashboard
                </a>
            </div>
        </div>

        <div class="max-w-3xl space-y-6">
            <div class="card">
                <div class="card-body max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="card">
                <div class="card-body max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="card">
                <div class="card-body max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
