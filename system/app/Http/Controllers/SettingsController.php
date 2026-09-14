<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $groups = Setting::select('group')->distinct()->pluck('group');
        $settings = Setting::orderBy('group')->orderBy('key')->get();

        return view('settings.index', compact('settings', 'groups'));
    }

    public function payroll()
    {
        $keys = [
            'company_name', 'company_address', 'monthly_payroll_days', 'payment_method',
            'workdays_per_month', 'overtime_multiplier', 'grace_minutes',
            'sss_ee_rate', 'sss_ee_cap', 'philhealth_ee_rate', 'philhealth_ee_cap',
            'pagibig_ee_rate', 'pagibig_ee_cap', 'default_other_deduction',
            'default_shift_start', 'default_shift_end',
            'late_deduction_rate', 'undertime_deduction_rate', 'absent_deduction_rate',
        ];
        $values = [];
        foreach ($keys as $key) {
            $values[$key] = Setting::get($key, $this->defaultValue($key));
        }

        return view('settings.payroll', compact('values'));
    }

    public function savePayroll(Request $request)
    {
        $request->validate([
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
        ]);

        foreach ($request->except(['_token']) as $key => $value) {
            Setting::set($key, $value, 'payroll');
        }

        return back()->with('success', 'Payroll settings saved.');
    }

    public function updateKey(Request $request, string $key)
    {
        Setting::set($key, $request->value ?? $request->input('value'), $request->input('group', 'general'));

        return back()->with('success', 'Setting updated.');
    }

    private function defaultValue(string $key): mixed
    {
        return match ($key) {
            'company_name' => 'Department of Computer and Electronics',
            'company_address' => '',
            'monthly_payroll_days' => [15, 30],
            'payment_method' => 'cash',
            'workdays_per_month' => 22,
            'overtime_multiplier' => 1.25,
            'sss_ee_rate' => 4.5,
            'sss_ee_cap' => 1350,
            'philhealth_ee_rate' => 2.5,
            'philhealth_ee_cap' => 1100,
            'pagibig_ee_rate' => 2.0,
            'pagibig_ee_cap' => 200,
            'default_other_deduction' => 0,
            'late_deduction_rate' => '',
            'undertime_deduction_rate' => '',
            'absent_deduction_rate' => '',
            'grace_minutes' => 15,
            'default_shift_start' => '08:00',
            'default_shift_end' => '17:00',
            default => null,
        };
    }
}
