<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLoanRequest extends FormRequest
{
    /**
     * @return array<string, string>
     */
    public function rules(): array
    {
        return [
            'balance' => 'required|numeric|min:0',
            'status' => 'required|in:active,paid,closed',
        ];
    }
}
