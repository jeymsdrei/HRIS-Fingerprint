<?php

namespace Tests\Feature;

use App\Models\Department;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserReactivateTest extends TestCase
{
    use RefreshDatabase;

    private function createEmployee(bool $active = true): Employee
    {
        $department = Department::create(['name' => 'Test Dept']);

        return Employee::create([
            'employee_id' => 'T-'.uniqid(),
            'first_name' => 'Test',
            'last_name' => 'User',
            'classification' => 'non_teaching',
            'department_id' => $department->id,
            'is_active' => $active,
        ]);
    }

    public function test_reactivating_an_inactive_user_toggles_user_and_employee_active(): void
    {
        $employee = $this->createEmployee(active: false);
        $user = User::factory()->create([
            'role' => 'admin',
            'is_active' => false,
            'employee_id' => $employee->id,
        ]);
        $admin = User::factory()->create(['role' => 'admin', 'is_active' => true]);
        auth()->login($admin);

        $this->delete(route('users.destroy', $user));

        $this->assertTrue($user->fresh()->is_active);
        $this->assertTrue($employee->fresh()->is_active);
    }

    public function test_reactivated_user_list_shows_deactivate_button_only(): void
    {
        $employee = $this->createEmployee(active: false);
        $user = User::factory()->create([
            'role' => 'admin',
            'is_active' => false,
            'employee_id' => $employee->id,
        ]);
        $admin = User::factory()->create(['role' => 'admin', 'is_active' => true]);
        auth()->login($admin);

        $this->delete(route('users.destroy', $user));

        $response = $this->get(route('users.index'));
        $response->assertOk();
        $response->assertSee('confirm-popup');
        $response->assertSee('Deactivate');
        $response->assertDontSee('Reactivate');
    }

    public function test_deactivating_an_active_user_toggles_user_and_employee_inactive(): void
    {
        $employee = $this->createEmployee(active: true);
        $user = User::factory()->create([
            'role' => 'admin',
            'is_active' => true,
            'employee_id' => $employee->id,
        ]);
        $admin = User::factory()->create(['role' => 'admin', 'is_active' => true]);
        auth()->login($admin);

        $this->delete(route('users.destroy', $user));

        $this->assertFalse($user->fresh()->is_active);
        $this->assertFalse($employee->fresh()->is_active);
    }

    public function test_deactivated_user_list_shows_reactivate_button(): void
    {
        $employee = $this->createEmployee(active: true);
        $user = User::factory()->create([
            'role' => 'admin',
            'is_active' => true,
            'employee_id' => $employee->id,
        ]);
        $admin = User::factory()->create(['role' => 'admin', 'is_active' => true]);
        auth()->login($admin);

        $this->delete(route('users.destroy', $user));

        $response = $this->get(route('users.index'));
        $response->assertOk();
        $response->assertSee('Reactivate');
    }
}
