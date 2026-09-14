<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('message')->nullable();
            $table->string('url')->nullable();
            $table->string('icon')->nullable();
            $table->boolean('read')->default(false);
            $table->unsignedBigInteger('notifiable_id');
            $table->string('notifiable_type')->default('App\Models\User');
            $table->timestamp('read_at')->nullable();
            $table->timestamps();
            $table->index(['notifiable_id', 'read']);
        });

        Schema::create('archives', function (Blueprint $table) {
            $table->id();
            $table->string('archive_type'); // attendance | payroll | payslip | receipt | report | employee | salary_history | benefit | deduction | teaching_hours | make_up_class
            $table->string('ref_type')->nullable();
            $table->unsignedBigInteger('ref_id')->nullable();
            $table->string('period_type'); // monthly | yearly | daily
            $table->string('period_label'); // "2026-01", "2025-2026"
            $table->longText('data')->nullable()->comment('json snapshot of the archived record');
            $table->unsignedBigInteger('archived_by')->nullable();
            $table->timestamp('archived_at')->useCurrent();
            $table->foreign('archived_by')->references('id')->on('users')->nullOnDelete();
            $table->index(['archive_type', 'period_label']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('archives');
        Schema::dropIfExists('notifications');
    }
};
