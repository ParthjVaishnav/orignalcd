<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\InfosController;
use App\Http\Controllers\Studentcontroller;

Route::get('/', function () {
    return view('welcome');
});

 //Student Routes
Route::view('show', 'add-data');
Route::post('show', [Studentcontroller::class, 'getinfo']);
Route::get('show-data', [Studentcontroller::class, 'showData']);
Route::get('delete/{id}', [Studentcontroller::class, 'delete'])->name("delete-student");
Route::get('edit/{id}', [Studentcontroller::class, 'edit'])->name("edit");
Route::put('edit-student/{id}', [Studentcontroller::class, 'editStudent']);
Route::get('search', [Studentcontroller::class, 'search']);
Route::post('mltdlt', [Studentcontroller::class, 'muldlt']);
Route::post('send-test-mail', [Studentcontroller::class, 'sendTestMail']);

// Authentication Routes
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [InfosController::class, 'store'])->name('store'); // Ensure store route exists
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// OTP Routes
Route::post('/send-otp', [OtpController::class, 'sendOtp']);
Route::post('/verify-otp', [OtpController::class, 'verifyOtp']);
