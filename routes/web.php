<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/ex', function () {
    return view('layouts.example');
});



Route::get('/', [ProfileController::class, 'view'])->name('users.index'); //import and view data
Route::get('/users/create', [ProfileController::class, 'create'])->name('users.create'); // create by form
Route::post('/users', [ProfileController::class, 'store'])->name('users.store'); // store by form
Route::get('/users/{id}', [ProfileController::class, 'show'])->name('users.show');
Route::get('/users/{id}/delete', [ProfileController::class, 'delete'])->name('users.destroy');
Route::post('/users/{id}/update', [ProfileController::class, 'update'])->name('users.update');
Route::get('/users/{id}/edit', [ProfileController::class, 'edit'])->name('users.edit');

Route::get('/export-csv', [ProfileController::class, 'exportCSV'])->name('users.export');
Route::post('/import-csv', [ProfileController::class, 'importCSV'])->name('users.import');
