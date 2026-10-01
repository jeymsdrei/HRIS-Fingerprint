<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeBenefitRequest extends FormRequest
{
    /**
     * @return array<string, string>
     */
    public function rules(): array
    {
        return [
            'employee_id' => 'required|exists:employees,id',
            'benefit_id' => 'required|exists:benefits,id',
            'amount' => 'nullable|numeric|min:0',
            'effective_date' => 'required|date',
        ];
    }
}
