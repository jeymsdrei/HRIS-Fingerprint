<x-app-layout hris>
    <x-slot name="title">{{ $user->exists ? 'Edit User' : 'New User' }}</x-slot>

    <div class="page-container">
        <div class="max-w-lg">
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-slate-900">{{ $user->exists ? 'Edit User' : 'New User' }}</h1>
                <p class="mt-2 text-slate-600">{{ $user->exists ? 'Update user account details' : 'Create a new system user account' }}</p>
            </div>

            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ $user->exists ? route('users.update', $user) : route('users.store') }}">
                        @csrf
                        @if ($user->exists) @method('PUT') @endif

                        <div class="space-y-4">
                            <div>
                                <label class="input-label">Full Name</label>
                                <input name="name" value="{{ old('name', $user->name) }}" class="input" required>
                            </div>
                            <div>
                                <label class="input-label">Username</label>
                                <input name="username" value="{{ old('username', $user->username) }}" class="input" required>
                            </div>
                            <div>
                                <label class="input-label">Password {{ $user->exists ? '(leave blank to keep)' : '' }}</label>
                                <div class="flex items-center gap-2">
                                    <input type="password" name="password" id="userPasswordInput" class="input min-w-0 flex-1" placeholder="Minimum of 8 characters" {{ $user->exists ? '' : 'required' }}>
                                    <button type="button" id="userPasswordToggle" data-no-loading="true" class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg border border-slate-300 text-slate-500 hover:bg-slate-100 hover:text-slate-700 focus:outline-none focus:ring-2 focus:ring-indigo-500" aria-label="Show password" title="Show password">
                                        <svg class="user-password-eye h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                            <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12Z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>
                                        <svg class="user-password-eye-off hidden h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                            <path d="M3 3l18 18"></path>
                                            <path d="M10.6 5.1A10.7 10.7 0 0 1 12 5c6.5 0 10 7 10 7a18.3 18.3 0 0 1-3.2 4.2"></path>
                                            <path d="M6.7 6.7C3.7 8.5 2 12 2 12s3.5 7 10 7a9.8 9.8 0 0 0 3.1-.5"></path>
                                            <path d="M9.9 9.9a3 3 0 0 0 4.2 4.2"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div>
                                <label class="input-label">Role</label>
                                <select name="role" class="input" required>
                                    @foreach (collect(App\Models\User::ROLES)->reject(fn ($r) => $r === 'employee') as $r)
                                        <option value="{{ $r }}" @selected(old('role', $user->role) == $r)>{{ ucwords(str_replace('_', ' ', $r)) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="input-label">Linked Employee (optional)</label>
                                <select name="employee_id" class="input">
                                    <option value="">—</option>
                                    @foreach ($employees ?? \App\Models\Employee::where('is_active', true)->get() as $e)
                                        <option value="{{ $e->id }}" @selected(old('employee_id', $user->employee_id) == $e->id)>{{ $e->employee_id }} — {{ $e->full_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="flex gap-3 pt-2">
                                <a href="{{ route('users.index') }}" class="btn btn-outline">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                    BACK
                                </a>
                                <button class="btn btn-primary">Save</button>
                                <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    const userPasswordInput = document.getElementById('userPasswordInput');
    const userPasswordToggle = document.getElementById('userPasswordToggle');

    userPasswordToggle?.addEventListener('click', function () {
        const isVisible = userPasswordInput.type === 'text';
        userPasswordInput.type = isVisible ? 'password' : 'text';
        userPasswordToggle.setAttribute('aria-label', isVisible ? 'Show password' : 'Hide password');
        userPasswordToggle.setAttribute('title', isVisible ? 'Show password' : 'Hide password');
        userPasswordToggle.querySelector('.user-password-eye').classList.toggle('hidden', !isVisible);
        userPasswordToggle.querySelector('.user-password-eye-off').classList.toggle('hidden', isVisible);
    });
</script>
