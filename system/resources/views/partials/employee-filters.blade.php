<div class="w-full min-w-0 sm:w-auto">
    <select name="department_id" class="input w-full min-w-0">
        <option value="">All Departments</option>
        @foreach ($departments as $d)<option value="{{ $d->id }}" @selected(request('department_id') == $d->id)>{{ $d->name }}</option>@endforeach
    </select>
</div>
<div class="w-full min-w-0 sm:w-auto">
    <select name="classification" class="input w-full min-w-0">
        <option value="">Teaching / Non-Teaching</option>
        <option value="teaching" @selected(request('classification') == 'teaching')>Teaching</option>
        <option value="non_teaching" @selected(request('classification') == 'non_teaching')>Non-Teaching</option>
    </select>
</div>
<div class="w-full min-w-0 sm:w-auto">
    <select name="employment_status" class="input w-full min-w-0">
        <option value="">All Status</option>
        <option value="permanent" @selected(request('employment_status') == 'permanent')>Permanent</option>
        <option value="contractual" @selected(request('employment_status') == 'contractual')>Contractual</option>
    </select>
</div>
