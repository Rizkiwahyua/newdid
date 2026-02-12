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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->as('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminController::class, 'index'])
            ->name('dashboard');

        Route::resource('documents', DocumentController::class)
            ->only(['index', 'create', 'store']);

        Route::resource('document-categories', DocumentCategoryController::class)
            ->only(['index', 'create', 'store']);

        Route::resource('document-codes', DocumentCodeController::class)
            ->only(['index', 'create', 'store']);

        Route::resource('work-units', WorkUnitController::class)
            ->only(['index', 'create', 'store']);

        Route::get('/admin/user', [AdminUserController::class, 'index'])->name('admin.user');
    });



// Route::middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('dashboard');


//     Route::get('/admin/user', [AdminUserController::class, 'index'])->name('admin.user');
// });

Route::middleware(['auth', 'role:user'])
    ->prefix('user')
    ->as('user.')
    ->group(function () {

        Route::get('/dashboard', [UserController::class, 'index'])
            ->name('dashboard');
    });


require __DIR__ . '/auth.php';
