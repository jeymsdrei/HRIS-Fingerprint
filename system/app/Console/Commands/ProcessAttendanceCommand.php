<?php

namespace App\Console\Commands;

use App\Services\AttendanceService;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ProcessAttendanceCommand extends Command
{
    protected $signature = 'attendance:process {--date= : Process a specific date (Y-m-d), defaults to yesterday} {--from= : Start of range} {--to= : End of range} {--backfill : Process the last 30 days}';

    protected $description = 'Validate attendance punches against schedules and compute working hours, late, undertime and overtime';

    public function handle(AttendanceService $service): int
    {
        if ($this->option('backfill')) {
            $from = now()->subDays(30)->startOfDay();
            $to = now()->endOfDay();
        } elseif ($this->option('from') && $this->option('to')) {
            $from = Carbon::parse($this->option('from'));
            $to = Carbon::parse($this->option('to'));
        } else {
            $from = $to = Carbon::parse($this->option('date') ?: now()->subDay());
        }

        $count = $service->backfill($from, $to);
        $this->info("Processed {$count} employee-day attendance records between {$from->toDateString()} and {$to->toDateString()}.");

        return self::SUCCESS;
    }
}
