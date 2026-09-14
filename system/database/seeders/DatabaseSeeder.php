<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

/**
 * Snapshot-based seeder.
 *
 * - `php artisan db:seed` on a populated database  -> exports every business table
 *   to database/seeders/data/*.json and changes NOTHING in the database (no data loss).
 *   Run this after entering new data (employees, subjects, schedules, ...) so the
 *   snapshots always mirror the live database.
 *
 * - `php artisan migrate:fresh --seed` on an empty database -> restores the full
 *   dataset from those JSON snapshots, preserving original IDs.
 *
 * - Empty database + no snapshots -> minimal fresh-install bootstrap (settings +
 *   admin user) so the app is usable.
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Business tables mirrored to/from the snapshot files.
     * Transient tables (cache, sessions, jobs, migrations, password_reset_tokens)
     * are intentionally excluded.
     */
    protected array $tables = [
        'settings',
        'departments',
        'positions',
        'courses',
        'school_years',
        'semesters',
        'subjects',
        'rooms',
        'benefits',
        'clearances',
        'users',
        'employees',
        'biometric_devices',
        'employee_benefits',
        'employee_clearances',
        'teaching_schedules',
        'work_schedules',
        'attendance_logs',
        'attendances',
        'make_up_classes',
        'loans',
        'loan_payments',
        'payroll_periods',
        'payrolls',
        'payslips',
        'payroll_receipts',
        'notifications',
        'archives',
    ];

    protected string $dataPath = __DIR__ . '/data';

    public function run(): void
    {
        if ($this->databaseHasData()) {
            $counts = $this->exportSnapshot();
            $total = array_sum($counts);

            $this->command?->info('Database already contains data — nothing was modified.');
            $this->command?->info("Snapshot updated: {$total} rows across " . count($counts) . " tables -> database/seeders/data.");
            $this->command?->warn('These snapshots are what migrate:fresh --seed will restore.');

            return;
        }

        if ($this->snapshotExists()) {
            $total = $this->importSnapshot();
            $this->command?->info("Database restored from snapshot: {$total} rows across " . count($this->tables) . ' tables.');

            return;
        }

        $this->bootstrapFreshInstall();
        $this->command?->warn('No snapshot found — seeded minimal fresh-install data.');
        $this->command?->warn('After entering real data, run `php artisan db:seed` again to capture it into the snapshot.');
    }

    /**
     * True when any mirrored business table already has rows.
     */
    protected function databaseHasData(): bool
    {
        foreach ($this->tables as $table) {
            if (! Schema::hasTable($table)) {
                continue;
            }

            if (DB::table($table)->count() > 0) {
                return true;
            }
        }

        return false;
    }

    protected function snapshotExists(): bool
    {
        return File::exists($this->dataPath . '/subjects.json');
    }

    /**
     * Dump every business table to a JSON file without touching the database.
     */
    protected function exportSnapshot(): array
    {
        File::ensureDirectoryExists($this->dataPath);

        $meta = ['generated_at' => now()->toDateTimeString(), 'tables' => []];

        foreach ($this->tables as $table) {
            if (! Schema::hasTable($table)) {
                continue;
            }

            $rows = DB::table($table)->get()->map(fn ($row) => (array) $row)->all();

            File::put(
                $this->dataPath . "/{$table}.json",
                json_encode($rows, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
            );

            $meta['tables'][$table] = count($rows);
        }

        File::put($this->dataPath . '/_meta.json', json_encode($meta, JSON_PRETTY_PRINT));

        return $meta['tables'];
    }

    /**
     * Truncate and repopulate every table from its snapshot, preserving IDs.
     */
    protected function importSnapshot(): int
    {
        $total = 0;

        Schema::disableForeignKeyConstraints();

        try {
            foreach ($this->tables as $table) {
                $file = $this->dataPath . "/{$table}.json";

                if (! Schema::hasTable($table) || ! File::exists($file)) {
                    continue;
                }

                $rows = json_decode(File::get($file), true) ?: [];

                DB::table($table)->delete();

                foreach (array_chunk($rows, 100) as $chunk) {
                    DB::table($table)->insert($chunk);
                }

                $this->resetSequence($table);
                $total += count($rows);
            }

            $this->backfillUsernames();
        } finally {
            Schema::enableForeignKeyConstraints();
        }

        return $total;
    }

    /**
     * Snapshot files predate the username column, so derive a unique username
     * from each user's email (local part) to keep restored accounts login-able.
     */
    protected function backfillUsernames(): void
    {
        $taken = DB::table('users')->whereNotNull('username')->pluck('username')
            ->mapWithKeys(fn ($u) => [(string) $u => true])
            ->all();

        DB::table('users')->whereNull('username')->orderBy('id')->get()->each(function ($user) use (&$taken) {
            $base = $user->email ? (string) explode('@', $user->email)[0] : 'user';
            $username = $base;
            $i = 1;
            while (isset($taken[$username])) {
                $username = $base.($i++);
            }
            $taken[$username] = true;

            DB::table('users')->where('id', $user->id)->update(['username' => $username]);
        });
    }

    /**
     * Keep AUTOINCREMENT counters above the highest restored ID.
     */
    protected function resetSequence(string $table): void
    {
        try {
            DB::statement(
                "UPDATE sqlite_sequence SET seq = (SELECT COALESCE(MAX(id), 0) FROM \"{$table}\") WHERE name = ?",
                [$table]
            );
        } catch (\Throwable) {
            // Table without autoincrement or no sqlite_sequence entry yet — nothing to do.
        }
    }

    /**
     * Minimal data for a brand-new install when no snapshot exists:
     * default payroll settings plus one admin account.
     */
    protected function bootstrapFreshInstall(): void
    {
        $settings = [
            'company_name' => 'Dr. Carlos S. Lanting College',
            'company_address' => 'Tomas Cabiles St., Tabaco City',
            'monthly_payroll_days' => [15, 30],
            'payment_method' => 'cash',
            'workdays_per_month' => 22,
            'overtime_multiplier' => 1.25,
            'grace_minutes' => 15,
            'sss_ee_rate' => 4.5,
            'sss_ee_cap' => 1350,
            'philhealth_ee_rate' => 2.5,
            'philhealth_ee_cap' => 1100,
            'pagibig_ee_rate' => 2.0,
            'pagibig_ee_cap' => 200,
            'default_other_deduction' => 0,
            'default_shift_start' => '08:00',
            'default_shift_end' => '17:00',
        ];

        foreach ($settings as $key => $value) {
            Setting::set($key, $value, 'payroll');
        }

        User::firstOrCreate(
            ['username' => 'admin'],
            [
                'name' => 'System Administrator',
                'email' => null,
                'password' => 'password',
                'role' => 'admin',
                'is_active' => true,
                'email_verified_at' => now(),
            ]
        );
    }
}
