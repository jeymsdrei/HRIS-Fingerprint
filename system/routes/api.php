<?php

use App\Http\Controllers\BiometricController;
use Illuminate\Support\Facades\Route;

Route::post('/device/push', [BiometricController::class, 'apiPush'])->name('device.push');
Route::post('/device/register', [BiometricController::class, 'register'])->name('device.register');
Route::post('/device/heartbeat', [BiometricController::class, 'heartbeat'])->name('device.heartbeat');
Route::get('/device/employees', [BiometricController::class, 'employees'])->name('device.employees');
Route::post('/device/assign-fingerprint', [BiometricController::class, 'assignFingerprint'])->name('device.assign-fingerprint');
