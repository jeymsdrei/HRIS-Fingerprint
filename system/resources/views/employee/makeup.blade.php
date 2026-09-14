<x-app-layout hris>
    <x-slot name="title">My Make-Up Classes</x-slot>

    <div class="page-container space-y-6">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-900">My Make-Up Classes</h1>
            <p class="mt-2 text-slate-600">Approved make-up classes and additional compensation</p>
        </div>

        <div class="card">
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
                                <td class="table-body-cell"><span class="badge badge-success">Approved</span></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="table-body-cell">
                                    <div class="empty-state py-12">
                                        <div class="empty-state-icon">📚</div>
                                        <div class="empty-state-title">No Approved Make-Up Classes</div>
                                        <p class="empty-state-text">Approved make-up classes will appear here.</p>
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
</x-app-layout>