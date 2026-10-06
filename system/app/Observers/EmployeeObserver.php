<?php

namespace App\Observers;

use App\Models\Employee;
use App\Models\BiometricAgent;

class EmployeeObserver
{
    public function creating(Employee $employee)
    {
        // Assign a fingerprint_id if not already set (use the next available integer)
        if (is_null($employee->fingerprint_id)) {
            $maxId = Employee::max('fingerprint_id');
            $employee->fingerprint_id = $maxId !== null ? $maxId + 1 : 1;
        }

        // Create a BiometricAgent record so the employee appears in the biometric clock list
        if (is_null($employee->biometric_agent)) {
            BiometricAgent::create([
                'agent_id' => $employee->id,
                'name' => $employee->full_name,
                'status' => 'active',
                'is_active' => true,
            ]);
        }
    }

    public function saved(Employee $employee)
    {
        // Optional: keep BiometricAgent in sync if fingerprint_id changes
        if (! is_null($employee->fingerprint_id)) {
            $agent = $employee->biometric_agent;
            if ($agent) {
                $agent->update([
                    'name' => $employee->full_name,
                    'status' => 'active',
                    'is_active' => true,
                ]);
            }
        }
    }
}