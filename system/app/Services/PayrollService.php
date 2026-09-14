<?php

namespace App\Services;

use App\Models\Attendance;
use App\Models\Employee;
use App\Models\Notification;
use App\Models\Payroll;
use App\Models\PayrollPeriod;
use App\Models\PayrollReceipt;
use App\Models\Payslip;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class PayrollService
{
    /**
     * Simplified BIR-style monthly withholding brackets (Philippines).
     */
    public function computeWithholdingTax(float $taxableMonthlyIncome): float
    {
        if ($taxableMonthlyIncome <= 20833) {
            return 0;
        }
        if ($taxableMonthlyIncome <= 33332) {
            return ($taxableMonthlyIncome - 20833) * 0.15;
        }
        if ($taxableMonthlyIncome <= 66666) {
            return 1875 + ($taxableMonthlyIncome - 33332) * 0.20;
        }
        if ($taxableMonthlyIncome <= 166666) {
            return 8541.80 + ($taxableMonthlyIncome - 66666) * 0.25;
        }
        if ($taxableMonthlyIncome <= 666666) {
            return 33541.80 + ($taxableMonthlyIncome - 166666) * 0.30;
        }

        return 183541.80 + ($taxableMonthlyIncome - 666666) * 0.35;
    }

    private function sss(Employee $e): float
    {
        $rate = (float) Setting::get('sss_ee_rate', 4.5);
        $cap = (float) Setting::get('sss_ee_cap', 1350);

        return round(min((float) $e->monthly_salary * $rate / 100, $cap), 2);
    }

    private function philhealth(Employee $e): float
    {
        $rate = (float) Setting::get('philhealth_ee_rate', 2.5);
        $cap = (float) Setting::get('philhealth_ee_cap', 1100);

        return round(min((float) $e->monthly_salary * $rate / 100, $cap), 2);
    }

    private function pagibig(Employee $e): float
    {
        $rate = (float) Setting::get('pagibig_ee_rate', 2.0);
        $cap = (float) Setting::get('pagibig_ee_cap', 200);

        return round(min((float) $e->monthly_salary * $rate / 100, $cap), 2);
    }

    private function attendanceSummary(Employee $e, PayrollPeriod $p): array
    {
        $rows = Attendance::where('employee_id', $e->id)
            ->whereBetween('date', [$p->start_date->toDateString(), $p->end_date->toDateString()])
            ->get();

        return [
            'rows' => $rows,
            'days_present' => $rows->whereIn('status', [Attendance::PRESENT, Attendance::LATE, Attendance::HALF_DAY])->count(),
            'days_late' => $rows->where('status', Attendance::LATE)->count(),
            'days_absent' => $rows->where('status', Attendance::ABSENT)->count(),
            'late_minutes' => (int) $rows->sum('late_minutes'),
            'undertime_minutes' => (int) $rows->sum('undertime_minutes'),
            'overtime_minutes' => (int) $rows->sum('overtime_minutes'),
            'working_hours' => round($rows->sum('working_hours'), 2),
        ];
    }

    private function makeUpPay(Employee $e, PayrollPeriod $p): array
    {
        $approved = $e->makeUpClasses()
            ->where('approval_status', 'approved')
            ->whereBetween('class_date', [$p->start_date->toDateString(), $p->end_date->toDateString()])
            ->get();

        return [
            'hours' => round($approved->sum('hours_rendered'), 2),
            'pay' => round($approved->sum(fn ($m) => $m->additional_pay ?: ($m->hours_rendered * $m->hourly_rate)), 2),
        ];
    }

    private function benefitsFor(Employee $e, PayrollPeriod $p): array
    {
        $active = $e->benefits()
            ->whereHas('benefit', fn ($q) => $q->where('is_active', true))
            ->get()
            ->filter(function ($eb) use ($p) {
                if ($eb->effective_date && $eb->effective_date->gt($p->end_date)) {
                    return false;
                }
                if ($eb->expiration_date && $eb->expiration_date->lt($p->start_date)) {
                    return false;
                }

                return true;
            });

        $allowances = 0.0;
        $benefits = 0.0;
        foreach ($active as $eb) {
            $amount = (float) $eb->effective_amount;
            if ($eb->benefit->type === 'allowance') {
                $allowances += $amount;
            } else {
                $benefits += $amount;
            }
        }

        return ['allowances' => round($allowances, 2), 'benefits' => round($benefits, 2)];
    }

    private function loansFor(Employee $e): array
    {
        $active = $e->loans()->where('status', 'active')->get();

        $loans = 0.0;
        $cash = 0.0;
        foreach ($active as $loan) {
            $amort = (float) $loan->monthly_amortization;
            if ($loan->loan_type === 'cash_advance') {
                $cash += $amort;
            } else {
                $loans += $amort;
            }
        }

        return ['loans' => round($loans, 2), 'cash_advance' => round($cash, 2)];
    }

    /**
     * Compute one employee's payroll line for a period.
     */
    public function computeEmployee(Employee $e, PayrollPeriod $p): array
    {
        $summary = $this->attendanceSummary($e, $p);
        $makeUp = $this->makeUpPay($e, $p);
        $benef = $this->benefitsFor($e, $p);
        $loans = $this->loansFor($e);

        $hourlyRate = (float) $e->hourly_rate;
        $monthly = (float) $e->monthly_salary;
        $semiMonthly = (float) $e->semi_monthly_salary;
        $dailyRate = (float) $e->daily_rate;
        $workdaysPerMonth = (int) Setting::get('workdays_per_month', 22);
        $otMultiplier = (float) Setting::get('overtime_multiplier', 1.25);

        $lateRate = Setting::get('late_deduction_rate');
        $undertimeRate = Setting::get('undertime_deduction_rate');
        $absentRate = Setting::get('absent_deduction_rate');

        $isTeaching = $e->classification === 'teaching';

        $basic = 0.0;
        $teachingHours = (float) $summary['working_hours'];
        $teachingPay = 0.0;

        if ($isTeaching) {
            $teachingPay = round($teachingHours * $hourlyRate, 2);
        } else {
            $basic = match ($p->type) {
                'semi_monthly' => $semiMonthly > 0 ? $semiMonthly : round($monthly / 2, 2),
                'daily' => $dailyRate > 0 ? round($dailyRate * $summary['days_present'], 2) : $monthly,
                default => $monthly,
            };
        }

        $overtimePay = round($summary['overtime_minutes'] / 60 * $hourlyRate * $otMultiplier, 2);
        $makeUpPay = (float) $makeUp['pay'];

        $gross = round($basic + $teachingPay + $makeUpPay + $benef['allowances'] + $benef['benefits'] + $overtimePay, 2);

        $late = 0.0;
        $absent = 0.0;
        $undertime = 0.0;

        if (! $isTeaching) {
            $late = $lateRate !== null && $lateRate !== ''
                ? round($summary['late_minutes'] * (float) $lateRate, 2)
                : round($summary['late_minutes'] / 60 * $hourlyRate, 2);
            $undertime = $undertimeRate !== null && $undertimeRate !== ''
                ? round($summary['undertime_minutes'] * (float) $undertimeRate, 2)
                : round($summary['undertime_minutes'] / 60 * $hourlyRate, 2);
            $absent = $absentRate !== null && $absentRate !== ''
                ? round($summary['days_absent'] * (float) $absentRate, 2)
                : round($summary['days_absent'] * ($monthly / $workdaysPerMonth), 2);
        }

        $sss = $this->sss($e);
        $ph = $this->philhealth($e);
        $pag = $this->pagibig($e);
        $tax = $this->computeWithholdingTax($basic + $teachingPay + $makeUpPay + $overtimePay);
        $other = (float) Setting::get('default_other_deduction', 0);

        $totalDeductions = round($late + $absent + $undertime + $tax + $sss + $ph + $pag + $loans['loans'] + $loans['cash_advance'] + $other, 2);
        $net = round($gross - $totalDeductions, 2);

        return [
            'basic_pay' => $basic,
            'teaching_hours' => $teachingHours,
            'teaching_pay' => $teachingPay,
            'make_up_pay' => $makeUpPay,
            'allowances' => $benef['allowances'],
            'overtime_pay' => $overtimePay,
            'benefits' => $benef['benefits'],
            'gross_pay' => $gross,
            'deduction_late' => $late,
            'deduction_absent' => $absent,
            'deduction_undertime' => $undertime,
            'deduction_tax' => $tax,
            'deduction_sss' => $sss,
            'deduction_philhealth' => $ph,
            'deduction_pagibig' => $pag,
            'deduction_loans' => $loans['loans'],
            'deduction_cash_advance' => $loans['cash_advance'],
            'deduction_other' => $other,
            'total_deductions' => $totalDeductions,
            'net_pay' => $net,
            'days_present' => $summary['days_present'],
            'days_late' => $summary['days_late'],
            'days_absent' => $summary['days_absent'],
            'late_minutes_total' => $summary['late_minutes'],
            'undertime_minutes_total' => $summary['undertime_minutes'],
            'overtime_hours_total' => round($summary['overtime_minutes'] / 60, 2),
        ];
    }

    public function audit(Payroll $payroll): array
    {
        $expected = $this->computeEmployee($payroll->employee, $payroll->period);
        $fields = [
            'basic_pay', 'teaching_hours', 'teaching_pay', 'make_up_pay',
            'allowances', 'overtime_pay', 'benefits', 'gross_pay',
            'deduction_late', 'deduction_absent', 'deduction_undertime',
            'deduction_tax', 'deduction_sss', 'deduction_philhealth',
            'deduction_pagibig', 'deduction_loans', 'deduction_cash_advance',
            'deduction_other', 'total_deductions', 'net_pay',
        ];
        $differences = [];

        foreach ($fields as $field) {
            $current = round((float) $payroll->{$field}, 2);
            $calculated = round((float) $expected[$field], 2);
            if ($current !== $calculated) {
                $differences[$field] = ['current' => $current, 'proposed' => $calculated];
            }
        }

        return ['accurate' => $differences === [], 'differences' => $differences];
    }

    /**
     * Generate payrolls for every active employee in a period.
     * Teaching personnel are placed on hold until clearances complete.
     */
    public function generatePeriod(PayrollPeriod $p, ?User $user = null): array
    {
        $user ??= Auth::user();
        $created = 0;

        DB::transaction(function () use ($p, &$created) {
            Employee::where('is_active', true)->chunkById(100, function (Collection $employees) use ($p, &$created) {
                foreach ($employees as $e) {
                    /** @var Employee $e */
                    $existing = Payroll::where('payroll_period_id', $p->id)
                        ->where('employee_id', $e->id)
                        ->first();
                    if ($existing?->status === Payroll::RELEASED) {
                        continue;
                    }

                    $data = $this->computeEmployee($e, $p);

                    $status = Payroll::READY;
                    $holdReason = null;
                    if ($e->classification === 'teaching') {
                        if (! $e->hasCompleteClearance()) {
                            $status = Payroll::ON_HOLD;
                            $holdReason = 'Incomplete clearance';
                        }
                    }

                    Payroll::updateOrCreate(
                        ['payroll_period_id' => $p->id, 'employee_id' => $e->id],
                        array_merge($data, [
                            'status' => $status,
                            'hold_reason' => $holdReason,
                            'notes' => null,
                        ])
                    );
                    $created++;
                }
            });
        });

        $p->update(['status' => 'processing', 'generated_by' => $user?->id, 'generated_at' => now()]);

        return [
            'created' => $created,
            'held' => Payroll::where('payroll_period_id', $p->id)->where('status', Payroll::ON_HOLD)->count(),
        ];
    }

    /**
     * Release a payroll: records salary release, generates payslip + receipt,
     * and applies loan payments.
     */
    public function release(Payroll $payroll, ?User $releaser = null): Payroll
    {
        $releaser ??= Auth::user();

        if ($payroll->status === Payroll::ON_HOLD) {
            throw new \RuntimeException('Cannot release an on-hold payroll.');
        }

        DB::transaction(function () use ($payroll, $releaser) {
            $payroll->update([
                'status' => Payroll::RELEASED,
                'released_at' => now(),
                'released_by' => $releaser?->id,
            ]);

            if (! $payroll->payslip) {
                Payslip::create([
                    'payslip_no' => 'PS-'.str_pad((string) $payroll->id, 6, '0', STR_PAD_LEFT),
                    'payroll_id' => $payroll->id,
                    'employee_id' => $payroll->employee_id,
                    'generated_at' => now(),
                ]);
            }

            if (! $payroll->receipt) {
                PayrollReceipt::create([
                    'receipt_no' => 'PR-'.str_pad((string) $payroll->id, 6, '0', STR_PAD_LEFT),
                    'payroll_id' => $payroll->id,
                    'employee_id' => $payroll->employee_id,
                    'amount_received' => $payroll->net_pay,
                    'payment_method' => $payroll->employee->payment_method ?? 'cash',
                ]);
            }

            foreach ($payroll->employee->loans()->where('status', 'active')->get() as $loan) {
                $amort = (float) $loan->monthly_amortization;
                if ($amort <= 0) {
                    continue;
                }
                $loan->decrement('balance', $amort);
                $loan->payments()->create([
                    'payroll_id' => $payroll->id,
                    'amount' => $amort,
                    'payment_date' => now()->toDateString(),
                ]);
                if ($loan->balance <= 0) {
                    $loan->update(['status' => 'paid', 'balance' => 0]);
                }
            }
        });

        Notification::notify(
            $payroll->employee->user,
            'Salary Released',
            'Your salary of '.number_format((float) $payroll->net_pay, 2)." for {$payroll->period->name} has been released.",
            route('employee.payslips')
        );

        return $payroll->fresh();
    }
}
