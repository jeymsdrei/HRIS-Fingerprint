<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement('PRAGMA foreign_keys = OFF');
        DB::statement('PRAGMA legacy_alter_table = ON');

        DB::statement('ALTER TABLE employees RENAME TO employees_old');

        DB::statement('DROP INDEX employees_employee_id_unique');
        DB::statement('DROP INDEX employees_fingerprint_id_unique');

        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id', 30)->unique();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->unsignedBigInteger('position_id')->nullable();
            $table->foreignId('course_id')->nullable()->constrained()->nullOnDelete();

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

            $table->string('classification')->default('non_teaching');
            $table->string('employment_status')->default('permanent');
            $table->string('salary_type')->default('monthly');

            $table->decimal('monthly_salary', 12, 2)->default(0);
            $table->decimal('semi_monthly_salary', 12, 2)->default(0);
            $table->decimal('daily_rate', 12, 2)->default(0);
            $table->decimal('hourly_rate', 12, 2)->default(0);
            $table->decimal('teaching_load', 5, 2)->default(0);

            $table->unsignedBigInteger('fingerprint_id')->nullable()->unique();
            $table->longText('fingerprint_template')->nullable();

            $table->string('sss_no', 30)->nullable();
            $table->string('philhealth_no', 30)->nullable();
            $table->string('pagibig_no', 30)->nullable();
            $table->string('tin', 30)->nullable();
            $table->string('tax_status')->default('single');

            $table->string('bank_name')->nullable();
            $table->string('bank_account_no')->nullable();
            $table->string('payment_method')->default('cash');

            $table->date('date_hired')->nullable();
            $table->date('date_resigned')->nullable();
            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->foreign('department_id')->references('id')->on('departments')->nullOnDelete();
            $table->foreign('position_id')->references('id')->on('positions')->nullOnDelete();
        });

        $columns = [
            'id', 'employee_id', 'department_id', 'position_id',
            'first_name', 'middle_name', 'last_name', 'suffix', 'birth_date',
            'gender', 'email', 'phone', 'address', 'photo_path',
            'classification', 'employment_status', 'salary_type',
            'monthly_salary', 'semi_monthly_salary', 'daily_rate', 'hourly_rate', 'teaching_load',
            'fingerprint_id', 'fingerprint_template',
            'sss_no', 'philhealth_no', 'pagibig_no', 'tin', 'tax_status',
            'bank_name', 'bank_account_no', 'payment_method',
            'date_hired', 'date_resigned', 'is_active',
            'created_at', 'updated_at', 'course_id',
        ];
        $list = implode(', ', $columns);

        DB::statement("INSERT INTO employees ($list) SELECT $list FROM employees_old");

        DB::statement('DROP TABLE employees_old');

        DB::statement('PRAGMA legacy_alter_table = OFF');
        DB::statement('PRAGMA foreign_keys = ON');
    }

    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
        });
    }
};
