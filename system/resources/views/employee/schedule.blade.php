<x-app-layout hris>
    <x-slot name="title">My Schedule</x-slot>

    <div class="page-container space-y-6">
        {{-- Page Header --}}
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-900">My Schedule</h1>
            <p class="mt-2 text-slate-600">{{ $employee->full_name }} · {{ ucwords(str_replace('_', ' ', $employee->classification)) }}</p>
        </div>

        @if ($employee->classification === 'teaching')
        <div class="card">
            <div class="card-header">
                <h2 class="font-semibold text-slate-900">Teaching Schedule</h2>
            </div>
            <div class="table-container">
                <table class="data-table">
                    <thead class="table-head">
                        <tr><th class="table-head-cell">Day</th><th class="table-head-cell">Time</th><th class="table-head-cell">Subject</th><th class="table-head-cell">Room</th></tr>
                    </thead>
                    <tbody>
                        @forelse ($schedules as $s)
                        <tr class="table-body-row">
                            <td class="table-body-cell">{{ ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'][$s->day] ?? $s->day }}</td>
                            <td class="table-body-cell font-mono">{{ $s->start_time->format('h:i A') }} – {{ $s->end_time->format('h:i A') }}</td>
                            <td class="table-body-cell">{{ $s->subject->name ?? '—' }} <span class="text-xs text-slate-400">({{ $s->subject->code ?? '' }})</span></td>
                            <td class="table-body-cell">{{ $s->room->name ?? '—' }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="table-body-cell">
                                <div class="empty-state py-12">
                                    <div class="empty-state-icon">🗓️</div>
                                    <div class="empty-state-title">No Teaching Schedule</div>
                                    <p class="empty-state-text">No teaching schedule assigned.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @else
        <div class="card">
            <div class="card-header">
                <h2 class="font-semibold text-slate-900">Work Schedule</h2>
            </div>
            <div class="table-container">
                <table class="data-table">
                    <thead class="table-head">
                        <tr><th class="table-head-cell">Day</th><th class="table-head-cell">Time</th></tr>
                    </thead>
                    <tbody>
                        @forelse ($workSchedules as $s)
                        <tr class="table-body-row">
                            <td class="table-body-cell">{{ ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'][$s->day] ?? $s->day }}</td>
                            <td class="table-body-cell font-mono">{{ $s->start_time->format('h:i A') }} – {{ $s->end_time->format('h:i A') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="table-body-cell">
                                <div class="empty-state py-12">
                                    <div class="empty-state-icon">🗓️</div>
                                    <div class="empty-state-title">No Work Schedule</div>
                                    <p class="empty-state-text">No work schedule assigned.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </div>
</x-app-layout>
