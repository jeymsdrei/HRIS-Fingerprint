<?php

namespace Database\Seeders;

use App\Models\AttendanceLog;
use App\Models\Employee;
use App\Services\AttendanceService;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    public function run(): void
    {
        $service = new AttendanceService;
        $from = Carbon::now()->subMonth()->startOfMonth();
        $to = Carbon::now()->endOfMonth();

        AttendanceLog::whereBetween('punch_time', [$from->toDateTimeString(), $to->copy()->endOfDay()->toDateTimeString()])->delete();

        Employee::where('is_active', true)->chunkById(50, function ($employees) use ($from, $to) {
            foreach ($employees as $employee) {
                $cursor = $from->copy();
                while ($cursor->lte($to)) {
                    if ($cursor->dayOfWeek === 0 || $cursor->dayOfWeek === 6) {
                        $cursor->addDay();

                        continue;
                    }

                    $roll = rand(1, 100);
                    if ($roll <= 8) {
                        // absent - no punches
                        $cursor->addDay();

                        continue;
                    }

                    $start = $cursor->copy()->setTime(7, 50, 0);
                    $end = $cursor->copy()->setTime(17, 5, 0);
                    $arrivalMinutes = rand(0, 40);
                    $departureMinutes = rand(-30, 60);

                    if ($arrivalMinutes > 20) {
                        $start->addMinutes($arrivalMinutes);
                    } else {
                        $start->addMinutes(max(0, $arrivalMinutes - 15));
                    }

                    AttendanceLog::create([
                        'employee_id' => $employee->id,
                        'fingerprint_id' => $employee->fingerprint_id,
                        'device_id' => null,
                        'punch_time' => $start->toDateTimeString(),
                        'source' => 'device',
                        'processed' => false,
                    ]);

                    AttendanceLog::create([
                        'employee_id' => $employee->id,
                        'fingerprint_id' => $employee->fingerprint_id,
                        'device_id' => null,
                        'punch_time' => $end->addMinutes($departureMinutes)->toDateTimeString(),
                        'source' => 'device',
                        'processed' => false,
                    ]);

                    $cursor->addDay();
                }
            }
        });

        $service->backfill($from, $to);

        $this->command?->info('Attendance seeded and processed for '.$from->format('M Y').' to '.$to->format('M Y').'.');
    }
}
