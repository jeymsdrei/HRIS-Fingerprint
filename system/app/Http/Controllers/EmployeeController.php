<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Attendance;
use App\Models\AttendanceLog;
use App\Models\BiometricDevice;
use App\Models\Clearance;
use App\Models\Course;
use App\Models\Department;
use App\Models\Employee;
use App\Models\EmployeeBenefit;
use App\Models\EmployeeClearance;
use App\Models\Loan;
use App\Models\MakeUpClass;
use App\Models\Payroll;
use App\Models\PayrollReceipt;
use App\Models\Payslip;
use App\Models\Position;
use App\Models\TeachingSchedule;
use App\Models\User;
use App\Models\WorkSchedule;
use App\Services\BiometricService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $employees = Employee::with(['department', 'position', 'course', 'user'])
            ->orderBy('last_name')
            ->get();

        $departments = Department::orderBy('name')->get();

        return view('employees.index', compact('employees', 'departments'));
    }

    public function create()
    {
        $departments = Department::orderBy('name')->get();
        $positions = Position::orderBy('name')->get();
        $courses = Course::where('is_active', true)->orderBy('code')->get();
        $nextTeachingId = $this->nextEmployeeId('teaching');
        $nextNonTeachingId = $this->nextEmployeeId('non_teaching');

        return view('employees.form', [
            'employee' => new Employee,
            'departments' => $departments,
            'positions' => $positions,
            'courses' => $courses,
            'users' => $this->unassignedUsers(),
            'nextTeachingId' => $nextTeachingId,
            'nextNonTeachingId' => $nextNonTeachingId,
        ]);
    }

    public function store(StoreEmployeeRequest $request)
    {
        $token = $request->string('registration_token')->toString();
        $lock = Cache::lock("employee-registration:{$token}", 10);

        if (! $lock->get()) {
            return back()->withInput()->withErrors([
                'registration' => 'This registration is already being processed. Please wait a moment.',
            ]);
        }

        try {
            $processedKey = "employee-registration-processed:{$token}";
            $processedEmployeeId = Cache::get($processedKey);
            if ($processedEmployeeId) {
                $processedEmployee = Employee::find($processedEmployeeId);

                if ($processedEmployee) {
                    return redirect()->route('employees.show', $processedEmployee)
                        ->with('success', 'Employee registration was already completed.');
                }
            }

            $data = $this->validated($request);
            $photo = $data['photo'] ?? null;
            unset($data['photo']);
            unset($data['registration_token']);

            $data['employee_id'] = $this->nextEmployeeId($request->classification);

            $employee = Employee::create($data);

            $this->storeEmployeePhoto($employee, $photo);

            $this->initializeClearances($employee);
            $this->syncLoginAccount($employee, $request);
            Cache::put($processedKey, $employee->id, now()->addMinutes(10));

            return redirect()->route('employees.show', $employee)->with('success', 'Employee registered successfully.');
        } finally {
            $lock->release();
        }
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

    public function update(StoreEmployeeRequest $request, Employee $employee)
    {
        $data = $this->validated($request, $employee);
        $photo = $data['photo'] ?? null;
        unset($data['photo']);
        $employee->update($data);

        $this->storeEmployeePhoto($employee, $photo);

        $this->syncLoginAccount($employee, $request);

        return redirect()->route('employees.show', $employee)->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->update(['is_active' => false]);
        $employee->user?->update(['is_active' => false]);

        if (request()->expectsJson()) {
            return response()->json([
                'ok' => true,
                'message' => 'Employee deactivated. Their login and record are preserved.',
            ]);
        }

        return redirect()->route('employees.index')->with('success', 'Employee deactivated. Their login and record are preserved.');
    }

    public function reactivate(Employee $employee)
    {
        $employee->update(['is_active' => true]);
        $employee->user?->update(['is_active' => true]);

        return back()->with('success', 'Employee reactivated.');
    }

    public function delete(Employee $employee)
    {
        $fingerprintId = $employee->fingerprint_id;

        $devices = BiometricDevice::where('is_active', true)->where('status', 'online')->get();
        foreach ($devices as $device) {
            if ($fingerprintId) {
                app(BiometricService::class)->deleteFingerprint($device, $fingerprintId);
            }
        }

        DB::transaction(function () use ($employee) {
            $employee->teachingSchedules()->delete();
            $employee->workSchedules()->delete();
            $employee->attendances()->delete();
            $employee->makeUpClasses()->delete();
            $employee->clearances()->delete();
            $employee->benefits()->delete();
            $employee->loans()->delete();
            $employee->payrolls()->delete();
            $employee->payslips()->delete();
            $employee->payrollReceipts()->delete();

            AttendanceLog::where('employee_id', $employee->id)->delete();

            $employee->user?->delete();

            $employee->delete();
        });

        if (request()->expectsJson()) {
            return response()->json([
                'ok' => true,
                'message' => 'Employee permanently deleted.',
            ]);
        }

        return redirect()->route('employees.index')->with('success', 'Employee permanently deleted.');
    }

    private function validated(StoreEmployeeRequest $request, ?Employee $employee = null): array
    {
        $data = $request->validated();

        foreach (['monthly_salary', 'semi_monthly_salary', 'daily_rate', 'hourly_rate', 'teaching_load'] as $field) {
            if (array_key_exists($field, $data) && $data[$field] === null) {
                $data[$field] = 0;
            }
        }

        return $data;
    }

    /**
     * Store the uploaded picture on the public disk and retain only its path
     * in employees.photo_path. Device photo sync is intentionally not called
     * here because the current ZKTeco TCP integration has no photo API.
     */
    private function storeEmployeePhoto(Employee $employee, mixed $photo): void
    {
        if (! $photo) {
            return;
        }

        $oldPath = $employee->photo_path;
        $path = $photo->store('employee-photos', 'public');
        $employee->update(['photo_path' => $path]);

        if ($oldPath && $oldPath !== $path) {
            Storage::disk('public')->delete($oldPath);
        }
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
        $max = (int) Employee::where('employee_id', 'like', $prefix.'-%')
            ->get('employee_id')
            ->map(fn ($e) => (int) substr($e->employee_id, 2))
            ->max();

        return $prefix.'-'.str_pad((string) ($max + 1), 4, '0', STR_PAD_LEFT);
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

        $username = strtolower(trim((string) $request->login_username));

        $existingByEmail = User::where('email', $employee->email)
            ->where('employee_id', '!=', $employee->id)
            ->first();

        if ($existingByEmail) {
            $existingByEmail->employee_id = $employee->id;
            $existingByEmail->name = $employee->full_name;
            $existingByEmail->username = $username;
            $existingByEmail->role = 'employee';
            if ($request->filled('login_password')) {
                $existingByEmail->password = $request->login_password;
            }
            $existingByEmail->save();
            return;
        }

        $existingByUsername = User::where('username', $username)
            ->where('employee_id', '!=', $employee->id)
            ->first();

        if ($existingByUsername) {
            throw ValidationException::withMessages([
                'login_username' => 'This username is already taken.',
            ]);
        }

        $user = User::firstOrNew(['employee_id' => $employee->id]);
        $user->name = $employee->full_name;
        $user->email = $employee->email;
        $user->username = $username;
        $user->role = 'employee';
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
