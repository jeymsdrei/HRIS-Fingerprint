<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEmployeeRequest extends FormRequest
{
    /**
     * @return array<string, string>
     */
    public function rules(): array
    {
        return [
            'department_id' => 'nullable|exists:departments,id',
            'position_id' => 'nullable|exists:positions,id',
            'course_id' => 'nullable|exists:courses,id',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'suffix' => 'nullable|string|max:10',
            'birth_date' => 'required|date',
            'gender' => 'required|in:male,female',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:30',
            'address' => 'required|string|max:500',
            'photo' => 'nullable|file|image|mimes:jpg,jpeg,png|max:2048',
            'classification' => 'required|in:teaching,non_teaching',
            'employment_status' => 'required|in:permanent,contractual',
            'salary_type' => 'required|in:monthly,daily',
            'monthly_salary' => 'nullable|numeric|min:0',
            'semi_monthly_salary' => 'nullable|numeric|min:0',
            'daily_rate' => 'nullable|numeric|min:0',
            'hourly_rate' => 'nullable|numeric|min:0',
            'teaching_load' => 'nullable|numeric|min:0',
            'fingerprint_id' => 'nullable|integer',
            'sss_no' => 'nullable|string|max:30',
            'philhealth_no' => 'nullable|string|max:30',
            'pagibig_no' => 'nullable|string|max:30',
            'tin' => 'nullable|string|max:30',
            'tax_status' => 'nullable|string|max:30',
            'bank_name' => 'nullable|string|max:100',
            'bank_account_no' => 'nullable|string|max:50',
            'payment_method' => 'nullable|in:cash,bank_transfer,check',
            'date_hired' => 'nullable|date',
            'login_username' => [
                Rule::requiredIf(fn (): bool => ! $this->route('employee')),
                'string', 'lowercase', 'max:255', 'regex:/^[a-z0-9._-]+$/',
            ],
            'login_password' => [
                Rule::requiredIf(fn (): bool => ! $this->route('employee')),
                'nullable', 'string', 'min:6',
            ],
            'registration_token' => 'required|uuid',
        ];
    }
}
