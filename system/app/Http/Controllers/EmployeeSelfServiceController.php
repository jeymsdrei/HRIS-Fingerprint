<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\PayrollReceipt;
use App\Models\Payslip;
use App\Models\Setting;
use Barryvdh\DomPDF\Facade\Pdf;
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

        $makeUpClasses = $employee->makeUpClasses()
            ->with('subject')
            ->where('approval_status', 'approved')
            ->latest('class_date')
            ->latest('start_time')
            ->paginate(20);

        return view('employee.makeup', compact('employee', 'makeUpClasses'));
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
