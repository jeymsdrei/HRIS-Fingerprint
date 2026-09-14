<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Loan;
use App\Models\PayrollPeriod;
use App\Services\PayrollService;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PayrollSeeder extends Seeder
{
    public function run(): void
    {
        $period = PayrollPeriod::firstOrCreate(
            ['name' => Carbon::now()->format('F Y')],
            [
                'type' => 'monthly',
                'start_date' => Carbon::now()->startOfMonth()->toDateString(),
                'end_date' => Carbon::now()->endOfMonth()->toDateString(),
                'pay_date' => Carbon::now()->addDays(5)->toDateString(),
                'status' => 'draft',
            ]
        );

        $this->seedLoans();

        $service = new PayrollService;
        $service->generatePeriod($period);

        $this->command?->info('Payroll period "'.$period->name.'" generated.');
    }

    private function seedLoans(): void
    {
        $loans = [
            ['employee_id' => 'BSCS-0002', 'type' => 'company', 'amount' => 30000, 'amort' => 2500, 'ref' => 'LOAN-2025-001'],
            ['employee_id' => 'BSCS-0001', 'type' => 'pagibig', 'amount' => 20000, 'amort' => 1667, 'ref' => 'LOAN-2025-002'],
            ['employee_id' => 'BSHM-0001', 'type' => 'cash_advance', 'amount' => 5000, 'amort' => 1000, 'ref' => 'CA-2025-014'],
        ];

        foreach ($loans as $l) {
            $employee = Employee::where('employee_id', $l['employee_id'])->first();
            if (! $employee) {
                continue;
            }

            Loan::firstOrCreate(
                ['employee_id' => $employee->id, 'reference_no' => $l['ref']],
                [
                    'loan_type' => $l['type'],
                    'amount' => $l['amount'],
                    'interest_rate' => 0,
                    'monthly_amortization' => $l['amort'],
                    'balance' => $l['amount'],
                    'start_date' => Carbon::now()->subMonths(2)->toDateString(),
                    'end_date' => Carbon::now()->addMonths(8)->toDateString(),
                    'status' => 'active',
                ]
            );
        }
    }
}
