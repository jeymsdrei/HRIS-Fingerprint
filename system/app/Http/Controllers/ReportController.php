<?php

namespace App\Http\Controllers;

use App\Exports\GenericExport;
use App\Models\PayrollPeriod;
use App\Services\ReportService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
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

        $data = match ($reportType) {
            'attendance' => ['rows' => $service->attendanceReport(), 'columns' => $this->attendanceColumns()],
            'attendance_daily' => ['rows' => $service->attendanceDailySummary(), 'columns' => $this->dailyColumns()],
            'late' => ['rows' => $service->lateReport(), 'columns' => $this->attendanceColumns()],
            'absent' => ['rows' => $service->absentReport(), 'columns' => $this->attendanceColumns()],
            'teaching_hours' => ['rows' => $service->teachingHoursReport(), 'columns' => $this->attendanceColumns()],
            'payroll' => ['rows' => $service->payrollReport(), 'columns' => $this->payrollColumns()],
            'make_up' => ['rows' => $service->makeUpClassReport(), 'columns' => $this->makeUpColumns()],
            'benefits' => ['rows' => $service->benefitReport(), 'columns' => $this->benefitColumns()],
            'loans' => ['rows' => $service->loanReport(), 'columns' => $this->loanColumns()],
            'departments' => ['rows' => $service->departmentReport(), 'columns' => $this->departmentColumns()],
            'employees' => ['rows' => $service->employeeReport(), 'columns' => $this->employeeColumns()],
            default => ['rows' => $service->attendanceReport(), 'columns' => $this->attendanceColumns()],
        };

        return view('reports.show', [
            'type' => $reportType,
            'rows' => $data['rows'],
            'columns' => $data['columns'],
            'filters' => $filters,
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
        $headings = ['Employee ID', 'Name', 'Department', 'Date', 'Status', 'Time In', 'Time Out', 'Working Hours', 'Late (min)', 'Undertime (min)', 'Overtime (min)'];
        $rows = $s->attendanceReport()->map(fn ($a) => [
            $a->employee->employee_id, $a->employee->full_name, $a->employee->department?->name,
            $a->date->format('Y-m-d'), $a->status_label, $a->time_in?->format('H:i'), $a->time_out?->format('H:i'),
            $a->working_hours, $a->late_minutes, $a->undertime_minutes, $a->overtime_minutes,
        ])->all();

        return ['headings' => $headings, 'rows' => $rows];
    }

    private function dailyExport(ReportService $s): array
    {
        $headings = ['Employee ID', 'Name', 'Department', 'Classification', 'Present', 'Late', 'Half Day', 'Absent', 'Working Hours', 'Late (min)', 'Undertime (min)', 'Overtime (min)'];
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
            $a->date->format('Y-m-d'), $a->schedule_start?->format('H:i'), $a->time_in?->format('H:i'),
            $a->late_minutes,
        ])->all();
        $data['headings'] = ['Employee ID', 'Name', 'Department', 'Date', 'Scheduled In', 'Actual In', 'Late (min)'];

        return $data;
    }

    private function absentExport(ReportService $s): array
    {
        $data = $this->attendanceExport($s);
        $data['rows'] = $s->absentReport()->map(fn ($a) => [
            $a->employee->employee_id, $a->employee->full_name, $a->employee->department?->name,
            $a->date->format('Y-m-d'), $a->status_label,
        ])->all();
        $data['headings'] = ['Employee ID', 'Name', 'Department', 'Date', 'Status'];

        return $data;
    }

    private function teachingExport(ReportService $s): array
    {
        $data = $this->attendanceExport($s);
        $data['rows'] = $s->teachingHoursReport()->map(fn ($a) => [
            $a->employee->employee_id, $a->employee->full_name, $a->date->format('Y-m-d'),
            $a->schedule_start?->format('H:i'), $a->schedule_end?->format('H:i'),
            $a->working_hours,
        ])->all();
        $data['headings'] = ['Employee ID', 'Name', 'Date', 'Class Start', 'Class End', 'Teaching Hours'];

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

    private function attendanceColumns(): array
    {
        return ['Employee ID', 'Name', 'Department', 'Date', 'Status', 'Time In', 'Time Out', 'Hours', 'Late', 'Undertime', 'OT'];
    }

    private function dailyColumns(): array
    {
        return ['Employee ID', 'Name', 'Department', 'Class.', 'Present', 'Late', 'Half', 'Absent', 'Hours', 'Late min', 'UT min', 'OT min'];
    }

    private function payrollColumns(): array
    {
        return ['Employee ID', 'Name', 'Department', 'Period', 'Gross', 'Deductions', 'Net', 'Status'];
    }

    private function makeUpColumns(): array
    {
        return ['Employee ID', 'Name', 'Subject', 'Date', 'Start', 'End', 'Hours', 'Rate', 'Pay', 'Status'];
    }

    private function benefitColumns(): array
    {
        return ['Benefit', 'Type', 'Recipients', 'Amount'];
    }

    private function loanColumns(): array
    {
        return ['Employee ID', 'Name', 'Type', 'Reference', 'Amount', 'Amortization', 'Balance', 'Status'];
    }

    private function departmentColumns(): array
    {
        return ['Department', 'Employees', 'Records', 'Rate %', 'Payroll'];
    }

    private function employeeColumns(): array
    {
        return ['Employee ID', 'Name', 'Department', 'Class.', 'Status', 'Position', 'Monthly', 'Daily', 'Hourly', 'Clearance'];
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
