<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\MakeUpClass;
use App\Models\PayrollReceipt;
use App\Models\Payslip;
use App\Models\Setting;
use App\Models\Subject;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class EmployeeSelfServiceController extends Controller
{
    private function employee(): ?Employee
    {
        return auth()->user()->employee;
    }

    private function noEmployeeRecord(): View
    {
        return view('employee.no-record');
    }

    public function attendance(Request $request)
    {
        $employee = $this->employee();
        if (! $employee) {
            return $this->noEmployeeRecord();
        }

        $attendances = $employee->attendances()
            ->when($request->from, fn ($q, $d) => $q->whereDate('date', '>=', $d))
            ->when($request->to, fn ($q, $d) => $q->whereDate('date', '<=', $d))
            ->orderByDesc('date')
            ->paginate(20)
            ->withQueryString();

        return view('employee.attendance', compact('employee', 'attendances'));
    }

    public function schedule()
    {
        $employee = $this->employee();
        if (! $employee) {
            return $this->noEmployeeRecord();
        }

        $schedules = $employee->teachingSchedules()->with(['subject', 'room'])->orderBy('day')->orderBy('start_time')->get();
        $workSchedules = $employee->workSchedules()->orderBy('day')->get();

        return view('employee.schedule', compact('employee', 'schedules', 'workSchedules'));
    }

    public function makeupClasses()
    {
        $employee = $this->employee();
        if (! $employee) {
            return $this->noEmployeeRecord();
        }

        if (! $employee->is_teaching) {
            return back()->withErrors(['employee' => 'Only teaching staff can access make-up classes.']);
        }

        $makeUpClasses = $employee->makeUpClasses()
            ->with('subject')
            ->latest('class_date')
            ->latest('start_time')
            ->paginate(20);
        $subjects = Subject::orderBy('name')->get();

        return view('employee.makeup', compact('employee', 'makeUpClasses', 'subjects'));
    }

    public function storeMakeupClass(Request $request)
    {
        $employee = $this->employee();

        if (! $employee) {
            return back()->withErrors(['employee' => 'No employee record linked to your account. Contact HR to link your account.'])->withInput();
        }

        if (! $employee->is_teaching) {
            return back()->withErrors(['employee' => 'Only teaching staff can request make-up classes.'])->withInput();
        }

        $validated = $request->validate([
            'subject_id' => 'nullable|exists:subjects,id',
            'class_date' => 'required|date|after_or_equal:today',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'reason' => 'nullable|string|max:1000',
        ]);

        $overlapExists = $employee->makeUpClasses()
            ->whereDate('class_date', $validated['class_date'])
            ->whereIn('approval_status', ['pending', 'approved'])
            ->where('start_time', '<', $validated['end_time'].':00')
            ->where('end_time', '>', $validated['start_time'].':00')
            ->exists();
        if ($overlapExists) {
            return back()->withErrors(['start_time' => 'You already have a pending or approved request during that time.'])->withInput();
        }

        $start = Carbon::parse($validated['class_date'].' '.$validated['start_time']);
        $end = Carbon::parse($validated['class_date'].' '.$validated['end_time']);
        $hours = round($start->diffInMinutes($end) / 60, 2);
        $rate = (float) $employee->hourly_rate;

        MakeUpClass::create([
            'employee_id' => $employee->id,
            'subject_id' => $validated['subject_id'] ?? null,
            'class_date' => $validated['class_date'],
            'start_time' => $validated['start_time'].':00',
            'end_time' => $validated['end_time'].':00',
            'hours_rendered' => $hours,
            'hourly_rate' => $rate,
            'additional_pay' => round($hours * $rate, 2),
            'approval_status' => 'pending',
            'reason' => $validated['reason'] ?? null,
        ]);

        return redirect()->route('employee.makeup.index')->with('success', 'Make-up class request submitted for approval.');
    }

    public function payslips()
    {
        $employee = $this->employee();
        if (! $employee) {
            return $this->noEmployeeRecord();
        }

        $payslips = $employee->payslips()->with(['payroll.period'])->orderByDesc('created_at')->paginate(15);

        return view('employee.payslips', compact('employee', 'payslips'));
    }

    public function payslipDownload(Payslip $payslip)
    {
        $employee = $this->employee();
        if (! $employee) {
            return $this->noEmployeeRecord();
        }
        abort_if($payslip->employee_id !== $employee->id, 403);

        $payslip->load(['payroll.period']);
        $company = ['name' => Setting::get('company_name', 'HRIS'), 'address' => Setting::get('company_address', '')];

        return Pdf::loadView('pdf.payslip', compact('payslip', 'company'))->setPaper('a4')->download('Payslip-'.$payslip->payslip_no.'.pdf');
    }

    public function payslipView(Payslip $payslip)
    {
        $employee = $this->employee();
        if (! $employee) {
            return $this->noEmployeeRecord();
        }
        abort_if($payslip->employee_id !== $employee->id, 403);

        $payslip->load(['employee.department', 'payroll.period']);

        return view('payslips.show', compact('payslip'));
    }

    public function receipts()
    {
        $employee = $this->employee();
        if (! $employee) {
            return $this->noEmployeeRecord();
        }

        $receipts = $employee->payrollReceipts()->with(['payroll.period'])->orderByDesc('created_at')->paginate(15);

        return view('employee.receipts', compact('employee', 'receipts'));
    }

    public function receiptDownload(PayrollReceipt $receipt)
    {
        $employee = $this->employee();
        if (! $employee) {
            return $this->noEmployeeRecord();
        }
        abort_if($receipt->employee_id !== $employee->id, 403);

        $receipt->load(['payroll.period']);
        $company = ['name' => Setting::get('company_name', 'HRIS'), 'address' => Setting::get('company_address', '')];

        return Pdf::loadView('pdf.receipt', compact('receipt', 'company'))->setPaper('a4')->download('Receipt-'.$receipt->receipt_no.'.pdf');
    }

    public function receiptView(PayrollReceipt $receipt)
    {
        $employee = $this->employee();
        if (! $employee) {
            return $this->noEmployeeRecord();
        }
        abort_if($receipt->employee_id !== $employee->id, 403);

        $receipt->load(['employee.department', 'payroll.period']);
        $company = [
            'name' => Setting::get('company_name', 'HRIS'),
            'address' => Setting::get('company_address', ''),
        ];

        return view('receipts.show', compact('receipt', 'company'));
    }

    public function receiptSign(Request $request, PayrollReceipt $receipt)
    {
        $employee = $this->employee();
        if (! $employee) {
            return $this->noEmployeeRecord();
        }
        abort_if($receipt->employee_id !== $employee->id, 403);

        $request->validate(['employee_signature' => 'required|string|max:255']);
        $receipt->update(['employee_signature' => $request->employee_signature, 'signed_at' => now()]);

        return back()->with('success', 'Receipt signed. Thank you!');
    }

    public function history()
    {
        $employee = $this->employee();
        if (! $employee) {
            return $this->noEmployeeRecord();
        }

        $payrolls = $employee->payrolls()->with('period')->orderByDesc('created_at')->paginate(15);

        return view('employee.history', compact('employee', 'payrolls'));
    }
}
