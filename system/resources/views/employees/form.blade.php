<x-app-layout hris>
    <x-slot name="title">{{ $employee->exists ? 'Edit Employee' : 'Register Employee' }}</x-slot>

    <div class="page-container">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-900">{{ $employee->exists ? 'Edit Employee' : 'Register New Employee' }}</h1>
            <p class="mt-2 text-slate-600">{{ $employee->exists ? 'Update employee information and assignments' : 'Add a new employee to the system' }}</p>
        </div>

        <form method="POST" action="{{ $employee->exists ? route('employees.update', $employee) : route('employees.store') }}" class="space-y-6">
            @csrf
            @if ($employee->exists) @method('PUT') @endif

            <div x-data="{ classification: '{{ old('classification', $employee->classification) }}', status: '{{ old('employment_status', $employee->employment_status) }}', salaryType: '{{ old('salary_type', $employee->salary_type) }}' }">

                {{-- Employment Classification --}}
                <div class="card">
                    <div class="card-header">
                        <h2 class="font-semibold text-slate-900">Employment Classification</h2>
                    </div>
                    <div class="card-body space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label class="input-label">Classification <span class="text-red-500">*</span></label>
                                <select name="classification" x-model="classification" class="input" required>
                                    <option value="">Select...</option>
                                    <option value="teaching">Teaching Personnel</option>
                                    <option value="non_teaching">Non-Teaching Personnel</option>
                                </select>
                                @error('classification') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="input-label">Employment Status <span class="text-red-500">*</span></label>
                                <select name="employment_status" x-model="status" class="input" required>
                                    <option value="">Select...</option>
                                    <option value="permanent">Regular / Permanent</option>
                                    <option value="contractual">Non-Regular / Contractual</option>
                                </select>
                                @error('employment_status') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="input-label">Salary Type <span class="text-red-500">*</span></label>
                                <select name="salary_type" x-model="salaryType" class="input" required>
                                    <option value="">Select...</option>
                                    <option value="monthly">Monthly</option>
                                    <option value="daily">Daily</option>
                                </select>
                                @error('salary_type') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Personal Information --}}
                <div class="card">
                    <div class="card-header">
                        <h2 class="font-semibold text-slate-900">Personal Information</h2>
                    </div>
                    <div class="card-body space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                            <div>
                                <label class="input-label">First Name <span class="text-red-500">*</span></label>
                                <input type="text" name="first_name" value="{{ old('first_name', $employee->first_name) }}" class="input" required>
                                @error('first_name') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="input-label">Middle Name</label>
                                <input type="text" name="middle_name" value="{{ old('middle_name', $employee->middle_name) }}" class="input">
                            </div>
                            <div>
                                <label class="input-label">Last Name <span class="text-red-500">*</span></label>
                                <input type="text" name="last_name" value="{{ old('last_name', $employee->last_name) }}" class="input" required>
                                @error('last_name') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="input-label">Suffix</label>
                                <input type="text" name="suffix" value="{{ old('suffix', $employee->suffix) }}" class="input" placeholder="Jr., Sr., etc.">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                            <div>
                                <label class="input-label">Birth Date</label>
                                <input type="date" name="birth_date" value="{{ old('birth_date', $employee->birth_date?->format('Y-m-d')) }}" class="input">
                            </div>
                            <div>
                                <label class="input-label">Gender</label>
                                <select name="gender" class="input">
                                    <option value="">Select...</option>
                                    <option value="male" @selected(old('gender', $employee->gender) == 'male')>Male</option>
                                    <option value="female" @selected(old('gender', $employee->gender) == 'female')>Female</option>
                                </select>
                            </div>
                            <div>
                                <label class="input-label">Email</label>
                                <input type="email" name="email" value="{{ old('email', $employee->email) }}" class="input">
                            </div>
                            <div>
                                <label class="input-label">Phone</label>
                                <input type="tel" name="phone" value="{{ old('phone', $employee->phone) }}" class="input">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="input-label">Address</label>
                                <input type="text" name="address" value="{{ old('address', $employee->address) }}" class="input" placeholder="Street address">
                            </div>
                            <div>
                                <label class="input-label">Date Hired</label>
                                <input type="date" name="date_hired" value="{{ old('date_hired', $employee->date_hired?->format('Y-m-d')) }}" class="input">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Assignment --}}
                <div class="card">
                    <div class="card-header">
                        <h2 class="font-semibold text-slate-900">Assignment</h2>
                    </div>
                    <div class="card-body space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label class="input-label">Department</label>
                                <select name="department_id" class="input">
                                    <option value="">Select Department...</option>
                                    @foreach ($departments as $d)
                                        <option value="{{ $d->id }}" @selected(old('department_id', $employee->department_id) == $d->id)>{{ $d->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="input-label">Position</label>
                                <select name="position_id" class="input">
                                    <option value="">Select Position...</option>
                                    @foreach ($positions as $p)
                                        <option value="{{ $p->id }}" @selected(old('position_id', $employee->position_id) == $p->id)>{{ $p->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="input-label">Course</label>
                                <select name="course_id" class="input">
                                    <option value="">Select Course...</option>
                                    @foreach ($courses as $c)
                                        <option value="{{ $c->id }}" @selected(old('course_id', $employee->course_id) == $c->id)>{{ $c->code }} — {{ $c->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Compensation --}}
                <div class="card">
                    <div class="card-header">
                        <h2 class="font-semibold text-slate-900">Compensation</h2>
                    </div>
                    <div class="card-body space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                            <div>
                                <label class="input-label">Monthly Salary</label>
                                <input type="number" step="0.01" name="monthly_salary" value="{{ old('monthly_salary', $employee->monthly_salary) }}" class="input" placeholder="0.00">
                            </div>
                            <div>
                                <label class="input-label">Semi-Monthly (15-day) Salary</label>
                                <input type="number" step="0.01" name="semi_monthly_salary" value="{{ old('semi_monthly_salary', $employee->semi_monthly_salary) }}" class="input" placeholder="0.00">
                            </div>
                            <div>
                                <label class="input-label">Daily Rate</label>
                                <input type="number" step="0.01" name="daily_rate" value="{{ old('daily_rate', $employee->daily_rate) }}" class="input" placeholder="0.00">
                            </div>
                            <div>
                                <label class="input-label">Hourly Rate</label>
                                <input type="number" step="0.01" name="hourly_rate" value="{{ old('hourly_rate', $employee->hourly_rate) }}" class="input" placeholder="0.00">
                            </div>
                            <div x-show="classification === 'teaching'">
                                <label class="input-label">Teaching Load (hrs/week)</label>
                                <input type="number" step="0.25" name="teaching_load" value="{{ old('teaching_load', $employee->teaching_load) }}" class="input" placeholder="0.00">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Government ID --}}
                <div class="card">
                    <div class="card-header">
                        <h2 class="font-semibold text-slate-900">Government IDs & Numbers</h2>
                    </div>
                    <div class="card-body space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                            <div>
                                <label class="input-label">SSS No.</label>
                                <input type="text" name="sss_no" value="{{ old('sss_no', $employee->sss_no) }}" class="input" placeholder="XX-XXXXXXX-X">
                            </div>
                            <div>
                                <label class="input-label">PhilHealth No.</label>
                                <input type="text" name="philhealth_no" value="{{ old('philhealth_no', $employee->philhealth_no) }}" class="input">
                            </div>
                            <div>
                                <label class="input-label">Pag-IBIG No.</label>
                                <input type="text" name="pagibig_no" value="{{ old('pagibig_no', $employee->pagibig_no) }}" class="input">
                            </div>
                            <div>
                                <label class="input-label">TIN</label>
                                <input type="text" name="tin" value="{{ old('tin', $employee->tin) }}" class="input" placeholder="XXXXXXXXXXX">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Biometric & Payment --}}
                <div class="card">
                    <div class="card-header">
                        <h2 class="font-semibold text-slate-900">Biometric & Payment Information</h2>
                    </div>
                    <div class="card-body space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                            <div>
                                <label class="input-label">Fingerprint ID</label>
                                <input type="number" name="fingerprint_id" value="{{ old('fingerprint_id', $employee->fingerprint_id) }}" class="input" placeholder="ZK Device ID">
                            </div>
                            <div>
                                <label class="input-label">Payment Method</label>
                                <select name="payment_method" class="input">
                                    <option value="cash" @selected(old('payment_method', $employee->payment_method) == 'cash')>Cash</option>
                                    <option value="bank_transfer" @selected(old('payment_method', $employee->payment_method) == 'bank_transfer')>Bank Transfer</option>
                                    <option value="check" @selected(old('payment_method', $employee->payment_method) == 'check')>Check</option>
                                </select>
                            </div>
                            <div>
                                <label class="input-label">Bank Name</label>
                                <input type="text" name="bank_name" value="{{ old('bank_name', $employee->bank_name) }}" class="input" placeholder="e.g., BDO, BPI">
                            </div>
                            <div>
                                <label class="input-label">Bank Account No.</label>
                                <input type="text" name="bank_account_no" value="{{ old('bank_account_no', $employee->bank_account_no) }}" class="input">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Login Account --}}
                <div class="card">
                    <div class="card-header">
                        <h2 class="font-semibold text-slate-900">Login Account <span class="text-xs text-slate-500 font-normal">(Optional)</span></h2>
                    </div>
                    <div class="card-body space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="input-label">Username</label>
                                <input type="text" name="login_username" value="{{ old('login_username', $employee->user?->username) }}" class="input" placeholder="e.g. jane.santos">
                                @error('login_username') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="input-label">Password {{ !$employee->exists ? '(Required)' : '(Leave blank to keep current)' }}</label>
                                <input type="password" name="login_password" class="input" placeholder="••••••••">
                                @error('login_password') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Form Actions --}}
                <div class="card-footer flex gap-3">
                    <button type="submit" class="btn btn-primary">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        {{ $employee->exists ? 'Update Employee' : 'Register Employee' }}
                    </button>
                    <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
