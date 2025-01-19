<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Studentcontroller;

Route::get('/', function () {
    return view('welcome');
});

Route::view('show', 'add-data');

Route::post('show', [Studentcontroller::class, 'getinfo']);
Route::get('show-data', [Studentcontroller::class, 'showData']);
Route::get('delete/{id}', [Studentcontroller::class, 'delete'])->name("delete-student");
Route::get('/edit/{id}', [Studentcontroller::class, 'edit'])->name("edit");


