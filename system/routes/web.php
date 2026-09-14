<?php

use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\BenefitLoanController;
use App\Http\Controllers\BiometricController;
use App\Http\Controllers\ClearanceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeSelfServiceController;
use App\Http\Controllers\MakeUpClassController;
use App\Http\Controllers\MasterDataController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\PayrollReceiptController;
use App\Http\Controllers\PayslipController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('login'));

Route::get('/dashboard', DashboardController::class)
    ->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Notifications
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::get('/notifications/read/{notification}', [NotificationController::class, 'markRead'])->name('notifications.read');
    Route::post('/notifications/read-all', [NotificationController::class, 'markAll'])->name('notifications.markAll');

    // ===== Admin =====
    Route::middleware('role:admin')->group(function () {
        Route::resource('users', UserController::class)->except(['show']);
        Route::patch('users/{user}/toggle', [UserController::class, 'toggle'])->name('users.toggle');
        Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
        Route::get('api/employees/unlinked', [UserController::class, 'employees'])->name('users.employees');

        Route::resource('departments', DepartmentController::class)->except(['show', 'edit', 'create']);
        Route::post('positions', [DepartmentController::class, 'storePosition'])->name('positions.store');
        Route::patch('positions/{position}', [DepartmentController::class, 'updatePosition'])->name('positions.update');
        Route::delete('positions/{position}', [DepartmentController::class, 'destroyPosition'])->name('positions.destroy');

        Route::get('masterdata', [MasterDataController::class, 'index'])->name('masterdata.index');
        Route::post('masterdata/courses', [MasterDataController::class, 'storeCourse'])->name('masterdata.courses.store');
        Route::delete('masterdata/courses/{course}', [MasterDataController::class, 'destroyCourse'])->name('masterdata.courses.destroy');
        Route::post('masterdata/subjects', [MasterDataController::class, 'storeSubject'])->name('masterdata.subjects.store');
        Route::delete('masterdata/subjects/{subject}', [MasterDataController::class, 'destroySubject'])->name('masterdata.subjects.destroy');
        Route::post('masterdata/rooms', [MasterDataController::class, 'storeRoom'])->name('masterdata.rooms.store');
        Route::delete('masterdata/rooms/{room}', [MasterDataController::class, 'destroyRoom'])->name('masterdata.rooms.destroy');
        Route::post('masterdata/school-years', [MasterDataController::class, 'storeSchoolYear'])->name('masterdata.schoolyears.store');
        Route::post('masterdata/school-years/{schoolYear}/activate', [MasterDataController::class, 'activateSchoolYear'])->name('masterdata.schoolyears.activate');
        Route::post('masterdata/semesters', [MasterDataController::class, 'storeSemester'])->name('masterdata.semesters.store');
        Route::post('masterdata/semesters/{semester}/activate', [MasterDataController::class, 'activateSemester'])->name('masterdata.semesters.activate');

        Route::get('biometrics', [BiometricController::class, 'index'])->name('biometrics.index');
        Route::post('biometrics', [BiometricController::class, 'store'])->name('biometrics.store');
        Route::match(['get', 'post'], 'biometrics/{device}/sync', [BiometricController::class, 'sync'])->name('biometrics.sync');
        Route::match(['get', 'post'], 'biometrics/{device}/test', [BiometricController::class, 'testConnection'])->name('biometrics.test');
        Route::delete('biometrics/{device}', [BiometricController::class, 'destroy'])->name('biometrics.destroy');

        Route::get('settings/payroll', [SettingsController::class, 'payroll'])->name('settings.payroll');
        Route::post('settings/payroll', [SettingsController::class, 'savePayroll'])->name('settings.payroll.save');
        Route::post('settings/{key}', [SettingsController::class, 'updateKey'])->name('settings.update');

Route::get('archives', [ArchiveController::class, 'index'])->name('archives.index');
        Route::post('archives/export', [ArchiveController::class, 'export'])->name('archives.export');
        Route::get('archives/print', [ArchiveController::class, 'export'])->name('archives.print');
        Route::post('archives/run', [ArchiveController::class, 'run'])->name('archives.run');
        Route::delete('archives/{archive}', [ArchiveController::class, 'destroy'])->name('archives.destroy');
    });

    // ===== Admin + HR =====
    Route::middleware('role:admin,hr')->group(function () {
        Route::resource('employees', EmployeeController::class);
        Route::post('employees/{employee}/reactivate', [EmployeeController::class, 'reactivate'])->name('employees.reactivate');

        Route::get('schedules', [ScheduleController::class, 'index'])->name('schedules.index');
        Route::post('schedules/teaching', [ScheduleController::class, 'storeTeaching'])->name('schedules.teaching.store');
        Route::delete('schedules/teaching/{schedule}', [ScheduleController::class, 'destroyTeaching'])->name('schedules.teaching.destroy');
        Route::post('schedules/work', [ScheduleController::class, 'storeWork'])->name('schedules.work.store');
        Route::delete('schedules/work/{schedule}', [ScheduleController::class, 'destroyWork'])->name('schedules.work.destroy');

        Route::get('attendance', [AttendanceController::class, 'index'])->name('attendance.index');
        Route::get('attendance/{attendance}/edit', [AttendanceController::class, 'edit'])->name('attendance.edit');
        Route::put('attendance/{attendance}', [AttendanceController::class, 'update'])->name('attendance.update');
        Route::post('attendance/punch', [AttendanceController::class, 'storePunch'])->name('attendance.punch');
        Route::post('attendance/process', [AttendanceController::class, 'processRange'])->name('attendance.process');

        Route::get('biometrics/punches', [BiometricController::class, 'punches'])->name('biometrics.punches');
        Route::post('biometrics/punches', [BiometricController::class, 'storePunch'])->name('biometrics.punches.store');

        Route::get('clearances', [ClearanceController::class, 'index'])->name('clearances.index');
        Route::post('clearances/toggle', [ClearanceController::class, 'toggleClearance'])->name('clearances.toggle');
        Route::post('clearances/init', [ClearanceController::class, 'bulkSync'])->name('clearances.init');

        Route::post('makeup', [MakeUpClassController::class, 'store'])->name('makeup.store');
    });

    // ===== Admin + HR + Department Head (make-up classes) =====
    Route::middleware('role:admin,hr,department_head')->group(function () {
        Route::get('makeup', [MakeUpClassController::class, 'index'])->name('makeup.index');
        Route::post('makeup/{makeUpClass}/approve', [MakeUpClassController::class, 'approve'])->name('makeup.approve');
        Route::post('makeup/{makeUpClass}/reject', [MakeUpClassController::class, 'reject'])->name('makeup.reject');
    });

    // ===== Admin + Department Head =====
    Route::middleware('role:admin,department_head')->group(function () {
        Route::get('department/attendance', [AttendanceController::class, 'index'])->name('department.attendance');
        Route::get('department/schedules', [ScheduleController::class, 'index'])->name('department.schedules');
        Route::get('department/reports', [ReportController::class, 'show'])->name('department.reports');
    });

    // ===== Admin + Payroll =====
    Route::middleware('role:admin,payroll_officer')->group(function () {
        Route::get('payroll', [PayrollController::class, 'index'])->name('payroll.index');
        Route::get('payroll/create', [PayrollController::class, 'create'])->name('payroll.create');
        Route::post('payroll', [PayrollController::class, 'store'])->name('payroll.store');
        Route::get('payroll/{period}', [PayrollController::class, 'show'])->name('payroll.show');
        Route::post('payroll/{period}/regenerate', [PayrollController::class, 'regenerate'])->name('payroll.regenerate');
        Route::delete('payroll/{period}', [PayrollController::class, 'destroy'])->name('payroll.destroy');
        Route::post('payrolls/{payroll}/release', [PayrollController::class, 'release'])->name('payroll.release');
        Route::get('payrolls/{payroll}', [PayrollController::class, 'showLine'])->name('payroll.line');
        Route::put('payrolls/{payroll}', [PayrollController::class, 'updateLine'])->name('payroll.update');

        Route::get('payslips', [PayslipController::class, 'index'])->name('payslips.index');
        Route::get('payslips/{payslip}', [PayslipController::class, 'show'])->name('payslips.show');
        Route::get('payslips/{payslip}/download', [PayslipController::class, 'download'])->name('payslips.download');

        Route::get('receipts', [PayrollReceiptController::class, 'index'])->name('receipts.index');
        Route::post('receipts/{receipt}/sign', [PayrollReceiptController::class, 'sign'])->name('receipts.sign');
        Route::post('receipts/{receipt}/sign-hr', [PayrollReceiptController::class, 'signHr'])->name('receipts.sign-hr');
        Route::get('receipts/{receipt}/print', [PayrollReceiptController::class, 'print'])->name('receipts.print');

        Route::get('benefits', [BenefitLoanController::class, 'benefits'])->name('benefits.index');
        Route::post('benefits', [BenefitLoanController::class, 'storeBenefit'])->name('benefits.store');
        Route::delete('benefits/{benefit}', [BenefitLoanController::class, 'destroyBenefit'])->name('benefits.destroy');
        Route::post('benefits/assign', [BenefitLoanController::class, 'assignBenefit'])->name('benefits.assign');
        Route::delete('benefits/assignment/{employeeBenefit}', [BenefitLoanController::class, 'revokeBenefit'])->name('benefits.revoke');

        Route::get('loans', [BenefitLoanController::class, 'loans'])->name('loans.index');
        Route::post('loans', [BenefitLoanController::class, 'storeLoan'])->name('loans.store');
        Route::put('loans/{loan}', [BenefitLoanController::class, 'updateLoan'])->name('loans.update');

        Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
        Route::get('reports/show', [ReportController::class, 'show'])->name('reports.show');
        Route::get('reports/export', [ReportController::class, 'exportViaGet'])->name('reports.export.get');
        Route::post('reports/export', [ReportController::class, 'export'])->name('reports.export');
    });

    // ===== Employee self-service =====
    Route::prefix('my')->name('employee.')->middleware('role:admin,hr,payroll_officer,department_head,employee')->group(function () {
        Route::get('attendance', [EmployeeSelfServiceController::class, 'attendance'])->name('attendance');
        Route::get('schedule', [EmployeeSelfServiceController::class, 'schedule'])->name('schedule');
        Route::get('makeup-classes', [EmployeeSelfServiceController::class, 'makeupClasses'])
            ->middleware('role:employee')
            ->name('makeup.index');
        Route::get('payslips', [EmployeeSelfServiceController::class, 'payslips'])->name('payslips');
        Route::get('payslips/{payslip}/download', [EmployeeSelfServiceController::class, 'payslipDownload'])->name('payslips.download');
        Route::get('receipts', [EmployeeSelfServiceController::class, 'receipts'])->name('receipts');
        Route::get('receipts/{receipt}/download', [EmployeeSelfServiceController::class, 'receiptDownload'])->name('receipts.download');
        Route::post('receipts/{receipt}/sign', [EmployeeSelfServiceController::class, 'receiptSign'])->name('receipts.sign');
        Route::get('history', [EmployeeSelfServiceController::class, 'history'])->name('history');
    });
});

require __DIR__.'/auth.php';
