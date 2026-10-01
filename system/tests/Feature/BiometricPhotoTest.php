<?php

namespace Tests\Feature;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class BiometricPhotoTest extends TestCase
{
    use RefreshDatabase;

    private function createEmployee(string $code = 'T-0001'): Employee
    {
        $department = Department::create(['name' => 'Test Dept']);

        return Employee::create([
            'employee_id' => $code,
            'first_name' => 'Test',
            'last_name' => 'User',
            'classification' => 'non_teaching',
            'department_id' => $department->id,
        ]);
    }

    public function test_photo_upload_stores_photo_and_returns_url(): void
    {
        Storage::fake('public');
        $employee = $this->createEmployee();

        $response = $this->post('/api/device/photo', [
            'token' => 'hris-device-token',
            'employee_id' => $employee->employee_id,
            'photo' => UploadedFile::fake()->image('face.jpg', 100, 100),
        ]);

        $response->assertOk();

        $path = $response->json('photo_path');
        $this->assertStringStartsWith('employee-photos/', $path);
        $this->assertSame($path, $employee->fresh()->photo_path);
        $response->assertJsonPath('ok', true);
        Storage::disk('public')->assertExists($path);
    }

    public function test_photo_upload_replaces_previous_photo(): void
    {
        Storage::fake('public');
        $employee = $this->createEmployee();
        Storage::disk('public')->put('employee-photos/old.jpg', 'old');
        $employee->update(['photo_path' => 'employee-photos/old.jpg']);

        $response = $this->post('/api/device/photo', [
            'token' => 'hris-device-token',
            'employee_id' => $employee->employee_id,
            'photo' => UploadedFile::fake()->image('new.jpg', 100, 100),
        ])->assertOk();

        $path = $response->json('photo_path');
        $this->assertSame($path, $employee->fresh()->photo_path);
        Storage::disk('public')->assertExists($path);
        Storage::disk('public')->assertMissing('employee-photos/old.jpg');
    }

    public function test_photo_upload_rejects_bad_token(): void
    {
        Storage::fake('public');
        $employee = $this->createEmployee();

        $this->post('/api/device/photo', [
            'token' => 'wrong-token',
            'employee_id' => $employee->employee_id,
            'photo' => UploadedFile::fake()->image('face.jpg'),
        ])->assertUnauthorized();
    }

    public function test_photo_upload_rejects_unknown_employee(): void
    {
        Storage::fake('public');

        $response = $this->post('/api/device/photo', [
            'token' => 'hris-device-token',
            'employee_id' => 'NOPE-0001',
            'photo' => UploadedFile::fake()->image('face.jpg'),
        ]);

        $response->assertOk()->assertJsonPath('ok', false);
    }

    public function test_employees_endpoint_embeds_photo_data(): void
    {
        Storage::fake('public');
        $employee = $this->createEmployee('T-0002');
        $image = UploadedFile::fake()->image('face.jpg', 200, 200)->get();
        Storage::disk('public')->put('employee-photos/face.jpg', $image);
        $employee->update(['photo_path' => 'employee-photos/face.jpg']);

        $response = $this->getJson('/api/device/employees?token=hris-device-token');

        $response->assertOk();
        $data = collect($response->json('employees'))->firstWhere('employee_id', 'T-0002');
        $this->assertNotNull($data);
        $this->assertStringStartsWith('data:image/jpeg;base64,', $data['photo_data']);
        $this->assertNotEmpty(str_replace('data:image/jpeg;base64,', '', $data['photo_data']));
        $this->assertStringStartsWith('http', $data['photo_url']);
    }

    public function test_employees_endpoint_excludes_photo_data_for_missing_photos(): void
    {
        Storage::fake('public');
        $employee = $this->createEmployee('T-0003');

        $response = $this->getJson('/api/device/employees?token=hris-device-token');

        $response->assertOk();
        $data = collect($response->json('employees'))->firstWhere('employee_id', 'T-0003');
        $this->assertNotNull($data);
        $this->assertNull($data['photo_data']);
        $this->assertNull($data['photo_url']);
    }
}
