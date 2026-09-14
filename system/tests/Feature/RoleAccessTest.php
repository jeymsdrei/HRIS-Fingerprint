<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoleAccessTest extends TestCase
{
    use RefreshDatabase;

    private function user(string $role): User
    {
        return User::factory()->create(['role' => $role, 'is_active' => true]);
    }

    public function test_employee_cannot_access_admin_users_page_and_is_redirected(): void
    {
        $employee = $this->user('employee');

        $this->actingAs($employee)
            ->get('/users')
            ->assertRedirect(route('employee.attendance', absolute: false));
    }

    public function test_employee_cannot_access_employee_management(): void
    {
        $employee = $this->user('employee');

        $this->actingAs($employee)
            ->get('/employees')
            ->assertRedirect(route('employee.attendance', absolute: false));
    }

    public function test_employee_cannot_create_or_assign_roles(): void
    {
        $employee = $this->user('employee');

        $this->actingAs($employee)
            ->post('/users', [
                'name' => 'Hacker',
                'email' => 'hacker@example.com',
                'password' => 'password123',
                'role' => 'admin',
            ])
            ->assertRedirect();

        $this->assertDatabaseMissing('users', ['role' => 'admin']);
    }

    public function test_employee_can_access_their_own_self_service_area(): void
    {
        $employee = $this->user('employee');

        $this->actingAs($employee)
            ->get('/my/attendance')
            ->assertOk();
    }

    public function test_admin_can_access_admin_users_page(): void
    {
        $admin = $this->user('admin');

        $this->actingAs($admin)
            ->get('/users')
            ->assertOk();
    }

    public function test_employee_cannot_modify_role_through_profile_update(): void
    {
        $employee = $this->user('employee');

        $this->actingAs($employee)
            ->patch('/profile', [
                'name' => 'Still Employee',
                'email' => 'employee@example.com',
                'role' => 'admin',
            ]);

        $this->assertSame('employee', $employee->fresh()->role);
    }
}
