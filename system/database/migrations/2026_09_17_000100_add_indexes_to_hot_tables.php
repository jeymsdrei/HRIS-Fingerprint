<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('payrolls', function (Blueprint $table) {
            $table->index('employee_id');
            $table->index('status');
        });

        Schema::table('payroll_periods', function (Blueprint $table) {
            $table->index('pay_date');
        });

        Schema::table('attendances', function (Blueprint $table) {
            $table->index('department_id');
        });

        Schema::table('attendance_logs', function (Blueprint $table) {
            $table->index('punch_time');
        });
    }

    public function down(): void
    {
        Schema::table('payrolls', function (Blueprint $table) {
            $table->dropIndex(['employee_id']);
            $table->dropIndex(['status']);
        });

        Schema::table('payroll_periods', function (Blueprint $table) {
            $table->dropIndex(['pay_date']);
        });

        Schema::table('attendances', function (Blueprint $table) {
            $table->dropIndex(['department_id']);
        });

        Schema::table('attendance_logs', function (Blueprint $table) {
            $table->dropIndex(['punch_time']);
        });
    }
};
