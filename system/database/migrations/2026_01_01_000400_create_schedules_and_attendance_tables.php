<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Teaching personnel: per-employee class schedules
        Schema::create('teaching_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->cascadeOnDelete();
            $table->foreignId('subject_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('room_id')->nullable()->constrained()->nullOnDelete();
            $table->tinyInteger('day')->comment('0=Sunday .. 6=Saturday');
            $table->time('start_time');
            $table->time('end_time');
            $table->foreignId('semester_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('school_year_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
            $table->index(['employee_id', 'day']);
        });

        // Non-teaching: fixed work schedules
        Schema::create('work_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->cascadeOnDelete();
            $table->tinyInteger('day')->comment('0=Sunday .. 6=Saturday');
            $table->time('start_time');
            $table->time('end_time');
            $table->timestamps();
            $table->index(['employee_id', 'day']);
        });

        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->cascadeOnDelete();
            $table->date('date');
            $table->tinyInteger('day')->comment('0=Sunday .. 6=Saturday');
            $table->foreignId('department_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('device_id')->nullable()->constrained('biometric_devices')->nullOnDelete();

            $table->time('schedule_start')->nullable();
            $table->time('schedule_end')->nullable();
            $table->time('time_in')->nullable();
            $table->time('time_out')->nullable();

            $table->decimal('working_hours', 5, 2)->default(0)->comment('paid hours credited');
            $table->integer('late_minutes')->default(0);
            $table->integer('undertime_minutes')->default(0);
            $table->integer('overtime_minutes')->default(0);
            $table->boolean('is_half_day')->default(false);

            $table->string('status')->default('absent'); // present | late | half_day | absent | rest_day
            $table->string('source')->default('device'); // device | manual
            $table->string('remarks')->nullable();
            $table->unsignedBigInteger('processed_by')->nullable();

            $table->timestamps();

            $table->unique(['employee_id', 'date']);
            $table->index('date');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('attendances');
        Schema::dropIfExists('work_schedules');
        Schema::dropIfExists('teaching_schedules');
    }
};
