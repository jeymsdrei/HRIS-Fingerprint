<?php

namespace App\Http\Controllers;

use App\Exports\GenericExport;
use App\Models\Attendance;
use App\Models\PayrollPeriod;
use App\Services\ReportService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function index()
    {
        $periods = PayrollPeriod::orderByDesc('end_date')->get();

        return view('reports.index', compact('periods'));
    }

    public function show(Request $request)
    {
        $filters = $request->all();
        $service = new ReportService($filters);
        $reportType = $request->get('type', 'attendance');

        $frame = $this->reportFrame($reportType, $service);

        $rows = collect($frame['rows']);

        if ($q = trim((string) $request->get('q'))) {
            $needles = array_keys($frame['columns']);
            $rows = $rows->filter(function ($row) use ($needles, $q) {
                foreach ($needles as $key) {
                    $value = $row[$key] ?? null;
                    if ($value instanceof Carbon) {
                        $value = $value->toDateTimeString();
                    } elseif (is_object($value)) {
                        $value = method_exists($value, '__toString') ? (string) $value : null;
                    }
                    if (is_scalar($value) && stripos((string) $value, $q) !== false) {
                        return true;
                    }
                }

                return false;
            })->values();
        }

        $total = $rows->count();
        $page = max(1, (int) $request->get('page', 1));
        $perPage = 25;

        $rows = new LengthAwarePaginator(
            $rows->forPage($page, $perPage)->values(),
            $total,
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()],
        );

        return view('reports.show', [
            'type' => $reportType,
            'title' => $this->titleFor($reportType),
            'rows' => $rows,
            'columns' => $frame['columns'],
            'filters' => $filters,
            'total' => $total,
        ]);
    }

    public function exportViaGet(Request $request)
    {
        return redirect()->route('reports.index')->with('error', 'Export must be submitted from the report page.');
    }

    public function export(Request $request)
    {
        $filters = $request->except(['format', '_token']);
        $service = new ReportService($filters);
        $type = $request->get('type', 'attendance');
        $format = $request->get('format', 'csv');

        $label = Str::slug($type).'-'.now()->format('Y-m-d');
        $meta = [
            'title' => $this->titleFor($type),
            'generated_by' => auth()->user()->name,
            'generated_at' => now()->format('Y-m-d H:i:s'),
        ];

        $data = match ($type) {
            'attendance' => $this->attendanceExport($service),
            'attendance_daily' => $this->dailyExport($service),
            'late' => $this->lateExport($service),
            'absent' => $this->absentExport($service),
            'teaching_hours' => $this->teachingExport($service),
            'payroll' => $this->payrollExport($service),
            'make_up' => $this->makeUpExport($service),
            'benefits' => $this->benefitExport($service),
            'loans' => $this->loanExport($service),
            'departments' => $this->departmentExport($service),
            'employees' => $this->employeeExport($service),
            default => $this->attendanceExport($service),
        };

        if ($format === 'csv') {
            return $this->streamCsv($label.'.csv', $data['headings'], $data['rows']);
        }

        if ($format === 'excel') {
            $response = Excel::download(new GenericExport($data['rows'], $data['headings'], $label), $label.'.xlsx');
            $response->headers->set(
                'Content-Type',
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            );

            return $response;
        }

        if ($format === 'pdf') {
            ini_set('memory_limit', '1024M');
            $pdf = Pdf::loadView('pdf.report', ['meta' => $meta, 'headings' => $data['headings'], 'rows' => $data['rows']])
                ->setPaper('a4', 'landscape');

            return $pdf->download($label.'.pdf');
        }

        abort(400);
    }

    private function streamCsv(string $filename, array $headings, array $rows)
    {
        $callback = function () use ($headings, $rows) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, $headings);
            foreach ($rows as $row) {
                fputcsv($handle, $row);
            }
            fclose($handle);
        };

        return response()->streamDownload($callback, $filename, ['Content-Type' => 'text/csv']);
    }

    // ---- Export builders ----

    private function attendanceExport(ReportService $s): array
    {
        $headings = ['Employee ID', 'Name', 'Department', 'Date', 'Status', 'Time In', 'Time Out', 'Working Hours', 'Late', 'Undertime', 'Overtime'];
        $rows = $s->attendanceReport()->map(fn ($a) => [
            $a->employee->employee_id, $a->employee->full_name, $a->employee->department?->name,
            $a->date->format('Y-m-d'), $a->status_label, $a->time_in?->format('H:i'), $a->time_out?->format('H:i'),
            $a->working_hours, $a->late_minutes, $a->undertime_minutes, $a->overtime_minutes,
        ])->all();

        return ['headings' => $headings, 'rows' => $rows];
    }

    private function dailyExport(ReportService $s): array
    {
        $headings = ['Employee ID', 'Name', 'Department', 'Classification', 'Present', 'Late', 'Half Day', 'Absent', 'Working Hours', 'Late', 'Undertime', 'Overtime'];
        $rows = $s->attendanceDailySummary()->map(fn ($r) => [
            $r['employee']->employee_id, $r['employee']->full_name, $r['employee']->department?->name,
            $r['employee']->classification, $r['present'], $r['late'], $r['half_day'], $r['absent'],
            $r['working_hours'], $r['late_minutes'], $r['undertime_minutes'], $r['overtime_minutes'],
        ])->all();

        return ['headings' => $headings, 'rows' => $rows];
    }

    private function lateExport(ReportService $s): array
    {
        $data = $this->attendanceExport($s);
        $data['rows'] = $s->lateReport()->map(fn ($a) => [
            $a->employee->employee_id, $a->employee->full_name, $a->employee->department?->name,
            $this->classLabel($a), $a->date->format('Y-m-d'), $a->schedule_start?->format('H:i'), $a->time_in?->format('H:i'),
            $a->late_minutes,
        ])->all();
        $data['headings'] = ['Employee ID', 'Name', 'Department', 'Class', 'Date', 'Scheduled In', 'Actual In', 'Late'];

        return $data;
    }

    private function absentExport(ReportService $s): array
    {
        $data = $this->attendanceExport($s);
        $data['rows'] = $s->absentReport()->map(fn ($a) => [
            $a->employee->employee_id, $a->employee->full_name, $a->employee->department?->name,
            $this->classLabel($a), $a->date->format('Y-m-d'), $a->status_label,
        ])->all();
        $data['headings'] = ['Employee ID', 'Name', 'Department', 'Class', 'Date', 'Status'];

        return $data;
    }

    private function teachingExport(ReportService $s): array
    {
        $data = $this->attendanceExport($s);
        $data['rows'] = $s->teachingHoursReport()->map(fn ($a) => [
            $a->employee->employee_id, $a->employee->full_name, $a->date->format('Y-m-d'),
            $this->classLabel($a), $a->schedule_start?->format('H:i'), $a->schedule_end?->format('H:i'),
            $a->working_hours,
        ])->all();
        $data['headings'] = ['Employee ID', 'Name', 'Date', 'Class', 'Class Start', 'Class End', 'Teaching Hours'];

        return $data;
    }

    private function payrollExport(ReportService $s): array
    {
        $headings = ['Employee ID', 'Name', 'Department', 'Period', 'Gross', 'Total Deductions', 'Net Pay', 'Status'];
        $rows = $s->payrollReport()->map(fn ($p) => [
            $p->employee->employee_id, $p->employee->full_name, $p->employee->department?->name,
            $p->period->name, $p->gross_pay, $p->total_deductions, $p->net_pay, $p->status_label,
        ])->all();

        return ['headings' => $headings, 'rows' => $rows];
    }

    private function makeUpExport(ReportService $s): array
    {
        $headings = ['Employee ID', 'Name', 'Subject', 'Date', 'Start', 'End', 'Hours', 'Rate', 'Additional Pay', 'Status'];
        $rows = $s->makeUpClassReport()->map(fn ($m) => [
            $m->employee->employee_id, $m->employee->full_name, $m->subject?->name,
            $m->class_date->format('Y-m-d'), $m->start_time->format('H:i'), $m->end_time->format('H:i'),
            $m->hours_rendered, $m->hourly_rate, $m->additional_pay, $m->approval_status,
        ])->all();

        return ['headings' => $headings, 'rows' => $rows];
    }

    private function benefitExport(ReportService $s): array
    {
        $headings = ['Benefit', 'Type', 'Recipients', 'Total Amount'];
        $rows = $s->benefitReport()->map(fn ($b) => [
            $b['benefit']->name, $b['benefit']->type, $b['count'], $b['amount'],
        ])->all();

        return ['headings' => $headings, 'rows' => $rows];
    }

    private function loanExport(ReportService $s): array
    {
        $headings = ['Employee ID', 'Name', 'Loan Type', 'Reference', 'Amount', 'Amortization', 'Balance', 'Status'];
        $rows = $s->loanReport()->map(fn ($l) => [
            $l->employee->employee_id, $l->employee->full_name, $l->loan_type, $l->reference_no,
            $l->amount, $l->monthly_amortization, $l->balance, $l->status,
        ])->all();

        return ['headings' => $headings, 'rows' => $rows];
    }

    private function departmentExport(ReportService $s): array
    {
        $headings = ['Department', 'Employees', 'Attendance Records', 'Attendance Rate %', 'Payroll Expenses'];
        $rows = $s->departmentReport()->map(fn ($d) => [
            $d['department']->name, $d['employee_count'], $d['attendance_records'], $d['attendance_rate'], $d['payroll_expenses'],
        ])->all();

        return ['headings' => $headings, 'rows' => $rows];
    }

    private function employeeExport(ReportService $s): array
    {
        $headings = ['Employee ID', 'Name', 'Department', 'Classification', 'Status', 'Position', 'Monthly', 'Daily', 'Hourly', 'Clearance'];
        $rows = $s->employeeReport()->map(fn ($r) => [
            $r['employee']->employee_id, $r['employee']->full_name, $r['employee']->department?->name,
            $r['employee']->classification, $r['employee']->employment_status, $r['employee']->position?->name,
            $r['employee']->monthly_salary, $r['employee']->daily_rate, $r['employee']->hourly_rate,
            $r['clearance_complete'] ? 'Complete' : 'Incomplete',
        ])->all();

        return ['headings' => $headings, 'rows' => $rows];
    }

    // ---- Report frame (shared by the on-screen table) ----

    private function reportFrame(string $type, ReportService $service): array
    {
        return match ($type) {
            'attendance' => ['columns' => $this->attendanceColumns(), 'rows' => $this->attendanceReportRows($service)],
            'attendance_daily' => ['columns' => $this->dailyColumns(), 'rows' => $this->dailyReportRows($service)],
            'late' => ['columns' => $this->lateColumns(), 'rows' => $this->lateReportRows($service)],
            'absent' => ['columns' => $this->absentColumns(), 'rows' => $this->absentReportRows($service)],
            'teaching_hours' => ['columns' => $this->teachingColumns(), 'rows' => $this->teachingReportRows($service)],
            'payroll' => ['columns' => $this->payrollColumns(), 'rows' => $this->payrollReportRows($service)],
            'make_up' => ['columns' => $this->makeUpColumns(), 'rows' => $this->makeUpReportRows($service)],
            'benefits' => ['columns' => $this->benefitColumns(), 'rows' => $this->benefitReportRows($service)],
            'loans' => ['columns' => $this->loanColumns(), 'rows' => $this->loanReportRows($service)],
            'departments' => ['columns' => $this->departmentColumns(), 'rows' => $this->departmentReportRows($service)],
            'employees' => ['columns' => $this->employeeColumns(), 'rows' => $this->employeeReportRows($service)],
            default => ['columns' => $this->attendanceColumns(), 'rows' => $this->attendanceReportRows($service)],
        };
    }

    private function attendanceColumns(): array
    {
        return [
            'employee_id' => 'Employee ID',
            'name' => 'Name',
            'department' => 'Department',
            'class' => 'Class',
            'date' => 'Date',
            'status' => 'Status',
            'time_in' => 'Time In',
            'time_out' => 'Time Out',
            'working_hours' => 'Working Hours',
            'late_minutes' => 'Late',
            'undertime_minutes' => 'Undertime',
            'overtime_minutes' => 'Overtime',
        ];
    }

    private function dailyColumns(): array
    {
        return [
            'employee_id' => 'Employee ID',
            'name' => 'Name',
            'department' => 'Department',
            'classification' => 'Class.',
            'present' => 'Present',
            'late' => 'Late',
            'half_day' => 'Half Day',
            'absent' => 'Absent',
            'rest' => 'Rest',
            'working_hours' => 'Working Hours',
            'late_minutes' => 'Late',
            'undertime_minutes' => 'Undertime',
            'overtime_minutes' => 'Overtime',
        ];
    }

    private function lateColumns(): array
    {
        return [
            'employee_id' => 'Employee ID',
            'name' => 'Name',
            'department' => 'Department',
            'class' => 'Class',
            'date' => 'Date',
            'schedule_start' => 'Scheduled In',
            'time_in' => 'Actual In',
            'late_minutes' => 'Late',
        ];
    }

    private function absentColumns(): array
    {
        return [
            'employee_id' => 'Employee ID',
            'name' => 'Name',
            'department' => 'Department',
            'class' => 'Class',
            'date' => 'Date',
            'status' => 'Status',
        ];
    }

    private function teachingColumns(): array
    {
        return [
            'employee_id' => 'Employee ID',
            'name' => 'Name',
            'date' => 'Date',
            'class' => 'Class',
            'schedule_start' => 'Class Start',
            'schedule_end' => 'Class End',
            'working_hours' => 'Teaching Hours',
        ];
    }

    private function payrollColumns(): array
    {
        return [
            'employee_id' => 'Employee ID',
            'name' => 'Name',
            'department' => 'Department',
            'period' => 'Period',
            'gross' => 'Gross',
            'deductions' => 'Deductions',
            'net' => 'Net',
            'status' => 'Status',
        ];
    }

    private function makeUpColumns(): array
    {
        return [
            'employee_id' => 'Employee ID',
            'name' => 'Name',
            'subject' => 'Subject',
            'date' => 'Date',
            'start' => 'Start',
            'end' => 'End',
            'hours' => 'Hours',
            'rate' => 'Rate',
            'pay' => 'Additional Pay',
            'status' => 'Status',
        ];
    }

    private function benefitColumns(): array
    {
        return [
            'benefit' => 'Benefit',
            'type' => 'Type',
            'recipients' => 'Recipients',
            'amount' => 'Amount',
        ];
    }

    private function loanColumns(): array
    {
        return [
            'employee_id' => 'Employee ID',
            'name' => 'Name',
            'type' => 'Type',
            'reference' => 'Reference #',
            'amount' => 'Amount',
            'amortization' => 'Amortization',
            'balance' => 'Balance',
            'status' => 'Status',
        ];
    }

    private function departmentColumns(): array
    {
        return [
            'department' => 'Department',
            'employees' => 'Employees',
            'records' => 'Records',
            'rate_pct' => 'Attendance Rate %',
            'payroll_expenses' => 'Payroll Expenses',
        ];
    }

    private function employeeColumns(): array
    {
        return [
            'employee_id' => 'Employee ID',
            'name' => 'Name',
            'department' => 'Department',
            'classification' => 'Class.',
            'employment_status' => 'Employment Status',
            'position' => 'Position',
            'monthly' => 'Monthly',
            'daily' => 'Daily',
            'hourly' => 'Hourly',
            'clearance' => 'Clearance',
        ];
    }

    // ---- Row builders (keyed to the matching columns above) ----

    private function attendanceReportRows(ReportService $s): Collection
    {
        return $s->attendanceReport()->map(fn (Attendance $a) => [
            'employee_id' => $a->employee->employee_id,
            'name' => $a->employee->full_name,
            'department' => $a->employee->department?->name ?? '—',
            'class' => $this->classLabel($a),
            'date' => $a->date,
            'status' => $a->status,
            'time_in' => $a->time_in,
            'time_out' => $a->time_out,
            'working_hours' => $a->working_hours,
            'late_minutes' => $a->late_minutes,
            'undertime_minutes' => $a->undertime_minutes,
            'overtime_minutes' => $a->overtime_minutes,
        ]);
    }

    private function dailyReportRows(ReportService $s): Collection
    {
        return $s->attendanceDailySummary()->map(fn ($r) => [
            'employee_id' => $r['employee']->employee_id,
            'name' => $r['employee']->full_name,
            'department' => $r['employee']->department?->name ?? '—',
            'classification' => $r['employee']->classification === 'teaching' ? 'Teaching' : 'Non-Teaching',
            'present' => $r['present'],
            'late' => $r['late'],
            'half_day' => $r['half_day'],
            'absent' => $r['absent'],
            'rest' => $r['rest'],
            'working_hours' => $r['working_hours'],
            'late_minutes' => $r['late_minutes'],
            'undertime_minutes' => $r['undertime_minutes'],
            'overtime_minutes' => $r['overtime_minutes'],
        ]);
    }

    private function lateReportRows(ReportService $s): Collection
    {
        return $s->lateReport()->map(fn (Attendance $a) => [
            'employee_id' => $a->employee->employee_id,
            'name' => $a->employee->full_name,
            'department' => $a->employee->department?->name ?? '—',
            'class' => $this->classLabel($a),
            'date' => $a->date,
            'schedule_start' => $a->schedule_start,
            'time_in' => $a->time_in,
            'late_minutes' => $a->late_minutes,
        ]);
    }

    private function absentReportRows(ReportService $s): Collection
    {
        return $s->absentReport()->map(fn (Attendance $a) => [
            'employee_id' => $a->employee->employee_id,
            'name' => $a->employee->full_name,
            'department' => $a->employee->department?->name ?? '—',
            'class' => $this->classLabel($a),
            'date' => $a->date,
            'status' => $a->status,
        ]);
    }

    private function teachingReportRows(ReportService $s): Collection
    {
        return $s->teachingHoursReport()->map(fn (Attendance $a) => [
            'employee_id' => $a->employee->employee_id,
            'name' => $a->employee->full_name,
            'date' => $a->date,
            'class' => $this->classLabel($a),
            'schedule_start' => $a->schedule_start,
            'schedule_end' => $a->schedule_end,
            'working_hours' => $a->working_hours,
        ]);
    }

    private function payrollReportRows(ReportService $s): Collection
    {
        return $s->payrollReport()->map(fn ($p) => [
            'employee_id' => $p->employee->employee_id,
            'name' => $p->employee->full_name,
            'department' => $p->employee->department?->name ?? '—',
            'period' => $p->period->name,
            'gross' => (float) $p->gross_pay,
            'deductions' => (float) $p->total_deductions,
            'net' => (float) $p->net_pay,
            'status' => $p->status,
        ]);
    }

    private function makeUpReportRows(ReportService $s): Collection
    {
        return $s->makeUpClassReport()->map(fn ($m) => [
            'employee_id' => $m->employee->employee_id,
            'name' => $m->employee->full_name,
            'subject' => $m->subject?->name ?? '—',
            'date' => $m->class_date,
            'start' => $m->start_time,
            'end' => $m->end_time,
            'hours' => $m->hours_rendered,
            'rate' => (float) $m->hourly_rate,
            'pay' => (float) $m->additional_pay,
            'status' => $m->approval_status,
        ]);
    }

    private function benefitReportRows(ReportService $s): Collection
    {
        return $s->benefitReport()->map(fn ($b) => [
            'benefit' => $b['benefit']->name,
            'type' => $b['benefit']->type === 'allowance' ? 'Allowance' : 'Benefit',
            'recipients' => $b['count'],
            'amount' => (float) $b['amount'],
        ]);
    }

    private function loanReportRows(ReportService $s): Collection
    {
        return $s->loanReport()->map(fn ($l) => [
            'employee_id' => $l->employee->employee_id,
            'name' => $l->employee->full_name,
            'type' => ucwords(str_replace('_', ' ', $l->loan_type)),
            'reference' => $l->reference_no ?? '—',
            'amount' => (float) $l->amount,
            'amortization' => (float) $l->monthly_amortization,
            'balance' => (float) $l->balance,
            'status' => $l->status,
        ]);
    }

    private function departmentReportRows(ReportService $s): Collection
    {
        return $s->departmentReport()->map(fn ($d) => [
            'department' => $d['department']->name,
            'employees' => $d['employee_count'],
            'records' => $d['attendance_records'],
            'rate_pct' => $d['attendance_rate'],
            'payroll_expenses' => $d['payroll_expenses'],
        ]);
    }

    private function employeeReportRows(ReportService $s): Collection
    {
        return $s->employeeReport()->map(fn ($r) => [
            'employee_id' => $r['employee']->employee_id,
            'name' => $r['employee']->full_name,
            'department' => $r['employee']->department?->name ?? '—',
            'classification' => $r['employee']->classification === 'teaching' ? 'Teaching' : 'Non-Teaching',
            'employment_status' => ucwords(str_replace('_', ' ', $r['employee']->employment_status)),
            'position' => $r['employee']->position?->name ?? '—',
            'monthly' => (float) $r['employee']->monthly_salary,
            'daily' => (float) $r['employee']->daily_rate,
            'hourly' => (float) $r['employee']->hourly_rate,
            'clearance' => $r['clearance_complete'] ? 'Complete' : 'Incomplete',
        ]);
    }

    private function classLabel(Attendance $attendance): string
    {
        $schedule = $attendance->teachingSchedule;
        if (! $schedule) {
            return '—';
        }

        $parts = [];
        if ($schedule->subject) {
            $parts[] = $schedule->subject->name;
        }
        if ($schedule->room) {
            $parts[] = $schedule->room->name;
        }

        $label = $parts ? implode(' · ', $parts) : 'Class';

        if ($attendance->schedule_start && $attendance->schedule_end) {
            $label .= ' ('.$attendance->schedule_start->format('h:i A').'–'.$attendance->schedule_end->format('h:i A').')';
        }

        return $label;
    }

    private function titleFor(string $type): string
    {
        return match ($type) {
            'attendance' => 'Attendance Report',
            'attendance_daily' => 'Daily Attendance Summary',
            'late' => 'Late Report',
            'absent' => 'Absent Report',
            'teaching_hours' => 'Teaching Hours Report',
            'payroll' => 'Payroll Report',
            'make_up' => 'Make-Up Class Report',
            'benefits' => 'Benefits Report',
            'loans' => 'Loan Report',
            'departments' => 'Department Report',
            'employees' => 'Employee Report',
            default => 'Report',
        };
    }
}
