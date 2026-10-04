<x-app-layout hris>
    <x-slot name="title">Benefits</x-slot>

    <div class="page-container">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-900">Benefits</h1>
            <p class="mt-2 text-slate-600">Manage benefit types and employee benefit assignments</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Master benefits --}}
            <div class="card">
                <div class="card-header">
                    <h2 class="font-semibold text-slate-900">Benefit Types</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('benefits.store') }}" class="space-y-3 mb-5">
                        @csrf
                        <div>
                            <label class="input-label">Name</label>
                            <input name="name" placeholder="e.g. Rice Allowance" class="input" required>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <label class="input-label">Type</label>
                                <select name="type" class="input">
                                    <option value="allowance">Allowance</option>
                                    <option value="incentive">Incentive</option>
                                    <option value="bonus">Bonus</option>
                                </select>
                            </div>
                            <div>
                                <label class="input-label">Frequency</label>
                                <select name="frequency" class="input">
                                    <option value="monthly">Monthly</option>
                                    <option value="yearly">Yearly</option>
                                    <option value="one_time">One-time</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex gap-2 items-end">
                            <div class="flex-1">
                                <label class="input-label">Amount</label>
                                <input type="number" step="0.01" name="amount" placeholder="Amount" class="input" required>
                            </div>
                            <label class="flex items-center gap-1 text-xs text-slate-600 pb-2.5">
                                <input type="checkbox" name="is_taxable" value="1" class="rounded border-slate-300"> Taxable
                            </label>
                        </div>
                        <button class="btn btn-primary w-full">Add Benefit Type</button>
                    </form>
                    <div class="space-y-2 max-h-72 overflow-y-auto">
                        @forelse ($benefits as $b)
                        <div class="flex items-center justify-between border-b border-slate-100 py-2">
                            <div>
                                <p class="font-medium text-slate-900 text-sm">{{ $b->name }}</p>
                                <p class="text-xs text-slate-400">{{ $b->type }} · ₱{{ number_format($b->amount, 2) }} · {{ $b->frequency }}</p>
                            </div>
                            <form method="POST" action="{{ route('benefits.destroy', $b) }}" data-confirm="Remove benefit type?">
                                @csrf @method('DELETE')
                                <button type="submit" class="shrink-0 text-sm font-medium text-red-600 hover:text-red-700" title="Delete benefit type" aria-label="Delete {{ $b->name }}">Delete</button>
                            </form>
                        </div>
                        @empty
                        <div class="empty-state">
                            <div class="empty-state-title">No Benefits</div>
                            <p class="empty-state-text">Add your first benefit type.</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>

            {{-- Assignments --}}
            <div class="lg:col-span-2 card">
                <div class="card-header">
                    <h2 class="font-semibold text-slate-900">Benefit Assignments</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('benefits.assign') }}" class="grid grid-cols-2 md:grid-cols-5 gap-3 mb-5 items-end">
                        @csrf
                        <div class="col-span-2">
                            <x-typeahead
                                name="employee_id"
                                label="Employee"
                                placeholder="Type a name or ID…"
                                required
                                :value="old('employee_id', '')"
                                :items="$employees->map(fn ($e) => [
                                    'id' => $e->id,
                                    'text' => $e->employee_id.' — '.$e->full_name,
                                    'label' => $e->full_name,
                                    'meta' => $e->employee_id,
                                ])->values()" />
                        </div>
                        <div>
                            <label class="input-label">Benefit</label>
                            <select name="benefit_id" class="input" required>
                                @foreach ($benefits as $b)<option value="{{ $b->id }}">{{ $b->name }}</option>@endforeach
                            </select>
                        </div>
                        <div>
                            <label class="input-label">Effective</label>
                            <input type="date" name="effective_date" value="{{ now()->format('Y-m-d') }}" class="input" required>
                        </div>
                        <button class="btn btn-primary">Assign</button>
                    </form>

                    <form method="GET" class="grid w-full min-w-0 grid-cols-1 gap-2 items-end mb-5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-[1.25fr_1.4fr_1.1fr_1fr_auto]">
                        @include('partials.employee-filters')
                        <button class="btn btn-primary w-full sm:w-auto">Filter</button>
                    </form>

                    <div class="table-container">
                        <table class="data-table">
                            <thead class="table-head">
                                <tr>
                                    <th class="table-head-cell">Employee</th>
                                    <th class="table-head-cell">Benefit</th>
                                    <th class="table-head-cell text-right">Amount</th>
                                    <th class="table-head-cell">Effective</th>
                                    <th class="table-head-cell text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($assignments as $a)
                                <tr class="table-body-row">
                                    <td class="table-body-cell">
                                        <span class="font-medium text-slate-900">{{ $a->employee->full_name }}</span>
                                        <p class="text-xs text-slate-400">{{ $a->employee->employee_id }}</p>
                                    </td>
                                    <td class="table-body-cell">{{ $a->benefit->name }}</td>
                                    <td class="table-body-cell text-right font-medium">₱{{ number_format($a->effective_amount, 2) }}</td>
                                    <td class="table-body-cell text-slate-500">{{ $a->effective_date?->format('M d, Y') }}</td>
                                    <td class="table-body-cell text-right">
                                        <form method="POST" action="{{ route('benefits.revoke', $a) }}" data-confirm="Revoke?">
                                            @csrf @method('DELETE')
                                            <button class="text-red-500 hover:text-red-700 text-sm">✕</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="table-body-cell">
                                        <div class="empty-state py-8">
                                            <div class="empty-state-title">No Assignments</div>
                                            <p class="empty-state-text">Assign a benefit to an employee.</p>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @if ($assignments->hasPages())
                        <div class="card-footer">{{ $assignments->links() }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
