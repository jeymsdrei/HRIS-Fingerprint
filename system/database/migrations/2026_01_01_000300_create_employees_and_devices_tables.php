<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id', 30)->unique(); // school-assigned ID e.g. T-0001
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreignId('department_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('position_id')->nullable()->constrained()->nullOnDelete();

            // Personal info
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('suffix')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('gender')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('photo_path')->nullable();

            // Classification: teaching | non_teaching
            $table->string('classification')->default('non_teaching');
            // Employment: permanent (Regular) | contractual
            $table->string('employment_status')->default('permanent');
            // Salary basis: monthly | daily
            $table->string('salary_type')->default('monthly');

            // Compensation
            $table->decimal('monthly_salary', 12, 2)->default(0);
            $table->decimal('daily_rate', 12, 2)->default(0);
            $table->decimal('hourly_rate', 12, 2)->default(0);
            $table->decimal('teaching_load', 5, 2)->default(0)->comment('total load in hours per week');

            // Biometrics
            $table->unsignedBigInteger('fingerprint_id')->nullable()->unique()->comment('ZK device user id');
            $table->longText('fingerprint_template')->nullable()->comment('base64 template from device');

            // Government / Tax
            $table->string('sss_no', 30)->nullable();
            $table->string('philhealth_no', 30)->nullable();
            $table->string('pagibig_no', 30)->nullable();
            $table->string('tin', 30)->nullable();
            $table->string('tax_status')->default('single'); // single | married | single_with_qualifying | married_with_qualifying

            // Banking
            $table->string('bank_name')->nullable();
            $table->string('bank_account_no')->nullable();
            $table->string('payment_method')->default('cash'); // cash | bank_transfer | check

            $table->date('date_hired')->nullable();
            $table->date('date_resigned')->nullable();
            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();
        });

        Schema::create('biometric_devices', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('ip_address', 45);
            $table->integer('port')->default(4370);
            $table->string('serial_number')->nullable();
            $table->string('location')->nullable();
            $table->string('status')->default('offline'); // online | offline | error
            $table->timestamp('last_sync_at')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('attendance_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->unsignedBigInteger('fingerprint_id')->nullable();
            $table->foreignId('device_id')->nullable()->constrained('biometric_devices')->nullOnDelete();
            $table->dateTime('punch_time');
            $table->string('source')->default('device'); // device | manual | api
            $table->boolean('processed')->default(false);
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employees')->cascadeOnDelete();
            $table->index(['fingerprint_id', 'punch_time']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('attendance_logs');
        Schema::dropIfExists('biometric_devices');
        Schema::dropIfExists('employees');
    }
};
