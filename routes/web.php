<?php

use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

/*
Redirecting to our main Login Page
*/
Route::redirect('/', '/login');

Route::middleware('guest')->group(function (): void {

    Route::get('login', [AuthenticateController::class, 'login'])
        ->name('login');
    
    Route::post('login-check', [AuthenticateController::class, 'check'])
        ->name('check');
    
    Route::get('signup', [AuthenticateController::class, 'register'])
        ->name('register');
    
    Route::post('signin', [AuthenticateController::class, 'store'])
        ->name('store');
});

Route::middleware('auth')->group(function (): void {

     Route::post('logout', [EmployeeController::class, 'logout'])
     ->name('logout');
     /*
     Employee
     */
     Route::resource('employees', EmployeeController::class)->wherenumber('employee');
});