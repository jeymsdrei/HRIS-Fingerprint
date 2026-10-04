<?php

namespace Tests\Feature\Auth;

use App\Models\Employee;
use App\Models\User;
use App\Notifications\ResetPasswordCode;
use App\Services\EmailMask;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class PasswordResetTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        config(['mail.default' => 'smtp']);
    }

    public function test_reset_password_link_screen_can_be_rendered(): void
    {
        $response = $this->get('/forgot-password');

        $response->assertStatus(200);
    }

    public function test_reset_password_code_can_be_requested(): void
    {
        Notification::fake();

        $user = $this->createPersonnelUser(Employee::CLASSIFICATION_TEACHING);

        $this->post('/forgot-password', ['email' => $user->employee->email]);

        Notification::assertSentTo($user, ResetPasswordCode::class);
        $this->assertSame($user->employee->email, $user->fresh()->email);

        // Verify code was stored in database
        $record = DB::table('password_reset_codes')->where('email', $user->employee->email)->first();
        $this->assertNotNull($record);
        $this->assertEquals(6, strlen($record->code));
    }

    public function test_username_lookup_shows_employee_email_without_sending_a_code(): void
    {
        Notification::fake();
        $user = $this->createPersonnelUser(Employee::CLASSIFICATION_TEACHING);

        $this->post('/forgot-password', [
            'action' => 'lookup_username',
            'username' => $user->getAttribute('username'),
        ])->assertSessionHas('matched_email', EmailMask::mask($user->employee->email));

        Notification::assertNothingSent();
        $this->assertNull($user->fresh()->email);
    }

    public function test_masked_email_keeps_the_local_part_length(): void
    {
        Notification::fake();
        $user = $this->createPersonnelUser(Employee::CLASSIFICATION_TEACHING);

        $email = $user->employee->email;
        [$localPart] = explode('@', $email, 2);
        [$maskedLocalPart] = explode('@', EmailMask::mask($email), 2);

        $this->assertSame(strlen($localPart), strlen($maskedLocalPart));
        $this->assertSame(1, mb_strlen(str_replace('*', '', $maskedLocalPart)));
        $this->assertStringContainsString('@example.test', EmailMask::mask($email));
    }

    public function test_reset_code_is_sent_only_after_username_confirmation(): void
    {
        Notification::fake();
        $user = $this->createPersonnelUser(Employee::CLASSIFICATION_TEACHING);

        $this->post('/forgot-password', [
            'action' => 'send_username',
            'username' => $user->getAttribute('username'),
        ])->assertSessionHas('status', 'A password reset code has been sent to your email address. Please check your inbox.');

        Notification::assertSentTo($user, ResetPasswordCode::class);
        $this->assertSame($user->employee->email, $user->fresh()->email);
    }

    public function test_reset_password_code_can_be_requested_for_non_teaching_personnel(): void
    {
        Notification::fake();

        $user = $this->createPersonnelUser(Employee::CLASSIFICATION_NON_TEACHING);

        $this->post('/forgot-password', ['email' => $user->employee->email]);

        Notification::assertSentTo($user, ResetPasswordCode::class);
    }

    public function test_reset_password_code_is_not_sent_to_other_account_types(): void
    {
        Notification::fake();
        $user = User::factory()->create(['role' => 'admin']);

        $this->post('/forgot-password', ['email' => $user->email])
            ->assertSessionHas('status', 'If the email exists in our system, a password reset code has been sent.');

        Notification::assertNothingSent();
    }

    public function test_reset_password_code_works_with_log_mailer(): void
    {
        Notification::fake();
        config(['mail.default' => 'log']);
        $user = $this->createPersonnelUser(Employee::CLASSIFICATION_TEACHING);

        $this->post('/forgot-password', ['email' => $user->employee->email])
            ->assertSessionHas('status', 'A password reset code has been sent to your email address. Please check your inbox.');

        Notification::assertSentTo($user, ResetPasswordCode::class);
    }

    public function test_verify_code_screen_can_be_rendered(): void
    {
        $response = $this->get('/verify-code');

        $response->assertStatus(200);
    }

    public function test_code_can_be_verified_and_password_reset(): void
    {
        Notification::fake();

        $user = $this->createPersonnelUser(Employee::CLASSIFICATION_TEACHING);

        // Request code
        $this->post('/forgot-password', ['email' => $user->employee->email]);

        Notification::assertSentTo($user, ResetPasswordCode::class, function ($notification) use ($user) {
            // Verify code
            $response = $this->post('/verify-code', [
                'email' => $user->employee->email,
                'code' => $notification->code,
            ]);

            $response->assertRedirect(route('password.reset.form', ['email' => $user->employee->email, 'code' => $notification->code]));

            // Reset password
            $response = $this->post('/reset-password-code', [
                'email' => $user->employee->email,
                'code' => $notification->code,
                'password' => 'newpassword123',
                'password_confirmation' => 'newpassword123',
            ]);

            $response
                ->assertSessionHasNoErrors()
                ->assertRedirect(route('login'));

            // Verify code was deleted
            $record = DB::table('password_reset_codes')->where('email', $user->employee->email)->first();
            $this->assertNull($record);

            return true;
        });
    }

    public function test_invalid_code_is_rejected(): void
    {
        $user = $this->createPersonnelUser(Employee::CLASSIFICATION_TEACHING);

        // Create a code in the database
        DB::table('password_reset_codes')->insert([
            'email' => $user->employee->email,
            'code' => '123456',
            'created_at' => now(),
        ]);

        $response = $this->post('/verify-code', [
            'email' => $user->employee->email,
            'code' => '654321', // Wrong code
        ]);

        $response->assertSessionHasErrors('code');
    }

    public function test_expired_code_is_rejected(): void
    {
        $user = $this->createPersonnelUser(Employee::CLASSIFICATION_TEACHING);

        // Create an expired code in the database (more than 60 minutes old)
        DB::table('password_reset_codes')->insert([
            'email' => $user->employee->email,
            'code' => '123456',
            'created_at' => now()->subMinutes(61),
        ]);

        $response = $this->post('/verify-code', [
            'email' => $user->employee->email,
            'code' => '123456',
        ]);

        $response->assertSessionHasErrors('code');

        // Code should be deleted after expiration
        $record = DB::table('password_reset_codes')->where('email', $user->employee->email)->first();
        $this->assertNull($record);
    }

    private function createPersonnelUser(string $classification): User
    {
        $employee = Employee::query()->create([
            'employee_id' => 'T-0001',
            'first_name' => 'Jane',
            'last_name' => 'Santos',
            'email' => 'jane.santos@example.test',
            'classification' => $classification,
        ]);

        return User::factory()->create([
            'email' => null,
            'employee_id' => $employee->id,
            'role' => 'employee',
        ]);
    }
}
