<?php

namespace App\Http\Controllers;

use App\Models\Benefit;
use App\Models\Department;
use App\Models\EmployeeBenefit;
use App\Models\Loan;
use Illuminate\Http\Request;

class BenefitLoanController extends Controller
{
    public function benefits(Request $request)
    {
        $benefits = Benefit::orderBy('name')->get();
        $assignments = EmployeeBenefit::with(['employee.department', 'benefit'])
            ->when($request->department_id, fn ($q, $id) => $q->whereHas('employee', fn ($w) => $w->where('department_id', $id)))
            ->when($request->classification, fn ($q, $c) => $q->whereHas('employee', fn ($w) => $w->where('classification', $c)))
            ->when($request->employment_status, fn ($q, $s) => $q->whereHas('employee', fn ($w) => $w->where('employment_status', $s)))
            ->orderByDesc('updated_at')
            ->paginate(20)
            ->withQueryString();

        $departments = Department::orderBy('name')->get();

        return view('benefits.index', compact('benefits', 'assignments', 'departments'));
    }

    public function storeBenefit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:allowance,incentive,bonus',
            'amount' => 'required|numeric|min:0',
            'frequency' => 'required|in:monthly,yearly,one_time',
            'is_taxable' => 'nullable|boolean',
        ]);
        Benefit::create($request->all());

        return back()->with('success', 'Benefit added.');
    }

    public function destroyBenefit(Benefit $benefit)
    {
        $benefit->delete();

        return back()->with('success', 'Benefit removed.');
    }

    public function assignBenefit(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'benefit_id' => 'required|exists:benefits,id',
            'amount' => 'nullable|numeric|min:0',
            'effective_date' => 'required|date',
        ]);
        EmployeeBenefit::create($request->all());

        return back()->with('success', 'Benefit assigned to employee.');
    }

    public function revokeBenefit(EmployeeBenefit $employeeBenefit)
    {
        $employeeBenefit->delete();

        return back()->with('success', 'Benefit assignment removed.');
    }

    public function loans(Request $request)
    {
        $loans = Loan::with(['employee.department', 'payments'])
            ->when($request->loan_type, fn ($q, $t) => $q->where('loan_type', $t))
            ->when($request->status, fn ($q, $s) => $q->where('status', $s))
            ->when($request->department_id, fn ($q, $id) => $q->whereHas('employee', fn ($w) => $w->where('department_id', $id)))
            ->when($request->classification, fn ($q, $c) => $q->whereHas('employee', fn ($w) => $w->where('classification', $c)))
            ->when($request->employment_status, fn ($q, $s) => $q->whereHas('employee', fn ($w) => $w->where('employment_status', $s)))
            ->orderByDesc('created_at')
            ->paginate(15)
            ->withQueryString();

        $departments = Department::orderBy('name')->get();

        return view('loans.index', compact('loans', 'departments'));
    }

    public function storeLoan(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'loan_type' => 'required|in:sss,pagibig,company,cash_advance,other',
            'reference_no' => 'nullable|string|max:100',
            'amount' => 'required|numeric|min:1',
            'interest_rate' => 'nullable|numeric|min:0|max:100',
            'monthly_amortization' => 'required|numeric|min:0',
            'start_date' => 'required|date',
        ]);

        $data = $request->all();
        $data['balance'] = $request->amount;
        $data['status'] = 'active';
        if ($request->loan_type === 'cash_advance') {
            $data['end_date'] = $request->amount <= 0 ? null : now()->addMonths(2);
        }
        Loan::create($data);

        return back()->with('success', 'Loan recorded.');
    }

    public function updateLoan(Request $request, Loan $loan)
    {
        $request->validate([
            'balance' => 'required|numeric|min:0',
            'status' => 'required|in:active,paid,closed',
        ]);
        $loan->update($request->only(['balance', 'status']));

        return back()->with('success', 'Loan updated.');
    }
}
