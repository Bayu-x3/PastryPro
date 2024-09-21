<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PastryController;
use App\Http\Controllers\Admin\Auth\LoginController;

// admin-auth.php
Route::prefix('admin')->middleware('guest:admin')->group(function () {
    Route::get('login', [LoginController::class, 'create'])->name('admin.login');
    Route::post('login', [LoginController::class, 'store'])->name('admin.login.store');
});


Route::prefix('admin')->middleware('auth:admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::post('logout', [LoginController::class, 'destroy'])
                ->name('admin.logout');
});
