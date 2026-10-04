<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBenefitRequest;
use App\Http\Requests\StoreEmployeeBenefitRequest;
use App\Http\Requests\StoreLoanRequest;
use App\Http\Requests\UpdateLoanRequest;
use App\Models\Benefit;
use App\Models\Department;
use App\Models\Employee;
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
        $employees = Employee::where('is_active', true)->orderBy('last_name')->get();

        return view('benefits.index', compact('benefits', 'assignments', 'departments', 'employees'));
    }

    public function storeBenefit(StoreBenefitRequest $request)
    {
        Benefit::create($request->validated());

        return back()->with('success', 'Benefit added.');
    }

    public function destroyBenefit(Benefit $benefit)
    {
        $benefit->delete();

        return back()->with('success', 'Benefit removed.');
    }

    public function assignBenefit(StoreEmployeeBenefitRequest $request)
    {
        EmployeeBenefit::create($request->validated());

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
        $employees = Employee::where('is_active', true)->orderBy('last_name')->get();

        return view('loans.index', compact('loans', 'departments', 'employees'));
    }

    public function storeLoan(StoreLoanRequest $request)
    {
        $data = $request->validated();
        $data['interest_rate'] = $request->filled('interest_rate') ? $request->input('interest_rate') : 0;
        $data['balance'] = $request->amount;
        $data['status'] = 'active';
        if ($request->loan_type === 'cash_advance') {
            $data['end_date'] = $request->amount <= 0 ? null : now()->addMonths(2);
        }
        Loan::create($data);

        return back()->with('success', 'Loan recorded.');
    }

    public function updateLoan(UpdateLoanRequest $request, Loan $loan)
    {
        $loan->update($request->validated());

        return back()->with('success', 'Loan updated.');
    }
}
