<x-app-layout hris>
    <x-slot name="title">My Attendance</x-slot>

    <div class="page-container space-y-6">
        {{-- Page Header --}}
        <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold text-slate-900">My Attendance</h1>
                <p class="mt-2 text-slate-600">{{ $employee->full_name }} · {{ $employee->employee_id }}</p>
            </div>
            <form method="GET" class="flex flex-wrap gap-2 items-end">
                <div>
                    <label class="input-label">From</label>
                    <input type="date" name="from" value="{{ request('from') }}" class="input">
                </div>
                <div>
                    <label class="input-label">To</label>
                    <input type="date" name="to" value="{{ request('to') }}" class="input">
                </div>
                <button class="btn btn-primary">Filter</button>
            </form>
        </div>

        {{-- Table --}}
        <div class="card">
            <div class="table-container">
                <table class="data-table">
                    <thead class="table-head">
                        <tr>
                            <th class="table-head-cell">Date</th>
                            <th class="table-head-cell">Status</th>
                            <th class="table-head-cell">Time In</th>
                            <th class="table-head-cell">Time Out</th>
                            <th class="table-head-cell">Working</th>
                            <th class="table-head-cell">Late</th>
                            <th class="table-head-cell">Undertime</th>
                            <th class="table-head-cell">Overtime</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($attendances as $a)
                        <tr class="table-body-row">
                            <td class="table-body-cell">{{ $a->date->format('D, M d, Y') }}</td>
                            <td class="table-body-cell">
                                @php
                                    $c = ['present' => 'badge-success', 'late' => 'badge-warning', 'absent' => 'badge-danger', 'leave' => 'badge-info', 'holiday' => 'badge-success', 'off' => 'badge-neutral'];
                                @endphp
                                <span class="badge {{ $c[$a->status] ?? 'badge-neutral' }}">{{ ucfirst($a->status) }}</span>
                            </td>
                            <td class="table-body-cell">{{ $a->time_in?->format('h:i A') ?? '—' }}</td>
                            <td class="table-body-cell">{{ $a->time_out?->format('h:i A') ?? '—' }}</td>
                            <td class="table-body-cell">{{ $a->working_hours ? number_format($a->working_hours, 2) . ' h' : '—' }}</td>
                            <td class="table-body-cell">{{ $a->late_minutes ? $a->late_minutes . ' min' : '—' }}</td>
                            <td class="table-body-cell">{{ $a->undertime_minutes ? $a->undertime_minutes . ' min' : '—' }}</td>
                            <td class="table-body-cell">{{ $a->overtime_minutes ? $a->overtime_minutes . ' min' : '—' }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="table-body-cell">
                                <div class="empty-state py-12">
                                    <div class="empty-state-icon">📅</div>
                                    <div class="empty-state-title">No Attendance Records</div>
                                    <p class="empty-state-text">No attendance records found for this period.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($attendances->hasPages())
                <div class="card-footer">{{ $attendances->links() }}</div>
            @endif
        </div>
    </div>
</x-app-layout>
