<?php

namespace App\Services;

use App\Models\Archive;
use App\Models\Attendance;
use App\Models\MakeUpClass;
use App\Models\Payroll;
use App\Models\PayrollReceipt;
use App\Models\Payslip;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ArchiveService
{
    /**
     * Archive records of one type for a period (snapshot into archives table).
     */
    public function archiveType(string $type, Carbon $from, Carbon $to, string $periodLabel, string $periodType, ?User $user = null): int
    {
        $user ??= Auth::user();
        $count = 0;

        $rows = match ($type) {
            'attendance' => Attendance::with(['employee', 'department'])
                ->whereBetween('date', [$from->toDateString(), $to->toDateString()])->get(),
            'payroll' => Payroll::with(['employee', 'period'])
                ->whereHas('period', fn ($q) => $q->whereDate('start_date', '<=', $to->toDateString())->whereDate('end_date', '>=', $from->toDateString()))->get(),
            'payslip' => Payslip::with(['employee', 'payroll'])->get(),
            'payroll_receipt' => PayrollReceipt::with(['employee', 'payroll'])->get(),
            'make_up_class' => MakeUpClass::with(['employee', 'subject'])
                ->whereBetween('class_date', [$from->toDateString(), $to->toDateString()])->get(),
            default => collect(),
        };

        foreach ($rows as $row) {
            Archive::updateOrCreate(
                [
                    'archive_type' => $type,
                    'ref_id' => $row->id,
                    'period_label' => $periodLabel,
                ],
                [
                    'ref_type' => get_class($row),
                    'period_type' => $periodType,
                    'data' => $row->toArray(),
                    'archived_by' => $user?->id,
                    'archived_at' => now(),
                ]
            );
            $count++;
        }

        return $count;
    }

    /**
     * Archive everything for a month / year.
     */
    public function archivePeriod(string $month = '2026-01'): array
    {
        $start = Carbon::parse($month.'-01')->startOfMonth();
        $end = $start->copy()->endOfMonth();
        $label = $month;

        $results = [];
        foreach (['attendance', 'payroll', 'payslip', 'payroll_receipt', 'make_up_class'] as $type) {
            $results[$type] = $this->archiveType($type, $start, $end, $label, 'monthly');
        }

        return $results;
    }
}
