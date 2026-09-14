<x-app-layout>
    <x-slot name="title">Settings</x-slot>

    <div class="page-container">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-900">System Settings</h1>
            <p class="mt-2 text-slate-600">Configure application-wide settings</p>
        </div>

        <div class="max-w-4xl card">
            <div class="card-header">
                <h2 class="font-semibold text-slate-900">System Settings</h2>
            </div>
            <form method="POST" action="{{ route('settings.update', ':key') }}" class="hidden"></form>
            <div class="divide-y divide-slate-100">
                @forelse ($groups as $group)
                    <div class="px-5 py-4">
                        <h3 class="text-xs font-semibold uppercase tracking-wider text-slate-400 mb-3">{{ $group }}</h3>
                        @foreach ($settings->where('group', $group) as $setting)
                        <div class="flex items-center justify-between py-2">
                            <div>
                                <p class="text-sm text-slate-700">{{ str_replace('_', ' ', ucwords($setting->key)) }}</p>
                                <p class="text-xs text-slate-400 font-mono">{{ $setting->value }}</p>
                            </div>
                            <form method="POST" action="{{ route('settings.update', $setting->key) }}" class="flex gap-2">
                                @csrf
                                <input name="value" value="{{ $setting->value }}" class="input w-40">
                                <input type="hidden" name="group" value="{{ $group }}">
                                <button class="btn btn-secondary btn-sm">Save</button>
                            </form>
                        </div>
                        @endforeach
                    </div>
                @empty
                    <p class="px-5 py-8 text-center text-slate-400 text-sm">No settings yet.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
