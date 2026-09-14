@aware(['error' => null])
<x-app-layout hris>
    <x-slot name="title">My Records</x-slot>

    <div class="page-container">
        <div class="max-w-2xl mx-auto">
            <div class="card card-body text-center py-12">
                <div class="mx-auto w-16 h-16 rounded-full bg-amber-100 flex items-center justify-center mb-5">
                    <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a8.25 8.25 0 0114.99 0H4.5z"/>
                    </svg>
                </div>
                <h2 class="text-xl font-semibold text-slate-900 mb-2">No employee record linked</h2>
                <p class="text-sm text-slate-500 leading-relaxed mb-6">
                    Your account is not linked to an employee profile, so there are no self-service records
                    (attendance, schedule, payslips) to show. Contact HR to link an employee record to your account.
                </p>
                <a href="{{ route('dashboard') }}" class="btn btn-primary">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l9-9 9 9M5 10v10h14V10"/>
                    </svg>
                    Back to Dashboard
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
