<x-app-layout hris>
    <x-slot name="title">{{ $employee->is_teaching ? 'My Make-Up Classes' : '' }}</x-slot>

    @if ($employee->is_teaching)
    <div class="page-container space-y-6">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-900">My Make-Up Classes</h1>
            <p class="mt-2 text-slate-600">Request a make-up class and track its approval status</p>
        </div>

        <div class="card">
            <div class="card-header"><h2 class="font-semibold text-slate-900">Request Make-Up Class</h2></div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-lg">
                        <div class="font-semibold text-red-800">Please fix the following errors:</div>
                        <ul class="mt-2 list-disc list-inside text-red-700 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('employee.makeup.store') }}" class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    @csrf
                    <div>
                        <label for="subject_id" class="input-label">Subject / Class</label>
                        <select id="subject_id" name="subject_id" class="input w-full">
                            <option value="">Select a subject (optional)</option>
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}" @selected(old('subject_id') == $subject->id)>{{ $subject->code }} — {{ $subject->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="class_date" class="input-label">Date</label>
                        <input id="class_date" type="date" name="class_date" min="{{ now()->toDateString() }}" value="{{ old('class_date') }}" class="input w-full" required>
                        @error('class_date')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="start_time" class="input-label">Start time</label>
                        <input id="start_time" type="time" name="start_time" value="{{ old('start_time') }}" class="input w-full" required>
                        @error('start_time')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="end_time" class="input-label">End time</label>
                        <input id="end_time" type="time" name="end_time" value="{{ old('end_time') }}" class="input w-full" required>
                        @error('end_time')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-2 lg:col-span-3">
                        <label for="reason" class="input-label">Reason</label>
                        <input id="reason" name="reason" value="{{ old('reason') }}" maxlength="1000" class="input w-full" placeholder="Why is this class being made up?">
                        @error('reason')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex items-end">
                        <button class="btn btn-primary w-full sm:w-auto">Submit Request</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header"><h2 class="font-semibold text-slate-900">My Requests</h2></div>
            <div class="table-container">
                <table class="data-table">
                    <thead class="table-head">
                        <tr>
                            <th class="table-head-cell">Date</th>
                            <th class="table-head-cell">Subject</th>
                            <th class="table-head-cell">Time</th>
                            <th class="table-head-cell">Hours Rendered</th>
                            <th class="table-head-cell">Additional Pay</th>
                            <th class="table-head-cell">Status</th>
                            <th class="table-head-cell">Reason / Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($makeUpClasses as $makeUpClass)
                            <tr class="table-body-row">
                                <td class="table-body-cell">{{ $makeUpClass->class_date->format('M d, Y') }}</td>
                                <td class="table-body-cell">{{ $makeUpClass->subject?->name ?? '—' }}</td>
                                <td class="table-body-cell text-slate-500">{{ $makeUpClass->start_time->format('h:i A') }} – {{ $makeUpClass->end_time->format('h:i A') }}</td>
                                <td class="table-body-cell">{{ $makeUpClass->hours_rendered }}h</td>
                                <td class="table-body-cell font-medium text-emerald-600">₱{{ number_format($makeUpClass->additional_pay, 2) }}</td>
                                <td class="table-body-cell">
                                    <span class="badge {{ $makeUpClass->approval_status === 'approved' ? 'badge-success' : ($makeUpClass->approval_status === 'pending' ? 'badge-warning' : 'badge-danger') }}">{{ $makeUpClass->status_label }}</span>
                                </td>
                                <td class="table-body-cell text-sm">
                                    @if ($makeUpClass->reason)<p>{{ $makeUpClass->reason }}</p>@endif
                                    @if ($makeUpClass->remarks)<p class="mt-1 text-slate-500">Reviewer: {{ $makeUpClass->remarks }}</p>@endif
                                    @if (! $makeUpClass->reason && ! $makeUpClass->remarks)<span class="text-slate-400">—</span>@endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="table-body-cell">
                                    <div class="empty-state py-12">
                                        <div class="empty-state-title">No Make-Up Class Requests</div>
                                        <p class="empty-state-text">Your requests and their approval status will appear here.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($makeUpClasses->hasPages())
                <div class="card-footer">{{ $makeUpClasses->links() }}</div>
            @endif
        </div>
    </div>
    @endif
</x-app-layout>