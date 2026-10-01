<?php

namespace Tests\Feature;

use App\Models\Department;
use App\Models\Employee;
use App\Models\User;
use App\Services\BiometricService;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmployeeDeactivateTest extends TestCase
{
    use RefreshDatabase;

    private function createEmployee(bool $active = true, ?int $fingerprintId = null): Employee
    {
        $department = Department::create(['name' => 'Test Dept']);

        return Employee::create([
            'employee_id' => 'T-'.uniqid(),
            'first_name' => 'Test',
            'last_name' => 'User',
            'classification' => 'non_teaching',
            'department_id' => $department->id,
            'is_active' => $active,
            'fingerprint_id' => $fingerprintId,
        ]);
    }

    private function loginAdmin(): void
    {
        $admin = User::factory()->create(['role' => 'admin', 'is_active' => true]);
        auth()->login($admin);
    }

    public function test_deactivating_employee_preserves_record_and_fingerprint(): void
    {
        $employee = $this->createEmployee(fingerprintId: 42);
        $user = User::factory()->create(['role' => 'admin', 'employee_id' => $employee->id]);
        $this->loginAdmin();

        $response = $this->delete(route('employees.destroy', $employee), [], ['Accept' => 'application/json']);

        $response->assertOk();
        $response->assertJson(['ok' => true]);

        $employee = $employee->fresh();
        $this->assertFalse($employee->is_active);
        $this->assertSame(42, $employee->fingerprint_id);
        $this->assertFalse($user->fresh()->is_active);
        $this->assertDatabaseHas('employees', ['id' => $employee->id]);
    }

    public function test_deactivated_fingerprint_punches_are_ignored_until_reactivated(): void
    {
        $employee = $this->createEmployee(active: false, fingerprintId: 99);
        $this->loginAdmin();
        $service = app(BiometricService::class);
        $punch = [
            'fingerprint_id' => 99,
            'punch_time' => Carbon::now()->subMinutes(30)->format('Y-m-d H:i:s'),
        ];

        $this->assertFalse($service->persistPunch($punch));
        $this->assertDatabaseMissing('attendance_logs', ['employee_id' => $employee->id]);

        $this->post(route('employees.reactivate', $employee));

        $this->assertTrue($employee->fresh()->is_active);
        $this->assertTrue($service->persistPunch($punch));
        $this->assertDatabaseHas('attendance_logs', ['employee_id' => $employee->id]);
    }
}
