<?php

namespace App\Http\Controllers;

use App\Models\Clearance;
use App\Models\Department;
use App\Models\Employee;
use App\Models\EmployeeClearance;
use App\Models\Payroll;
use Illuminate\Http\Request;

class ClearanceController extends Controller
{
    public function index(Request $request)
    {
        $clearances = Clearance::orderBy('name')->get();

        $query = EmployeeClearance::with(['employee.department', 'clearance', 'clearedBy'])
            ->when($request->clearance_id, fn ($q, $id) => $q->where('clearance_id', $id))
            ->when($request->status, fn ($q, $s) => $q->where('status', $s))
            ->when($request->department_id, fn ($q, $id) => $q->whereHas('employee', fn ($w) => $w->where('department_id', $id)))
            ->when($request->classification, fn ($q, $c) => $q->whereHas('employee', fn ($w) => $w->where('classification', $c)))
            ->when($request->employment_status, fn ($q, $s) => $q->whereHas('employee', fn ($w) => $w->where('employment_status', $s)))
            ->when($request->search, fn ($q, $s) => $q->whereHas('employee', fn ($w) => $w
                ->where('employee_id', 'like', "%{$s}%")
                ->orWhere('first_name', 'like', "%{$s}%")
                ->orWhere('last_name', 'like', "%{$s}%")));

        $perEmployee = $query->get()->groupBy('employee_id');

        $departments = Department::orderBy('name')->get();

        return view('clearances.index', compact('clearances', 'perEmployee', 'departments'));
    }

    public function toggleClearance(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'clearance_id' => 'required|in:'.implode(',', Clearance::pluck('id')->all()),
        ]);

        $employee = Employee::findOrFail($request->employee_id);
        $clearanceId = (int) $request->clearance_id;

        $record = EmployeeClearance::firstOrNew([
            'employee_id' => $employee->id,
            'clearance_id' => $clearanceId,
        ]);

        $isCleared = ! ($record->exists && $record->status === 'cleared');

        $record->fill([
            'status' => $isCleared ? 'cleared' : 'pending',
            'cleared_by' => $isCleared ? auth()->id() : null,
            'cleared_at' => $isCleared ? now() : null,
        ])->save();

        $this->syncPayrollHold($employee);

        return back()->with('success', 'Clearance updated.');
    }

    /**
     * Once an employee's required clearances are all cleared, release their
     * clearance-related on-hold payroll lines so the payroll status reflects
     * their clearance state without needing a manual regenerate.
     */
    private function syncPayrollHold(Employee $employee): void
    {
        if (! $employee->hasCompleteClearance()) {
            return;
        }

        Payroll::where('employee_id', $employee->id)
            ->where('status', Payroll::ON_HOLD)
            ->update([
                'status' => Payroll::READY,
                'hold_reason' => null,
            ]);
    }

    public function bulkSync(Request $request)
    {
        $request->validate(['employee_id' => 'required|exists:employees,id']);
        $employee = Employee::findOrFail($request->employee_id);
        $employeeId = $employee->id;

        foreach (Clearance::all() as $clearance) {
            EmployeeClearance::firstOrCreate(
                ['employee_id' => $employeeId, 'clearance_id' => $clearance->id],
                ['status' => 'pending']
            );
        }

        return back()->with('success', 'Clearance checklist initialized.');
    }
}
