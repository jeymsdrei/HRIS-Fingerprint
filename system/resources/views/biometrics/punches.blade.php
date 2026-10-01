<x-app-layout hris>
    <x-slot name="title">Manual Fingerprint Punch</x-slot>

    <div class="page-container">
        <div class="max-w-lg">
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-slate-900">Manual Fingerprint Punch</h1>
                <p class="mt-2 text-slate-600">Register a manual punch when an employee forgets to scan or the device is down</p>
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
                            <label class="input-label">Employee</label>
                            <div class="flex items-center gap-3">
                                <img src="" alt="" class="h-14 w-14 rounded-full object-cover shadow-sm cursor-pointer" id="punch-photo" data-avatar-preview style="display:none">
                                <div id="punch-photo-initials" class="h-14 w-14 rounded-full bg-gradient-to-br from-indigo-600 to-indigo-700 text-white items-center justify-center text-lg font-bold" style="display:none"></div>
                                <select name="employee_id" class="input flex-1" required data-punch-employee>
                                    <option value="">Select employee…</option>
                                    @foreach ($employees as $e)
                                        <option value="{{ $e->id }}"
                                            data-photo="{{ $e->photo_path ? asset('storage/'.$e->photo_path) : '' }}"
                                            data-initials="{{ mb_strtoupper(mb_substr($e->first_name, 0, 1) . mb_substr($e->last_name, 0, 1)) }}">{{ $e->employee_id }} — {{ $e->full_name }} ({{ $e->classification }})</option>
                                    @endforeach
                                </select>
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
                        const punchSelect = document.querySelector('[data-punch-employee]');
                        const punchPhoto = document.getElementById('punch-photo');
                        const punchInitials = document.getElementById('punch-photo-initials');

                        if (punchSelect) {
                            punchSelect.addEventListener('change', () => {
                                const option = punchSelect.options[punchSelect.selectedIndex];
                                const photo = option?.dataset.photo || '';
                                const initials = option?.dataset.initials || '?';

                                if (photo) {
                                    punchPhoto.src = photo;
                                    punchPhoto.alt = (option?.textContent || '').trim();
                                    punchPhoto.style.display = '';
                                    punchInitials.style.display = 'none';
                                } else {
                                    punchInitials.textContent = initials;
                                    punchInitials.style.display = 'flex';
                                    punchPhoto.style.display = 'none';
                                    punchPhoto.src = '';
                                }
                            });
                            punchSelect.dispatchEvent(new Event('change'));
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
