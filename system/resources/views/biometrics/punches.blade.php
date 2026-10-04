<x-app-layout hris>
    <x-slot name="title">Manual Fingerprint Punch</x-slot>

    <div class="page-container">
        <div class="max-w-lg">
            <div class="mb-8 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-bold text-slate-900">Manual Fingerprint Punch</h1>
                    <p class="mt-2 text-slate-600">Register a manual punch when an employee forgets to scan or the device is down</p>
                </div>
                <div class="flex gap-2">
                    @if (auth()->user()->isAdmin())
                        <a href="{{ route('biometrics.index') }}" class="btn btn-secondary btn-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                            Back to Devices
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                            Back to Dashboard
                        </a>
                    @endif
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h2 class="font-semibold text-slate-900">Register Manual Punch</h2>
                    <p class="text-xs text-slate-500 mt-1">First punch of the day = Time In, last = Time Out.</p>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('biometrics.punches.store') }}" class="space-y-4">
                        @csrf
                        <div>
                            <div class="flex items-center gap-3">
                                <img src="" alt="" class="h-14 w-14 rounded-full object-cover shadow-sm cursor-pointer" id="punch-photo" data-avatar-preview style="display:none">
                                <div id="punch-photo-initials" class="h-14 w-14 rounded-full bg-gradient-to-br from-indigo-600 to-indigo-700 text-white items-center justify-center text-lg font-bold" style="display:none"></div>
                                <div class="min-w-0 flex-1">
                                    <x-typeahead
                                        name="employee_id"
                                        id="punch-employee"
                                        label="Employee"
                                        placeholder="Type a name or ID…"
                                        required
                                        :value="old('employee_id', '')"
                                        :items="$employees->map(fn ($e) => [
                                            'id' => $e->id,
                                            'text' => $e->employee_id.' — '.$e->full_name.' ('.$e->classification.')',
                                            'label' => $e->full_name,
                                            'meta' => $e->employee_id.' · '.$e->classification,
                                            'photo' => $e->photo_path ? asset('storage/'.$e->photo_path) : '',
                                            'initials' => mb_strtoupper(mb_substr($e->first_name, 0, 1).mb_substr($e->last_name, 0, 1)),
                                        ])->values()" />
                                </div>
                            </div>
                        </div>
                        <div>
                            <label class="input-label">Punch Date & Time</label>
                            <input type="datetime-local" name="punch_time" value="{{ now()->format('Y-m-d\TH:i') }}" class="input" required>
                        </div>
                        <div>
                            <label class="input-label">Device (optional)</label>
                            <select name="device_id" class="input">
                                <option value="">Manual entry</option>
                                @foreach ($devices as $d)<option value="{{ $d->id }}">{{ $d->name }}</option>@endforeach
                            </select>
                        </div>
                        <button class="btn btn-success">Register Punch</button>
                    </form>

                    <script>
                        const punchPhoto = document.getElementById('punch-photo');
                        const punchInitials = document.getElementById('punch-photo-initials');

                        const paintPunchAvatar = (item) => {
                            if (! punchPhoto || ! punchInitials) return;

                            if (item && item.photo) {
                                punchPhoto.src = item.photo;
                                punchPhoto.alt = item.label || '';
                                punchPhoto.style.display = '';
                                punchInitials.style.display = 'none';
                            } else {
                                punchInitials.textContent = (item && item.initials) || '?';
                                punchInitials.style.display = 'flex';
                                punchPhoto.style.display = 'none';
                                punchPhoto.src = '';
                            }
                        };

                        // Employee is a type-ahead now, so it announces picks instead of firing `change`
                        // on a native <select>. Guarded because inline scripts re-run on SPA navigation.
                        if (! window.__punchAvatarBound) {
                            window.__punchAvatarBound = true;
                            document.addEventListener('typeahead:pick', (event) => {
                                if (event.detail && event.detail.name === 'employee_id') {
                                    paintPunchAvatar(event.detail.item);
                                }
                            });
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
