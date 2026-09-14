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
                            <select name="employee_id" class="input" required>
                                @foreach ($employees as $e)
                                    <option value="{{ $e->id }}">{{ $e->employee_id }} — {{ $e->full_name }} ({{ $e->classification }})</option>
                                @endforeach
                            </select>
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
