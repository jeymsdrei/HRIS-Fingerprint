<x-app-layout hris>
    <x-slot name="title">Notifications</x-slot>

    <div class="page-container">
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-slate-900">Notifications</h1>
                <p class="mt-2 text-slate-600">Your recent system alerts and updates</p>
            </div>
            @if ($notifications->isNotEmpty())
                <form method="POST" action="{{ route('notifications.readAll') }}">
                    @csrf
                    <button class="btn btn-secondary btn-sm">Mark all as read</button>
                </form>
            @endif
        </div>

        <div class="card divide-y divide-slate-100">
            @forelse ($notifications as $n)
            <div class="px-6 py-4 flex items-start gap-3 {{ $n->read ? 'opacity-60' : '' }}">
                <div class="mt-1.5 w-2 h-2 rounded-full {{ $n->read ? 'bg-slate-300' : 'bg-indigo-500' }}"></div>
                <div class="flex-1">
                    <p class="text-sm text-slate-800">{{ $n->message }}</p>
                    <p class="text-xs text-slate-400 mt-1">{{ $n->created_at->diffForHumans() }}</p>
                    @if ($n->url)
                        <a href="{{ $n->url }}" class="text-xs text-indigo-600 mt-1 inline-block font-medium">Open →</a>
                    @endif
                </div>
                @unless ($n->read)
                    <form method="POST" action="{{ route('notifications.read', $n) }}">
                        @csrf
                        <button class="btn btn-outline btn-sm">Mark read</button>
                    </form>
                @endunless
            </div>
            @empty
            <div class="card-body">
                <div class="empty-state">
                    <div class="empty-state-icon">🔔</div>
                    <div class="empty-state-title">No Notifications</div>
                    <p class="empty-state-text">You're all caught up.</p>
                </div>
            </div>
            @endforelse
        </div>
        @if ($notifications->hasPages())
            <div class="card-footer">{{ $notifications->links() }}</div>
        @endif
    </div>
</x-app-layout>
