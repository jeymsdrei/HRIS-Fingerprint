<x-app-layout hris>
    <x-slot name="title">Clearances (Teaching Personnel)</x-slot>

    <div class="page-container space-y-6">
        {{-- Page Header --}}
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-900">Clearances</h1>
            <p class="mt-2 text-slate-600">Manage teaching personnel clearances for payroll release</p>
        </div>

        {{-- Filters --}}
        <div class="card">
            <div class="card-body">
                <form method="GET" class="flex flex-wrap gap-3 items-end">
                    @include('partials.employee-filters')
                    <div>
                        <label class="input-label">Clearance Type</label>
                        <select name="clearance_id" class="input">
                            <option value="">All Clearance Types</option>
                            @foreach ($clearances as $c)<option value="{{ $c->id }}" @selected(request('clearance_id') == $c->id)>{{ $c->name }}</option>@endforeach
                        </select>
                    </div>
                    <div>
                        <label class="input-label">Status</label>
                        <select name="status" class="input">
                            <option value="">All Status</option>
                            <option value="cleared" @selected(request('status') == 'cleared')>Cleared</option>
                            <option value="pending" @selected(request('status') == 'pending')>Pending</option>
                        </select>
                    </div>
                    <div>
                        <label class="input-label">Search</label>
                        <input name="search" value="{{ request('search') }}" placeholder="Employee name / ID" class="input w-48">
                    </div>
                    <button class="btn btn-primary">Filter</button>
                </form>
            </div>
        </div>

        @forelse ($perEmployee as $employeeId => $rows)
            @php
                $emp = $rows->first()->employee;
                $clearedCount = $rows->where('status', 'cleared')->count();
                $requiredIds = $clearances->where('is_required', true)->pluck('id');
                $clearedIds = $rows->where('status', 'cleared')->pluck('clearance_id');
                $complete = $requiredIds->diff($clearedIds)->isEmpty();
            @endphp
            <div class="card">
                <div class="card-header flex items-center justify-between">
                    <div>
                        <h2 class="font-semibold text-slate-900">{{ $emp->full_name }}
                            <span class="text-xs text-slate-400 font-normal ml-1">{{ $emp->employee_id }} · {{ $emp->department?->name }}</span>
                        </h2>
                        <p class="text-xs text-slate-500 mt-1">{{ $clearedCount }}/{{ $clearances->count() }} cleared</p>
                    </div>
                    <span class="badge {{ $complete ? 'badge-success' : 'badge-danger' }}">
                        {{ $complete ? 'CLEARED — Payroll can release' : 'PENDING — Payroll on hold' }}
                    </span>
                </div>
                <div class="card-body">
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-3">
                        @foreach ($rows as $r)
                            <form method="POST" action="{{ route('clearances.toggle') }}" class="rounded-card border p-3 {{ $r->status === 'cleared' ? 'border-green-200 bg-green-50/40' : 'border-slate-200' }}">
                                @csrf
                                <input type="hidden" name="employee_id" value="{{ $emp->id }}">
                                <input type="hidden" name="clearance_id" value="{{ $r->clearance_id }}">
                                <p class="text-xs font-medium text-slate-700 mb-1">{{ $r->clearance->name }}</p>
                                <p class="text-[11px] text-slate-400 mb-2">{{ $r->cleared_at?->format('M d, Y') ?? 'Not yet cleared' }}</p>
                                @if ($r->status === 'cleared')
                                    <button type="button" class="w-full text-xs font-medium btn btn-success" disabled>Approved</button>
                                @else
                                    <button name="status" value="cleared" class="w-full text-xs font-medium btn btn-primary">Mark Cleared</button>
                                @endif
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        @empty
            <div class="card">
                <div class="card-body">
                    <div class="empty-state">
                        <div class="empty-state-icon">📋</div>
                        <div class="empty-state-title">No Clearance Records</div>
                        <p class="empty-state-text">No clearance records found. Record clearances from an employee's profile.</p>
                    </div>
                </div>
            </div>
        @endforelse
    </div>
</x-app-layout>
