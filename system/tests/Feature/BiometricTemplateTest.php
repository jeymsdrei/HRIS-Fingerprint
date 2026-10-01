<?php

namespace Tests\Feature;

use App\Models\Department;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BiometricTemplateTest extends TestCase
{
    use RefreshDatabase;

    private function createEmployee(string $code = 'T-0001', ?int $fingerprintId = null): Employee
    {
        $department = Department::create(['name' => 'Test Dept']);

        return Employee::create([
            'employee_id' => $code,
            'first_name' => 'Test',
            'last_name' => 'User',
            'classification' => 'non_teaching',
            'department_id' => $department->id,
            'fingerprint_id' => $fingerprintId,
        ]);
    }

    public function test_template_upload_stores_base64_template(): void
    {
        $employee = $this->createEmployee('T-0001', 7);

        $response = $this->postJson('/api/device/template', [
            'token' => 'hris-device-token',
            'fingerprint_id' => 7,
            'template_base64' => 'QUJDREVGR0hJ',
        ]);

        $response->assertOk();
        $response->assertJson(['ok' => true, 'fingerprint_id' => 7]);
        $this->assertSame('QUJDREVGR0hJ', $employee->fresh()->fingerprint_template);
    }

    public function test_template_upload_rejects_bad_token(): void
    {
        $this->createEmployee('T-0001', 7);

        $this->postJson('/api/device/template', [
            'token' => 'wrong-token',
            'fingerprint_id' => 7,
            'template_base64' => 'QUJDREVGR0hJ',
        ])->assertUnauthorized();
    }

    public function test_template_upload_rejects_unknown_fingerprint(): void
    {
        $response = $this->postJson('/api/device/template', [
            'token' => 'hris-device-token',
            'fingerprint_id' => 9999,
            'template_base64' => 'QUJDREVGR0hJ',
        ]);

        $response->assertOk()->assertJsonPath('ok', false);
    }

    public function test_deactivation_preserves_stored_template(): void
    {
        $employee = $this->createEmployee('T-0001', 7);
        $employee->update(['fingerprint_template' => 'QUJDREVGR0hJ']);
        $admin = User::factory()->create(['role' => 'admin', 'is_active' => true]);
        auth()->login($admin);

        $this->delete(route('employees.destroy', $employee), [], ['Accept' => 'application/json'])->assertOk();

        $employee = $employee->fresh();
        $this->assertFalse($employee->is_active);
        $this->assertSame(7, $employee->fingerprint_id);
        $this->assertSame('QUJDREVGR0hJ', $employee->fingerprint_template);
    }

    public function test_reactivation_keeps_fingerprint_and_template(): void
    {
        $employee = $this->createEmployee('T-0001', 7);
        $employee->update(['fingerprint_template' => 'QUJDREVGR0hJ', 'is_active' => false]);
        $admin = User::factory()->create(['role' => 'admin', 'is_active' => true]);
        auth()->login($admin);

        $this->post(route('employees.reactivate', $employee))->assertRedirect();

        $employee = $employee->fresh();
        $this->assertTrue($employee->is_active);
        $this->assertSame(7, $employee->fingerprint_id);
        $this->assertSame('QUJDREVGR0hJ', $employee->fingerprint_template);
    }

    public function test_employees_endpoint_returns_template_base64_when_enrolled(): void
    {
        $this->createEmployee('T-0001', 7)
            ->update(['fingerprint_template' => 'QUJDREVGR0hJ']);

        $response = $this->getJson('/api/device/employees?token=hris-device-token');

        $response->assertOk();
        $data = collect($response->json('employees'))->firstWhere('fingerprint_id', 7);
        $this->assertNotNull($data);
        $this->assertSame('QUJDREVGR0hJ', $data['template_base64']);
    }

    public function test_assign_fingerprint_returns_stored_template(): void
    {
        $this->createEmployee('T-0001', 7)
            ->update(['fingerprint_template' => 'QUJDREVGR0hJ']);

        $response = $this->postJson('/api/device/assign-fingerprint', [
            'token' => 'hris-device-token',
            'employee_id' => 'T-0001',
        ]);

        $response->assertOk();
        $response->assertJson([
            'ok' => true,
            'fingerprint_id' => 7,
            'template_base64' => 'QUJDREVGR0hJ',
        ]);
    }
}
