<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payroll_periods', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // "January 2026", "2026-07-15"
            $table->string('type'); // monthly | daily | semi_monthly
            $table->date('start_date');
            $table->date('end_date');
            $table->date('pay_date');
            $table->string('status')->default('draft'); // draft | processing | released | closed
            $table->unsignedBigInteger('generated_by')->nullable();
            $table->timestamp('generated_at')->nullable();
            $table->timestamps();
            $table->foreign('generated_by')->references('id')->on('users')->nullOnDelete();
        });

        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payroll_period_id')->constrained()->cascadeOnDelete();
            $table->foreignId('employee_id')->constrained()->cascadeOnDelete();

            // Earnings
            $table->decimal('basic_pay', 12, 2)->default(0);
            $table->decimal('teaching_hours', 5, 2)->default(0);
            $table->decimal('teaching_pay', 12, 2)->default(0);
            $table->decimal('make_up_pay', 12, 2)->default(0);
            $table->decimal('allowances', 12, 2)->default(0);
            $table->decimal('overtime_pay', 12, 2)->default(0);
            $table->decimal('benefits', 12, 2)->default(0);
            $table->decimal('gross_pay', 12, 2)->default(0);

            // Deductions
            $table->decimal('deduction_late', 12, 2)->default(0);
            $table->decimal('deduction_absent', 12, 2)->default(0);
            $table->decimal('deduction_undertime', 12, 2)->default(0);
            $table->decimal('deduction_tax', 12, 2)->default(0);
            $table->decimal('deduction_sss', 12, 2)->default(0);
            $table->decimal('deduction_philhealth', 12, 2)->default(0);
            $table->decimal('deduction_pagibig', 12, 2)->default(0);
            $table->decimal('deduction_loans', 12, 2)->default(0);
            $table->decimal('deduction_cash_advance', 12, 2)->default(0);
            $table->decimal('deduction_other', 12, 2)->default(0);
            $table->decimal('total_deductions', 12, 2)->default(0);
            $table->decimal('net_pay', 12, 2)->default(0);

            // Attendance summary for the period
            $table->integer('days_present')->default(0);
            $table->integer('days_late')->default(0);
            $table->integer('days_absent')->default(0);
            $table->integer('late_minutes_total')->default(0);
            $table->integer('undertime_minutes_total')->default(0);
            $table->decimal('overtime_hours_total', 5, 2)->default(0);

            $table->string('status')->default('draft'); // draft | on_hold | ready | released
            $table->string('hold_reason')->nullable();
            $table->unsignedBigInteger('released_by')->nullable();
            $table->timestamp('released_at')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreign('released_by')->references('id')->on('users')->nullOnDelete();
            $table->unique(['payroll_period_id', 'employee_id']);
        });

        Schema::table('loan_payments', function (Blueprint $table) {
            $table->foreign('payroll_id')->references('id')->on('payrolls')->nullOnDelete();
        });

        Schema::create('payslips', function (Blueprint $table) {
            $table->id();
            $table->string('payslip_no')->unique();
            $table->foreignId('payroll_id')->constrained()->cascadeOnDelete();
            $table->foreignId('employee_id')->constrained()->cascadeOnDelete();
            $table->string('digital_signature')->nullable();
            $table->timestamp('generated_at')->nullable();
            $table->timestamps();
        });

        Schema::create('payroll_receipts', function (Blueprint $table) {
            $table->id();
            $table->string('receipt_no')->unique();
            $table->foreignId('payroll_id')->constrained()->cascadeOnDelete();
            $table->foreignId('employee_id')->constrained()->cascadeOnDelete();
            $table->decimal('amount_received', 12, 2)->default(0);
            $table->string('payment_method')->default('cash');
            $table->string('employee_signature')->nullable();
            $table->string('hr_signature')->nullable();
            $table->timestamp('signed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payroll_receipts');
        Schema::dropIfExists('payslips');
        Schema::dropIfExists('payrolls');
        Schema::dropIfExists('payroll_periods');
    }
};
