<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLoanRequest extends FormRequest
{
    /**
     * @return array<string, string>
     */
    public function rules(): array
    {
        return [
            'employee_id' => 'required|exists:employees,id',
            'loan_type' => 'required|in:sss,pagibig,company,cash_advance,other',
            'reference_no' => 'nullable|string|max:100',
            'amount' => 'required|numeric|min:1',
            'interest_rate' => 'nullable|numeric|min:0|max:100',
            'monthly_amortization' => 'required|numeric|min:0',
            'start_date' => 'required|date',
        ];
    }
}
