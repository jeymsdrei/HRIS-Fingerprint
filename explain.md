# HRIS System — Complete Architecture Explanation

## 1. Big Picture

A Laravel 12 monolith at `system/` with **5 RBAC roles**, **3 core engines (services)**, **~28 models**, **~35 tables**, **21 controllers**, and **~40 views**. Flow: **ZKTeco device punches → attendance validation → payroll computation → payslip/receipt release → archiving**.

```
┌──────────┐   punch   ┌─────────────────────┐   registerPunch   ┌──────────────────┐
│ ZKTeco   │ ────────► │ BiometricService    │ ────────────────► │ AttendanceService│
│ Device   │  TCP 4370 │ (or /api/device/push│   processDay()    │ (validates vs    │
└──────────┘           │  or manual punch)   │                   │  schedule)       │
                       └─────────────────────┘                   └────────┬─────────┘
                                                                          │ creates
                                                                          ▼
┌─────────────┐   generatePeriod()   ┌───────────┐   release()   ┌────────────────┐
│ Payroll     │ ───────────────────► │  Payroll  │ ─────────────► │ Payslip +      │
│ Service     │  computeEmployee()   │  records  │                │ Receipt + Loan │
│ (BIR/SSS/   │                      │           │                │ payments +     │
│  PhilHealth)│                      │           │                │ notification   │
└─────────────┘                      └───────────┘                └────────────────┘
```

## 2. The Database — 8 Migration Groups

### A. Breeze core (`0001_01_01_*`)
- **users** — Breeze defaults + our additions: `role` (admin|hr|payroll_officer|department_head|employee), `employee_id` (link to employees), `is_active`
- **cache**, **jobs** — framework internals

### B. RBAC addition (`2026_01_01_000100`)
- `role`, `employee_id`, `is_active` columns added to users

### C. Organizational (`...000200`)
| Table | Purpose | Key FKs |
|---|---|---|
| `departments` | HR office, Registrar, CCIS, CTE, Accounting, Library, Property | — |
| `positions` | Job titles, `category` teaching/non_teaching | `department_id` |
| `subjects` | Course catalog (code, units) | — |
| `rooms` | Classrooms | — |
| `school_years` | e.g. "2025-2026", one `is_active` | — |
| `semesters` | 1st/2nd sem, one active | `school_year_id` |

### D. Employees & Devices (`...000300`)
- **employees** — the heart. `employee_id` (school code like `CCIS-0001`), `classification` (teaching/non_teaching), `employment_status` (permanent/contractual), `salary_type` (monthly/daily), `monthly_salary`/`daily_rate`/`hourly_rate`, `teaching_load` (hours/week), `fingerprint_id` (ZK user id), gov IDs (SSS/PhilHealth/Pag-IBIG/TIN), `tax_status`, bank/payment info, hire dates
  - FKs: `user_id` (their login), `department_id`, `position_id`
- **biometric_devices** — ZKTeco devices (ip, port 4370, serial, last_sync_at)
- **attendance_logs** — raw punches: `employee_id`/`fingerprint_id` (either), `device_id`, `punch_time`, `processed` flag

### E. Schedules & Attendance (`...000400`)
- **teaching_schedules** — per teaching employee: `employee_id`, `subject_id`, `room_id`, `day` (0=Sun..6=Sat), `start_time`/`end_time`, `semester_id`, `school_year_id`
- **work_schedules** — per non-teaching: day + start/end
- **attendances** — validated daily record, **unique(employee_id, date)**:
  `date`, `day`, `schedule_start/end`, `time_in/out`, `working_hours`, `late_minutes`, `undertime_minutes`, `overtime_minutes`, `is_half_day`, `status` (present|late|half_day|absent|rest_day), `source` (device|manual), `processed_by`

### F. Make-up / Clearance / Requirements (`...000500`)
- **make_up_classes** — extra teaching: `class_date`, times, `hours_rendered`, `hourly_rate`, `additional_pay`, `approval_status` (pending|approved|rejected), `approved_by/at`
- **clearances** — checklist definitions (Library, Accounting, Registrar, Dept Head, Property, HR), `is_required`
- **employee_clearances** — per-employee status per clearance, **unique(employee_id, clearance_id)**, `cleared_by/at`
- **requirements** — doc definitions (Diploma, PRC, NBI…), `applies_to` (teaching|non_teaching|all), `is_required`
- **employee_requirements** — per-employee status (pending|submitted|approved|expired), `file_path`, `verified_by/at`, **unique(employee_id, requirement_id)**

