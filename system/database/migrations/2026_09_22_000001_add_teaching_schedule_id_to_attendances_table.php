<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('attendances', function (Blueprint $table) {
            $table->foreignId('teaching_schedule_id')
                ->nullable()
                ->after('device_id')
                ->constrained('teaching_schedules')
                ->nullOnDelete();

            $table->dropUnique(['employee_id', 'date']);
            $table->unique(['employee_id', 'date', 'teaching_schedule_id']);
        });
    }

    public function down(): void
    {
        Schema::table('attendances', function (Blueprint $table) {
            $table->dropUnique(['employee_id', 'date', 'teaching_schedule_id']);
            $table->dropForeign(['teaching_schedule_id']);
            $table->dropColumn('teaching_schedule_id');
            $table->unique(['employee_id', 'date']);
        });
    }
};
