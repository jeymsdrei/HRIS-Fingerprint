<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBenefitRequest extends FormRequest
{
    /**
     * @return array<string, string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'type' => 'required|in:allowance,incentive,bonus',
            'amount' => 'required|numeric|min:0',
            'frequency' => 'required|in:monthly,yearly,one_time',
            'is_taxable' => 'nullable|boolean',
        ];
    }
}
