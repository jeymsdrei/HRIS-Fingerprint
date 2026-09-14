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
                                <input type="password" name="password" class="input" placeholder="Minimum of 8 characters" {{ $user->exists ? '' : 'required' }}>
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
