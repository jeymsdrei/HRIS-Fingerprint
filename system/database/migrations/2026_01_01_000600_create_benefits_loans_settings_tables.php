<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('benefits', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Rice Allowance, Clothing Allowance, etc.
            $table->string('type')->default('allowance'); // allowance | incentive | bonus
            $table->decimal('amount', 12, 2)->default(0);
            $table->string('frequency')->default('monthly'); // monthly | yearly | one_time
            $table->boolean('is_taxable')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('employee_benefits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->cascadeOnDelete();
            $table->foreignId('benefit_id')->constrained()->cascadeOnDelete();
            $table->decimal('amount', 12, 2)->nullable()->comment('override master amount');
            $table->date('effective_date')->nullable();
            $table->date('expiration_date')->nullable();
            $table->timestamps();
            $table->unique(['employee_id', 'benefit_id', 'effective_date']);
        });

        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->cascadeOnDelete();
            $table->string('loan_type'); // sss | pagibig | company | cash_advance | other
            $table->string('reference_no')->nullable();
            $table->decimal('amount', 12, 2)->default(0);
            $table->decimal('interest_rate', 5, 2)->default(0);
            $table->decimal('monthly_amortization', 12, 2)->default(0);
            $table->decimal('balance', 12, 2)->default(0);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('status')->default('active'); // active | paid | closed
            $table->text('remarks')->nullable();
            $table->timestamps();
        });

        Schema::create('loan_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loan_id')->constrained()->cascadeOnDelete();
            $table->foreignId('payroll_id')->nullable();
            $table->decimal('amount', 12, 2)->default(0);
            $table->date('payment_date');
            $table->timestamps();
        });

        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->string('group')->default('general');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
        Schema::dropIfExists('loan_payments');
        Schema::dropIfExists('loans');
        Schema::dropIfExists('employee_benefits');
        Schema::dropIfExists('benefits');
    }
};