### G. Benefits / Loans / Settings (`...000600`)
- **benefits** — master definitions (Rice Allowance, Clothing…), `type` (allowance|incentive|bonus), `frequency`, `is_taxable`
- **employee_benefits** — assignments with optional amount override + effective/expiration dates
- **loans** — `loan_type` (sss|pagibig|company|cash_advance|other), `amount`, `interest_rate`, `monthly_amortization`, `balance`, status (active|paid|closed)
- **loan_payments** — amortization records, `payroll_id` (filled at release) + `loan_id`
- **settings** — key/value pairs (company_name, sss_ee_rate, grace_minutes…), `group`

### H. Payroll (`...000700`)
- **payroll_periods** — `name` ("August 2026"), `type` (monthly|semi_monthly|daily), `start_date`/`end_date`/`pay_date`, status (draft|processing|released|closed), `generated_by/at`
- **payrolls** — one row per employee per period, **unique(payroll_period_id, employee_id)**, stores the **computed result**:
  - Earnings: `basic_pay`, `teaching_hours`, `teaching_pay`, `make_up_pay`, `allowances`, `overtime_pay`, `benefits`, `gross_pay`
  - Deductions: `deduction_late`, `deduction_absent`, `deduction_undertime`, `deduction_tax`, `deduction_sss`, `deduction_philhealth`, `deduction_pagibig`, `deduction_loans`, `deduction_cash_advance`, `deduction_other`, `total_deductions`, `net_pay`
  - Summary: `days_present/late/absent`, `late_minutes_total`, `undertime_minutes_total`, `overtime_hours_total`
  - Status: `draft|on_hold|ready|released`, `hold_reason`, `released_by/at`
- **payslips** — generated at release: `payslip_no` (PS-000001), `digital_signature`, `generated_at`
- **payroll_receipts** — `receipt_no` (PR-000001), `amount_received` (= net_pay), `payment_method`, `employee_signature` (typed name), `hr_signature`, `signed_at`

### I. Notifications & Archives (`...000800`)
- **notifications** — `title`, `message`, `url`, `icon`, `read/read_at`, `notifiable_id/type` (User)
- **archives** — immutable snapshots: `archive_type`, `ref_id`, `ref_type`, `period_type` (monthly), `period_label` ("2026-08"), `data` (JSON copy of the record)

## 3. The Data Flow (End-to-End)

### Step 1 — Punch capture
3 sources funnel into `attendance_logs`:
1. **ZKTeco device** — `biometric:sync` command / BiometricController::sync uses `BiometricService` (raw TCP client, port 4370) to pull `(fingerprint_id, punch_time)` pairs → `persistPunch()` matches fingerprint_id → employee
2. **API push** — `POST /api/device/push`
3. **Manual** — admin/HR enters a punch (attendance/punch or biometrics/punches)

### Step 2 — Validation (`AttendanceService::processDay`)
Every punch triggers idempotent recompute of that employee's day:
1. `getScheduleFor()` resolves the day's window: teaching → teaching_schedules (filtered by active school year + semester), non-teaching → work_schedules, fallback → company default shift (settings)
2. No schedule → **rest_day**; no punches but scheduled → **absent**
3. First punch = time_in, last = time_out
4. Computes: `late` (arrival after start), `undertime` (depart before end), `overtime` (only credited if on time both ends), `working_hours` = actual presence capped at scheduled window
5. Status: present → **late** (>0 late) → **half_day** (<50% of window worked) → absent
6. Writes/overwrites the `attendances` row (unique per employee+date = always a single source of truth)

### Step 3 — Payroll generation (`PayrollService::generatePeriod`)
1. Admin/payroll creates a `payroll_period` (payroll/create form)
2. `computeEmployee()` per active employee:
   - **Basic pay**: permanent → full `monthly_salary`; contractual → `working_hours × hourly_rate`
   - **Teaching pay**: permanent → only *overload* hours beyond `teaching_load × weeks` × hourly_rate; contractual → all hours
   - **Make-up pay**: sum of approved make_up_classes' `additional_pay`
   - **Benefits/allowances**: sum of employee_benefits whose dates overlap the period
   - **Gross** = basic + teaching + make-up + allowances + benefits + overtime (overtime_minutes/60 × hourly × 1.25)
   - **Deductions**: late/absent/undertime (permanent only), BIR withholding (`computeWithholdingTax` bracket table), SSS/PhilHealth/Pag-IBIG (% of salary, capped, from settings), loan amortizations (active loans only), cash advance separately
   - **Net** = gross − total deductions
