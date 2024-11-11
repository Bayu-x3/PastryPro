<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PastryController;

//get
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/login', function () {
    if (Auth::guard('auth')->check()) {
        return redirect()->route('admin.dashboard');
    }

    return view('auth.login');
})->name('login');


Route::prefix('admin')->middleware('auth:admin')->group(function() {
    Route::get('pastry', [PastryController::class, 'index'])->name('admin.pastry.index');
    Route::get('pastry/create', [PastryController::class, 'create'])->name('admin.pastry.create');
    Route::post('pastry/create', [PastryController::class, 'store'])->name('admin.pastry.store');
    Route::get('pastry/{id}/edit', [PastryController::class, 'edit'])->name('admin.pastry.edit');
    Route::put('pastry/{id}', [PastryController::class, 'update'])->name('admin.pastry.update');
    Route::delete('pastry/{id}', [PastryController::class, 'destroy'])->name('admin.pastry.destroy');
});




require __DIR__.'/auth.php';
require __DIR__.'/admin-auth.php';
