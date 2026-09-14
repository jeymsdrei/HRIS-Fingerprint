<?php

namespace App\Http\Controllers;

use App\Models\Clearance;
use App\Models\Course;
use App\Models\Department;
use App\Models\Employee;
use App\Models\EmployeeClearance;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $employees = Employee::with(['department', 'position', 'course', 'user'])
            ->when($request->search, fn ($q, $s) => $q->where(fn ($w) => $w
                ->where('employee_id', 'like', "%{$s}%")
                ->orWhere('first_name', 'like', "%{$s}%")
                ->orWhere('last_name', 'like', "%{$s}%")
                ->orWhere('email', 'like', "%{$s}%")))
            ->when($request->department_id, fn ($q, $id) => $q->where('department_id', $id))
            ->when($request->classification, fn ($q, $c) => $q->where('classification', $c))
            ->when($request->employment_status, fn ($q, $s) => $q->where('employment_status', $s))
            ->orderBy('last_name')
            ->paginate(15)
            ->withQueryString();

        $departments = Department::orderBy('name')->get();

        return view('employees.index', compact('employees', 'departments'));
    }

    public function create()
    {
        $departments = Department::orderBy('name')->get();
        $positions = Position::orderBy('name')->get();
        $courses = Course::where('is_active', true)->orderBy('code')->get();

        return view('employees.form', ['employee' => new Employee, 'departments' => $departments, 'positions' => $positions, 'courses' => $courses, 'users' => $this->unassignedUsers()]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        $data['employee_id'] = $this->nextEmployeeId($request->classification);

        $employee = Employee::create($data);

        $this->initializeClearances($employee);
        $this->syncLoginAccount($employee, $request);

        return redirect()->route('employees.show', $employee)->with('success', 'Employee registered successfully.');
    }

    public function show(Employee $employee)
    {
        $employee->load([
            'department',
            'position',
            'course',
            'teachingSchedules.subject',
            'teachingSchedules.room',
            'workSchedules',
            'clearances.clearance',
            'benefits.benefit',
            'loans',
            'user',
            'makeUpClasses' => fn ($query) => $query
                ->with('subject')
                ->where('approval_status', 'approved')
                ->latest('class_date')
                ->latest('start_time'),
        ]);

        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $departments = Department::orderBy('name')->get();
        $positions = Position::orderBy('name')->get();
        $courses = Course::where('is_active', true)->orderBy('code')->get();
        $users = User::whereNull('employee_id')->orWhere('employee_id', $employee->id)->orderBy('name')->get();

        return view('employees.form', compact('employee', 'departments', 'positions', 'courses', 'users'));
    }

    public function update(Request $request, Employee $employee)
    {
        $data = $this->validated($request, $employee);
        $employee->update($data);

        $this->syncLoginAccount($employee, $request);

        return redirect()->route('employees.show', $employee)->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->update(['is_active' => false]);
        $employee->user?->update(['is_active' => false]);

        return redirect()->route('employees.index')->with('success', 'Employee deactivated.');
    }

    public function reactivate(Employee $employee)
    {
        $employee->update(['is_active' => true]);
        $employee->user?->update(['is_active' => true]);

        return back()->with('success', 'Employee reactivated.');
    }

    private function validated(Request $request, ?Employee $employee = null): array
    {
        $data = $request->validate([
            'department_id' => 'nullable|exists:departments,id',
            'position_id' => 'nullable|exists:positions,id',
            'course_id' => 'nullable|exists:courses,id',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'suffix' => 'nullable|string|max:10',
            'birth_date' => 'nullable|date',
            'gender' => 'nullable|in:male,female',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:30',
            'address' => 'nullable|string|max:500',
            'classification' => 'required|in:teaching,non_teaching',
            'employment_status' => 'required|in:permanent,contractual',
            'salary_type' => 'required|in:monthly,daily',
            'monthly_salary' => 'nullable|numeric|min:0',
            'semi_monthly_salary' => 'nullable|numeric|min:0',
            'daily_rate' => 'nullable|numeric|min:0',
            'hourly_rate' => 'nullable|numeric|min:0',
            'teaching_load' => 'nullable|numeric|min:0',
            'fingerprint_id' => 'nullable|integer',
            'sss_no' => 'nullable|string|max:30',
            'philhealth_no' => 'nullable|string|max:30',
            'pagibig_no' => 'nullable|string|max:30',
            'tin' => 'nullable|string|max:30',
            'tax_status' => 'nullable|string|max:30',
            'bank_name' => 'nullable|string|max:100',
            'bank_account_no' => 'nullable|string|max:50',
            'payment_method' => 'nullable|in:cash,bank_transfer,check',
            'date_hired' => 'nullable|date',
            'login_username' => 'nullable|string|lowercase|alpha_dash|max:255',
            'login_password' => 'nullable|string|min:6',
        ]);

        foreach (['monthly_salary', 'semi_monthly_salary', 'daily_rate', 'hourly_rate', 'teaching_load'] as $field) {
            if (array_key_exists($field, $data) && $data[$field] === null) {
                $data[$field] = 0;
            }
        }

        return $data;
    }

    private function initializeClearances(Employee $employee): void
    {
        foreach (Clearance::all() as $clearance) {
            EmployeeClearance::firstOrCreate(
                ['employee_id' => $employee->id, 'clearance_id' => $clearance->id],
                ['status' => 'pending']
            );
        }
    }

    private function nextEmployeeId(string $classification): string
    {
        $prefix = $classification === 'teaching' ? 'T' : 'N';
        $max = Employee::where('employee_id', 'like', $prefix.'-%')
            ->orderByDesc('employee_id')
            ->value('employee_id');
        $num = $max ? ((int) substr($max, 2)) + 1 : 1;

        return $prefix.'-'.str_pad((string) $num, 4, '0', STR_PAD_LEFT);
    }

    private function unassignedUsers()
    {
        return User::whereNull('employee_id')->where('role', 'employee')->orderBy('name')->get();
    }

    private function syncLoginAccount(Employee $employee, Request $request): void
    {
        if (! $request->filled('login_username')) {
            return;
        }

        $user = User::firstOrNew(['employee_id' => $employee->id]);
        $user->name = $employee->full_name;
        $user->username = strtolower(trim((string) $request->login_username));
        $user->role = $employee->classification === 'teaching' ? 'employee' : 'employee';
        $user->employee_id = $employee->id;
        if ($request->filled('login_password')) {
            $user->password = $request->login_password;
        } elseif (! $user->exists) {
            throw ValidationException::withMessages([
                'login_password' => 'A password is required when creating a login account.',
            ]);
        }
        $user->save();
    }
}
