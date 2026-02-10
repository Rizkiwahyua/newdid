<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentCategoryController;
use App\Http\Controllers\DocumentCodeController;
use App\Http\Controllers\WorkUnitController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

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

Route::middleware(['auth'])->group(function () {

    Route::resource('document-categories', DocumentCategoryController::class)
        ->only(['index', 'create', 'store']);

    Route::resource('document-codes', DocumentCodeController::class)
        ->only(['index', 'create', 'store']);

    Route::resource('work-units', WorkUnitController::class)
        ->only(['index', 'create', 'store']);

    Route::resource('documents', DocumentController::class)
        ->only(['index', 'create', 'store']);

});


Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])
        ->name('admin.dashboard');
});

Route::middleware(['auth','role:user'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'index'])
        ->name('user.dashboard');
});

require __DIR__ . '/auth.php';
