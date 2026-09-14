<x-app-layout hris>
    <x-slot name="title">Biometric Devices</x-slot>

    <div class="page-container">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-900">Biometric Devices</h1>
            <p class="mt-2 text-slate-600">Manage biometric devices and sync punches</p>
        </div>

        @php
            $usbDeviceName = 'BioClock ZK9500 USB Fingerprint Reader';
            $usbLocation = 'Direct USB connection · local workstation';
            $usbLinked = App\Models\Employee::whereNotNull('fingerprint_id')->where('is_active', true)->count();
            $usbLastPunch = App\Models\AttendanceLog::where('source', 'device')->whereNull('device_id')
                ->where('punch_time', '<=', now())->latest('punch_time')->first();
        @endphp

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Register Device --}}
            <div class="card">
                <div class="card-header">
                    <h2 class="font-semibold text-slate-900">Register Device</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('biometrics.store') }}" class="space-y-3">
                        @csrf
                        <div>
                            <label class="input-label">Device Name</label>
                            <input name="name" placeholder="Front Gate Fingerprint" class="input" required>
                        </div>
                        <div>
                            <label class="input-label">IP Address</label>
                            <input name="ip_address" placeholder="192.168.1.100" class="input" required>
                        </div>
                        <div>
                            <label class="input-label">Port (default 4370)</label>
                            <input type="number" name="port" value="4370" class="input" required>
                        </div>
                        <div>
                            <label class="input-label">Serial No.</label>
                            <input name="serial_number" class="input">
                        </div>
                        <div>
                            <label class="input-label">Location</label>
                            <input name="location" placeholder="Main Building Lobby" class="input">
                        </div>
                        <button class="btn btn-primary w-full">Register Device</button>
                    </form>
                    <p class="text-xs text-slate-400 mt-4">Connects to fingerprint (ZKTeco) devices via TCP (port 4370). A local sync agent can POST punches to <code>/api/device/push</code>.</p>
                </div>
            </div>

            {{-- Device List --}}
            <div class="lg:col-span-2 space-y-4">
                {{-- Connected USB device --}}
                <div class="card p-6">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div class="flex items-start sm:items-center gap-3">
                            <span class="mt-1.5 sm:mt-0 h-3 w-3 rounded-full bg-green-500 shrink-0"></span>
                            <div>
                                <div class="flex items-center gap-2 flex-wrap">
                                    <h2 class="font-semibold text-slate-900">{{ $usbDeviceName }}</h2>
                                    <span class="badge badge-success">Connected</span>
                                </div>
                                <p class="text-sm text-slate-500 mt-1">
                                    {{ $usbLocation }} · {{ $usbLinked }} fingerprint(s) linked to employees
                                    @if ($usbLastPunch)
                                        · Last punch {{ $usbLastPunch->punch_time->diffForHumans() }}
                                    @else
                                        · awaiting first punch
                                    @endif
                                </p>
                            </div>
                        </div>
                        <p class="text-sm text-slate-500 sm:text-right">
                            Punches arrive via the BioClock agent → <code class="font-mono">POST /api/device/push</code>
                        </p>
                    </div>
                </div>

                @forelse ($devices as $d)
                <div class="card p-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="h-2.5 w-2.5 rounded-full {{ $d->status === 'online' ? 'bg-green-500' : ($d->status === 'offline' ? 'bg-slate-300' : 'bg-red-500') }}"></span>
                            <h4 class="font-semibold text-slate-900">{{ $d->name }}</h4>
                            <span class="badge {{ $d->status === 'online' ? 'badge-success' : ($d->status === 'offline' ? 'badge-neutral' : 'badge-danger') }}">{{ $d->status }}</span>
                        </div>
                        <p class="text-sm text-slate-500 mt-1 font-mono">{{ $d->ip_address }}:{{ $d->port }} · {{ $d->location }}</p>
                        <p class="text-xs text-slate-400">Last sync: {{ $d->last_sync_at?->diffForHumans() ?? 'never' }}</p>
                    </div>
                    <div class="flex gap-2 flex-wrap">
                        <form method="POST" action="{{ route('biometrics.sync', $d) }}">
                            @csrf
                            <button class="btn btn-success btn-sm">Sync Now</button>
                        </form>
                        <form method="POST" action="{{ route('biometrics.test', $d) }}">
                            @csrf
                            <button class="btn btn-outline btn-sm">Test</button>
                        </form>
                        <form method="POST" action="{{ route('biometrics.destroy', $d) }}" onsubmit="return confirm('Remove device?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm">✕</button>
                        </form>
                    </div>
                </div>
                @empty
                <div class="card">
                    <div class="card-body">
                        <div class="empty-state">
                            <div class="empty-state-icon">🔐</div>
                            <div class="empty-state-title">No Devices Registered</div>
                            <p class="empty-state-text">Register your first biometric device.</p>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
