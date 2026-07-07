<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\StudentStayController;
use App\Http\Controllers\Admin\FloorController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ExpenseController;

// Public routes
Route::get('/', fn()=> view('home'))->name('home');
Route::get('/rules', fn()=> view('rules'))->name('rules');  

// Admin auth
Route::get('/admin/login', [AdminLoginController::class,'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class,'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminLoginController::class,'logout'])->name('admin.logout');

// Redirect default /login to admin login
Route::get('/login', fn() => redirect()->route('admin.login'))->name('login');

// Admin routes (middleware auth)
Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function() {

    // Dashboard
    Route::get('/dashboard', [AdminDashboardController::class,'index'])->name('dashboard');

    // Students
    Route::resource('students', StudentController::class);

    // Student stays (for adding/updating monthly stay/payment)
    Route::post('students/{student}/stays', [StudentStayController::class,'store'])->name('students.stays.store');

    // Rooms (view-only example)
    Route::get('/rooms', fn() => view('admin.rooms.index'))->name('rooms.index');

    // Payments
    Route::get('/payments', [PaymentController::class,'index'])->name('payments.index');
    Route::post('/payments', [PaymentController::class,'store'])->name('payments.store');

    // Reports
    Route::get('/reports', [ReportController::class,'index'])->name('reports.index');

    // Expenses
    Route::resource('expenses', ExpenseController::class);
});
Route::delete('/admin/students/{student}/delete-month/{year}/{month}',[StudentController::class, 'deleteMonthRecord'])->name('admin.students.month.delete');
