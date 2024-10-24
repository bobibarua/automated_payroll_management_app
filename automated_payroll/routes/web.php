<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\HomeController;

// Public Routes
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes(); // Authentication routes for login, registration, password reset, etc.

// Protected Routes - Require Authentication
Route::middleware(['auth'])->group(function () {
    // Home Route
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Employee Routes
    Route::resource('employees', EmployeeController::class);

    // Attendance Routes
    Route::resource('attendances', AttendanceController::class);

    // Payroll Routes
    Route::resource('payrolls', PayrollController::class);
});
