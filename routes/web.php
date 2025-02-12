<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Studentcontroller;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::view('show', 'add-data');
Route::post('show', [Studentcontroller::class, 'getinfo']);
Route::get('show-data', [Studentcontroller::class, 'showData']);
Route::get('delete/{id}', [Studentcontroller::class, 'delete'])->name("delete-student");
Route::get('edit/{id}', [Studentcontroller::class, 'edit'])->name("edit");
Route::put('edit-student/{id}', [Studentcontroller::class, 'editStudent']);
Route::get('search', [Studentcontroller::class, 'search']);
Route::post('mltdlt', [Studentcontroller::class, 'muldlt']);
Route::post('send-test-mail', [Studentcontroller::class, 'sendTestMail']);


Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
