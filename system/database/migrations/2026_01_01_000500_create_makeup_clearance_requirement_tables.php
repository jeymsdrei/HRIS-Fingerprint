<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('make_up_classes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->cascadeOnDelete();
            $table->foreignId('subject_id')->nullable()->constrained()->nullOnDelete();
            $table->date('class_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->decimal('hours_rendered', 5, 2)->default(0);
            $table->decimal('hourly_rate', 12, 2)->default(0);
            $table->decimal('additional_pay', 12, 2)->default(0);
            $table->string('approval_status')->default('pending'); // pending | approved | rejected
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();
            $table->foreign('approved_by')->references('id')->on('users')->nullOnDelete();
        });

        Schema::create('clearances', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Library, Accounting, Registrar, Department Head, Property Custodian, HR
            $table->text('description')->nullable();
            $table->boolean('is_required')->default(true);
            $table->timestamps();
        });

        Schema::create('employee_clearances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->cascadeOnDelete();
            $table->foreignId('clearance_id')->constrained()->cascadeOnDelete();
            $table->string('status')->default('pending'); // pending | cleared
            $table->unsignedBigInteger('cleared_by')->nullable();
            $table->timestamp('cleared_at')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
            $table->unique(['employee_id', 'clearance_id']);
            $table->foreign('cleared_by')->references('id')->on('users')->nullOnDelete();
        });

        Schema::create('requirements', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Clearance, Service Record, Teaching Load, Accomplishment Report, Evaluation Forms...
            $table->text('description')->nullable();
            $table->string('applies_to')->default('all'); // teaching | non_teaching | all
            $table->boolean('needs_expiration')->default(false);
            $table->boolean('is_required')->default(true);
            $table->timestamps();
        });

        Schema::create('employee_requirements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->cascadeOnDelete();
            $table->foreignId('requirement_id')->constrained()->cascadeOnDelete();
            $table->string('status')->default('pending'); // pending | submitted | approved | expired
            $table->date('date_submitted')->nullable();
            $table->date('expiration_date')->nullable();
            $table->string('file_path')->nullable();
            $table->unsignedBigInteger('verified_by')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
            $table->unique(['employee_id', 'requirement_id']);
            $table->foreign('verified_by')->references('id')->on('users')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employee_requirements');
        Schema::dropIfExists('requirements');
        Schema::dropIfExists('employee_clearances');
        Schema::dropIfExists('clearances');
        Schema::dropIfExists('make_up_classes');
    }
};