3. **Hold rule**: teaching employees go `on_hold` unless `hasCompleteClearance()` (all `is_required` clearances cleared) **and** `hasCompleteRequirements()` (all required docs submitted/approved). Non-teaching always `ready`. This is the "no clearances, no salary" policy.
4. Status lifecycle: `draft → on_hold/ready → released`

### Step 4 — Release (`PayrollService::release`)
In one DB transaction:
1. Payroll → `released`, `released_by/at`
2. Creates **payslip** (PS-XXXXXX) and **receipt** (amount = net_pay, method = employee's payment_method)
3. For each active loan: decrements `balance`, writes `loan_payments` row (payroll_id), flips loan to `paid` when balance ≤ 0
4. Pushes a **notification** to the employee ("Salary released…")

### Step 5 — Employee self-service
Employee logs in → `/my/*` pages: views their attendance, schedule, payslips (PDF download via DomPDF), receipts (types their name as electronic signature → `employee_signature` + `signed_at`), payroll history, and submits requirement files (uploaded to `storage/app/public/requirements/`). **Ownership guard**: `abort_if($payslip->employee_id !== $employee->id, 403)`.

### Step 6 — Reports & Archives
- **ReportService** builds 11 reports (attendance, daily summary, late, absent, teaching hours, payroll, make-up, benefits, loans, departments, employees) from the validated data; exported as CSV (stream), Excel (GenericExport), PDF (DomPDF)
- **ArchiveService::archivePeriod(month)** snapshots attendance/payroll/payslip/receipts/make-up rows into `archives` as JSON — immutable record-keeping

## 4. How Everything Connects

### RBAC plumbing
`RoleMiddleware` (alias `role`) checks `user->role`; `admin` bypasses everything. Routes are grouped in `routes/web.php`:
- `role:admin` — users, departments, masterdata, biometrics, settings, archives
- `role:admin,hr` — employees, schedules, attendance, clearances, requirements, makeup.store
- `role:admin,hr,department_head` — makeup approve/reject
- `role:admin,payroll_officer` — payroll, payslips, receipts, benefits, loans, reports
- `role:admin,department_head` — department scoped views (AttendanceController filters by their `department_id`)
- Everyone incl. `employee` — `/my/*` self-service

### Service injection
- `AttendanceService` — used by AttendanceController, BiometricController, PayrollService (via generated data), seeder, `attendance:process` command
- `PayrollService` — PayrollController, PayrollSeeder, `release` used by `payroll.release`
- `BiometricService` — BiometricController, `biometric:sync` command
- `ReportService` — ReportController (both screen + exports)
- `ArchiveService` — ArchiveController

### Key model shortcuts
- `Employee::hasCompleteClearance()` / `hasCompleteRequirements()` — gate used by PayrollService
- `User::employee()` — links account → employee record; `Employee::user()` reverse
- `Payroll::period()/employee()/payslip()/receipt()/loanPayments()` — the release chain
- `Setting::get/set()` — JSON-smart key/value used by both AttendanceService (shift defaults) and PayrollService (tax rates)
- `Notification::notify()` — pushed to `notifiable_id` = user id

## 5. The Math (formulas)

| Item | Formula |
|---|---|
| Late minutes | `max(0, time_in − schedule_start)` |
| Undertime | `max(0, schedule_end − time_out)` |
| Overtime | `max(0, time_out − end)` only if late=0 AND undertime=0 |
| Working hours | `min(actual_presence, scheduled_window)` |
| Half day | working < 50% of window |
| Basic (permanent) | full monthly salary |
| Basic (contractual) | working_hours × hourly_rate |
| Overload pay | `max(0, hours − teaching_load × weeks) × hourly_rate` |
| SSS EE | `min(monthly × 4.5%, ₱1,350 cap)` |
| PhilHealth EE | `min(monthly × 2.5%, ₱1,100 cap)` |
| Pag-IBIG EE | `min(monthly × 2.0%, ₱200 cap)` |
| Withholding | BIR table: 0 if ≤₱20,833; 15%/20%/25%/30%/35% progressive brackets |
| Absence deduction (perm.) | `days_absent × (monthly / 22 workdays)` |
| Net pay | `gross − (late+absent+undertime+tax+sss+ph+pag+loans+cash_advance+other)` |
| Make-up pay | `approved hours × hourly_rate` (or recorded additional_pay) |

The system runs on **idempotent recompute** — `processDay()` and `generatePeriod()` always rebuild from source data (punches/schedules/clearances), so re-running is safe and corrections propagate everywhere.
