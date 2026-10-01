<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePayrollSettingsRequest extends FormRequest
{
    /**
     * @return array<string, string>
     */
    public function rules(): array
    {
        return [
            'company_name' => 'required|string|max:255',
            'workdays_per_month' => 'required|integer|between:1,31',
            'overtime_multiplier' => 'required|numeric|between:1,3',
            'sss_ee_rate' => 'required|numeric|between:0,100',
            'philhealth_ee_rate' => 'required|numeric|between:0,100',
            'pagibig_ee_rate' => 'required|numeric|between:0,100',
            'pagibig_ee_cap' => 'required|numeric|min:0',
            'late_deduction_rate' => 'nullable|numeric|min:0',
            'undertime_deduction_rate' => 'nullable|numeric|min:0',
            'absent_deduction_rate' => 'nullable|numeric|min:0',
        ];
    }
}
