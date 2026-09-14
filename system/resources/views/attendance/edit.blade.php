<x-app-layout hris>
    <x-slot name="title">Correct Attendance</x-slot>

    <div class="page-container">
        <div class="max-w-lg">
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-slate-900">Correct Attendance</h1>
                <p class="mt-2 text-slate-600">{{ $attendance->employee->full_name }} · {{ $attendance->date->format('l, F d, Y') }} · Status: <span class="badge badge-info">{{ $attendance->status_label }}</span></p>
            </div>

<form method="POST" action="{{ route('attendance.update', $attendance) }}" class="card">
            @csrf @method('PUT')
            <div class="card-body space-y-4">
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="input-label">Time In</label>
                        <input type="time" name="time_in" value="{{ $attendance->time_in?->format('H:i') }}" class="input">
                    </div>
                    <div>
                        <label class="input-label">Time Out</label>
                        <input type="time" name="time_out" value="{{ $attendance->time_out?->format('H:i') }}" class="input">
                    </div>
                </div>
                @php
                    $remarksByStatus = [
                        'present' => 'Present',
                        'late' => 'Late',
                        'absent' => 'Absent',
                    ];
                    $selectedRemark = in_array($attendance->remarks, $remarksByStatus, true)
                        ? $attendance->remarks
                        : ($remarksByStatus[$attendance->status] ?? '');
                @endphp
                <div>
                    <label for="remarks" class="input-label">Remarks (affects attendance status)</label>
                    <select id="remarks" name="remarks" class="input" required>
                        @foreach ($remarksByStatus as $status => $label)
                            <option value="{{ $label }}" @selected($selectedRemark === $label)>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <p class="text-xs text-slate-400">Saving recomputes working hours, late, undertime and overtime against the assigned schedule.</p>
                <div class="flex gap-3">
                    <button class="btn btn-primary">Save & Recompute</button>
                    <a href="{{ route('attendance.index', ['date' => $attendance->date->format('Y-m-d')]) }}" class="btn btn-secondary">Cancel</a>
                </div>
            </div>
        </form>
        </div>
    </div>
</x-app-layout>
