<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\PayrollReceipt;
use App\Models\Setting;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PayrollReceiptController extends Controller
{
    public function index(Request $request)
    {
        $receipts = PayrollReceipt::with(['employee.department', 'payroll.period'])
            ->when($request->search, fn ($q, $s) => $q->whereHas('employee', fn ($w) => $w
                ->where('employee_id', 'like', "%{$s}%")
                ->orWhere('first_name', 'like', "%{$s}%")
                ->orWhere('last_name', 'like', "%{$s}%")))
            ->when($request->department_id, fn ($q, $id) => $q->whereHas('employee', fn ($w) => $w->where('department_id', $id)))
            ->when($request->classification, fn ($q, $c) => $q->whereHas('employee', fn ($w) => $w->where('classification', $c)))
            ->when($request->employment_status, fn ($q, $s) => $q->whereHas('employee', fn ($w) => $w->where('employment_status', $s)))
            ->orderByDesc('created_at')
            ->paginate(15)
            ->withQueryString();

        $departments = Department::orderBy('name')->get();

        return view('receipts.index', compact('receipts', 'departments'));
    }

    public function sign(Request $request, PayrollReceipt $receipt)
    {
        $request->validate([
            'employee_signature' => 'required|string|max:255',
        ]);

        $receipt->update([
            'employee_signature' => $request->employee_signature,
            'signed_at' => now(),
        ]);

        return back()->with('success', 'Receipt signed by employee.');
    }

    public function signHr(Request $request, PayrollReceipt $receipt)
    {
        $request->validate([
            'hr_signature' => 'required|string|max:255',
        ]);
        $receipt->update(['hr_signature' => $request->hr_signature]);

        return back()->with('success', 'Receipt signed by HR.');
    }

    public function print(PayrollReceipt $receipt)
    {
        $receipt->load(['employee.department', 'payroll.period']);
        $company = [
            'name' => Setting::get('company_name', 'DCLC - Human Resource'),
            'address' => Setting::get('company_address', ''),
        ];

        $pdf = Pdf::loadView('pdf.receipt', compact('receipt', 'company'))
            ->setPaper('a4');

        return $pdf->download('Receipt-'.$receipt->receipt_no.'.pdf');
    }
}
