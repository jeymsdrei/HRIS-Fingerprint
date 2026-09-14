<?php

namespace App\Console\Commands;

use App\Models\BiometricDevice;
use App\Services\BiometricService;
use Illuminate\Console\Command;

class SyncBiometricCommand extends Command
{
    protected $signature = 'biometric:sync {--device= : Device ID to sync, all if omitted}';

    protected $description = 'Pull attendance records from registered ZKTeco fingerprint devices';

    public function handle(BiometricService $service): int
    {
        $devices = $this->option('device')
            ? BiometricDevice::where('id', $this->option('device'))->get()
            : BiometricDevice::where('is_active', true)->get();

        if ($devices->isEmpty()) {
            $this->warn('No biometric devices registered.');

            return self::FAILURE;
        }

        $total = 0;
        foreach ($devices as $device) {
            $this->info("Syncing {$device->name} ({$device->ip_address}:{$device->port})...");
            $result = $service->pullAttendance($device);
            if ($result['ok']) {
                $total += $result['imported'];
                $this->info("  -> {$result['imported']} punches imported.");
            } else {
                $this->error('  -> '.$result['error']);
            }
        }

        $this->info("Done. {$total} new punches imported.");

        return self::SUCCESS;
    }
}
