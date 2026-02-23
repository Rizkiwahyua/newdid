<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentCategoryController;
use App\Http\Controllers\DocumentCodeController;
use App\Http\Controllers\WorkUnitController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DepartmentController;
// Halaman login
Route::get('/', function () {
    return redirect()->route('login');
});

// ============================
// Profile (Auth Only)
// ============================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ============================
// Admin Routes
// ============================
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->as('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [AdminController::class, 'index'])
            ->name('dashboard'); // nama route = admin.dashboard

        Route::resource('documents', DocumentController::class)
            ->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
            
        // Document Categories
        Route::resource('document-categories', DocumentCategoryController::class)
            ->only(['index', 'create', 'store']);

        // Document Codes
        Route::resource('document-codes', DocumentCodeController::class)
            ->only(['index', 'create', 'store']);


        Route::resource('user', AdminUserController::class);
        Route::resource('department', DepartmentController::class);


        // Users
        Route::resource('user', AdminUserController::class);
        Route::resource('department', DepartmentController::class);
    });

// ============================
// User Routes
// ============================
Route::middleware(['auth', 'role:user'])
    ->prefix('user')
    ->as('user.')
    ->group(function () {

        Route::get('/dashboard', [UserController::class, 'index'])
            ->name('dashboard'); // nama route = user.dashboard
    });

require __DIR__ . '/auth.php';
