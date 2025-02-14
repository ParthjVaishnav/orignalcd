<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

// Show Register Page
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');

// Handle Registration
Route::post('/register', [AuthController::class, 'register']);

// Show Login Page
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

// Handle Login
Route::post('/login', [AuthController::class, 'login']);

// Protected Route (Only accessible after login)
Route::middleware('auth')->group(function () {
    Route::get('/add-data', function () {
        return view('add-data');
    })->name('add-data');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});



