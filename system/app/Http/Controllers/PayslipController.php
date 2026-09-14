<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Payslip;
use App\Models\Setting;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PayslipController extends Controller
{
    public function index(Request $request)
    {
        $payslips = Payslip::with(['employee.department', 'payroll.period'])
            ->when($request->search, fn ($q, $s) => $q->whereHas('employee', fn ($w) => $w
                ->where('employee_id', 'like', "%{$s}%")
                ->orWhere('first_name', 'like', "%{$s}%")
                ->orWhere('last_name', 'like', "%{$s}%")))
            ->when($request->department_id, fn ($q, $id) => $q->whereHas('employee', fn ($w) => $w->where('department_id', $id)))
            ->when($request->classification, fn ($q, $c) => $q->whereHas('employee', fn ($w) => $w->where('classification', $c)))
            ->when($request->employment_status, fn ($q, $s) => $q->whereHas('employee', fn ($w) => $w->where('employment_status', $s)))
            ->when($request->payroll_period_id, fn ($q, $id) => $q->where('payroll_id', $id))
            ->orderByDesc('created_at')
            ->paginate(15)
            ->withQueryString();

        $departments = Department::orderBy('name')->get();

        return view('payslips.index', compact('payslips', 'departments'));
    }

    public function show(Payslip $payslip)
    {
        $payslip->load(['employee.department', 'payroll.period']);

        return view('payslips.show', compact('payslip'));
    }

    public function download(Payslip $payslip)
    {
        $payslip->load(['employee.department', 'payroll.period']);
        $company = [
            'name' => Setting::get('company_name', 'DCLC - Human Resource'),
            'address' => Setting::get('company_address', ''),
        ];

        $pdf = Pdf::loadView('pdf.payslip', compact('payslip', 'company'))
            ->setPaper('a4');

        return $pdf->download('Payslip-'.$payslip->employee->employee_id.'-'.$payslip->payroll->period->name.'.pdf');
    }
}
